<!DOCTYPE html>
<html>
<head>
    <title>Laravel DataTables</title>
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/plugin/datatables/dataTables.bootstrap.css">
    <link rel="stylesheet" href="css/plugin/datatables/dataTables.bootstrap.min.css">
    <script src="js/libs/jquery/jquery-2.1.4.min.js"></script>
    <script src="js/plugin/datatables/jquery.dataTables.min.js"></script>
    <script src="js/plugin/datatables/dataTables.bootstrap.min.js"></script>
</head>
<body>

<div class="container">
    <table id="task" class="table table-hover table-condensed">
        <thead>
        <tr>
            <th>Id</th>
            <th>name</th>
            <th>description</th>
            {{--<th>State</th>--}}
        </tr>
        </thead>
    </table>
</div>

<script type="text/javascript">
    $(document).ready(function() {
        oTable = $('#task').DataTable({
            "processing": true,
            "serverSide": true,
            "ajax": "{{ route('tabla') }}",
            "columns": [
                {data: 'id', name: 'id'},
                {data: 'name', name: 'name'},
                {data: 'description', name: 'description'}

            ]
        });
    });
</script>
</body>
</html>