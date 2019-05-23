@extends('agent.base')
@section('action-content')
<!-- /section -->
<section class="content">
      <!-- /row -->
    <div class="row">
        <!-- /col -->
      <div class="col-xs-12">
        <div class="box box-warning">
          <div class="box-header">
            <h3 class="box-title">Agent list</h3>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
          <table id="example2" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                      <th>First Name</th>
                                        <th>Middle Name</th>
                                        <th>Last Name</th>
                                        <th>Address</th>
                                        <th>Phone</th>
                                        <th>Email</th>
                                        <th>Type</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($agents as $agent)
                                    <tr>
                                        <td><a href="{{ route('agent.show', $agent) }}">{{ $agent->fname }}</a></td>
                                        <td>{{ $agent->mname }}</td>
                                        <td>{{ $agent->lname }}</td>
                                        <td>{{ $agent->address }}</td>
                                        <td>{{ $agent->phone }}</td>
                                        <td>{{ $agent->email }}</td>
                                        <td>{{ $agent->type }}</td>
                                        <td>
                                          <form method="POST" action="{{ route('agent.destroy',$agent->id ) }}" id="destroy-agent" onsubmit = "return confirm('Are you sure?')">
                                              {{ csrf_field() }}
                                              <input type="hidden" name="_method" value="DELETE">
                                              
                                              <a data-toggle="modal" data-target="#modal-agent" class="btn btn-warning "><i class="fa fa-edit"></i></a>
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
                                                            <p>Do You Want To Delete&hellip;</p>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <form  method="POST" action="{{ route('agent.destroy',$agent->id ) }}">
                                                            {{ csrf_field() }}
                                                            <input type="hidden" name="_method" value="DELETE">
                                                            <button  type="button" class="btn btn-outline pull-left" data-dismiss="modal">Close</button>
                                                            <a href="{{ route('agent.destroy', $agent) }}"  onclick="event.preventDefault();
                                                                document.getElementById('destroy-agent').submit();" onsubmit = "return confirm('Are you sure?')"  type="button" class="btn btn-outline">Delete</a>
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
          <!-- /.box-body -->
        </div>
        <!-- /.box -->
      </div>
      <!-- /col -->

        <div class="modal fade" id="modal-agent">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">Edit Agent</h4>
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
    </div>
    <!-- /row -->
  </section>
  <!-- /section -->
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
