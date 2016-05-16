<!DOCTYPE html>
<html>
<head>
	<link href="{{url('css/bootstrap.min.css')}}" rel="stylesheet">
    <script src="js/jquery.js"></script>
    <!-- Custom Fonts -->
    <link href="css/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
 

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
<div class="col-lg-offset-3 col-lg-6">
<div class="panel panel-default">
<div class="panel-body">
<!-- <form action="upload" method="post" enctype="multipart/form-data">
    Select image to upload:
    <input type="file" name="file" id="file">
    <input type="submit" class="btn btn-success" >
</form> -->
<p style="color:red;font-size:18px;margin:0;padding:10px 0px;text-align:center;">
	รูปภาพต้องมีขนาด 346 x 355 pixel
</p>

<form action="upload" method="post" enctype="multipart/form-data">
 <font size="4pt"><div class=" col-lg-6">
  Date:<input type="text" name="date"></div>
  <div class=" col-lg-6">
  Frame:<input type="text" name="frame"></div><br>
   Please select image to upload:
 </font>
    <input id="uploadFile" placeholder="Choose File" disabled="disabled" />
<div class="fileUpload btn btn-primary">
    <span>Choose</span>
    <input id="uploadBtn" type="file" name="file" class="upload" />
</div>
    <input type="submit" value="Upload" class="btn btn-success" >
</form>
<div align="center">
  <font color="red">FRAME IN DATABASE</font><br>
@for ($i=0; $i <count($framee) ; $i++)
<font color="red">FRAME{{$framee[$i]->getid_frame()}}</font>:
({{$framee[$i]->getlat1()}},{{$framee[$i]->getlng1()}}) to ({{$framee[$i]->getlat2()}},{{$framee[$i]->getlng1()}})<br>

@endfor
</div>


<script>
  document.getElementById("uploadBtn").onchange = function () {
    document.getElementById("uploadFile").value = this.value;
};
</script>

</body>
</html>