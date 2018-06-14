<?php

namespace App\Http\Controllers;

use App\Account;
use App\Category;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;


class AccountController extends Controller
{

    public function index()
    {
        $search = \Request::get('search');  
        $accounts = Account::where('name','like','%'.$search.'%')->orderBy('id','desc')->paginate(5);
        $categories = Category::all();
        return view('home',['accounts'=>$accounts , 'categories'=>$categories]);
    }
    

    public function store(Request $request)
    {
//        dd($request->all());
        $account = new Account;
        $account->name = $request->name;
        $account->identifier = $request->identifier;
        $account->password = $request->password;
        $account->description = $request->description;

        $account->extra = $request->extra;
        $account->category_id = $request->category_id;
        $account->user_id = auth()->user()->id;
        $account->status = 1;
        
        if( $account->save()){
            return back()->with("status","success");
        }else{
            return back()->with("status","error");
        }
    }
    
    public function show($id)
    {
        $account = Account::find($id);
        $categories = Category::all();
        return view('accounts.view',['account'=>$account,'categories'=>$categories]);
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }


    public function destroy($id)
    {
        //
    }
    public function showtable()
    {
        $tasks = Account::select(['id','name','description']);

        return DataTables::of($tasks)
            ->make(true);
    }
    public function vertable()
    {
        
        return view('tabla');
    }

}
