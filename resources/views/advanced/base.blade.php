@extends('layouts.main')
@section('content')

    <div class="content-wrapper">
    @if(Auth::user()->role->create_user)
        <!-- Content Header (Page header) -->
            <section class="content-header">
                <h1>
                    <a href="{{ url('users')}}">Activity</a>
                </h1>
                <ol class="breadcrumb">
                    <li><a href=""><i class="fa fa-dashboard"></i> Activity Logs</a></li>
                    <li class="active">Logs</li>
                </ol>
            </section>
        @yield('action-content')
        <!-- /.content -->
        @endif
    </div>

@endsection
