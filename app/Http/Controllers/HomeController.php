<?php

namespace App\Http\Controllers;

use App\Account;
use App\Category;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $search = \Request::get('search');  
        $accounts = Account::where('name','like','%'.$search.'%')->orderBy('id')->paginate(5);
        $categories = Category::all();
        return view('home',['accounts'=>$accounts , 'categories'=>$categories]);
    }
}
