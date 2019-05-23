@extends('layouts.main')
@section('content')
    <div class="content-wrapper">
         <!-- Content Header (Page header) -->
         <section class="content-header">
        <h1>
            <a href="{{ url('land_lord')}}"> Land Lord</a>
        </h1>
        <ol class="breadcrumb">
            <li><a href=""><i class="fa fa-dashboard"></i> Land Lord Mangement</a></li>
            <li class="active">Details</li>
        </ol>
        </section>
        <section class="content">
            <div class="row">
                <div class="col-md-8">
                    <div class="box box-warning">
                        <div class="box-body">
                            <h4 class="box-title">Land Lord Detail</h4>
                            <div class="col-md-12">
                                <table class="table table-hover">
                                    <tbody>
                                    <tr>
                                        <th>First Name</th>
                                        <td>{{ $land_lord->fname }}</td>
                                    </tr>
                                    <tr>
                                        <th>Middle Name</th>
                                        <td>{{ $land_lord->mname }}</td>
                                    </tr>
                                    <tr>
                                        <th>Last Name</th>
                                        <td>{{ $land_lord->lname }}</td>
                                    </tr>
                                    <tr>
                                        <th>Phone Number</th>
                                        <td>{{ $land_lord->phone }}</td>
                                    </tr>
                                    <tr>
                                        <th>Email</th>
                                        <td>{{ $land_lord->email }}</td>
                                    </tr>
                                    <tr>
                                        <th>Address</th>
                                        <td>{{ $land_lord->address }}</td>
                                    </tr>
                                    <tr>
                                        <th>Next of Kin Name</th>
                                        <td>{{ $land_lord->kin_name }}</td>
                                    </tr>
                                    <tr>
                                        <th>Relationship</th>
                                        <td>{{ $land_lord->relationship }}</td>
                                    </tr>
                                    <tr>
                                        <th>Next of Kin Number</th>
                                        <td>{{ $land_lord->kin_number }}</td>
                                    </tr>
                                    </tbody>
                                </table>
                                <!-- /table -->
                            </div>
                            <!-- /col-12 -->
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
                                <div class="external-event bg-green"><a class="external-event bg-green" data-toggle="modal" data-target="#modal-land_lord">Edit Land Lord</a></div>
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
        <!-- /section-cotent -->

        
        @if($land_lord->property != null)

            <section class="content">
            <div class="box box-warning">
                <div class="box-body">
                    <h4 class="box-title">Property Detail</h4>
                    <div class="col-md-12">
                        <table class="table table-hover">
                            <tbody>
                              <tr>
                                  <th>Property</th>
                                  <td>{{ $land_lord->property->property_name }}</td>
                              </tr>

                              <tr>
                                  <th>Property</th>
                                  <td>{{ $land_lord->property->property_no }}</td>
                              </tr>
                              <tr>
                                  <th>Property Type</th>
                                  <td>{{ $land_lord->property->property_type }}</td>
                              </tr>
                              <tr>
                                  <th>Location</th>
                                  <td>{{ $land_lord->property->location }}</td>
                              </tr>
                              <tr>
                                  <th>Plot No</th>
                                  <td>{{ $land_lord->property->plot_no }}</td>
                              </tr>
                              <tr>
                                  <th>Size</th>
                                  <td>{{ $land_lord->property->size }}</td>
                              </tr>
                            </tbody>
                        </table>
                        <!-- /table -->
                    </div>
                    <!-- /col-12 -->
                </div>
                <!-- /box-body -->
            </div>
            <!-- /box -->
        </section>
        <!-- /section-content -->


            <div class="modal fade" id="modal-land_lord">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title">Edit Land Lord</h4>
                        </div>
                        <div class="modal-body">
                            @include('land_lord/edit')
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
         
    </div>
    <!-- /content-wrapper -->
@endsection 