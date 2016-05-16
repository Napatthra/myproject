
<!DOCTYPE html>
<html>
  <head>
    <title>Environment Change Detection</title>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
    <meta charset="utf-8">
    <script src="js/jquery.js"></script>
    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom Fonts -->
    <link href="css/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <style> 
    .divb {
        border-radius: 8px 8px 8px 8px;
        background-color: rgba(255,255,255,0.6);
        /*width: 900px;*/
        height: 525px;
        margin: auto;
        margin-top: 5%;
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
        margin-top:3%;
        margin-left:41%;
        box-shadow: 0px 1px 5px rgba(0, 0, 0, 0.7);
    }
    img.displayed {
    display: block;
    margin-left: auto;
    margin-right: auto }

    </style>


  </head>
 
  <body style="background-image: url('bgs.jpg');">
    <nav class="navbar navbar-light  navbar-fixed-top" style="background-color: #666666;">
      <a class="navbar-brand" href="start"><font color="#ffffff"><i class="fa fa-child" style="font:#FFF;"></i>Environment Change Detection</font></a>
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
    <!-- <div class="divh">
      <span style="color:#800000;">
        <h2>Select Result</h2>
      </span>
    </div> -->

    <div class="divb">
      <div class="text-center"><h2 style="color:#800000;"><b>PLEASE &nbsp; SELECT &nbsp; RESULT</b></h2></div>
      <br><br>
      <div class="row">
        <div class="col-lg-12">
          <div class="col-lg-3">
          <img class="displayed" src="photo.png" class="img-rounded" alt="Cinque Terre" width="200" height="200">
            <div class="col-lg-12"> 
              <div class="text-center">
                <!-- <form name="image" action="/resultImage" method="post">
                  <button type="submit" class="btn btn-success  btn-lg" formmethod="post" formaction="/resultImage" target="_blank">Image</button>
                <form> -->
                  <a href="resultImage" target="_blank" class="btn btn-success btn-lg" >Image</a>
              </div> 
            </div>
          </div>
          <div class="col-lg-3"> 
          <img class="displayed" src="vdo.png" class="img-rounded" alt="Cinque Terre" width="200" height="200">
            <div class="col-lg-12"> 
              <div class="text-center">
                <a href="resultVDO" target="_blank" class="btn btn-success btn-lg" >Video</a>
                <!-- <button type="submit" class="btn btn-success  btn-lg" formmethod="post" formaction="/resultVDO" target="_blank">Video</button> -->
                <!-- <form name="vdo" action="/resultVDO" method="post">
                  <button class="btn btn-success  btn-lg" type="submit" value="video">Video</button>
                <form> -->
              </div> 
            </div>
          </div>


          <div class="col-lg-3">
          <img class="displayed" src="graph.png" class="img-rounded" alt="Cinque Terre" width="200" height="200">
            <div class="col-lg-12"> 
              <div class="text-center">
                <a href="resultGraph" target="_blank" class="btn btn-success btn-lg" >Graph</a>
                <!-- <button type="submit" class="btn btn-success  btn-lg" formmethod="post" formaction="/resultGraph" target="_blank">Graph</button> -->
              </div> 
            </div>
          </div>
          
          <div class="col-lg-3">
          <img class="displayed" src="note.png" class="img-rounded" alt="Cinque Terre" width="200" height="200">
            <div class="col-lg-12"> 
              <div class="text-center">
                  <a href="pdf" target="_blank" class="btn btn-success btn-lg" >Report</a>
                <!-- <form name="pdf" action="/pdf" method="post"> -->
<!--                    <button type="submit" class="btn btn-success  btn-lg" formmethod="post" formaction="/pdf" target="_blank">Report</button> -->
                  <!-- <input type="submit" name="pdf" class="btn btn-success  btn-lg" value="Report" /> -->
                  <!-- <button class="btn btn-success  btn-lg" type="submit" value="report">Report</button> -->
                <!-- <form> -->
              </div> 
            </div>
          </div></div>
        </div>
           @if(Auth::check())
             <div class="col-lg-offset-3 col-lg-6"><br><br>
              <form method="post">
              <div class="row"><div class="col-lg-6">
              <div class="text-center">
                <a href="saveinter" target="_blank" class="btn btn-primary btn-lg" >Save to interest areas</a>
              </div>
              </div>
            </form>
            <form method="post">
              <div class="col-lg-6">
              <div class="text-center">
                <a href="savepercent" target="_blank" class="btn btn-primary btn-lg" >Save to notifications</a>
                </div>
             </div>
            </form>
           @endif

      </div>
      </div>
      
    


  </body>

</html>







