@extends('roles.base')
@section('content')
    <div class="content-wrapper">
        @if(Auth::user()->role->create_role)
        <!-- Content Header (Page header) -->
      <section class="content-header">
      <h1>
          <a href="{{ url('roles')}}"> Roles</a>
      </h1>
      <ol class="breadcrumb">
          <li><a href=""><i class="fa fa-dashboard"></i> Roles Mangement</a></li>
          <li class="active">Edit</li>
      </ol>
      </section>
        <section class="content">
            <div class="box box-warning">
                <div class="box-body">
                    <form action="{{ route('roles.update', $role)}}" method="POST">
                        {{ csrf_field() }}
                        <input name="_method" type="hidden" value="PATCH">
                        <div class="row">
                        
                            <div class="col-md-6">
                                <div class="form-group{{ $errors->has('name') ? 'has-error' : '' }}">
                                    <label for="name">Role Name</label>
                                    <input type="text" class="form-control" name="name" id="name" style="width : 100%;" value="{{ $role->name }}">
                                    @if($errors->has('name'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('name')}}</strong>
                                        </span>
                                    @endif    
                                </div>
                            </div>
                            <!-- /col -->
                            <div class="col-md-6">
                                    <div class="form-group{{ $errors->has('description') ?  'has-error' : ''}}">
                                            <label for="details">Description</label>
                                            <input type="text" class="form-control" name="description" id="description" style="width: 100%;" value="{{ $role->description }}">
                                            @if($errors->has('description'))
                                                <span>
                                                    <strong>{{ $errors->first('description')}}</strong>
                                                </span>
                                            @endif   
                                     </div>
                            </div>
                            <!-- /col -->
                        </div>
                        <!-- /row -->
                        <h4>Permissions</h4>
                        <div class="row">
                            <div class="col-md-2">
                                <div class="form-group{{ $errors->has('view_dashboard') ? 'has-error' : '' }}">
                                    <div class="checkbox">
                                        <label>
                                        <input type="checkbox" name="view_dashboard" id="" value="1" {{ $role->view_dashboard == 1 ? 'checked' : ''}}>
                                            View Dashboard
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-2">
                                <div class="form-group{{ $errors->has('create_user') ? 'has-error' : '' }}">
                                    <div class="checkbox">
                                        <label>
                                        <input type="checkbox" name="create_user" value="1" {{ $role->create_user == 1 ? 'checked' : ''}} id="">
                                            Add User
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-2">
                                <div class="form-group{{ $errors->has('create_role') ? 'has-error' : '' }}">
                                    <div class="checkbox">
                                        <label>
                                        <input type="checkbox" name="create_role" value="1" {{ $role->create_role == 1 ? 'checked' : ''}} id="">
                                            Add Role
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-2">
                                <div class="form-group{{ $errors->has('create_payment') ? 'has-error' : '' }}">
                                    <div class="checkbox">
                                        <label>
                                        <input type="checkbox" name="create_payment" value="1" {{ $role->create_payment == 1 ? 'checked' : ''}} id="">
                                           Add Payment
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-2">
                                <div class="form-group{{ $errors->has('view_payment') ? 'has-error' : '' }}">
                                    <div class="checkbox">
                                        <label>
                                        <input type="checkbox" name="view_payment" value="1" {{ $role->view_payment == 1 ? 'checked' : ''}} id="">
                                           View Payment
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-2">
                                <div class="form-group{{ $errors->has('view_report') ? 'has-error' : '' }}">
                                    <div class="checkbox">
                                        <label>
                                        <input type="checkbox" name="view_report" value="1" {{ $role->view_report == 1 ? 'checked' : ''}} id="">
                                           Generate Report
                                        </label>
                                    </div>
                                </div>
                            </div>
                        
                        </div>
                        <!-- /row -->
                        <a href="{{ route('roles.index')}}" type="reset" class="btn btn-danger" value="Clear form">Cancel</a>
                        <button type="submit" class="btn btn-primary pull-right">Update Role</button>
                    </form>
                </div>
            </div>
        </section>
        @endif
    </div>
@endsection