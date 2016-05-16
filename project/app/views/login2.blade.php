<html> 

    <section id="login">
        <div class="container">
        
          <div class="row">
              <div class="col-xs-6">
                  <div class="form-wrap">
                    <h1>LOG IN....</h1>
                        <form action="{{url('login')}}" method="post" role="search">
                            <div class="form-group">
                                <label for="name" class="sr-only">Email</label>
                                <input type="text" name="email" id="email" class="form-control" placeholder="email">
                            </div>
                            <div class="form-group">
                                <label for="key" class="sr-only">Password</label>
                                <input type="password" name="password" id="password" class="form-control" placeholder="Password">
                            </div>
                            <input type="submit" id="btn-login" class="btn btn-success btn-block btn-lg" value="Log in">
                        </form>
                        <a href="javascript:;" class="forget" data-toggle="modal" data-target=".forget-modal">Forgot your password?</a>
                        <hr>
                  </div>
            </div> <!-- /.col-xs-12 -->
           
          </div> <!-- /.row -->
        </div> <!-- /.container -->
    </section>



</html>