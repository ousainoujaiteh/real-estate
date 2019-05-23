@extends('layouts.main')
@section('content')
    <section class="content-wrapper">
         <!-- Content Header (Page header) -->
         <section class="content-header">
        <h1>
            <a href="{{ url('agent')}}"> Agent</a>
        </h1>
        <ol class="breadcrumb">
            <li><a href=""><i class="fa fa-dashboard"></i> Agent Mangement</a></li>
            <li class="active">Edit</li>
        </ol>
        </section>
        <section class="content">
            <div class="row">
                <div class="col-md-8">
                    <div class="box box-warning">
                        <div class="box-body">
                            <h4 class="box-title">Agent Detail</h4>
                            <table class="table table-hover">
                                <tbody>
                                <tr>
                                    <th>First Name</th>
                                    <td>{{ $agent->fname }}</td>
                                </tr>
                                <tr>
                                    <th>Middle Name</th>
                                    <td>{{ $agent->mname }}</td>
                                </tr>
                                <tr>
                                    <th>Last Name</th>
                                    <td>{{ $agent->lname }}</td>
                                </tr>
                                <tr>
                                    <th>Address</th>
                                    <td>{{ $agent->address }}</td>
                                </tr>
                                <tr>
                                    <th>Phone</th>
                                    <td>{{ $agent->phone }}</td>
                                </tr>
                                <tr>
                                    <th>Email</th>
                                    <td>{{ $agent->email }}</td>
                                </tr>
                                <tr>
                                    <th>Type</th>
                                    <td>{{ $agent->type }}</td>
                                </tr>
                                </tbody>
                            </table>
                            <!-- /table -->
                        </div>
                        <!-- /box-body -->
                    </div>
                    <!-- /box -->
                </div>
                <!-- /col-8 -->




            <div class="col-md-4">
                <div class="box box-warning">
                    <div class="box-header with-border">
                        <h3 class="box-title">Actions</h3>

                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                            </button>
                        </div>
                        <!-- /.box-tools -->
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <!-- the events -->
                        <div id="external-events">
                            <div class="external-event bg-green"><a class="external-event bg-green" data-toggle="modal" data-target="#modal-agent">Edit Agent</a></div>
                            <div class="external-event bg-aqua"><a class="external-event bg-aqua" data-toggle="modal" data-target="#modal-property">Add Property</a></div>
                            {{-- <div class="external-event bg-blue"><a href="" class="external-event bg-blue">Generate Invoice</a></div>--}}
                            <div class="checkbox">
                            </div>
                        </div>

                        <!-- /events -->
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
            <!-- /.col -->
            </div>
            <!-- /row -->
        </section>
        <!-- /content -->

        @if($agent->properties != null)
         
        <section class="content">
            <div class="box box-warning">
                <div class="box-body">
                    <h4 class="box-title">Agent Properties</h4>
                    <table id="example2" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Property No</th>
                                <th>Property Name</th>
                                <th>Property Type</th>
                                <th>Location</th>
                                <th>Plot No</th>
                                <th>Size</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($agent->properties as $property)
                            <tr>
                                <td>{{ $property->property_no }}</td>
                                <td>{{ $property->property_name }}</td>
                                <td>{{ $property->property_type }}</td>
                                <td>{{ $property->location }}</td>
                                <td>{{ $property->plot_no }}</td>
                                <td>{{ $property->size }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /box-body -->
            </div>
            <!-- /box -->
        </section>
        <!-- /content -->

            <div class="modal fade" id="modal-agent">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title">New Property</h4>
                        </div>
                        <div class="modal-body">
                            @include('agent/edit')
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

            <div class="modal fade" id="modal-property">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title">New Property</h4>
                        </div>
                        <div class="modal-body">
                            @include('modal-ui/property-form')
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
        
        @endif

        
    </section>
    <!-- /content-wrapper -->
    <!-- jQuery 3 -->
 <script src="{{asset('theme/bower_components/jquery/dist/jquery.min.js')}}"></script>
  <!-- DataTables -->
  <script src="{{asset('theme/bower_components/datatables.net/js/jquery.dataTables.min.js')}}"></script>
  <script src="{{asset('theme/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js')}}"></script>
  <!-- page script -->
  <script>
    $(function () {
      $('#example2').DataTable({
        'paging'      : true,
        'processing' : true,
        'lengthChange': true,
        'searching'   : true,
        'ordering'    : true,
        'info'        : true,
        'autoWidth'   : true
      })
      $('#example1').DataTable({
        'paging'      : true,
        'processing' : true,
        'lengthChange': true,
        'searching'   : true,
        'ordering'    : true,
        'info'        : true,
        'autoWidth'   : true
      })
    })
  </script>
@endsection