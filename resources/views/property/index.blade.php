@extends('property.base')
@section('action-content')
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box box-warning">
                    <div class="box-header">
                        <h3 class="box-title">Properties List</h3>
                    </div>
                    <div class="box-body">
                        <table id="example2" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Property No</th>
                                        <th>Property Name</th>
                                        <th>Property Type</th>
                                        <th>Location</th>
                                        <th>Plot No</th>
                                        <th>Size</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                   @foreach($properties as $property)
                                        <tr>
                                            <td><a href="{{ route('property.show',$property->id) }}">{{ $property->property_no }}</a></td>
                                            <td>{{ $property->property_name }}</td>
                                            <td>{{ $property->property_type }}</td>
                                            <td>{{ $property->location }}</td>
                                            <td>{{ $property->plot_no }}</td>
                                            <td>{{ $property->size }}</td>
                                            <td>
                                                <form method="POST" action="{{ route('property.destroy',$property->id ) }}" id="destroy-property" onsubmit = "return confirm('Are you sure?')">
                                                    {{ csrf_field() }}
                                                    <input type="hidden" name="_method" value="DELETE">
                                                    
                                                    
                                                        <a href="{{ route('property-invoice', $property)}}" class="btn btn-primary"><i class="fa fa-bars"></i></a>
                                                 

                                                    <a data-toggle="modal" data-target="#modal-property" class="btn btn-warning"> <i class="fa fa-edit"></i></a>
                                                    
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
                                                            <form  method="POST" action="{{ route('property.destroy',$property->id ) }}">
                                                            {{ csrf_field() }}
                                                            <input type="hidden" name="_method" value="DELETE">
                                                            <button  type="button" class="btn btn-outline pull-left" data-dismiss="modal">Close</button>
                                                            <a href="{{ route('property.destroy', $property) }}"  onclick="event.preventDefault();
                                                                document.getElementById('destroy-property').submit();" onsubmit = "return confirm('Are you sure?')"  type="button" class="btn btn-outline">Delete</a>
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
