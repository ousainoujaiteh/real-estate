@extends('layouts.main')
@section('content')
    <div class="content-wrapper">
        @if(Auth::user()->role->create_payment)
        <!-- Content Header (Page header) -->
        <section class="content-header">
        <h1>
            <a href="{{ url('payment')}}"> Payment</a>
        </h1>
        <ol class="breadcrumb">
            <li><a href=""><i class="fa fa-dashboard"></i> Payment Mangement</a></li>
            <li class="active">Details</li>
        </ol>
        </section>
        <section class="content">
            <div class="row">
                <div class="col-md-8">
                    <div class="box box-warning">
                        <div class="box-body">
                            <h4 class="box-title">Payment Details</h4>
                            <div class="col-md-12">
                                <table class="table table-hover">
                                    <tbody>
                                    <tr>
                                        <th>Payment ID </th>
                                        <td>{{ $payment->id }}</td>
                                    </tr>
                                    <tr>
                                        <th>Payment Amount </th>
                                        <td>{{ $payment->amount }}</td>
                                    </tr>
                                    <tr>
                                        <th>Payment Mode</th>
                                        <td>{{ $payment->payment_mode }}</td>
                                    </tr>
                                    <tr>
                                        <th>Payment Method</th>
                                        <td>{{ $payment->payment_method }}</td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
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
                                <div class="external-event bg-green"><a class="external-event bg-green" data-toggle="modal" data-target="#modal-payment">Edit Payment</a></div>
                                <div class="external-event bg-yellow"><a class="external-event bg-yellow" data-toggle="modal" data-target="#modal-default">Add Customer</a></div>
                                <div class="external-event bg-aqua"><a class="external-event bg-aqua" data-toggle="modal" data-target="#modal-property">Add Property</a></div>
                                <div class="external-event bg-blue"><a href="{{route('payment-invoice', $payment)}}" class="external-event bg-blue">Generate Receipt</a></div>
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

        @if($payment->property != null)

             <section class="content">
         <div class="row">
            <div class="col-md-6">
                <div class="box box-warning">
                  <div class="box-body">
                          <h4 class="box-title">Property Details</h4>
                          <table class="table table-hover">
                            <tbody>
                            <tr>
                                  <th>Property Number</th>
                                  <td>{{ $payment->property->property_no }}</td>
                              </tr>
                              <tr>
                                  <th>Property Name</th>
                                  <td>{{ $payment->property->property_name }}</td>
                              </tr>
                              <tr>
                                  <th>Property Type</th>
                                  <td>{{ $payment->property->property_type }}</td>
                              </tr>
                              <tr>
                                  <th>Location</th>
                                  <td>{{ $payment->property->location }}</td>
                              </tr>
                              <tr>
                                  <th>Plot No</th>
                                  <td>{{ $payment->property->plot_no }}</td>
                              </tr>
                              <tr>
                                  <th>Size</th>
                                  <td>{{ $payment->property->size }}</td>
                              </tr>
                              <tr>
                                  <th>Price</th>
                                  <td>{{ $payment->property->price }}</td>
                              </tr>
                              <tr>
                                  <th>Size</th>
                                  <td>{{ $payment->property->due_date }}</td>
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

       


                @if($payment->customer != null)
                
                <div class="col-md-6">
                  <div class="box box-warning">
                    <div class="box-body">
                            <h4 class="box-title">Customer Details</h4>
                            <table class="table table-hover">
                              <tbody>
                                  <tr>
                                    <th>Indentity Name</th>
                                    <td>{{ $payment->customer->indentity_name }}</td>
                                  </tr>
                                  <tr>
                                    <th>Indentity Number</th>
                                    <td>{{ $payment->customer->indentity_number }}</td>
                                  </tr>
                                  <tr>
                                    <th>First Name</th>
                                    <td>{{ $payment->customer->fname }}</td>
                                  </tr>
                                  <tr>
                                    <th>Last Name</th>
                                    <td>{{ $payment->customer->lname }}</td>
                                  </tr>
                                  <tr>
                                    <th>Phone Number</th>
                                    <td>{{ $payment->customer->phone }}</td>
                                  </tr>
                                  <tr>
                                    <th>Email</th>
                                    <td>{{ $payment->customer->email }}</td>
                                  </tr>
                                  <tr>
                                    <th>Address</th>
                                    <td>{{ $payment->customer->address }}</td>
                                  </tr>
                              </tbody>
                            </table>
                      </div>
                      <!-- /box-body -->
                    </div>
                    <!-- /box -->
                </div>
                <!-- /col -->


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



                 <div class="modal fade" id="modal-payment">
                     <div class="modal-dialog">
                         <div class="modal-content">
                             <div class="modal-header">
                                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                     <span aria-hidden="true">&times;</span></button>
                                 <h4 class="modal-title">Edit Payment</h4>
                             </div>
                             <div class="modal-body">
                                 @include('payment/edit')
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
          <!-- /row -->



        </section>
        <!-- /content -->
        @endif
    </div>
@endsection    
