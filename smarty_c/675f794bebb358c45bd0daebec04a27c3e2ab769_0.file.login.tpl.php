<?php
/* Smarty version 3.1.30, created on 2017-02-28 16:42:59
  from "/home/mauran/nginx/molini/modules/login.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_58b55b3b0a92f4_22063786',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '675f794bebb358c45bd0daebec04a27c3e2ab769' => 
    array (
      0 => '/home/mauran/nginx/molini/modules/login.tpl',
      1 => 1488280342,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header.tpl' => 1,
    'file:footer.tpl' => 1,
  ),
),false)) {
function content_58b55b3b0a92f4_22063786 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>


 <div class="container">

<?php if ($_smarty_tpl->tpl_vars['error']->value == 'true') {?>
<div class="alert alert-danger">
  <strong>Failed!</strong> Please check your user name and password
</div>
<?php } else {
}?>

      <form class="form-signin" action="index.php?job=login" method="POST">
        <h2 class="form-signin-heading">Please Login</h2>
        <label class="sr-only">Username</label>
        <input type="text" id="inputEmail" class="form-control" placeholder="Username" name="username" required autofocus>
        <label for="inputPassword" class="sr-only">Password</label>
        <input type="password" id="inputPassword" class="form-control" placeholder="Password" name="password" required>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
      </form>



    </div>
<?php $_smarty_tpl->_subTemplateRender("file:footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
