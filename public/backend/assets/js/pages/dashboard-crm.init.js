/*
Template Name: Minton - Admin & Dashboard Template
Author: CoderThemes
Website: https://coderthemes.com/
Contact: support@coderthemes.com
File: CRM Dashboard
*/

function generateDayWiseTimeSeries(baseval, count, yrange) {
    var i = 0;
    var series = [];
    while (i < count) {
        var x = baseval;
        var y = Math.floor(Math.random() * (yrange.max - yrange.min + 1)) + yrange.min;

        series.push([x, y]);
        baseval += 86400000;
        i++;
    }
    return series;
}

//
// Campaign Chart
//

var colors = ["#3bafda", "#26c6da", "#00b19d"];
var dataColors = $("#campaigns-chart").data('colors');
if (dataColors) {
    colors = dataColors.split(",");
}

var options = {
    chart: {
        height: 280,
        type: 'donut',
    },
    series: [44, 55, 41],
    legend: {
        show: false,
        position: 'bottom',
        horizontalAlign: 'center',
        verticalAlign: 'middle',
        floating: false,
        fontSize: '14px',
        offsetX: 0,
        offsetY: 7
    },
    labels: ["Total Sent", "Reached", "Opened"],
    colors: colors,
    responsive: [{
        breakpoint: 600,
        options: {
            chart: {
                height: 210
            },
            legend: {
                show: false
            },
        }
    }],
}

var chart = new ApexCharts(
    document.querySelector("#campaigns-chart"),
    options
);

chart.render();


//
// Revenue Chart
//

var colors = ["#3bafda", "#26c6da"];
var dataColors = $("#revenue-chart").data('colors');
if (dataColors) {
    colors = dataColors.split(",");
}
var options = {
    chart: {
        height: 260,
        type: 'area',
        stacked: true,
        toolbar: {
            show: false
        },

    },
    colors: colors,
    dataLabels: {
        enabled: false
    },
    stroke: {
        width: [2],
        curve: 'smooth'
    },

    series: [{
            name: 'Total Revenue',
            data: generateDayWiseTimeSeries(new Date('11 Feb 2017 GMT').getTime(), 20, {
                min: 100,
                max: 1500
            })
        },

        {
            name: 'Total Pipeline',
            data: generateDayWiseTimeSeries(new Date('11 Feb 2017 GMT').getTime(), 20, {
                min: 100,
                max: 1000
            })
        }
    ],
    fill: {
        type: 'gradient',
        gradient: {
            opacityFrom: 0.3,
            opacityTo: 0.9,
        }
    },
    legend: {
        offsetY: 5
    },
    xaxis: {
        type: 'datetime'
    },
    grid: {
        padding: {
            bottom: 10
        }
    },
    yaxis: {
        title: {
            text: 'Revenue',
            style: {
                color: undefined,
                fontSize: '13px',
                cssClass: 'apexcharts-yaxis-title',
            },
        },
    }
}

var chart = new ApexCharts(
    document.querySelector("#revenue-chart"),
    options
);

chart.render();