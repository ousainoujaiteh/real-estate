@extends('report.base')
@section('action-content')
<!-- jQuery 3 -->
<script src="{{asset('theme/bower_components/jquery/dist/jquery.min.js')}}"></script>
<!-- chart data -->
<script src="{{asset('theme/bower_components/code/highcharts.js')}}"></script>
<script src="{{asset('theme/bower_components/code/modules/series-label.js')}}"></script>
<script src="{{asset('theme/bower_components/code/modules/exporting.js')}}"></script>
<script src="{{asset('theme/bower_components/code/modules/offline-exporting.js')}}"></script>
<section class="content">
      <!-- /row -->
    <div class="row">
        <!-- /col -->
      <div class="col-xs-12">
        <div class="box box-warning">
          <div class="box-header">
            <h3 class="box-title">Report Details</h3>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <form action="{{ route('report.store') }}" method="POST">
                {{ csrf_field() }}
                 <div class="row">
                                <div class="col-md-5">
                                    <div class="form-group{{ $errors->has('from') ? 'has-error' : '' }}">
                                        <label for="from">From</label>
                                        <div class="input-group date">
                                            <div class="input-group-addon">
                                                <i class="fa fa-calendar"></i>
                                            </div>
                                            <input type="text" name="from" value="{{ isset($from) ? $from : '' }}" class="form-control pull-right" id="datepicker">
                                        </div>
                                        @if ($errors->has('from'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('from')}}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>
                                <!-- /col -->
                                <div class="col-md-5">
                                    <div class="form-group{{ $errors->has('to') ? 'has-error' : '' }}">
                                        <label for="to">To</label>
                                        <div class="input-group date">
                                            <div class="input-group-addon">
                                                <i class="fa fa-calendar"></i>
                                            </div>
                                            <input type="text" name="to" value="{{ isset($to) ? $to : '' }}" class="form-control pull-right" id="datepicker2">
                                        </div>
                                        @if ($errors->has('to'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('to')}}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>
                                <!-- /col -->
                          
                            <div class="col-md-2">
                                <button type="submit" id="send" class="btn btn-primary" id="" style="margin-top:23px;">Submit</button>

                                
                            </div>
                            <!-- /col -->
                </div>
                <!-- /row -->
            </form>
          </div>
          <!-- /.box-body -->
        </div>
        <!-- /.box -->

        @if(!isset($index))
        
      <div id="parent">
      <div class="row">
                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box">
                        <span class="info-box-icon bg-aqua"><i class="ion ion-ios-gear-outline"></i></span>

                        <div class="info-box-content">
                        <span class="info-box-text">Rents</span>
                        <span class="info-box-number">{{ $rents }}</span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
                <!-- /.col -->

                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box">
                        <span class="info-box-icon bg-red"><i class="fa fa-money"></i></span>

                        <div class="info-box-content">
                        <span class="info-box-text">Sold</span>
                        <span class="info-box-number">{{ $sold }}</span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
                <!-- /.col -->

                <!-- fix for small devices only -->
                <div class="clearfix visible-sm-block"></div>

                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box">
                        <span class="info-box-icon bg-green"><i class="ion ion-ios-cart-outline"></i></span>

                        <div class="info-box-content">
                        <span class="info-box-text">Lease</span>
                        <span class="info-box-number">{{ $lease }}</span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
                <!-- /.col -->
                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box">
                        <span class="info-box-icon bg-yellow"><i class="ion ion-ios-people-outline"></i></span>

                        <div class="info-box-content">
                        <span class="info-box-text">Customers</span>
                        <span class="info-box-number">{{ $cutomers }}</span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /info-box row -->

            <div class="row">
                <!--
            <div class="col-md-12">
                <div class="box box-primary">
                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                        <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                    </div>
                    <div class="box-body">
                    <h3 class="box-title"></h3>
                        <div id="container"></div>
                    </div>
                </div>  
            </div>
            -->
            <!-- col-12 -->
            
            <div class="col-md-6">
                <div class="box box-warning">
                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                        <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                    </div>
                    <div class="box-body">
                    <h3 class="box-title"></h3>
                        <div id="payment-container"></div>
                    </div>
                </div>  
            </div>
            <!-- col-6 -->

            <div class="col-md-6">
                <div class="box box-warning">
                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                        <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                    </div>
                    <div class="box-body">
                    <h3 class="box-title"></h3>
                        <div id="construction-container"></div>
                    </div>
                </div>  
            </div>
            <!-- col-6 -->
        </div>
        <!-- /row -->

      </div>
      <!-- /col -->
    </div>
    <!-- /row -->
          
      </div>
      <!-- /container -->
   
    <script type="text/javascript">
            Highcharts.chart('container', {
                title: {
                    text: 'Combination chart'
                },
                xAxis: {
                    categories: ['Properties', 'Oranges', 'Pears', 'Bananas', 'Plums']
                },
                labels: {
                    items: [{
                        html: 'Total fruit consumption',
                        style: {
                            left: '50px',
                            top: '18px',
                            color: (Highcharts.theme && Highcharts.theme.textColor) || 'black'
                        }
                    }]
                },
                series: [{
                    type: 'column',
                    name: 'Rent',
                    data: [3, 2, 1, 3, 4]
                }, {
                    type: 'column',
                    name: 'John',
                    data: [2, 3, 5, 7, 6]
                }, {
                    type: 'column',
                    name: 'Sale',
                    data: [4, 3, 3, 9, 0]
                }, {
                    type: 'spline',
                    name: 'Average',
                    data: [3, 2.67, 3, 6.33, 3.33],
                    marker: {
                        lineWidth: 2,
                        lineColor: Highcharts.getOptions().colors[3],
                        fillColor: 'white'
                    }
                }, {
                    type: 'pie',
                    name: 'Total consumption',
                    data: [{
                        name: 'Jane',
                        y: 13,
                        color: Highcharts.getOptions().colors[0] // Jane's color
                    }, {
                        name: 'John',
                        y: 23,
                        color: Highcharts.getOptions().colors[1] // John's color
                    }, {
                        name: 'Joe',
                        y: 19,
                        color: Highcharts.getOptions().colors[2] // Joe's color
                    }],
                    center: [100, 80],
                    size: 100,
                    showInLegend: false,
                    dataLabels: {
                        enabled: false
                    }
                }]
            });
		</script>

        <script type="text/javascript">

            Highcharts.chart('payment-container', {
                chart: {
                    type: 'pie',
                    options3d: {
                        enabled: true,
                        alpha: 45
                    }
                },
                title: {
                    text: 'Report Overview'
                },
                subtitle: {
                    text: ''
                },
                plotOptions: {
                    pie: {
                        innerSize: 100,
                        depth: 45
                    }
                },
                series: [{
                    name: 'Total',
                    data: [
                        ['Payments', {{ $payment }}],
                        ['Agents', {{ $agent}} ],
                        ['Land Lord', {{$land_lord}}],
                        ['Constructions', {{$construction}}],
                        
                    ]
                }]
            });
		</script>
        <script type="text/javascript">

        Highcharts.chart('construction-container', {
            chart: {
                type: 'pie',
                options3d: {
                    enabled: true,
                    alpha: 45
                }
            },
            title: {
                text: 'Ongoing Construction'
            },
            subtitle: {
                text: 'Building and Maitenance'
            },
            plotOptions: {
                pie: {
                    innerSize: 100,
                    depth: 45
                }
            },
            series: [{
                name: 'Incomplete',
                data: [
                    ['Building',  {{ $building }} ],
                    ['Maintenance', {{ $maintenance }}],
                ]
            }]
        });
        </script>

     @endif
  </section>
  <!-- /section -->
@endsection