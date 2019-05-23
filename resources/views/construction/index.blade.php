@extends('construction.base')
@section('action-content')
<!-- /section -->
<section class="content">
      <!-- /row -->
    <div class="row">
        <!-- /col -->
      <div class="col-xs-12">
        <div class="box box-warning">
          <div class="box-header">
            <h3 class="box-title">Construction list</h3>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <table id="example2" class="table table-bordered table-striped">
              <thead>
              <tr>
                
                <th>Type</th>              
                <th>Cost</th>
                <th>Worker Name</th>
                <th>Worker Type</th>
                <th>Work Type</th>
                <th>Status</th>
                <th>Start Date</th>
                <th>End Date</th>
                <th>Actions</th>
              </tr>
              </thead>
              <tbody>
              @foreach($constructions as $construction)
              <tr>
                <td><a href="{{ route('construction.show', $construction)}}">{{ $construction->type }}</a></td>
                <td>{{ $construction->cost }}</td>
                <td>{{ $construction->worker_name }}</td>
                <td>{{ $construction->worker_type }}</td>
                <td>{{ $construction->work_type }}</td>
                <td>{{ $construction->status }}</td>
                <td>{{ $construction->start_date }}</td>
                <td>{{ $construction->end_date }}</td>
                <td>
                  <form method="POST" action="{{ route('construction.destroy',$construction->id ) }}" id="destroy-construction" onsubmit = "return confirm('Are you sure?')">
                    {{ csrf_field() }}
                    <input type="hidden" name="_method" value="DELETE">                          
                    <a data-toggle="modal" data-target="#modal-construction" class="btn btn-warning"><i class="fa fa-edit"></i></a>
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
                              <form  method="POST" action="{{ route('construction.destroy',$construction->id ) }}">
                                {{ csrf_field() }}
                                <input type="hidden" name="_method" value="DELETE">
                                <button  type="button" class="btn btn-outline pull-left" data-dismiss="modal">Close</button>
                                <a href="{{ route('construction.destroy', $construction) }}"  onclick="event.preventDefault();
                                document.getElementById('destroy-construction').submit();" onsubmit = "return confirm('Are you sure?')"  type="button" class="btn btn-outline">Delete</a>
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

          </div>
          <!-- /.box-body -->
        </div>
        <!-- /.box -->
      </div>
      <!-- /col -->
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
