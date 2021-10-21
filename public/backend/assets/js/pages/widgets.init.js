/*
Template Name: Minton - Admin & Dashboard Template
Author: CoderThemes
Website: https://coderthemes.com/
Contact: support@coderthemes.com
File: Widgets init js
*/
$( document ).ready(function() {
    
    var DrawSparkline = function() {
        // Line Chart
        var colors = ['#3bafda', '#1abc9c'];
        var dataColors = $("#sparkline1").data('colors');
        if (dataColors) {
            colors = dataColors.split(",");
        }
        $('#sparkline1').sparkline([0, 23, 43, 35, 44, 45, 56, 37, 40], {
            type: 'line',
            width: "100%",
            height: '165',
            chartRangeMax: 50,
            lineColor: colors[0],
            fillColor: hexToRGB(colors[0], 0.3),
            highlightLineColor: 'rgba(0,0,0,.1)',
            highlightSpotColor: 'rgba(0,0,0,.2)',
            maxSpotColor: false,
            minSpotColor: false,
            spotColor: false,
            lineWidth: 1
        });

        $('#sparkline1').sparkline([25, 23, 26, 24, 25, 32, 30, 24, 19], {
            type: 'line',
            width: "100%",
            height: '165',
            chartRangeMax: 40,
            lineColor: colors[1],
            fillColor: hexToRGB(colors[1], 0.3),
            composite: true,
            highlightLineColor: 'rgba(0,0,0,.1)',
            highlightSpotColor: 'rgba(0,0,0,.2)',
            maxSpotColor: false,
            minSpotColor: false,
            spotColor: false,
            lineWidth: 1
        });

        // Bar Chart
        var colors = ['#3bafda'];
        var dataColors = $("#sparkline2").data('colors');
        if (dataColors) {
            colors = dataColors.split(",");
        }
        $('#sparkline2').sparkline([3, 6, 7, 8, 6, 4, 7, 10, 12, 7, 4, 9, 12, 13, 11, 12], {
            type: 'bar',
            height: '165',
            barWidth: '10',
            barSpacing: '3',
            barColor: colors
        });


        // Pie Chart
        var colors = ['#e3eaef', '#3bafda', '#1abc9c', '#f1556c'];
        var dataColors = $("#sparkline3").data('colors');
        if (dataColors) {
            colors = dataColors.split(",");
        }
        $('#sparkline3').sparkline([20, 40, 30, 10], {
            type: 'pie',
            width: '165',
            height: '165',
            sliceColors: colors
        });

        // Combine Line Chart
        var colors = ['#f672a7', '#3bafda'];
        var dataColors = $("#sparkline4").data('colors');
        if (dataColors) {
            colors = dataColors.split(",");
        }
        $('#sparkline4').sparkline([0, 23, 43, 35, 44, 45, 56, 37, 40], {
            type: 'line',
            width: "100%",
            height: '165',
            chartRangeMax: 50,
            lineColor: colors[0],
            fillColor: 'transparent',
            lineWidth: 1,
            highlightLineColor: 'rgba(0,0,0,.1)',
            highlightSpotColor: 'rgba(0,0,0,.2)',
            maxSpotColor: false,
            minSpotColor: false,
            spotColor: false
        });
        $('#sparkline4').sparkline([25, 23, 26, 24, 25, 32, 30, 24, 19], {
            type: 'line',
            width: "100%",
            height: '165',
            chartRangeMax: 40,
            lineColor: colors[1],
            fillColor: 'transparent',
            composite: true,
            lineWidth: 1,
            maxSpotColor: false,
            minSpotColor: false,
            spotColor: false,
            highlightLineColor: 'rgba(0,0,0,1)',
            highlightSpotColor: 'rgba(0,0,0,1)'
        });


        // Composite bar Chart
        var colors = ['#f1556c', '#1abc9c'];
        var dataColors = $("#sparkline6").data('colors');
        if (dataColors) {
            colors = dataColors.split(",");
        }
        
        $('#sparkline6').sparkline([3, 6, 7, 8, 6, 4, 7, 10, 12, 7, 4, 9, 12, 13, 11, 12], {
            type: 'bar',
            height: '165',
            barWidth: '10',
            barSpacing: '3',
            barColor: colors[1]
        });

        $('#sparkline6').sparkline([3, 6, 7, 8, 6, 4, 7, 10, 12, 7, 4, 9, 12, 13, 11, 12], {
            type: 'line',
            width: "100%",
            height: '165',
            lineColor: colors[0],
            lineWidth: 1,
            composite: true,
            fillColor: 'rgba(227,234,239,0.3)',
            highlightLineColor: 'rgba(0,0,0,.1)',
            highlightSpotColor: 'rgba(0,0,0,.2)'
        });
    };

    DrawMouseSpeed = function () {
        var mrefreshinterval = 500; // update display every 500ms
        var lastmousex = -1;
        var lastmousey = -1;
        var lastmousetime;
        var mousetravel = 0;
        var mpoints = [];
        var mpoints_max = 30;
        $('html').mousemove(function (e) {
            var mousex = e.pageX;
            var mousey = e.pageY;
            if (lastmousex > -1) {
                mousetravel += Math.max(Math.abs(mousex - lastmousex), Math.abs(mousey - lastmousey));
            }
            lastmousex = mousex;
            lastmousey = mousey;
        });
        var mdraw = function () {
            var md = new Date();
            var timenow = md.getTime();
            if (lastmousetime && lastmousetime != timenow) {
                var pps = Math.round(mousetravel / (timenow - lastmousetime) * 1000);
                mpoints.push(pps);
                if (mpoints.length > mpoints_max)
                    mpoints.splice(0, 1);
                mousetravel = 0;
                var colors = ['#1abc9c'];
                var dataColors = $("#sparkline5").data('colors');
                if (dataColors) {
                    colors = dataColors.split(",");
                }
                $('#sparkline5').sparkline(mpoints, {
                    tooltipSuffix: ' pixels per second',
                    type: 'line',
                    width: "100%",
                    height: '165',
                    chartRangeMax: 77,
                    maxSpotColor: false,
                    minSpotColor: false,
                    spotColor: false,
                    lineWidth: 1,
                    lineColor: colors,
                    fillColor: hexToRGB(colors[0], 0.3),
                    highlightLineColor: 'rgba(24,147,126,.1)',
                    highlightSpotColor: 'rgba(24,147,126,.2)'
                });
            }
            lastmousetime = timenow;
            setTimeout(mdraw, mrefreshinterval);
        }
        // We could use setInterval instead, but I prefer to do it this way
        setTimeout(mdraw, mrefreshinterval);
    };
    
    DrawSparkline();
    DrawMouseSpeed();
    
    var resizeChart;

    $(window).resize(function(e) {
        clearTimeout(resizeChart);
        resizeChart = setTimeout(function() {
            DrawSparkline();
            DrawMouseSpeed();
        }, 300);
    });
});

/* utility function */

function hexToRGB(hex, alpha) {
    var r = parseInt(hex.slice(1, 3), 16),
        g = parseInt(hex.slice(3, 5), 16),
        b = parseInt(hex.slice(5, 7), 16);

    if (alpha) {
        return "rgba(" + r + ", " + g + ", " + b + ", " + alpha + ")";
    } else {
        return "rgb(" + r + ", " + g + ", " + b + ")";
    }
}