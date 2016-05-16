<html>
  <head>
    <title>Sign in</title>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
    <meta charset="utf-8">
    <link href="css/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
      <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    
    <style>
     
     .login {
        border-radius: 5px 5px 5px 5px;
        padding: 20px 20px 20px 20px;
        width: 90%;
        max-width: 320px;
        background: #ffffff;
        position: relative;
        padding-bottom: 80px;
        box-shadow: 0px 1px 5px rgba(0, 0, 0, 0.3);
      }

     .divb{
          border-radius: 8px 8px 8px 8px;
          background-color: rgba(255,255,255,0.5);
          /*width: 900px;*/
          height: 50%;
          /*margin: auto;*/
          margin-top:5%;
          margin-left:25%;
          width: 50%;    
          /*padding: 50px;*/
          box-shadow: 0px 1px 5px rgba(0, 0, 0, 0.7);
          
      }

      .divh {
        border-radius: 8px 8px 8px 8px;
        background-color: rgba(255,255,255,0.6);
        width: 130px;    
        padding: 0px;
        text-align: center;
        margin-top:40%;
        margin-bottom:5%;
        margin-left:27%;
        box-shadow: 0px 1px 5px rgba(0, 0, 0, 0.7);
    }

   

  

    h1 {
    text-align: center;
    }
    



    </style>
    <script src="js/jquery.js"></script>
  </head>


    <body style="background-image: url('bgs.jpg');">
    <nav class="navbar navbar-light  navbar-fixed-top" style="background-color: #666666;">
      <a class="navbar-brand" href="start"><font color="#ffffff"><i class="fa fa-child" style="font:#FFF;"></i>Environment Change Detection</font></a>
    </nav>
    <!-- <form class="divb"> -->
     <div class="row vertical-center-row">
    <section id="login">
        <div class="container">
          <div class="row">
              <div class="col-xs-offset-4">
                  <!-- <div class="form-wrap"> -->
                  <div class="col-xs-6">
                    <div class="divh">
                      <span style="color:#800000;">
                       <h2>Log in</h2>
                      </span>
                     </div>

                    
                        <form   action="{{url('login')}}" method="post" role="search">
                            <div class="form-group">
                                <label for="name" class="sr-only"><i class="fa fa-user"></i>Email</label>
                                <input type="text" name="email" id="email" class="form-control" placeholder="E-mail">
                                
                            </div>
                            <div class="form-group">
                                <label for="key" class="sr-only"><i class="fa fa-key"></i>Password</label>
                                <input type="password" name="password" id="password" class="form-control" placeholder="Password">
                                
                            </div>
                            <div class="col-xs-6">
                            <input type="submit" id="btn-login" class="btn btn-success btn-block btn-lg" value="Log in">
                            </div>
                            <div class="col-xs-6">
                              <a href="/register" class="btn btn-info btn-block btn-lg" role="button">Sign up</a>
                            <!-- <input type="submit" class="btn btn-info btn-block btn-lg" value="Sign up"> -->
                          </div>
                        </form>




                        <!-- <div class="pull-right"><a href="javascript:;"><h4>Sing up   </h4></a></div> -->
                  </div>      
                  <!-- </div> -->
            </div> <!-- /.col-xs-12 -->
           
          </div> <!-- /.row -->
        </div> <!-- /.container -->
    </section>
  </div>
  <!-- </form> -->

  </body>
</html>