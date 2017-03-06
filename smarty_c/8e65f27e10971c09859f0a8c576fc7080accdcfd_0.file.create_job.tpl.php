<?php
/* Smarty version 3.1.30, created on 2017-03-06 14:52:35
  from "/var/www/html/molini/modules/create_job/create_job.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_58bd2a5b5f8de2_87776336',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '8e65f27e10971c09859f0a8c576fc7080accdcfd' => 
    array (
      0 => '/var/www/html/molini/modules/create_job/create_job.tpl',
      1 => 1488790883,
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
function content_58bd2a5b5f8de2_87776336 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
 <?php $_smarty_tpl->_subTemplateRender("file:navigation.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
 
<?php echo '<script'; ?>
 type="text/javascript">
function viewJob(job_no) {
document.getElementById('view_job_results').innerHTML = ("Fetching.."); 
getJSON("../view/view.php?job=preview&job_no="+job_no,
function(err, data) {
  if (err != null) {
  } else {

    document.getElementById('view_job_results').innerHTML = (data.text); 
  }
});
}
<?php echo '</script'; ?>
>


<div class="container">
	<div class="panel panel-default">
		<div class="panel-heading">
			<a
				data-toggle="collapse"
				href="#collapse2">Create Job</a>
		</div>
		<div
			id="collapse2"
			class="panel-collapse collapse out">
			<div class="panel-body">

				<form
					action="create_job.php?job=submit"
					method="POST">
					<div class="row">

						<div class="col-md-2 form-group">
							<label for="job_no">Job No</label> <input
								type="text"
								class="form-control"
								id="job_no"
								name="job_no"
								value="<?php echo $_smarty_tpl->tpl_vars['job_no']->value;?>
"
								readonly>

						</div>

						<div class="col-md-10 form-group">
							<label for="job_name">Title</label> <input
								type="text"
								class="form-control"
								id="job_name"
								name="job_name"
								value="<?php echo $_smarty_tpl->tpl_vars['job_name']->value;?>
"
								placeholder="Title"
								required>

						</div>

					</div>
					<div class="row">

						<div class="col-md-2 form-group">
							<label for="source_language">Source Lanuage</label> <select
								class="form-control"
								id="source_language"
								name="source_language">

								<option>EN</option>
								<option>TA</option>
								<option>SI</option>
							</select>
						</div>

						<div class="col-md-2 form-group">
							<label for="target_language">Target Lanuage</label> <select
								class="form-control"
								id="target_language"
								name="target_language">

								<option>EN</option>
								<option>TA</option>
								<option>SI</option>
							</select>
						</div>

						<div class="col-md-2 form-group">
							<label for="target_language">Privacy</label> <select
								class="form-control"
								id="privacy"
								name="privacy">
								<option>PUBLIC</option>
								<option>GROUP</option>
								<option>PRIVATE</option>
							</select>
						</div>

						<div class="col-md-2 form-group">
							<label for="break_by">Break By</label> <select
								class="form-control"
								id="break_by"
								name="break_by">
								<option>SENTENCE</option>
								<option>PARAGRAPH</option>
								<option>POEM MODE</option>
							</select>
						</div>
					</div>

					<div class="row">
						<div class="col-md-12 form-group">
							<label for="source_text">Source Text</label>
							<textarea
								class="form-control"
								id="source_text"
								name="source_text"
								value="<?php echo $_smarty_tpl->tpl_vars['source_text']->value;?>
"
								placeholder="Source Text"
								required>
</textarea>
						</div>
					</div>
					<div class="row">
						<div class="col-md-2">
							<button
								type="submit"
								class="btn btn-default ">Submit</button>
						</div>
					</div>
			
			</div>

			</form>

		</div>
	</div>

</div>

<hr>

<div class="container">

	<?php
$__section_job_0_saved = isset($_smarty_tpl->tpl_vars['__smarty_section_job']) ? $_smarty_tpl->tpl_vars['__smarty_section_job'] : false;
$__section_job_0_loop = (is_array(@$_loop=$_smarty_tpl->tpl_vars['job_array']->value) ? count($_loop) : max(0, (int) $_loop));
$__section_job_0_total = $__section_job_0_loop;
$_smarty_tpl->tpl_vars['__smarty_section_job'] = new Smarty_Variable(array());
if ($__section_job_0_total != 0) {
for ($__section_job_0_iteration = 1, $_smarty_tpl->tpl_vars['__smarty_section_job']->value['index'] = 0; $__section_job_0_iteration <= $__section_job_0_total; $__section_job_0_iteration++, $_smarty_tpl->tpl_vars['__smarty_section_job']->value['index']++){
$_smarty_tpl->tpl_vars['__smarty_section_job']->value['first'] = ($__section_job_0_iteration == 1);
$_smarty_tpl->tpl_vars['__smarty_section_job']->value['last'] = ($__section_job_0_iteration == $__section_job_0_total);
?> <?php if ((isset($_smarty_tpl->tpl_vars['__smarty_section_job']->value['first']) ? $_smarty_tpl->tpl_vars['__smarty_section_job']->value['first'] : null)) {?>

	<table
		class="table table-condensed table-bordered table-striped table-hover table-sm table-responsive">
		<thead class="thead-default">
			<th>#</th>
			<th>Translate</th>
			<th>View</th>
			<th>Job.No</th>
			<th>S</th>
			<th>T</th>
			<th>Title</th>
			<th>Created</th>
			<th>Translated</th>
			<th>Completed</th>
			<th>Privacy</th>
			<th>Edit</th>
			<th>Delete</th>
		</thead>
		<tbody>
			<?php } else {
}?>
			<tr>
				<td><?php echo $_smarty_tpl->tpl_vars['job_array']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_job']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_job']->value['index'] : null)]['serial_order'];?>
</td>
				<td><a
					class="btn  btn-primary btn-xs"
					href="../translate/translate.php?job=submit&job_no=<?php echo $_smarty_tpl->tpl_vars['job_array']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_job']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_job']->value['index'] : null)]['job_no'];?>
"
					role="button">TRANSLATE</a></td>
				<td><button
						type="button"
						class="btn  btn-default btn-xs"
						data-toggle="modal"
						data-target="#view_job"
						onclick="viewJob(<?php echo $_smarty_tpl->tpl_vars['job_array']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_job']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_job']->value['index'] : null)]['job_no'];?>
);">VIEW</button></td>
				<td><?php echo $_smarty_tpl->tpl_vars['job_array']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_job']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_job']->value['index'] : null)]['job_no'];?>
</td>
				<td><?php echo $_smarty_tpl->tpl_vars['job_array']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_job']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_job']->value['index'] : null)]['source_language'];?>
</td>
				<td><?php echo $_smarty_tpl->tpl_vars['job_array']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_job']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_job']->value['index'] : null)]['target_language'];?>
</td>
				<td class="text-nowrap"><?php echo $_smarty_tpl->tpl_vars['job_array']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_job']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_job']->value['index'] : null)]['job_name'];?>
</td>
				<td><?php echo $_smarty_tpl->tpl_vars['job_array']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_job']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_job']->value['index'] : null)]['created'];?>
</td>
				<td><?php echo $_smarty_tpl->tpl_vars['job_array']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_job']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_job']->value['index'] : null)]['translated'];?>
%</td>
				<td><?php echo $_smarty_tpl->tpl_vars['job_array']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_job']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_job']->value['index'] : null)]['completed'];?>
%</td>
				<td><?php echo $_smarty_tpl->tpl_vars['job_array']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_job']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_job']->value['index'] : null)]['privacy'];?>
</td>
				<td></td>
				<td></td>
			</tr>

			<?php if ((isset($_smarty_tpl->tpl_vars['__smarty_section_job']->value['last']) ? $_smarty_tpl->tpl_vars['__smarty_section_job']->value['last'] : null)) {?>
		</tbody>
	</table>
	<?php } else {
}?> <?php
}
}
if ($__section_job_0_saved) {
$_smarty_tpl->tpl_vars['__smarty_section_job'] = $__section_job_0_saved;
}
?>
</div>

<!-- Modal -->
<div
	id="view_job"
	class="modal fade"
	role="dialog">
	<div class="modal-dialog modal-lg">

		<!-- Modal content-->
		<div class="modal-content">
			<div class="modal-header">
				<button
					type="button"
					class="close"
					data-dismiss="modal">&times;</button>
				<h4 class="modal-title">View</h4>
			</div>
			<div class="modal-body">
				<div id="view_job_results"></div>
			</div>
			<div class="modal-footer">
				<button
					type="button"
					class="btn btn-default"
					data-dismiss="modal">Close</button>
			</div>
		</div>

	</div>
</div>

<?php $_smarty_tpl->_subTemplateRender("file:footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<?php }
}
