@extends('layouts.main')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
        <h1>
            <a href="{{ url('property')}}"> Property</a>
        </h1>
        <ol class="breadcrumb">
            <li><a href=""><i class="fa fa-dashboard"></i> Property Mangement</a></li>
            <li class="active">Details</li>        
        </ol>
        </section>
        <section class="content">
            <div class="row">
                    
                <div class="col-md-8">
                <div class="box box-warning">
                    <div class="box-body">
                
                    <div class="box-title">
        
                    </div>
                    <div class="clearfix"></div>
                    
                            <table class="table table-hover">
                                <tbody>
                                    <tr>
                                        <th scope="row">Property Number</th>
                                        <td>{{ $property->property_no }}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Property Name</th>
                                        <td>{{ $property->property_name }}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Property Type</th>
                                        <td>{{ $property->property_type }}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Location</th>
                                        <td>{{ $property->location }}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Plot No</th>
                                        <td>{{ $property->plot_no }}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Size</th>
                                        <td>{{ $property->size }}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Price</th>
                                        <td>{{ $property->price }}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Payment Due Date</th>
                                        <td>{{ $property->due_date }}</td>
                                    </tr>
                                    @foreach(json_decode($property->attributes) as $key => $value)
                                    <tr>
                                        <th scope="row">{{ $key }}</th>
                                            <td>{{ $value }}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                    
                    </div>
                </div>
            </div>
             <!-- col-8 -->
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
                                <div class="external-event bg-green"><a class="external-event bg-green" data-toggle="modal" data-target="#modal-property">Edit Property</a></div>
                                <div class="external-event bg-yellow"><a class="external-event bg-yellow" data-toggle="modal" data-target="#modal-default">Add Customer</a></div>
                                <div class="external-event bg-aqua"><a class="external-event bg-aqua" data-toggle="modal" data-target="#modal-payment">Add Payment</a></div>
                                <div class="external-event bg-light-blue"><a class="external-event bg-light-blue" data-toggle="modal" data-target="#modal-agent">Add Agent</a></div>
                                <div class="external-event bg-aqua"><a href="{{ route('property-invoice', $property)}}" class="external-event bg-aqua">Generate Invoice</a></div>
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




            <section class="content">
            <div class="row">

            @if($property->customer != null)

                <div class="col-md-6">
                    <div class="box box-warning">
                        <div class="box-body">
                                <h4 class="box-title">Customer Details</h4>
                                <table class="table table-hover">
                                <tbody>
                                    <tr>
                                        <th>Indentity Name</th>
                                        <td>{{ $property->customer->indentity_name }}</td>
                                    </tr>
                                    <tr>
                                        <th>Indentity Number</th>
                                        <td>{{ $property->customer->indentity_number }}</td>
                                    </tr>
                                    <tr>
                                        <th>First Name</th>
                                        <td>{{ $property->customer->fname }}</td>
                                    </tr>
                                    <tr>
                                        <th>Last Name</th>
                                        <td>{{ $property->customer->lname }}</td>
                                    </tr>
                                    <tr>
                                        <th>Phone Number</th>
                                        <td>{{ $property->customer->phone }}</td>
                                    </tr>
                                    <tr>
                                        <th>Email</th>
                                        <td>{{ $property->customer->email }}</td>
                                    </tr>
                                    <tr>
                                        <th>Address</th>
                                        <td>{{ $property->customer->address }}</td>
                                    </tr>
                                    <tr>
                                        <th>Gender</th>
                                        <td>{{ $property->customer->gender }}</td>
                                    </tr>
                                    <tr>
                                        <th>Nationality</th>
                                        <td>{{ $property->customer->nationality }}</td>
                                    </tr>
                                    <tr>
                                        <th>Deposit</th>
                                        <td>{{ $property->customer->deposit }}</td>
                                    </tr>
                                    <tr>
                                        <th>Type</th>
                                        <td>{{ $property->customer->type }}</td>
                                    </tr>
                                </tbody>
                                </table>
                        </div>
                        <!-- /box-body -->
                        </div>
                        <!-- /box -->
                    </div>
                    <!-- /col -->


            @endif
                
                    @if($property->agent != null)
                    <div class="col-md-6">
                        <div class="box box-warning">
                            <div class="box-body">
                                <h4 class="box-title">Agent Detail</h4>
                                <table class="table table-hover">
                                    <tr>
                                        <th>First Name</th>
                                        <td>{{ $property->agent->fname }}</td>
                                    </tr>
                                    <tr>
                                        <th>Midlle Name</th>
                                        <td>{{ $property->agent->mname }}</td>
                                    </tr>
                                    <tr>
                                        <th>Last Name</th>
                                        <td>{{ $property->agent->lname }}</td>
                                    </tr>
                                    <tr>
                                        <th>Address</th>
                                        <td>{{ $property->agent->address }}</td>
                                    </tr>
                                    <tr>
                                        <th>Phone</th>
                                        <td>{{ $property->agent->phone }}</td>
                                    </tr>
                                    <tr>
                                        <th>Email</th>
                                        <td>{{ $property->agent->email }}</td>
                                    </tr>
                                    <tr>
                                        <th>Type</th>
                                        <td>{{ $property->agent->type }}</td>
                                    </tr>
                                </table>
                                <!-- /table -->
                            </div>
                            <!-- /box-body -->
                        </div>
                        <!-- /box -->
                    </div>
                    <!-- /col-6 -->
                    @endif
                    
            </div>
            <!-- /row -->
        </section>
        <!-- /section -->


        @if($property->payment != null)

        <section class="content">
        <div class="row">
            <div class="col-md-3">
                <div class="box box-warning">
                    <div class="box-header with-border">
                    <h3 class="box-title">Payment Status</h3>

                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                        </button>
                    </div>
                    <!-- /.box-tools -->
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <p>Price <span class="pull-right">{{ $property->_price() }}</span></p>
                        <p>Total Paid <span class="pull-right">{{ $property->_paid() }}</span></p>
                        <p>Balance <span class="pull-right">{{ $property->_balance() }}</span></p>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
            <!-- /.col -->
            <div class="col-md-9">
            <div class="box box-warning">
                <div class="box-body">
                    <h4 class="box-title">Payments Details</h4>
                    <table id="payment" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Amount</th>
                                <th>Payment Mode</th>
                                <th>Payment Method</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($property->payment as $payment)
                            <tr>
                                <td>{{ $payment->amount }}</td>
                                <td>{{ $payment->payment_mode }}</td>
                                <td>{{ $payment->payment_method }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /box-body -->
            </div>
            <!-- /box -->
            </div>
            <!-- /col -->
         </div>
         <!-- /row --> 
        </section>
        <!-- / payment content -->

            <div class="modal fade" id="modal-property">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title">Edit Property</h4>
                        </div>
                        <div class="modal-body">
                            @include('property/edit')
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

        <div class="modal fade" id="modal-default">
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


        <div class="modal fade" id="modal-agent">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">New Agent</h4>
              </div>
              <div class="modal-body">
                @include('modal-ui/agent-form')
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


        <div class="modal fade" id="modal-payment">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">New Payment</h4>
              </div>
              <div class="modal-body">
                @include('modal-ui.payment-form')
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

      <!-- jQuery 3 -->
 <script src="{{asset('theme/bower_components/jquery/dist/jquery.min.js')}}"></script>
  <!-- DataTables -->
  <script src="{{asset('theme/bower_components/datatables.net/js/jquery.dataTables.min.js')}}"></script>
  <script src="{{asset('theme/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js')}}"></script>
  <!-- page script -->
  <script>
    $(function () {
      $('#payment').DataTable({
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
    </div>
@endsection