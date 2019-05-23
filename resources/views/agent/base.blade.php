@extends('layouts.main')
@section('content')
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
     <h1>
       Agents
     </h1>
      <span class="headerElems" style="float:right;display:block;margin-top:-28px;position:relative;">
         <a href="{{ route('agent.create') }}" class="btn btn-primary  pull-right"><i class="fa  fa-plus"></i> Add Agent</a>
      </span>
    </section>
    @yield('action-content')
    <!-- /.content -->
  </div>
@endsection
