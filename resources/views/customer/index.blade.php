@extends('customer.base')
@section('action-content')
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box box-warning">
                    <div class="box-header">
                        <h3 class="box-title">Customer List</h3>
                    </div>
                    <div class="box-body">       
                        <table id="example2" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Indentity Name</th>
                                        <th>Indentity Number</th>
                                        <th>First Name</th>
                                        <th>Middle Name</th>
                                        <th>Last Name</th>
                                        <th>Phone</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($customers as $customer)
                                    <tr>
                                        <td><a href="{{ route('customer.show', $customer) }}">{{ $customer->indentity_name }}</a></td>
                                        <td>{{ $customer->indentity_number }}</td>
                                        <td>{{ $customer->fname }}</td>
                                        <td>{{ $customer->mname }}</td>
                                        <td>{{ $customer->lname }}</td>
                                        <td>{{ $customer->phone }}</td>
                                        <td>
                                        <form method="POST" action="{{ route('customer.destroy',$customer->id ) }}" id="destroy-customer" onsubmit = "return confirm('Are you sure?')">
                                            {{ csrf_field() }}
                                            <input type="hidden" name="_method" value="DELETE">
                                            
                                            <a data-toggle="modal" data-target="#modal-customer" class="btn btn-warning"><i class="fa fa-edit"></i></a>
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
                                                    <form  method="POST" action="{{ route('customer.destroy',$customer->id ) }}">
                                                        {{ csrf_field() }}
                                                        <input type="hidden" name="_method" value="DELETE">
                                                        <button  type="button" class="btn btn-outline pull-left" data-dismiss="modal">Close</button>
                                                        <a href="{{ route('customer.destroy', $customer) }}"  onclick="event.preventDefault();
                                                        document.getElementById('destroy-customer').submit();" onsubmit = "return confirm('Are you sure?')"  type="button" class="btn btn-outline">Delete</a>
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

                        <div class="modal fade" id="modal-customer">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span></button>
                                        <h4 class="modal-title">Edit Customer</h4>
                                    </div>
                                    <div class="modal-body">
                                        @include('customer/edit')
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
                </div>
            </div>
        </div>
    </section>
 <!-- jQuery 3 -->
 <script src="{{asset('theme/bower_components/jquery/dist/jquery.min.js')}}"></script>
  <!-- DataTables -->
  <script src="{{asset('theme/bower_components/datatables.net/js/jquery.dataTables.min.js')}}"></script>
  <script src="{{asset('theme/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js')}}"></script>
  <!-- page script -->
  <script>
    $(function () {
      $('#example1').DataTable()
      $('#example2').DataTable({
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