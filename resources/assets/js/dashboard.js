
/* first chart*/
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


/* second chart*/
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


/* third chart*/
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

/* fourth */
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