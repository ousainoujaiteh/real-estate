@extends('layouts.main')
@section('content')
    <div class="content-wrapper">
         <!-- Content Header (Page header) -->
        <section class="content-header">
        <h1>
            <a href="{{ url('construction')}}"> Construction</a>
        </h1>
        <ol class="breadcrumb">
            <li><a href=""><i class="fa fa-dashboard"></i> Construction Mangement</a></li>
            <li class="active">Details</li>
        </ol>
        </section>
        <section class="content">
            <div class="row">
                <div class="col-md-8">
                    <div class="box box-warning">
                        <div class="box-body">
                            <h4 class="box-title">Construction Details</h4>
                            <div class="col-md-12">
                                <table class="table table-hover">
                                    <tbody>
                                    <tr>
                                        <th>Contruction Type</th>
                                        <td>{{ $construction->type }}</td>
                                    </tr>
                                    <tr>
                                        <th> Details</th>
                                        <td>{{ $construction->details }}</td>
                                    </tr>
                                    <tr>
                                        <th> Cost</th>
                                        <td>{{ $construction->cost }}</td>
                                    </tr>
                                    <tr>
                                        <th>Worker Name</th>
                                        <td>{{ $construction->worker_name }}</td>
                                    </tr>
                                    <tr>
                                        <th>Worker Type</th>
                                        <td>{{ $construction->worker_type }}</td>
                                    </tr>
                                    <tr>
                                        <th>Work Type</th>
                                        <td>{{ $construction->work_type }}</td>
                                    </tr>
                                    <tr>
                                        <th>Status</th>
                                        <td>{{ $construction->status }}</td>
                                    </tr>
                                    <tr>
                                        <th>Start Date</th>
                                        <td>{{ $construction->start_date }}</td>
                                    </tr>
                                    <tr>
                                        <th>End Date</th>
                                        <td>{{ $construction->end_date }}</td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                            <!-- col-12 -->
                        </div>
                        <!-- / box-body -->
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
                                <div class="external-event bg-green"><a class="external-event bg-green" data-toggle="modal" data-target="#modal-construction">Edit Construction</a></div>
                                <div class="external-event bg-aqua"><a class="external-event bg-aqua" data-toggle="modal" data-target="#modal-property">Add Property</a></div>
                                <div class="external-event bg-blue"><a data-toggle="modal" data-target="#modal-customer" class="external-event bg-blue">Add Customer</a></div>
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


            <div class="modal fade" id="modal-construction">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title">Edit Construction</h4>
                        </div>
                        <div class="modal-body">
                            @include('construction/edit')
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


            <div class="modal fade" id="modal-customer">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title">New Customer</h4>
                        </div>
                        <div class="modal-body">
                            @include('modal-ui/customer-form')
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

        </section>
        <!-- /content -->

        @if($construction->customer != null)

            <section class="content">
            <div class="row">
            <div class="col-md-12">
                  <div class="box box-warning">
                    <div class="box-body">
                            <h4 class="box-title">Customer Details</h4>
                            <table class="table table-hover">
                              <tbody>
                                  <tr>
                                    <th>Indentity Name</th>
                                    <td>{{ $construction->customer->indentity_name }}</td>
                                  </tr>
                                  <tr>
                                    <th>Indentity Number</th>
                                    <td>{{ $construction->customer->indentity_number }}</td>
                                  </tr>
                                  <tr>
                                    <th>First Name</th>
                                    <td>{{ $construction->customer->fname }}</td>
                                  </tr>
                                  <tr>
                                    <th>Last Name</th>
                                    <td>{{ $construction->customer->lname }}</td>
                                  </tr>
                                  <tr>
                                    <th>Phone Number</th>
                                    <td>{{ $construction->customer->phone }}</td>
                                  </tr>
                                  <tr>
                                    <th>Email</th>
                                    <td>{{ $construction->customer->email }}</td>
                                  </tr>
                                  <tr>
                                    <th>Address</th>
                                    <td>{{ $construction->customer->address }}</td>
                                  </tr>
                              </tbody>
                            </table>
                      </div>
                      <!-- /box-body -->
                    </div>
                    <!-- /box -->
                </div>
                <!-- /col -->
            </div>
        </section>
        <!-- /content -->

        @endif

    </div>
    <!-- / content-wrapper -->
@endsection        