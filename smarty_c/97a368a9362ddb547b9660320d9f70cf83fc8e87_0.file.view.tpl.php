<?php
/* Smarty version 3.1.30, created on 2017-03-06 21:14:07
  from "/var/www/html/molini/modules/view/view.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_58bd83c78efa18_39650958',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '97a368a9362ddb547b9660320d9f70cf83fc8e87' => 
    array (
      0 => '/var/www/html/molini/modules/view/view.tpl',
      1 => 1488815043,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header.tpl' => 1,
    'file:navigation.tpl' => 1,
    'file:footer.tpl' => 1,
  ),
),false)) {
function content_58bd83c78efa18_39650958 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
 <?php $_smarty_tpl->_subTemplateRender("file:navigation.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
 
<?php echo '<script'; ?>
 type="text/javascript">

function copyToClipboard(element) {
  var $temp = $("<input>");
  $("body").append($temp);
  $temp.val($(element).text()).select();
  document.execCommand("copy");
  $temp.remove();

}
<?php echo '</script'; ?>
>



<div class="content-wrapper" style="min-height: 620px;">

	<div class="col-md-3" style="margin-top: 30px;">
		<div class="panel panel-default">
			<a data-toggle="collapse" href="#collapse2"><div class="panel-heading">
				Options
			</div></a>
			<div
				id="collapse2"
				class="panel-collapse collapse <?php if ($_smarty_tpl->tpl_vars['view_session_array']->value['submit'] == 'true') {?>out<?php } else { ?>in<?php }?>">
				<div class="panel-body">

					<form
						action="view.php?job=submit"
						method="POST">

						<div class="col-md-6 form-group">
							<input
								type="text"
								class="form-control"
								id="job_no"
								name="job_no"
								value="<?php echo $_smarty_tpl->tpl_vars['job_no']->value;?>
"
								placeholder="Job No">

						</div>
						<div class="col-md-2">
							<button
								type="submit"
								class="btn btn-default ">Submit</button>
						</div>
					</form>
				</div>



			</div>
		</div>
	</div>
	<div class="col-md-9" style="margin-top: 30px;">
		<div class="panel panel-default">
			<a data-toggle="collapse" href="#collapse3"><div class="panel-heading">
				Staticstics
			</div></a>
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
	<?php if ($_smarty_tpl->tpl_vars['view_session_array']->value['submit'] == 'true') {?>
	<div class="row">
		<div class="col-md-6">
			
				<section class="content">
					
					<div class="box box-default">
						<div class="box-header with-border">
							<h3 class="box-title">Source &nbsp;</h3>
							<button	type="button" class="btn  btn-primary btn-sm"	onclick="copyToClipboard('#source')">Copy Text</button>
							
						</div>
						<div class="box-body" id="source">
							<?php echo $_smarty_tpl->tpl_vars['view_array']->value['source_text'];?>

						</div>
						<!-- /.box-body -->
					</div>
					<!-- /.box -->
				</section>
		</div>
		<div class="col-md-6">
		
			<section class="content">
				
				<div class="box box-default">
					<div class="box-header with-border">
						<h3 class="box-title">Translation &nbsp;</h3>
						<button	type="button" class="btn  btn-primary btn-sm"	onclick="copyToClipboard('#target')">Copy Text</button>
						
					</div>
					<div class="box-body" id="target">
						<?php echo $_smarty_tpl->tpl_vars['view_array']->value['target_text'];?>

					</div>
					<!-- /.box-body -->
				</div>
				<!-- /.box -->
			</section>
		</div>

	</div>
	<?php }?>
</div>


	<?php $_smarty_tpl->_subTemplateRender("file:footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
