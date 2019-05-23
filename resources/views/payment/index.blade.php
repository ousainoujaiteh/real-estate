@extends('payment.base')
@section('action-content')
 @if(Auth::user()->role->create_payment)
<!-- /section -->
<section class="content">
     
    <div class="row">

          <div class="col-md-12">
          <!-- Custom Tabs (Pulled to the right) -->
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs pull-right">
              <li class="active"><a href="#tab_1-1" data-toggle="tab">Morgage</a></li>
              <li><a href="#tab_2-2" data-toggle="tab">Installment</a></li>
              <li><a href="#tab_3-2" data-toggle="tab">All</a></li>
              <li class="pull-left header"><i class="fa fa-th"></i> Payment List</li>
            </ul>
            <div class="tab-content">
              <div class="tab-pane active" id="tab_1-1">
                 <!-- /row -->
            <div class="row">
            <!-- /col -->
            <div class="col-xs-12">
            <table id="morgage" class="table table-bordered table-striped">
              <thead>
              <tr>
                <th>Amount</th>
                <th>Payment Mode</th>
                <th>Payment Method</th>
                <th>Actions</th>
              </tr>
              </thead>
              <tbody>
              @foreach($morgages as $morgage)
              <tr>
                <td><a href="{{ route('payment.show', $morgage)}}">{{ $morgage->amount }}</a></td>
                <td>{{ $morgage->payment_mode }}</td>
                <td>{{ $morgage->payment_method }}</td>
                <td>
                  <form method="POST" onsubmit="return confirm('Do you really want to delete?');" action="{{ route('payment.destroy',$morgage->id ) }}" id="destroy-payment">
                      {{ csrf_field() }}
                      <input type="hidden" name="_method" value="DELETE">
                      @if( $morgage->status == 'Completed')
                        <a href="{{ route('payment-invoice', $morgage)}}" class="btn btn-primary"><i class="fa fa-bars"></i></a>
                      @endif
                      <a data-toggle="modal" data-target="#modal-payment"  class="btn btn-warning" ><i class="fa fa-edit"></i></a>
                      <a type="button" class="btn btn-danger"  data-toggle="modal" data-target="#modal-danger1"><i class="fa fa-times"></i></a>
                  </form>
                  <!-- modal starts here -->
                  <div class="modal modal-danger fade" id="modal-danger1">
                      <div class="modal-dialog">
                        <div class="modal-content">
                              <div class="modal-header">
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span></button>
                                  <h4 class="modal-title">Delete</h4>
                                </div>
                              <div class="modal-body">
                              <p>Do You Want To Delete Record&hellip;</p>
                            </div>
                            <div class="modal-footer">
                              <form  method="POST" action="{{ route('payment.destroy',$morgage->id ) }}">
                                {{ csrf_field() }}
                                <input type="hidden" name="_method" value="DELETE">
                                <button  type="button" class="btn btn-outline pull-left" data-dismiss="modal">Close</button>
                                <a href="{{ route('payment.destroy', $morgage) }}"  onclick="event.preventDefault();
                                document.getElementById('destroy-morgage').submit();" onsubmit = "return confirm('Are you sure?')"  type="button" class="btn btn-outline">Delete</a>
                              </form> 
                           </div>
                        </div>
                        <!-- /.modal-content -->
                      </div>
                      <!-- /.modal-dialog -->
                    </div>
                    <!-- /.modal -->
                </td>
              </tr>
                @endforeach
              </tbody>
            </table>




      </div>
      <!-- /col -->
    </div>
    <!-- /row -->
              </div>
              <!-- /.tab-pane -->
              <div class="tab-pane" id="tab_2-2">
              <div class="row">
            <!-- /col -->
            <div class="col-xs-12">
            <table id="installment" class="table table-bordered table-striped">
              <thead>
              <tr>
                <th>Amount</th>
                <th>Payment Mode</th>
                <th>Payment Method</th>
                <th>Actions</th>
              </tr>
              </thead>
              <tbody>
              @foreach($installments as $installment)
              <tr>
                <td><a href="{{ route('payment.show', $installment)}}">{{ $installment->amount }}</a></td>
                <td>{{ $installment->payment_mode }}</td>
                <td>{{ $installment->payment_method }}</td>
                <td>
                  <form method="POST" onsubmit="return confirm('Do you really want to delete?');" action="{{ route('payment.destroy',$installment->id ) }}" id="destroy-payment">
                      {{ csrf_field() }}
                      <input type="hidden" name="_method" value="DELETE">
                      @if( $installment->status == 'Completed')
                        <a href="{{ route('payment-invoice', $installment)}}" class="btn btn-primary"><i class="fa fa-bars"></i></a>
                      @endif
                      <a data-toggle="modal" data-target="#modal-payment" class="btn btn-warning" ><i class="fa fa-edit"></i></a>
                      <a type="button" class="btn btn-danger"  data-toggle="modal" data-target="#modal-danger2"><i class="fa fa-times"></i></a>
                  </form>
                 <!-- modal starts here -->
                 <div class="modal modal-danger fade" id="modal-danger2">
                      <div class="modal-dialog">
                        <div class="modal-content">
                              <div class="modal-header">
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span></button>
                                  <h4 class="modal-title">Delete</h4>
                                </div>
                              <div class="modal-body">
                              <p>Do You Want To Delete Record&hellip;</p>
                            </div>
                            <div class="modal-footer">
                              <form  method="POST" action="{{ route('payment.destroy',$installment->id ) }}">
                                {{ csrf_field() }}
                                <input type="hidden" name="_method" value="DELETE">
                                <button  type="button" class="btn btn-outline pull-left" data-dismiss="modal">Close</button>
                                <a href="{{ route('payment.destroy', $installment) }}"  onclick="event.preventDefault();
                                document.getElementById('destroy-installment').submit();" onsubmit = "return confirm('Are you sure?')"  type="button" class="btn btn-outline">Delete</a>
                              </form> 
                           </div>
                        </div>
                        <!-- /.modal-content -->
                      </div>
                      <!-- /.modal-dialog -->
                    </div>
                    <!-- /.modal -->
                </td>
              </tr>
                @endforeach
              </tbody>
            </table>
                </div>
                <!-- /col -->
              </div>
              <!-- /row -->
              </div>
              <!-- /.tab-pane -->



              <!-- /.tab-pane -->
              <div class="tab-pane" id="tab_3-2">
              <div class="row">
                  <!-- /col -->
                <div class="col-xs-12">
                      <table id="all" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                          <th>Amount</th>
                          <th>Payment Mode</th>
                          <th>Payment Method</th>
                          <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($payments as $payment)
                        <tr>
                          <td><a href="{{ route('payment.show', $payment)}}">{{ $payment->amount }}</a></td>
                          <td>{{ $payment->payment_mode }}</td>
                          <td>{{ $payment->payment_method }}</td>
                        
                          <td>
                            <form method="POST" onsubmit="return confirm('Do you really want to delete?');" action="{{ route('payment.destroy',$payment->id ) }}" id="destroy-payment">
                                {{ csrf_field() }}
                                <input type="hidden" name="_method" value="DELETE">
                                @if( $payment->status == 'Completed')
                                  <a href="{{ route('payment-invoice', $payment)}}" class="btn btn-primary"><i class="fa fa-bars"></i></a>
                                @endif
                                <a data-toggle="modal" data-target="#modal-payment" class="btn btn-warning" ><i class="fa fa-edit"></i></a>
                                <a type="button" class="btn btn-danger"  data-toggle="modal" data-target="#modal-danger3"><i class="fa fa-times"></i></a>
                            </form>
                            <!-- modal starts here -->
                            <div class="modal modal-danger fade" id="modal-danger3">
                                <div class="modal-dialog">
                                  <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span></button>
                                            <h4 class="modal-title">Delete</h4>
                                          </div>
                                        <div class="modal-body">
                                        <p>Do You Want To Delete Record&hellip;</p>
                                      </div>
                                      <div class="modal-footer">
                                        <form  method="POST" action="{{ route('payment.destroy',$payment->id ) }}">
                                          {{ csrf_field() }}
                                          <input type="hidden" name="_method" value="DELETE">
                                          <button  type="button" class="btn btn-outline pull-left" data-dismiss="modal">Close</button>
                                          <a href="{{ route('payment.destroy', $payment) }}"  onclick="event.preventDefault();
                                          document.getElementById('destroy-payment').submit();" onsubmit = "return confirm('Are you sure?')"  type="button" class="btn btn-outline">Delete</a>
                                        </form> 
                                    </div>
                                  </div>
                                  <!-- /.modal-content -->
                                </div>
                                <!-- /.modal-dialog -->
                              </div>
                              <!-- /.modal -->
                          </td>
                        </tr>
                          @endforeach
                        </tbody>
                      </table>
                </div>
                <!-- /col -->
              </div>
              <!-- /row -->
              </div>
              <!-- /.tab-pane -->
              
            </div>
            <!-- /.tab-content -->
          </div>
          <!-- nav-tabs-custom -->
        </div>
        <!-- /.col -->


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


    </div>
   

  </section>
  <!-- /section -->
  @endif
   <!-- jQuery 3 -->
 <script src="{{asset('theme/bower_components/jquery/dist/jquery.min.js')}}"></script>
  <!-- DataTables -->
  <script src="{{asset('theme/bower_components/datatables.net/js/jquery.dataTables.min.js')}}"></script>
  <script src="{{asset('theme/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js')}}"></script>
  <!-- page script -->
  <script>
    $(function () {
      $('#example1').DataTable()
      $('#all').DataTable({
        'paging'      : true,
        'processing' : true,
        'lengthChange': true,
        'searching'   : true,
        'ordering'    : true,
        'info'        : true,
        'autoWidth'   : true
      })
      $('#installment').DataTable({
        'paging'      : true,
        'processing' : true,
        'lengthChange': true,
        'searching'   : true,
        'ordering'    : true,
        'info'        : true,
        'autoWidth'   : true
      })
      $('#morgage').DataTable({
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
