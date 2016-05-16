


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
        height: 580px;
        margin: auto;
        width: 90%;    
        padding: 50px;
        box-shadow: 0px 1px 5px rgba(0, 0, 0, 0.7);
    }
    .divh {
        border-radius: 8px 8px 8px 8px;
        background-color: rgba(255,255,255,0.6);
        width: 160px;    
        padding: 0px;
        text-align: center;
        margin: auto;
        margin-top: 3%;
        margin-bottom: 2%;
        box-shadow: 0px 1px 5px rgba(0, 0, 0, 0.7);
    }
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
        <h2>IMAGE</h2>
      </span>
    </div>

<div class="col-lg-offset-1 col-lg-10">
  	<div class="container">
	  	<div class="panel panel-default">
		    <div class="panel-body">
		    	@for ($i=0; $i <count($frame) ; $i++)
		    	<div class="row" align="center">
		    		
		    		<div class="col-lg-3" align="center">
		    		<b><font color="red">AREA{{$i+1}}: {{$date[0]}}</font></b>
		    		<img src="image/{{$date[0]}}_1.jpg" style="width:250px;height:250px;" >
		    		</div>
		    		@for ($j=2; $j <=count($date) ; $j++)
		    		<div class="col-lg-3" align="center">
		    		<b><font color="red">AREA{{$i+1}}: {{$date[$j-1]}}</font></b>
		    		<img src="compareimg/{{$j}}.jpg" style="width:250px;height:250px;">
		    		</div>
		    		@endfor
		    	</div><br>
		    	@endfor


	    	</div>
	  	</div>
	</div>
</div>
 
 </body>

</html>




 <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

