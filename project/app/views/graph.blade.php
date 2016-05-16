
<!DOCTYPE html>
<html>
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700' rel='stylesheet' type='text/css'>
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
        margin-top: 3%;

        width: 60%;    
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
        margin-left:43%;
        box-shadow: 0px 1px 5px rgba(0, 0, 0, 0.7);
    }
    .body{padding-top: 10%}
    </style>

  </head>
 
  <body style="background-image: url('bgs.jpg');">
    <nav class="navbar navbar-light  navbar-fixed-top" style="background-color: #666666;">
      <a class="navbar-brand" href="start"><font color="#ffffff">Environment Change Detection</font></a>
    <ul class="nav navbar-nav navbar-right">
          <!-- <li><a href="/login"><font color="#ffffff"><span class="glyphicon glyphicon-log-in"></span> Login &nbsp;&nbsp; </font></a></li> -->
        @if(Auth::check())
        <li><a href="/info"><font color="#ffffff"><span class="glyphicon glyphicon-user"></span>
            <?php
            $id = Auth::user()->id;
            $u=new UserLogin;
            $name=$u->getById($id);
            ?>   {{$name->getname();}} &nbsp;&nbsp; </font></a></li>
        <!-- <a href="#" class="dropdown-toggle" data-toggle="dropdown"> {{$name=Auth::user()->userName}} <span class= "glyphicon glyphicon-user pull-right"></span></a> -->
         <li><a href="/logout"><font color="#ffffff"><span class="glyphicon glyphicon-log-in"></span> Logout &nbsp;&nbsp; </font></a></li>                    
        @else 
        <li><a href="/login"><font color="#ffffff"><span class="glyphicon glyphicon-log-in"></span> Login &nbsp;&nbsp; </font></a></li>
        @endif
        </ul>
    
    </nav>
    <br>
    <div class="divh">
      <span style="color:#800000;">
        <h2><b>GRAPH</b></h2>
      </span>
    </div>

                <div class="divb">
        <div align="center"><h4>Graph of interest area. </h4></div>
            
        <div align="center">

           <div id="chart1" style="width:700px; height:400px;"></div>
       </div>
   </div>
  </body>

</html>




 <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
<!-- 
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script type="text/javascript" src="../src/jquery.jqplot.js"></script>
<script type="text/javascript" src="../src/plugins/jqplot.barRenderer.js"></script>
<script type="text/javascript" src="../src/plugins/jqplot.pieRenderer.js"></script>
<script type="text/javascript" src="../src/plugins/jqplot.categoryAxisRenderer.js"></script>
<script type="text/javascript" src="../src/plugins/jqplot.pointLabels.js"></script>
<link rel="stylesheet" type="text/css" href="../src/jquery.jqplot.css" />
 -->




<link rel="stylesheet" type="text/css" href="http://projectsoft.biz/graph/jquery.jqplot.css" />
<script language="javascript" type="text/javascript" src="http://projectsoft.biz/graph/jquery.js"></script>
<script language="javascript" type="text/javascript" src="http://projectsoft.biz/graph/jquery.jqplot.js"></script>
<script language="javascript" type="text/javascript" src="http://projectsoft.biz/graph/plugins/jqplot.pointLabels.js"></script>
<script language="javascript" type="text/javascript" src="http://projectsoft.biz/graph/plugins/jqplot.barRenderer.js"></script>
<script language="javascript" type="text/javascript" src="http://projectsoft.biz/graph/plugins/jqplot.categoryAxisRenderer.js"></script>
<script type="text/javascript" src="../src/plugins/jqplot.pieRenderer.js"></script>
            

<script class="code" type="text/javascript">


  $(document).ready(function(){
 
    plot1 = $.jqplot('chart1', [{{"[".implode("],[",$perchange)."]"}}], {
    // plot1 = $.jqplot('chart1', [[0],[4],[8],[17],[16],[45],[24],[24],[34],[42],[34],[24]], {
      seriesDefaults:{
        renderer:$.jqplot.BarRenderer,
        rendererOptions: {fillToZero: true},
         pointLabels: { show: true }
      },
      series:[

      @for ($i=1; $i <count($date) ; $i++)
        {label: '{{$date[$i]}}'},
      @endfor
        // {{"{label: '".implode("'},{label :'",$date)."'}"}}
        // ,{label:'test'},{label:'05/03/2015'},{label:'15/04/2015'},{label:'17/05/2015'}
      ],
      legend: {
        show: true,
        placement: 'outsideGrid'
      },
      axes: {
        xaxis: {
          renderer: $.jqplot.CategoryAxisRenderer,
          ticks: ['Date']
        },
        yaxis: {
          autoscale: true,
          tickOptions: {formatString: '%#.2f Percent'}
        }
      }
    });
  });
  </script>




<!-- <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script type="text/javascript" src="../src/jquery.jqplot.js"></script>
<script type="text/javascript" src="../src/plugins/jqplot.barRenderer.js"></script>
<script type="text/javascript" src="../src/plugins/jqplot.highlighter.js"></script>
<script type="text/javascript" src="../src/plugins/jqplot.cursor.js"></script>
<script type="text/javascript" src="../src/plugins/jqplot.pointLabels.js"></script>
<link rel="stylesheet" type="text/css" hrf="../src/jquery.jqplot.css" />


<div id="chart1" style="width:500px; height:500px;"></div>
<script class="code" type="text/javascript">

$(document).ready(function () {
    var s1 = [[2002, 112000], [2003, 122000], [2004, 104000], [2005, 99000], [2006, 121000], 
    [2007, 148000], [2008, 114000], [2009, 133000], [2010, 161000], [2011, 173000]];
    var s2 = [[2002, 10200], [2003, 10800], [2004, 11200], [2005, 11800], [2006, 12400], 
    [2007, 12800], [2008, 13200], [2009, 12600], [2010, 13100]];
 
    plot1 = $.jqplot("chart1", [s2, s1], {
        // Turns on animatino for all series in this plot.
        animate: true,
        // Will animate plot on calls to plot1.replot({resetAxes:true})
        animateReplot: true,
        cursor: {
            show: true,
            zoom: true,
            looseZoom: true,
            showTooltip: false
        },
        series:[
            {
                pointLabels: {
                    show: true
                },
                renderer: $.jqplot.BarRenderer,
                showHighlight: false,
                yaxis: 'y2axis',
                rendererOptions: {
                    // Speed up the animation a little bit.
                    // This is a number of milliseconds.  
                    // Default for bar series is 3000.  
                    animation: {
                        speed: 2500
                    },
                    barWidth: 15,
                    barPadding: -15,
                    barMargin: 0,
                    highlightMouseOver: false
                }
            }, 
            {
                rendererOptions: {
                    // speed up the animation a little bit.
                    // This is a number of milliseconds.
                    // Default for a line series is 2500.
                    animation: {
                        speed: 2000
                    }
                }
            }
        ],
        axesDefaults: {
            pad: 0
        },
        axes: {
            // These options will set up the x axis like a category axis.
            xaxis: {
                tickInterval: 1,
                drawMajorGridlines: false,
                drawMinorGridlines: true,
                drawMajorTickMarks: false,
                rendererOptions: {
                tickInset: 0.5,
                minorTicks: 1
            }
            },
            yaxis: {
                tickOptions: {
                    formatString: "$%'d"
                },
                rendererOptions: {
                    forceTickAt0: true
                }
            },
            y2axis: {
                tickOptions: {
                    formatString: "$%'d"
                },
                rendererOptions: {
                    // align the ticks on the y2 axis with the y axis.
                    alignTicks: true,
                    forceTickAt0: true
                }
            }
        },
        highlighter: {
            show: true, 
            showLabel: true, 
            tooltipAxes: 'y',
            sizeAdjust: 7.5 , tooltipLocation : 'ne'
        }
    });
   
});
</script> -->