@extends('users.base')
@section('content')

    <div class="content-wrapper">
    @if(Auth::user()->role->create_user)
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                <a href="{{ url('users')}}"> Users</a>
            </h1>
            <ol class="breadcrumb">
                <li><a href=""><i class="fa fa-dashboard"></i> User Mangement</a></li>
                <li class="active">Details</li>
            </ol>
        </section>
        <section class="content">
            <div class="box box-warning">
                <div class="box-body">
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="x_panel">
                                <div class="x_title">
                                    <h5>

                                        <div class="btn-group pull-right">
                                            @if($user->active)
                                                <a type="button" href="{{route('users.disable' , $user)}}" class="btn btn-danger" style="margin-right: 5px;">Disable Account</a>
                                            @else
                                                <a type="button" href="{{route('users.enable',$user)}}" class="btn btn-success" style="margin-right: 5px;">Enable Account</a>
                                            @endif
                                            <a type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-edit" style="margin-right: 5px;">Edit User</a>

                                                <a type="button" class="btn btn-warning" data-toggle="modal" data-target="#modal-password">Change Password</a>
                                        </div>
                                    </h5>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="x_content">

                                    <div class="col-md-6 col-sm-12 col-xs-12">

                                        <h4>User Basic Information</h4>
                                        <table class="table table-hover">
                                            <tbody>
                                            <tr>
                                                <td>Email</td>
                                                <th>{{ $user->email }}</th>
                                            </tr>
                                            <tr>
                                                <td>Name</td>
                                                <th>{{$user->fname}} {{$user->lname}}</th>
                                            </tr>
                                            <tr>
                                                <td>Role</td>
                                                <th>{{$user->role->name}}</th>
                                            </tr>
                                            <tr>
                                                <td>Created At</td>
                                                <th>{{$user->created_at}}</th>
                                            </tr>
                                            <tr>
                                                <td>Last Login</td>
                                                <th>{{$user->updated_at}}</th>
                                            </tr>
                                            </tbody>
                                        </table>

                                    </div>
                                    <div class="col-md-6 col-sm-12 col-xs-12">

                                        <h4>User Permissions</h4>
                                        <table class="table table-hover">
                                            <tbody>
                                            <tr>
                                                <th>Create User</th>
                                                <td>Allowed</td>
                                            </tr>
                                            <tr>
                                                <th>Create Payment</th>
                                                <td>Allowed</td>
                                            </tr>
                                            <tr>
                                                <th>View Payment</th>
                                                <td>Allowed</td>
                                            </tr>
                                            <tr>
                                                <th>View Dashboard</th>
                                                <td>Allowed</td>
                                            </tr>
                                            <th>Create Role</th>
                                            <td>Allowed</td>

                                            </tr>
                                            <tr>
                                                <th>View Report</th>
                                                <td>Allowed</td>
                                            </tr>
                                            </tbody>
                                        </table>

                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /row -->



                    <div class="modal fade" id="modal-edit">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span></button>
                                    <h4 class="modal-title">Edit User</h4>
                                </div>
                                <div class="modal-body">
                                    @include('users/user-edit')
                                </div>
                                <!-- <div class="modal-footer">
                                   <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                                   <button type="submit" class="btn btn-primary">Add Customer</button>
                                 </div> -->
                            </div>
                            <!-- /.modal-content -->
                        </div>
                        <!-- /.modal-dialog -->
                    </div>
                    <!-- /.modal -->



                    <div class="modal fade" id="modal-password">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span></button>
                                    <h4 class="modal-title">Change Password</h4>
                                </div>
                                <div class="modal-body">
                                    @include('users/change-password')
                                </div>
                                <!-- <div class="modal-footer">
                                   <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                                   <button type="submit" class="btn btn-primary">Add Customer</button>
                                 </div> -->
                            </div>
                            <!-- /.modal-content -->
                        </div>
                        <!-- /.modal-dialog -->
                    </div>
                    <!-- /.modal -->


                </div>
                <!-- box-body -->
            </div>
            <!-- /box -->
        </section>
        <!-- /content -->
        @endif
    </div>
    <!-- /content-wrapper -->
@endsection