<?php
/* Smarty version 3.1.30, created on 2017-03-01 16:57:10
  from "/home/mauran/nginx/molini/modules/navigation.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_58b6b00e962f40_11044934',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '458bb92a58a3244f44a277b320c15fe00338bf8d' => 
    array (
      0 => '/home/mauran/nginx/molini/modules/navigation.tpl',
      1 => 1488367602,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_58b6b00e962f40_11044934 (Smarty_Internal_Template $_smarty_tpl) {
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


<nav
	class="navbar navbar-default navbar-static-top marginBottom-0"
	role="navigation">
	<div class="navbar-header">
		<button
			type="button"
			class="navbar-toggle"
			data-toggle="collapse"
			data-target="#navbar-collapse-1">
			<span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span>
			<span class="icon-bar"></span> <span class="icon-bar"></span>
		</button>
		<a
			class="navbar-brand"
			href="#"
			target="_blank"><?php echo $_smarty_tpl->tpl_vars['user_name']->value;?>
</a>
	</div>

	<div
		class="collapse navbar-collapse"
		id="navbar-collapse-1">
		<ul class="nav navbar-nav">
			<li class="active"><a href="#"><?php echo $_smarty_tpl->tpl_vars['page']->value;?>
</a></li>
			<li><a href="../../index.php?job=logout">Logout</a></li>
<li><a href="../create_job/create_job.php?job=create_job">Create Job</a></li>
<li><a href="../translate/translate.php?job=translate">Translate</a></li>
<li><a href="../view/view.php?job=view">View</a></li>
			<li class="dropdown dropdown-submenu"><a
				href="#"
				class="dropdown-toggle"
				data-toggle="dropdown">Settings</a>
				<ul class="dropdown-menu">
					<li><a href="../create_job/create_job.php?job=create_job">Create Job</a></li>
					<li><a href="../translate/translate.php?job=translate">Translate</a></li>
				</ul></li>

		</ul>
	</div>
	<!-- /.navbar-collapse -->
</nav>

<?php }
}
