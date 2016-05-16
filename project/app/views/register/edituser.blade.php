
{{ Form::open([
    "url" => "edituser",
    "method" => "POST",
    "files" => true,
    "class" => "form-register",
]) }}
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
        width: 140px;    
        padding: 0px;
        text-align: center;
        height: 38px;
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
          <li><a href="/info"><font color="#ffffff"><span class="glyphicon glyphicon-user"></span>
              <?php
              $id = Auth::user()->id;
              $u=new UserLogin;
              $name=$u->getById($id);
              ?>   {{$name->getname();}} &nbsp;&nbsp; </font></a></li>
          <!-- <a href="#" class="dropdown-toggle" data-toggle="dropdown"> {{$name=Auth::user()->userName}} <span class= "glyphicon glyphicon-user pull-right"></span></a> -->
                            
        @else 
        <li><a href="/login"><font color="#ffffff"><span class="glyphicon glyphicon-log-in"></span> Login &nbsp;&nbsp; </font></a></li>
        @endif
        </ul>
    </nav>

    <div class="box-login">
        <div class="divh">
            <span style="color:#800000;">
                <h2>Edit User</h2>
            </span>
        </div>
<!--_______________________________________________________ -->
<?php
$id = Auth::user()->id;
$u=new UserLogin;
$name=$u->getById($id);
?>  
<!--_______________________________________________________ -->
        <div class="divb">
       
        <table align="center">
            <p style="color:red;font-size:18px;margin:0;padding:10px 0px;text-align:center;">กรอกเฉพาะช่องที่ต้องการแก้ไข</p>
             <tr>
                <td style="text-align:left;" valign="bottom"><b>Name :</b></td>
                <td>
                   <b><?php echo $name->getname(); ?></b> 
                </td>
            </tr>

             <tr>
                <td style="text-align:left;" valign="bottom"></td>
                <td>
                    @if ($errors->has('name'))
                        <p style="color:red;font-size:14px;margin:0;padding:10px 0px;">
                            {{ $errors->first('name') }}
                        </p>
                    @endif
                </td>
            </tr>

            <tr>
                <td style="text-align:left;" valign="top"><br><label>New name : </label></td>
                <td>
                    {{ Form::text('name', Input::old('name'), [
                        'placeholder' => 'Name',
                        'class' => 'form-control',
                        'maxlength' => 100
                    ]) }}
                    @if ($errors->has('email'))
                        <p style="color:red;font-size:14px;margin:0;padding:10px 0px;">
                            {{ $errors->first('email') }}
                        </p>
                    @endif
                </td>
            </tr>
            <tr>
               
                <td>
                   
                    @if ($errors->has('password'))
                        <p style="color:red;font-size:14px;margin:0;padding:10px 0px;">
                            {{ $errors->first('password') }}
                        </p>
                    @endif
                </td>
            </tr>
            <tr>
                <td style="text-align:left;" valign="top"><br><label>New password : </label></td>
                <td>
                    {{ Form::password('password', [
                        'placeholder' => 'Password',
                        'class' => 'form-control',
                        'maxlength' => 15
                    ]) }}
                   
                </td>
            </tr>
           

            <!-- <tr>
                <td style="text-align:left;"></td>
                <td>{{ Form::submit('Create', ['class' => 'btn  btn-success']) }}</td>
            </tr> -->
        </table><br>
        
        <div style="text-align: left;padding-left:19%;">
            <button type="button" class="btn btn-primary">Connect facebook</button>
        </div>
        <div style="height:1em"></div>
        <div style="text-align: center;">
            {{ Form::submit('Update', ['class' => 'btn  btn-success']) }}
        </div>
    </div>
</div>

</body>

</html>
{{ Form::close() }}
