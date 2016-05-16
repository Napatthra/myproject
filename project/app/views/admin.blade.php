
<!DOCTYPE html>



<html> 
  <head>
    <title>Environment Change Detection</title>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
    <meta charset="utf-8">
    <link href="{{url('css/bootstrap.min.css')}}" rel="stylesheet">
    <script src="js/jquery.js"></script>
    <!-- Custom Fonts -->
    <link href="css/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
     <!-- <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
      <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
 -->
    <style>

    @font-face {
    font-family: kanit;
    src: url('fonts/Kanit-Black.ttf');
    }
    @font-face {
    font-family: kanitl;
    src: url('fonts/Kanit-Light.ttf');
    }
   
    .divb
    {   border-radius: 8px 8px 8px 8px;
        background-color: rgba(255,255,255,0.5);
        /*width: 900px;*/
        height: 500px;
        margin: auto;
        margin-top:5%;
        width: 80%;    
        padding: 50px;
        box-shadow: 0px 1px 5px rgba(0, 0, 0, 0.7);
        font-family: kanitl;
    }


  .body{font-family: kanitl;}

  
    </style>
<style>
  .fileUpload {
    position: relative;
    overflow: hidden;
    margin: 10px;
  }
  .fileUpload input.upload {
      position: absolute;
      top: 0;
      right: 0;
      margin: 0;
      padding: 0;
      font-size: 20px;
      cursor: pointer;
      opacity: 0;
      filter: alpha(opacity=0);
  }
  </style>
  </head>
 

  <body style="background-image: url('bgs.jpg'); ">
    
  <nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="start"><font color="#ffffff"><i class="fa fa-child" style="font:#FFF;"></i>Environment Change Detection</font></a>
    </div>
    <ul class="nav navbar-nav">
<!--       <li class="active"><a href="#">Home</a></li>
      <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Page 1 <span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="#">Page 1-1</a></li>
          <li><a href="#">Page 1-2</a></li>
          <li><a href="#">Page 1-3</a></li>
        </ul>
      </li>
      <li><a href="#">Page 2</a></li>
      <li><a href="#">Page 3</a></li> -->
    </ul>
    <ul class="nav navbar-nav navbar-right">
          <!-- <li><a href="/login"><font color="#ffffff"><span class="glyphicon glyphicon-log-in"></span> Login &nbsp;&nbsp; </font></a></li> -->
        @if(Auth::check())
        <li><a href="/admin"><font color="#ffffff"><span class="glyphicon glyphicon-user"></span> ADMIN &nbsp;&nbsp; </font></a></li> 
        <li><a href="/info"><font color="#ffffff"><span class="glyphicon glyphicon-user"></span>
            <?php
            $id = Auth::user()->id;
            $u=new UserLogin;
            $name=$u->getById($id);
            ?>   {{$name->getname();}} &nbsp;&nbsp; </font></a></li>
        <!-- <a href="#" class="dropdown-toggle" data-toggle="dropdown"> {{$name=Auth::user()->userName}} <span class= "glyphicon glyphicon-user pull-right"></span></a> -->
         <li><a href="/logout"><font color="#ffffff"><span class="glyphicon glyphicon-log-in"></span> Logout &nbsp;&nbsp; </font></a></li>                    
        @endif
        </ul>
  </div>
</nav>
  
<div class="col-lg-6">
    <div class="panel panel-success">
      <div class="panel-heading"><div class="text-center"><h2>Images</h2></div></div>
      <div class="panel-body">
        
        <form action=" " method="post">
        <div class="form-group">
      <div class="col-sm-12">
        <h3><b>Size of block </b></h3>
        
          <label class="col-sm-6 control-label"><h5><b>New size of block (maximum 346): </b></h5></label>
          <div class="col-sm-6">
            <input class="form-control" id="block" name="block" type="text" value="64">
          </div>
      <!-- <input class="btn btn-success" type=button value="Set"> -->
        </div>
      <!-- </div> -->

      <div class="col-sm-12">
          <h3><b>Bin </b></h3>
          <!-- <div class="form-group"> -->
            <label class="col-sm-6 control-label"><h5><b>New bin (90-360): </b></h5></label>
            <div class="col-sm-6">
              <input class="form-control" id="bin" name="bin" type="text" value="90">
            </div>
          </div>
        <!-- </div> -->
      


    <div class="col-sm-12">
      <h3><b>ค่าที่ใช้ตัดการเปลี่ยนแปลง </b></h3>
           <!-- <div class="form-group"> -->
        <label class="col-sm-6 control-label"><h5><b>ค่าที่ใช้ตัดการเปลี่ยนแปลง(เปอร์เซ็นต์): </b></h5></label>
        <div class="col-sm-6">
          <input class="form-control" id="cut" name="cut" type="text" value="25">
        </div>
        <!-- <input class="btn btn-success" type=button value="Set"> -->
      </div>
    <!-- </div> -->


    <!-- <div class="form-group"> -->

  <div class="col-sm-6">
    <h3><b>ปรับแสง</b></div>
      <div class="col-sm-6">
      <label class="radio-inline"><h3><input type="radio" name="light" value="1">ปรับ</h3></label>
      <label class="radio-inline"><h3><input type="radio" name="light" value="0" checked="checked">ไม่ปรับ</h3></label>
      </div></h3>
    </div><div class="col-sm-offset-5">
    <input class="btn btn-success" type="submit" value="SET"> </div>
  </div>

        <!-- <h4> <b>New size of block (maximum 346): </b></h4>
        <div class="col-lg-2"><input type="text" class="form-control" id="blog"></div> -->
      </div>
    </div>
</div>


<div class="col-lg-6">
        <div class="panel panel-success">
          <div class="panel-heading"><div class="text-center"><h2>Notification</h2></div></div>
          <div class="panel-body">
            <h4 class="text-danger"><i class="fa fa-bullhorn"></i> Please update images (13.7270,100.7780) , (13.7248,100.7892) <input class="btn btn-success" type=button value="Update"></h4><br>
            <h4 class="text-danger"><i class="fa fa-bullhorn"></i> Please update images (11.5640,102.6400) , (11.5800,102.6550) <input class="btn btn-success" type=button value="Update"></h4><br>
            <h4 class="text-danger"><i class="fa fa-bullhorn"></i> Please update images (8.3600,120.5668) , (8.3680,120.5860) <input class="btn btn-success" type=button value="Update"></h4><br>
          </div>
        </div>

       

<script>
  document.getElementById("uploadBtn").onchange = function () {
    document.getElementById("uploadFile").value = this.value;
};
</script>
</div>
  
  </body>

</html>



