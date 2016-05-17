
<!DOCTYPE html>



<html> 
  <head>
    <title>Environment Change Detection</title>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
    <meta charset="utf-8">
    <link href="{{url('css/bootstrap.min.css')}}" rel="stylesheet">
    <!-- Custom Fonts -->
    <link href="css/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
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
    {        border-radius: 8px 8px 8px 8px;
        background-color: rgba(255,255,255,0.5);
        /*width: 900px;*/
        height: 520px;
        margin: auto;
        margin-top:5%;
        width: 80%;    
        padding: 60px;
        padding-top: 40px;
        box-shadow: 0px 1px 5px rgba(0, 0, 0, 0.7);
        font-family: kanitl;
    }
    </style>

  </head>
 

  <body style="background-image: url('bgs.jpg'); ">

    <nav class="navbar navbar-light  navbar-fixed-top" style="background-color: #666666;">
      <a class="navbar-brand" href="start"> <font color="#ffffff"> <i class="fa fa-child" style="font:#FFF;"></i> Environment Change Detection</font></a>
        <ul class="nav navbar-nav navbar-right">
          <!-- <li><a href="/login<!DOCTYPE html>
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
   
    .input-group-addon.success {
    color: rgb(255, 255, 255);
    background-color: rgba(102, 102, 102, 0.6);
    box-shadow: 0px 0.5px 1px rgba(0, 0, 0, 0.6);
    
    }
    .divh {
        border-radius: 8px 8px 8px 8px;
        background-color: rgba(255,255,255,0.6);
        width: 200px;    
        padding: 0px;
        text-align: center;
        margin-top:5%;
        margin-left:41%;
        box-shadow: 0px 1px 5px rgba(0, 0, 0, 0.7);
    }

      .divb
    {        border-radius: 8px 8px 8px 8px;
        background-color: rgba(255,255,255,0.5);
        /*width: 900px;*/
        height: 550px;
        margin: auto;
        margin-top:7%;
        width: 80%;    
        padding: 50px;
        padding-left: 6%;
        padding-right: 6%;
        box-shadow: 0px 1px 5px rgba(0, 0, 0, 0.7);
        font-family: kanitl;
    }
    .dropdown {
    display: inline-block;
}
    </style>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
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
</nav>

 <div class="divb">
      <h2>
        <div align="center"><a href="http://www.ce.kmitl.ac.th" target="_blank"> <img class="displayed" src="logoCE"  width="70" height="70"></a></div>
        <p align="center">ระบบตรวจจับการเปลี่ยนแปลงของสภาพแวดล้อมจากภาพถ่ายดาวเทียม</p>
      </h2>
      <h3>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; เนื่องจากในปัจจุบันการเปลี่ยนแปลงของพื้นที่เกิดการเปลี่ยนแปลงได้ตลอดเวลา 
        โครงงานนี้เกิดจากแนวคิดที่จะนำเทคโนโลยีสมัยใหม่มา 
        ตรวจสอบการเปลี่ยนแปลงต่างๆของพื้นที่ที่สนใจ 
        ในรูปแบบระบบบริการตรวจสอบการเปลี่ยนแปลงสภาพแวดล้อมจากภาพถ่ายดาวเทียมบนระบบออนไลน์  
        ผู้ใช้สามารถเลือกพื้นที่ที่สนใจเพื่อดูการเปลี่ยนแปลงตามช่วงเวลาที่กำหนด 
        สามารถบันทึกพื้นที่ที่สนใจ ซึ่งระบบนี้ทำให้ทราบการเปลี่ยนแปลงในลักษณะทางกายภาพของพื้นที่ต่างๆ 
        โดยเปรียบเทียบกับภาพถ่ายที่ถ่ายในระยะเวลาที่แตกต่างกัน เช่น การขยายตัวของชุมชนเมือง 
        การกัดเซาะของชายฝั่ง การบุกรุกพื้นที่ป่าไม้ การตรวจสอบที่ดินส่วนบุคคล โดยการเปลี่ยนแปลงต่างๆจะแสดงออกมา 
        ในรูปแบบ รูปภาพที่เน้นการเปลี่ยนแปลงด้วยสี ภาพเคลื่อนไหวที่แสดงให้เห็นการเปลี่ยนแปลงในช่วงเวลาต่างๆ กราฟแสดงเปอร์เซ็นต์การเปลี่ยนแปลงของพื้นที่ และรรายงานระบุพื้นที่และเปอร์เซ็นต์การเปลี่ยนแปลง
      </h3>

    <div class="text-center">
      <a href="map" class="btn btn-danger btn-lg" >START <i class="fa fa-hand-o-left"></i></a>
    </div>

    </div>
   

    
  </body>

</html>


