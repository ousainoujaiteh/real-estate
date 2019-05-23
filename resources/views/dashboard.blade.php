@extends('layouts.main')
@section('content')
<!-- jQuery 3 -->
<script src="{{asset('theme/bower_components/jquery/dist/jquery.min.js')}}"></script>
<!-- chart data -->
<script src="{{asset('theme/bower_components/code/highcharts.js')}}"></script>
<script src="{{asset('theme/bower_components/code/modules/series-label.js')}}"></script>
<script src="{{asset('theme/bower_components/code/modules/exporting.js')}}"></script>
<script src="{{asset('theme/bower_components/code/modules/offline-exporting.js')}}"></script>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Dashboard
    </h1>
    <ol class="breadcrumb">
      <!-- li><a href="#"><i class="fa fa-dashboard"></i> Level</a></li-->
      <li class="active">Dashboard</li>
    </ol>
  </section>
  <!-- Main content -->
  <section class="content">

    <!-- Your Page Content Here -->

    <!-- Small boxes (Stat box) -->
    <div class="row">
      <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-aqua">
          <div class="inner">
            <h3>{{ $customer }}</h3>

            <p>Customers</p>
          </div>
          <div class="icon">
            <i class="ion ion-person"></i>
          </div>
          <a href="{{ url('customer')}}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <!-- ./col -->
      <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-green">
          <div class="inner">
            <h3>{{ $property }}</h3>

            <p>Properties</p>
          </div>
          <div class="icon">
            <i class="ion ion-stats-bars"></i>
          </div>
          <a href="{{ url('property')}}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <!-- ./col -->
      <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-yellow">
          <div class="inner">
            <h3>{{ $construction  }}</h3>

            <p>Constructions</p>
          </div>
          <div class="icon">
            <i class="ion ion-home"></i>
          </div>
          <a href="{{ url('construction')}}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <!-- ./col -->
      <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-red">
          <div class="inner">
            <h3>{{ $payment }}</h3>

            <p>Payment</p>
          </div>
          <div class="icon">
            <i class="ion ion-pie-graph"></i>
          </div>
          <a href="{{ url('payment')}}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <!-- ./col -->
    </div>
    <!-- ./widgets -->

    <!-- charts -->


    <div class="row">
    
        <div class="col-md-6">
            <div class="box box-warning">
                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                </div>
                <div class="box-body">
                    <div id="properties-container"></div>
                </div>
            </div>
        </div>
        <!-- /col-6 -->
        <div class="col-md-6">
            <div class="box box-warning">
                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                </div>
                <div class="box-body">
                    <div id="all-container"></div>
                </div>
            </div>
        </div>
        <!-- /col-6 -->
    </div>
    <!-- /row -->


    <div class="row">
    
        <div class="col-md-12">
            <div class="box box-warning">
                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                </div>
                <div class="box-body">
                    <div id="year-container"></div>
                </div>
            </div>  
        </div>
        <!-- col-12 -->
    </div>
    <!-- /row -->


        <!-- ./chart -->
        <script type="text/javascript">
              Highcharts.chart('container', {

                  title: {
                      text: 'The Firm Growth From 2010-2016'
                  },

                  subtitle: {
                      text: ''
                  },

                  yAxis: {
                      title: {
                          text: 'Growth'
                      }
                  },
                  legend: {
                      layout: 'vertical',
                      align: 'right',
                      verticalAlign: 'middle'
                  },

                  plotOptions: {
                      series: {
                          label: {
                              connectorAllowed: false
                          },
                          pointStart: 2012
                      }
                  },

                 series: [{
                        name: 'Customers',
                        data: [7, 6, 9, 14, 18]
                    },
                    {
                        name: 'Agents',
                        data: [4, 9, 5, 13, 16]
                    },
                    {
                        name: 'Construction',
                        data: [5, 10, 6, 14, 17]
                    },
                    {
                        name: 'Land Lords',
                        data: [6, 11, 7, 15, 18]
                    },
                    {
                        name: 'Payments',
                        data: [8, 13, 9, 17, 20]
                    },
                    {
                        name: 'Properties',
                        data: [3, 4, 5, 8, 11]
                    }],

                  responsive: {
                      rules: [{
                          condition: {
                              maxWidth: 500
                          },
                          chartOptions: {
                              legend: {
                                  layout: 'horizontal',
                                  align: 'center',
                                  verticalAlign: 'bottom'
                              }
                          }
                      }]
                  }

              });
        </script>

        <script type="text/javascript">
                var chart = Highcharts.chart('properties-container', {

                        title: {
                            text: 'Properties From Jan to Dec {{ $current_year }} Overview'
                        },

                        subtitle: {
                            text: ''
                        },

                        xAxis: {
                            categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']
                        },

                        series: [{
                            name: 'properties',
                            type: 'column',
                            colorByPoint: true,
                            data: [<?php echo join($months , ',') ?>],
                            showInLegend: false
                        }]

                });
        </script>


        <script type="text/javascript">

                // Build the chart
                Highcharts.chart('all-container', {
                    chart: {
                        plotBackgroundColor: null,
                        plotBorderWidth: null,
                        plotShadow: false,
                        type: 'pie'
                    },
                    title: {
                        text: 'Property Types in {{ $current_year }} Percentage'
                    },
                    tooltip: {
                        pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
                    },
                    plotOptions: {
                        pie: {
                            allowPointSelect: true,
                            cursor: 'pointer',
                            dataLabels: {
                                enabled: false
                            },
                            showInLegend: true
                        }
                    },
                    series: [{
                        name: 'Properties',
                        colorByPoint: true,
                        data: [{
                            name: 'Sale',
                            y: {{ $salePercentage }}
                        }, {
                            name: 'Rent',
                            y: {{ $rentPercentage }},
                            sliced: true,
                            selected: true
                        }, {
                            name: 'Lease',
                            y: {{ $leasePercentage }},
                        }]
                    }]
                });
        </script>


        <script type="text/javascript">

                Highcharts.chart('year-container', {
                    chart: {
                        type: 'line'
                    },
                    title: {
                        text: ' {{ $current_year }} Yearly Growth Overview'
                    },
                    subtitle: {
                        text: ''
                    },
                    xAxis: {
                        categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']
                    },
                    yAxis: {
                        title: {
                            text: 'Data'
                        }
                    },
                    plotOptions: {
                        line: {
                            dataLabels: {
                                enabled: true
                            },
                            enableMouseTracking: true
                        }
                    },
                    series: [{
                        name: 'Customers',
                        data: [<?php echo join($customer_data , ',') ?>]
                    },
                    {
                        name: 'Agents',
                        data: [<?php echo join($agent_data , ',') ?>]
                    },
                    {
                        name: 'Construction',
                        data: [<?php echo join($construction_data , ',') ?>]
                    },
                    {
                        name: 'Land Lords',
                        data: [<?php echo join($land_lord_data , ',') ?>]
                    },
                    {
                        name: 'Payments',
                        data: [<?php echo join($payment_data , ',') ?>]
                    },
                    {
                        name: 'Properties',
                        data: [<?php echo join($property_data , ',') ?>]
                    }]
                });
        </script>
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->
@endsection
