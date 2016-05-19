
   <html>
  <head>
    <title>Environment Change Detection</title>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
    <meta charset="utf-8">
    <link href="css/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
      <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    
    <style>
     

      .divh {
        border-radius: 8px 8px 8px 8px;
        background-color: rgba(255,255,255,0.6);
        width: 120px;    
        padding: 0px;
        padding-top: 0px;
        text-align: center;
        /*vertical-align:bottom;*/
        height: 40px;
        margin-top:5%;
        margin-bottom:3%;
        margin-left:45%;
        box-shadow: 0px 1px 5px rgba(0, 0, 0, 0.7);
    }

    .divb{
          border-radius: 8px 8px 8px 8px;
          background-color: rgba(255,255,255,0.5);
          /*width: 900px;*/
          /*height: 56%;*/
          height: 365px;
          margin-top:8%;
          margin-left:30%;
          width: 40%;    
          padding: 15px;
          box-shadow: 0px 1px 5px rgba(0, 0, 0, 0.7); 
          
    }


    </style>
    <script src="js/jquery.js"></script>
  </head>


    <body style="background-image: url('bgs.jpg');">
    <nav class="navbar navbar-light  navbar-fixed-top" style="background-color: #666666;">
      <a class="navbar-brand" href="start"><font color="#ffffff"><i class="fa fa-child" style="font:#FFF;"></i>Environment Change Detection</font></a>
    <ul class="nav navbar-nav navbar-right">
            <!-- <li><a href="/login"><font color="#ffffff"><span class="glyphicon glyphicon-log-in"></span> Login &nbsp;&nbsp; </font></a></li> -->
          @if(Auth::check())
          @if(Auth::user()->status=='A' )<li><a href="/admin"><font color="#ffffff"><span class="glyphicon glyphicon-user"></span> ADMIN &nbsp;&nbsp; </font></a></li>@endif
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

    <div class="box-login">
       <!--  <div class="divh">
            <span style="color:#800000;">
                <h2>User</h2>
            </span>
        </div> -->



<?php
$id = Auth::user()->id;
$u=new UserLogin;
$name=$u->getById($id);
$email=$u->getById($id);
?>  

        <div class="divb">
            <div align="center">
              <h2 style="color:#800000;"><b> ABOUT&nbsp;&nbsp; ME </b></h2>
            </DIV>
          <div class="col-lg-offset-1">  
                  <h3><b>Name :</b><?php echo $name->getname(); ?></h3>
                
                <h3><b>E-mail :</b><?php echo Auth::user()->email ?></h3><br>
             <tbody>


             @if(Auth::user()->status=='A' )
             <!-- <div class="col-lg-offset-1"> -->
             <tr><td><a href="admin" class="btn btn-success btn-lg" >ADMIN</a> <td>
             <td><a href="manageuser" class="btn btn-success btn-lg" >MANAGE USER</a></td><tr>@endif
             <!-- <div class="col-lg-offset-1"><div class=" row"> -->
              <!-- <br> -->
              <!-- <div class="text-center"> --><br><br>
               <tr><td> <a href="inter" target="_blank" class="btn btn-primary btn-lg" >My interest areas</a></td>
                <td><a href="percent" target="_blank" class="btn btn-primary btn-lg" >Area to notifications</a></td>
              <!-- </div> -->
</tr>
              </div></div>
            </tbody>
            
              <!-- <div class="col-lg-6">
              <div class="text-center">
                <a href="percent" target="_blank" class="btn btn-primary btn-lg" >Area to notifications</a>
                </div>
             </div> -->
        <!-- <div style="text-align: center;">
            {{ Form::submit('Edit User', ['class' => 'btn  btn-success']) }}
        </div> -->
    </div>
       
</div>

</body>

</html>
