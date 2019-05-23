@extends('roles.base')
@section('action-content')

@if(Auth::user()->role->create_role)
<!-- /section -->
<section class="content">
      <!-- /row -->
    <div class="row">
        <!-- /col -->
      <div class="col-xs-12">
        <div class="box box-warning">
          <div class="box-header">
            <h3 class="box-title">Roles list</h3>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <table id="example2" class="table table-bordered table-striped">
              <thead>
              <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Description</th>
                <th>Actions</th>  
              </tr>
              </thead>
              <tbody>
              @foreach($roles as $role)
              <tr>
                <td>{{ $role->id }}</td>
                <td>{{ $role->name }}</td>
                <td>{{ $role->description }}</td>
                <td>
                  <form method="POST" action="{{ route('roles.destroy',$role->id ) }}" id="destroy-role" onsubmit = "return confirm('Are you sure?')">
                      {{ csrf_field() }}
                      <input type="hidden" name="_method" value="DELETE">                          
                      <a href="{{ route('roles.edit', $role) }}" class="btn btn-warning"><i class="fa fa-edit"></i></a>
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
                              <form  method="POST" action="{{ route('roles.destroy',$role->id ) }}">
                                {{ csrf_field() }}
                                <input type="hidden" name="_method" value="DELETE">
                                <button  type="button" class="btn btn-outline pull-left" data-dismiss="modal">Close</button>
                                <a href="{{ route('roles.destroy', $role) }}"  onclick="event.preventDefault();
                                document.getElementById('destroy-role').submit();" onsubmit = "return confirm('Are you sure?')"  type="button" class="btn btn-outline">Delete</a>
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
    </div>
    <!-- /row -->
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
