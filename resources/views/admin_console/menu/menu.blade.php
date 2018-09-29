@extends('layouts.master')

@section('title')
    Admin Console | Menu
@endsection

@section('content')
    <?php //dd($menu_list) ?>

    <div class="page-title">
        <div class="title-env">
            <h1 class="title">Menu</h1>
            <p class="description">Add, Update & Delete System Menu</p>
        </div>
        <div class="breadcrumb-env">
            <ol class="breadcrumb bc-1" >                <li>
                    <a href="#"><i class="fa-home"></i>Admin Console</a>
                </li>
                <li class="active">
                    <strong>Menu</strong>
                </li>
            </ol>
        </div>
    </div>
    @include('error.error_msg')
    <div class="panel panel-default">
        <div class="panel-heading">
            <a href="{{ url('menu/add_menu') }}" class="btn btn-turquoise">Add Menu</a>
        </div>
        <div class="panel-body">
            <table id="menu_datatable" class="display compact hover row-border responsive no-wrap" style="width:100%">
                <thead>
                <tr>
                    <th hidden="true">Id</th>
                    <th>Title</th>
                    <th>Url</th>
                    <th>Parent Menu</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($menu_list as $menu)
                <tr>
                    <td hidden="true">{{ $menu->id }}</td>
                    <td>{{ $menu->title }}</td>
                    <td>{{ $menu->menu_url ? $menu->menu_url : 'N/A' }}</td>
                    <td>{{ $menu->parent_menu_title ? $menu->parent_menu_title : 'N/A' }}</td>
                    <td><a href="{{ url('menu/update_menu/'.$menu->id) }}" class="btn btn-blue btn-sm btn-icon">Edit</a> <a href="{{ url('menu/delete_menu/'.$menu->id) }}" onclick="return confirm_menu_delete()" class="btn btn-red btn-sm btn-icon">Delete</a> </td>
                </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>

@endsection


@section('scripts')
    <script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#menu_datatable').DataTable({
                responsive: true,
                "order": [[ 0, "desc" ]]
            });
        } );
        function confirm_menu_delete() {
            if(confirm('Are you sure want to delete?')) {
                return true;
            } else {
                return false;
            }
        }
    </script>
@endsection

