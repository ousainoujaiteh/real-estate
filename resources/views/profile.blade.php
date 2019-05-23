@extends('layouts.main')
@section('content')
    <div class="content-wrapper">
    <!-- Content Header (Page header) -->
        <section class="content-header">
        <h1>
            <sapn> Profile</sapn>
        </h1>
        <ol class="breadcrumb">
            <li><a href=""><i class="fa fa-dashboard"></i> User Setting</a></li>
            <li class="active">Update</li>
        </ol>
        </section>
    <section class="content">
            <div class="box">
                <div class="box-body">
                    <form action="{{ route('users.change_password', Auth::user()->id )}}" method="POST">
                        {{ csrf_field() }}
                        <input name="_method" type="hidden" value="PUT">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group{{ $errors->has('old_password') ? 'has-error' : '' }}">
                                    <label for="lname">Old Password</label>
                                    <input type="old_password" class="form-control" name="old_password" id="old_password" style="width : 100%;" >
                                    @if($errors->has('old_password'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('old_password')}}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <!-- /col -->
                        </div>
                        <!-- /row -->

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group{{ $errors->has('password') ? 'has-error' : '' }}">
                                    <label for="lname">New Password</label>
                                    <input type="password" class="form-control" name="password" id="password" style="width : 100%;" >
                                    @if($errors->has('password'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('password')}}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <!-- /col -->
                        </div>
                        <!-- /row -->

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group{{ $errors->has('password_confirmation') ? 'has-error' : '' }}">
                                    <label for="lname">Comfirm Password</label>
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation"  style="width : 100%;" required>
                                    @if($errors->has('password_confirmation'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('password_confirmation')}}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <!-- /col -->
                        </div>
                        <!-- /row -->
                        <a href="{{ route('dashboard')}}" type="reset" class="btn btn-danger" value="Clear form">Cancel</a>
                        <button type="submit" class="btn btn-primary pull-right">Change Password</button>
                    </form>
                </div>
            </div>
        </section>
    </div>
    <!-- /content-wrapper -->
@endsection