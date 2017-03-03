{include file="header.tpl"}

 <div class="container">

{if $error=='true'}
<div class="alert alert-danger">
  <strong>Failed!</strong> Please check your user name and password
</div>
{else}
{/if}

      <form class="form-signin" action="index.php?job=login" method="POST">
        <h2 class="form-signin-heading">Please Login</h2>
        <label class="sr-only">Username</label>
        <input type="text" id="inputEmail" class="form-control" placeholder="Username" name="username" required autofocus>
        <label for="inputPassword" class="sr-only">Password</label>
        <input type="password" id="inputPassword" class="form-control" placeholder="Password" name="password" required>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
      </form>



    </div>
{include file="footer.tpl"}