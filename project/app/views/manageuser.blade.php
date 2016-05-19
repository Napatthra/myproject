
<!DOCTYPE html>



<html> 
  <head>
    <title>Environment Change Detection</title>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
    <meta charset="utf-8">
    <link href="{{url('css/bootstrap.min.css')}}" rel="stylesheet">
    <!-- Custom Fonts -->
    <link href="css/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
     
     <script src="js/jquery.js"></script>


    <style>

    @font-face {
    font-family: kanit;
    src: url('fonts/Kanit-Black.ttf');
    }
    @font-face {
    font-family: kanitl;
    src: url('fonts/Kanit-Light.ttf');
    }
   

  body {
    padding-top: 5%; 
  }


    </style>

  </head>
 

  <body style="background-image: url('bgs.jpg'); ">
    
   
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
  
<div class="container">
          <div class="text-center" >
            <h2 style="color:#003757;"><b>MEMBER</b></h2>
<div class="col-lg-offset-1 col-lg-10">
            <table class="table table-bordered" >
             <thead >
                <!-- <tr style="background-color: #c2bba9;"> -->
                <tr style="background-color: #c2bba9;">
                  <th><h4 align="center" style="color:white;" >NAME </h4></th>
                  <th><h4 align="center" style="color:white;" >E-MAIL </h4></th>
                   <th><h4 align="center" style="color:white;" >PASSWORD </h4></th>
                   <th><h4 align="center" style="color:white;" >DELETE </h4></th>

                </tr>


                <tbody style="background-color: rgba(255,255,255,0.7);">
                @for ($i=0; $i <count($data) ; $i++)
                <tr>
                  <td>{{$data[$i]->getname()}}</td>
                   <td>{{$data[$i]->getemail()}}</td>

                  <td><form action="/edituserpass" method="POST">
                    <input class=" col-lg-8" type="text" name="password" value="">
                    
                      <input type="hidden" name="id" value="{{$data[$i]->getid()}}"></input>
                      <button type="submit" class="btn btn-success  ">SET</button>
                   </form></td>
                </td>


                <td>
                  <form action="/deleteuser" method="POST">
                      <input type="hidden" name="id" value="{{$data[$i]->getid()}}"></input>
                      <button type="submit" class="btn btn-danger  ">DELETE</button>
                   </form>
                </td>
                @endfor
             </thead>
             
             
             
         
             </tbody>
             </table>
            </div>
                
        
        </div>
  </div>
  </body>

</html>



