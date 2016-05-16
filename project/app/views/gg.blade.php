<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>



<!DOCTYPE html>
<html>

  <head>
    <title>Environment Change Detection</title>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
    <meta charset="utf-8">
    <script src="js/jquery.js"></script>
    <style> 
    .divb {
        border-radius: 8px 8px 8px 8px;
        background-color: rgba(255,255,255,0.6);
        /*width: 900px;*/
        height: 500px;
        margin: auto;
        width: 80%;    
        padding: 50px;
        box-shadow: 0px 1px 5px rgba(0, 0, 0, 0.7);
    }
    .divh {
        border-radius: 8px 8px 8px 8px;
        background-color: rgba(255,255,255,0.6);
        width: 200px;    
        padding: 0px;
        text-align: center;
        /*margin: auto;*/
        margin-top:3%;
        margin-left:41%;
        box-shadow: 0px 1px 5px rgba(0, 0, 0, 0.7);
    }
    .body{padding-top: 10%}
    </style>

  </head>
 
  <body style="background-image: url('bgs.jpg');">
    <nav class="navbar navbar-light  navbar-fixed-top" style="background-color: #666666;">
      <a class="navbar-brand" href="start"><font color="#ffffff">Environment Change Detection</font></a>
    </nav>
    <br>
    <div class="divh">
      <span style="color:#800000;">
        <h2>Graph</h2>
      </span>
    </div>


    <div class="divb">
        <div align="center"><h4>Graph of interest area.</h4></div>

        <div align="center">
<div id="container" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
           <!-- <div id="chart1" style="width:500px; height:400px;"></div> -->
       </div>
   </div>
  </body>




<script class="code" type="text/javascript">
$(function () {
    $('#container').highcharts({
        chart: {
            type: 'column'
        },
        title: {
            text: 'ENVIRONMENT CHANGE DETECHTION'
        },
        subtitle: {
            text: 'Source: WorldClimate.com'
        },
        xAxis: {
            categories: [
                'Jan',
                'Feb',
                'Mar',
              
            ],
            crosshair: true
        },
        yAxis: {
            min: 0,
            title: {
                text: 'Rainfall (mm)'
            }
        },
        tooltip: {
            headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
            pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                '<td style="padding:0"><b>{point.y:.1f} mm</b></td></tr>',
            footerFormat: '</table>',
            shared: true,
            useHTML: true
        },
        plotOptions: {
            column: {
                pointPadding: 0.2,
                borderWidth: 0
            }
        },
        series: [{
            name: 'Tokyo',
            data: [49.9, 71.5, 106.4]

        }, {
            name: 'New York',
            data: [83.6, 78.8, 98.5]

        }, {
            name: 'London',
            data: [48.9, 38.8, 39.3]

        }, {
            name: 'Berlin',
            data: [42.4, 33.2, 34.5]

        }]
    });
});
</script>