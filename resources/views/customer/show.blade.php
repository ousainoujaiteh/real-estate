@extends('layouts.main')
@section('content')
    <section class="content-wrapper">
         <!-- Content Header (Page header) -->
         <section class="content-header">
        <h1>
            <a href="{{ url('customer')}}"> Customer</a>
        </h1>
        <ol class="breadcrumb">
            <li><a href=""><i class="fa fa-dashboard"></i> Customer Mangement</a></li>
            <li class="active">Detail</li>
        </ol>
        </section>
        <section class="content">
            <div class="box box-warning">
                <div class="box-body">
                    <h4 class="box-title">Customer Detail</h4>
                    <table class="table table-hover">
                                <tbody>
                                    <tr>
                                        <th>Indentity Name</th>
                                        <td>{{ $customer->indentity_name }}</td>
                                    </tr>
                                    <tr>
                                        <th>Indentity Number</th>
                                        <td>{{ $customer->indentity_number }}</td>
                                    </tr>
                                    <tr>
                                        <th>First Name</th>
                                        <td>{{ $customer->fname }}</td>
                                    </tr>
                                    <tr>
                                        <th>Last Name</th>
                                        <td>{{ $customer->lname }}</td>
                                    </tr>
                                    <tr>
                                        <th>Phone Number</th>
                                        <td>{{ $customer->phone }}</td>
                                    </tr>
                                    <tr>
                                        <th>Email</th>
                                        <td>{{ $customer->email }}</td>
                                    </tr>
                                    <tr>
                                        <th>Address</th>
                                        <td>{{ $customer->address }}</td>
                                    </tr>
                                    <tr>
                                        <th>Gender</th>
                                        <td>{{ $customer->gender }}</td>
                                    </tr>
                                    <tr>
                                        <th>Nationality</th>
                                        <td>{{ $customer->nationality }}</td>
                                    </tr>
                                    <tr>
                                        <th>Deposit</th>
                                        <td>{{ $customer->deposit }}</td>
                                    </tr>
                                    <tr>
                                        <th>Type</th>
                                        <td>{{ $customer->type }}</td>
                                    </tr>
                                </tbody>
                                </table>
                </div>
                <!-- /box-body -->
            </div>
            <!-- /box -->
        </section>
        <!-- /content -->


        @if($customer->properties != null)

            <section class="content">
            <div class="box box-warning">
                <div class="box-body">
                    <h4 class="box-title">Customer Properties</h4>
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
                        @foreach($customer->properties as $property)
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

        @endif

        

    @if($customer->payments != null)

        <section class="content">
            <div class="box box-warning">
                <div class="box-body">
                    <h4 class="box-title">Customer Payments</h4>
                    <table id="payment" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Amount</th>
                                <th>Payment Mode</th>
                                <th>Payment Method</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($customer->payments as $payment)
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
        </section>
        <!-- /content -->
    
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
@endsection