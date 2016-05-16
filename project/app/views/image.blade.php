
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
        width: 200px;    
        padding: 0px;
        text-align: center;
        margin: auto;
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
    </nav>
    <br>
    <div class="divh">
      <span style="color:#800000;">
        <h2>Image</h2>
      </span>
    </div>


    <div class="divb">
        
        <div class="row">
            <div class="col-lg-2"><h4>Original Image.</h4></div>
            <div class="col-lg-5">
            <div align="center"> 
            <img src="reim1.jpg" class="img-rounded" alt="Cinque Terre" width="430.5" height="246">
            </div> </div>
            <div class="col-lg-5">
            <div align="center">
            <img src="reim2.jpg" class="img-rounded" alt="Cinque Terre" width="430.5" height="246">
            </div> </div>
        </div><br>


        <div class="row">
            <div class="col-lg-2"><h4>Result of HOG.</h4></div>
            <div class="col-lg-5">
            <div align="center">
            <img src="reim3.jpg" class="img-rounded" alt="Cinque Terre" width="430.5" height="246">
            </div></div>
            <div class="col-lg-5">
            <div align="center">
            <img src="reim4.jpg" class="img-rounded" alt="Cinque Terre" width="430.5" height="246">
            </div></div>
         </div>
         <br><br>
   </div>
  </body>

</html>




 <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/sb-admin.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="css/plugins/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
