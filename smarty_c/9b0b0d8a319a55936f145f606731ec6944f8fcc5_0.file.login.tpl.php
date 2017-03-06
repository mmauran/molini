<?php
/* Smarty version 3.1.30, created on 2017-03-06 21:22:18
  from "/var/www/html/molini/modules/login.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_58bd85b2b33238_18816786',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '9b0b0d8a319a55936f145f606731ec6944f8fcc5' => 
    array (
      0 => '/var/www/html/molini/modules/login.tpl',
      1 => 1488815436,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:login_header.tpl' => 1,
  ),
),false)) {
function content_58bd85b2b33238_18816786 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:login_header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>


<div class="login-box">
  <div class="login-logo">
    <a href="index.php"><b>MOLINI</b></a>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <?php if ($_smarty_tpl->tpl_vars['error']->value == 'true') {?>
      <p class="login-box-msg"><strong>Failed!</strong> Please check your user name and password</p>
    <?php } else { ?>
      <p class="login-box-msg">Sign in to start your session</p>
    <?php }?>

    

    <form action="index.php?job=login" method="post">
      <div class="form-group has-feedback">
        <input type="text" name="username" class="form-control" placeholder="User Name">
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

</body>
</html><?php }
}
