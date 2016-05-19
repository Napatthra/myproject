
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
            <h2 style="color:#003757;"><b>MY&nbsp;&nbsp; INTEREST&nbsp;&nbsp; AREAS</b></h2>

            <table class="table table-bordered" >
             <thead >
                <!-- <tr style="background-color: #c2bba9;"> -->
                <tr style="background-color: #c2bba9;">
                  <th><h4 align="center" style="color:white;" >NAME OF LOCATION</h4></th>
                   <th><h4 align="center" style="color:white;" >FIRST COORDINATE</h4></th>
                   <th><h4 align="center" style="color:white;" >SECOND COORDINATE</h4></th>
                   
                   <th><h4 align="center" style="color:white;" >START DATE</h4></th>
                   <th><h4 align="center" style="color:white;" >END DATE</h4></th>
                   <th><h4 align="center" style="color:white;" >SELECT RESULT</h4></th>
                   <th><h4 align="center" style="color:white;" >DELETE</h4></th>
                </tr>
             </thead>
             
             <tbody style="background-color: rgba(255,255,255,0.7);">
                
                @for ($i=0; $i <count($data) ; $i++)
                <tr>
                  <td>{{$data[$i]->getname()}}</td>
                  <td>({{$data[$i]->getlat1()}},{{$data[$i]->getlng1()}})</td>
                   <td>({{$data[$i]->getlat2()}},{{$data[$i]->getlng2()}})</td>
                   
                   <td>{{$date2[$i][0]}}</td>
                   <td>
                   @for ($j=1; $j <count($date2[$i]) ; $j++)
                    {{$date2[$i][$j]}}<br>
                   @endfor
                   </td>
                   <td>
                    <form action="/seeinter" method="POST">
                      <input type="hidden" name="id_intarea" value="{{$data[$i]->getid_intarea()}}"></input>
                      <button type="submit" class="btn btn-success  ">SELECT RESULT</button>
                   </form>
                  </td>
                   <td>
                   <form action="/deleteinter" method="POST">
                      <input type="hidden" name="id_intarea" value="{{$data[$i]->getid_intarea()}}"></input>
                      <button type="submit" class="btn btn-danger  ">DELETE</button>
                   </form>
                 </td>
                  </tr>
                @endfor
                <!-- <tr>
                   <td>Sachin</td>
                   <td>400003</td>
                    <td>KMITL</td>
                   <td>10-02-2011</td>
                   <td>15-04-2011<br>15-04-2011<br>15-04-2011<br>15-04-2011</td>
                   <td><input class="btn btn-success" type=button value="SELECT RESULT"></td>
                   <td><input class="btn btn-danger" type=button value="DELETE"></td>
                </tr>
                
                <tr>
                   <td>Uma</td>
                   <td>411027</td>
                    <td>KMITL</td>
                   <td>10-02-2011</td>
                   <td>15-04-2011</td>
                   <td><input class="btn btn-success" type=button value="SELECT RESULT"></td>
                   <td><input class="btn btn-danger" type=button value="DELETE"></td>
                </tr> -->
             </tbody>
             </table>
            </div>
                
        
        </div>
  
  </body>

</html>



