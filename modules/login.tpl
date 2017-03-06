{include file="login_header.tpl"}

<div class="login-box">
  <div class="login-logo">
    <a href="index.php"><b>MOLINI</b></a>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    {if $error=='true'}
      <p class="login-box-msg"><strong>Failed!</strong> Please check your user name and password</p>
    {else}
      <p class="login-box-msg">Sign in to start your session</p>
    {/if}

    

    <form action="index.php?job=login" method="post">
      <div class="form-group has-feedback">
        <input type="text" name="username" class="form-control" placeholder="Email">
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" name="password" class="form-control" placeholder="Password">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="row">
        <div class="col-xs-8">
          <a href="#">I forgot my password</a><br>
          <a href="#" class="text-center">Request a new membership</a>
        </div>
        <!-- /.col -->
        <div class="col-xs-4">
          <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
        </div>
        <!-- /.col -->
      </div>
    </form>

    
    <!-- /.social-auth-links -->

    

  </div>
  <!-- /.login-box-body -->
</div>

{include file="footer.tpl"}