$linkvideo

<!DOCTYPE html>
<html>
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700' rel='stylesheet' type='text/css'>
  <head>
    <title>Environment Change Detection</title>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
    <meta charset="utf-8">
    <script src="js/jquery.js"></script>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <style> 
    .divb {
        border-radius: 8px 8px 8px 8px;
        background-color: rgba(255,255,255,0.6);
        /*width: 900px;*/
        height: 500px;
        margin: auto;
        width: 60%;    
        padding: 50px;
        margin-top:5%;
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
   <!--  <div class="divh">
      <span style="color:#800000;">
        <h2><b>VIDEO</b></h2>
      </span>
    </div> -->

                <div class="divb">
        <div align="center">

        <div align="center"><h2><b>VIDEO OF INTEREST AREA</b></h2></div>
        <h4><font color="red">หากวีดีโอเล่นไม่ได้กรุณารอสักครู่แล้วกดปุ่มF5</font></h4><br>
            <iframe title="YouTube video player" class="youtube-player" type="text/html" 
				width="320" height="195" src="http://www.youtube.com/embed/{{$linkvideo}}"
				frameborder="0" allowFullScreen></iframe>

           
       </div>
   </div>
  </body>

</html>
