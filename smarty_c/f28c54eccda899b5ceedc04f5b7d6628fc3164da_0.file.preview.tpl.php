<?php
/* Smarty version 3.1.30, created on 2017-03-01 16:10:55
  from "/home/mauran/nginx/molini/modules/view/preview.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_58b6a5373d3eb3_22454195',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'f28c54eccda899b5ceedc04f5b7d6628fc3164da' => 
    array (
      0 => '/home/mauran/nginx/molini/modules/view/preview.tpl',
      1 => 1488364718,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header.tpl' => 1,
    'file:footer.tpl' => 1,
  ),
),false)) {
function content_58b6a5373d3eb3_22454195 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
 

<div class="container-fluid">

	<div class="container-fluid col-md-6">
		<div class="panel panel-default">
			<div class="panel-heading">
				<a
					data-toggle="collapse"
					href="#collapse3">Staticstics</a>
			</div>
			<div
				id="collapse3"
				class="panel-collapse collapse out">
				<div class="panel-body">
<div class="well well-sm">Source Text Word Count : <strong><?php echo $_smarty_tpl->tpl_vars['view_array']->value['source_text_count'];?>
</strong></div>
<div class="well well-sm">Source Text Page Count : <strong><?php echo $_smarty_tpl->tpl_vars['view_array']->value['source_text_page'];?>
 (A4)</strong></div>
				</div>



			</div>
		</div>
	</div>
</div>


<div class="container-fluid">

<div class="col-md-6">

<?php echo $_smarty_tpl->tpl_vars['view_array']->value['source_text'];?>

</div>
<div class="col-md-6">
<?php echo $_smarty_tpl->tpl_vars['view_array']->value['target_text'];?>

</div>

</div>


	<?php $_smarty_tpl->_subTemplateRender("file:footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
