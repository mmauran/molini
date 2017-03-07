<?php
/* Smarty version 3.1.30, created on 2017-03-07 14:09:41
  from "/var/www/html/molini/modules/navigation.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_58be71cd3b9bd3_74106545',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '66a77fe2dfdce88f6fdfc53d786f4c18ecf0c612' => 
    array (
      0 => '/var/www/html/molini/modules/navigation.tpl',
      1 => 1488875977,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_58be71cd3b9bd3_74106545 (Smarty_Internal_Template $_smarty_tpl) {
?>

<?php echo '<script'; ?>
 type="text/javascript">
(function($){
	$(document).ready(function(){
		$('ul.dropdown-menu [data-toggle=dropdown]').on('click', function(event) {
			event.preventDefault(); 
			event.stopPropagation(); 
			$(this).parent().siblings().removeClass('open');
			$(this).parent().toggleClass('open');
		});
	});
})(jQuery);
<?php echo '</script'; ?>
>


<header class="main-header">
    <!-- Logo -->
    <a href="../../index.php" class="logo" style="background-color: #3c8dbc;">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>Molini</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>MOLINI TRANSLATE</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <div class="collapse navbar-collapse pull-left" id="navbar-collapse">
          <ul class="nav navbar-nav">
            <li <?php if ($_smarty_tpl->tpl_vars['page']->value == "Create Job") {?>class="active"<?php }?>><a href="../create_job/create_job.php?job=create_job"><i class="fa fa-plus" aria-hidden="true"></i>&nbsp; Create Job</a></li>
			<li <?php if ($_smarty_tpl->tpl_vars['page']->value == "Translate") {?>class="active"<?php }?>><a href="../translate/translate.php?job=translate"><i class="fa fa-exchange" aria-hidden="true"></i>&nbsp; Translate</a></li>
			<li <?php if ($_smarty_tpl->tpl_vars['page']->value == "View") {?>class="active"<?php }?>><a href="../view/view.php?job=view"><i class="fa fa-eye" aria-hidden="true"></i>&nbsp;  View</a></li>
			<li <?php if ($_smarty_tpl->tpl_vars['page']->value == "Settings") {?>class="dropdown dropdown-submenu active" <?php } else { ?> class="dropdown dropdown-submenu"<?php }?>>
				<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-cogs" aria-hidden="true"></i>&nbsp; Settings</a>
				<ul class="dropdown-menu">
					<li><a href="../create_job/create_job.php?job=create_job">Create Job</a></li>
					<li><a href="../translate/translate.php?job=translate">Translate</a></li>
				</ul>
			</li>
			</ul>
          
        </div>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- Messages: style can be found in dropdown.less-->
          
          <!-- Notifications: style can be found in dropdown.less -->
          
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-user" aria-hidden="true"></i>&nbsp; <span class="hidden-xs"><?php echo $_smarty_tpl->tpl_vars['username']->value;?>
 (My Account)</span>
            </a>
            
          <!-- Control Sidebar Toggle Button -->
          <li <?php if ($_smarty_tpl->tpl_vars['page']->value == "Logout") {?>class="active"<?php }?>><a href="../../index.php?job=logout"><i class="fa fa-sign-out" aria-hidden="true"></i>&nbsp; Logout</a></li>
          
        </ul>
      </div>
    </nav>
	
    <!-- Header Navbar: style can be found in header.less -->
    
  </header><?php }
}
