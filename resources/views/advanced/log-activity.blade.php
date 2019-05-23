@extends('advanced.base')
@section('action-content')
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-warning">
                    <div class="box-header">
                        <h3 class="box-title">Activity Logs List</h3>
                    </div>
                    <!-- /box-header -->
                    <div class="box-body">
                        <table id="logs" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Description</th>
                                    <th></th>
                                    <th></th>
                                    <th>Date</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($logs as $log)
                                <tr>
                                    <td>{{ $log->description }}</td>
                                    {{--<td>{{ ($log->user) ? $log->user->getName().'('.$log->user->username.')' : 'Unknown User' }}</td>--}}
                                    <td>{{ $log->ip_address }}</td>
                                    <td>{{ nl2br($log->created_at) }}</td>
                                </tr>
                                    @endforeach
                            </tbody>
                        </table>
                        <!-- /table -->
                    </div>
                    <!-- /box-body -->
                </div>
                <!-- /box -->
            </div>
            <!-- /col-12 -->
        </div>
        <!-- /row -->
    </section>
    <!-- /content -->
    @endsection