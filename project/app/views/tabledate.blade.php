
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
        height: 420px;
        margin: auto;
        margin-top:0%;
        width: 75%;    
        padding: 50px;
        padding-left: 8%;
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





    <div class="container">

    <div class="divh" >
      <span style="color:#800000;">
        <h2>Select Date</h2>
      </span>
    </div>

  
</div>
</div>

    <div class="divb">  
       <p style="color:red;font-size:18px;margin:0;padding:10px 0px;text-align:center;">กรุณาเลือกช่วงปีที่สนใจ</p>

      <div class="dropdown" style="text-align: center;margin-left: 40%;">
        <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false" style="text-align: center;">Select year
        <span class="caret"></span></button>

        <?php
       
        $year=array();
        $year[0]=(substr($date[0],0,4));
        $j=1;
        for ($i=1; $i <count($date) ; $i++){
          if(substr($date[$i],0,4)!==$year[$j-1]){
           $year[$j]=substr($date[$i],0,4);
           $j++;
         }
        };
        ?>
        

        <ul class="dropdown-menu" >
          @for($i=0;$i<count($year);$i++)
          <li><label style="margin-left:10px;" class="checkbox-inline"><p><input type="checkbox" name="year" value="{{$year[$i]}}">{{$year[$i]}}</p></label></li>
          @endfor
          <!-- <li><label style="margin-left:10px;" class="checkbox-inline"><p><input type="checkbox" value="">2555</p></label></li>
          <li><label style="margin-left:10px;" class="checkbox-inline"><p><input type="checkbox" value="">2556</p></label></li> -->
        </ul>
      </div>
 
        <button type="button" class="btn btn-success" onclick="myFunction()">Search</button>
        
        

       



      <form id="date" name="date" method="post" action="/selectResult">
        <p style="color:red;font-size:18px;margin:0;padding:10px 0px;text-align:center;">กรุณาเลือกวันที่ที่สนใจ โดยระบบจะนำวันที่ที่เก่าที่สุดที่ผู้ใช้เลือกมาเป็นรูปภาพตั้งต้นในการเปรียบเทียบ</p>



        <div class="row">
         
         <!-- <label class="checkbox-inline" id="demo"></label> -->
         <p id="demo"></p>

          <div class="row">
          <div class="text-center">
            <input type="submit" value="NEXT" class="btn btn-primary"><br>
            <!-- <a href="selectResult" class="btn btn-primary" >NEXT<i class="fa fa-hand-o-left"></i></a> -->

          </div> 
        </div>
      </form>
    </div>
  </body>
</html>

<script>

function myFunction() {


  document.getElementById("demo").innerHTML = <?$year[0]?>;
}
</script>


 @for ($i=0; $i <count($date) ; $i++)
            <label class="checkbox-inline"><h3><input type="checkbox" name="date[]" value="{{$date[$i]}}">{{$date[$i]}}</h3></label>
          @endfor