@extends('layouts.master')

@section('title')
    Admin Console | Add Menu
@endsection

@section('content')


    <div class="page-title">
        <div class="title-env">
            <h1 class="title">Role</h1>
            <p class="description">Add, Update & Delete System Role</p>
        </div>
        <div class="breadcrumb-env">
            <ol class="breadcrumb bc-1" >
                <li>
                    <a href="#"><i class="fa-cog"></i>Admin Console</a>
                </li>
                <li>
                    <a href="{{ url('/role') }}">Role</a>
                </li>
                <li class="active">
                    <strong>Add Role</strong>
                </li>
            </ol>
        </div>
    </div>
    @include('error.error_msg')
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4>Update Role</h4>
                </div>
                <div class="panel-body">
                    <form action="{{ url('role/update_role/'.$role->id) }}" method="POST" role="form" id="form1" class="validate">
                        @csrf
                        <div class="form-group">
                            <label for="name">Title <span style="color: red;">*</span></label>
                            <input type="text" name="name" id="name" class="form-control" value="{{ $role->name }}" placeholder="Ex: Role Title" required>
                        </div>
                        <div class="form-group">
                            <label for="slug">Slug <span style="color: red;">*</span></label>
                            <input type="text" name="slug" id="slug" class="form-control" value="{{ $role->slug }}" data-validate="required" placeholder="Ex: Slug" require>
                        </div>
                        <div class="form-group">
                            <label for="permissions">Permissions</label>
                            <textarea name="permissions" id="permissions" class="form-control" cols="30" rows="2" data-validate="maxlength[150]" placeholder="Max 150 Character">{{ $role->permissions }}</textarea>
                        </div>
                        <div class="form-group">
                            <input type="submit" name="" id="" value="Update Role" class="btn btn-blue pull-right">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


@endsection


@section('scripts')
    <script type="text/javascript">

    </script>
@endsection

