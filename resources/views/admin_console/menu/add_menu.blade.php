@extends('layouts.master')

@section('title')
    Admin Console | Add Menu
@endsection

@section('content')


    <div class="page-title">
        <div class="title-env">
            <h1 class="title">Menu</h1>
            <p class="description">Add, Update & Delete System Menu</p>
        </div>
        <div class="breadcrumb-env">
            <ol class="breadcrumb bc-1" >
                <li>
                    <a href="#"><i class="fa-home"></i>Admin Console</a>
                </li>
                <li>
                    <a href="{{ url('/menu') }}"><i class="fa-home"></i>Menu</a>
                </li>
                <li class="active">
                    <strong>Add Menu</strong>
                </li>
            </ol>
        </div>
    </div>
    @include('error.error_msg')
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4>Add New Menu</h4>
                </div>
                <div class="panel-body">
                    <form action="{{ url('menu/add_menu') }}" method="POST" role="form" id="form1" class="validate">
                        @csrf
                        <div class="form-group">
                            <label for="title">Menu Title</label>
                            <input type="text" name="title" id="title" class="form-control" data-validate="required" placeholder="Ex: Blog Post">
                        </div>
                        <div class="form-group">
                            <label for="menu_url">Menu URL</label>
                            <input type="text" name="menu_url" id="menu_url" class="form-control" placeholder="Ex: post/create_post">
                        </div>
                        <div class="form-group">
                            <label for="parent_menu">Parent Menu</label>
                            <select name="parent_menu" id="parent_menu" class="form-control">
                                <option value="">Select Parent Menu</option>
                                @foreach($menu_list as $menu)
                                    <option value="{{ $menu->id }}">{{ $menu->title }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="menu_url">Menu Order</label>
                            <input type="number" name="menu_order" id="menu_order" class="form-control" data-validate="number,minlength[1]" placeholder="Ex: 1" data-validate="required">
                        </div>
                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea name="description" id="description" class="form-control" cols="30" rows="2" data-validate="maxlength[150]" placeholder="Max 150 Character"></textarea>
                        </div>
                        <div class="form-group">
                            <input type="submit" name="" id="" value="Save Menu" class="btn btn-blue pull-right">
                        </div>
                    </form>
                </div>
            </div>
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
    </script>
@endsection

