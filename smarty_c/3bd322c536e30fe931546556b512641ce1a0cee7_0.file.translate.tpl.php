<?php
/* Smarty version 3.1.30, created on 2017-03-06 21:22:26
  from "/var/www/html/molini/modules/translate/translate.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_58bd85ba9e2b15_85324802',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '3bd322c536e30fe931546556b512641ce1a0cee7' => 
    array (
      0 => '/var/www/html/molini/modules/translate/translate.tpl',
      1 => 1488815531,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header.tpl' => 1,
    'file:navigation.tpl' => 1,
    'file:horizontal.tpl' => 1,
    'file:footer.tpl' => 1,
  ),
),false)) {
function content_58bd85ba9e2b15_85324802 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
 <?php $_smarty_tpl->_subTemplateRender("file:navigation.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<style>
.affix {
     z-index: 9999 !important;
}
	
</style>


<link
	rel="stylesheet"
	href="../../css/system_style.css">
<?php echo '<script'; ?>
>
			$(function(){
				$('.normal').autosize();
				$('.animated').autosize();
			});
<?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 type="text/javascript">
function saveLine(line_id) {

var target_line = document.getElementById('target_line_'+line_id).value;
target_line = target_line.replace(/\r?\n/g, '<br />');
getJSON("translate.php?job=save&line_id="+line_id+"&target_line="+target_line,
function(err, data) {
  if (err != null) {
  } else {
    document.getElementById('saved_'+line_id).innerHTML = (data.text);
	document.getElementById('translated_percentage').innerHTML = (data.translated_percentage);
	document.getElementById('completed_percentage').innerHTML = (data.completed_percentage);   

if(data.line_status == 'PENDING' && target_line != ''){

getJSON("translate.php?job=change_status&line_id="+line_id+"&line_status=COMPLETE&button_name=complete",
function(err, data) {
  if (err != null) {
  } else {
	document.getElementById('pending_button_'+line_id).classList.remove('btn-primary');
	document.getElementById('pending_button_'+line_id).classList.add('btn-default');
	document.getElementById('complete_button_'+line_id).classList.remove('btn-default');
	document.getElementById('complete_button_'+line_id).classList.add('btn-success');
  }
});

}
else{
}
  }
});
}
<?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 type="text/javascript">
function saveSourceLine(line_id) {

var source_line = document.getElementById('source_line_'+line_id).value;
getJSON("translate.php?job=save_source&line_id="+line_id+"&source_line="+source_line,
function(err, data) {
  if (err != null) {
  } else {

    document.getElementById('source_saved_'+line_id).innerHTML = (data.text);    
  }
});
}
<?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 type="text/javascript">

function dictSearchTaWiktionary() {
var search_text = document.getElementById('search_text').value;
document.getElementById('ta_wiktionary_results').innerHTML = ("Fetching.."); 
getJSON("translate.php?job=dict_search_ta_wiktionary&search_text="+search_text,
function(err, data) {
  if (err != null) {
  } else {

    document.getElementById('ta_wiktionary_results').innerHTML = (data.text);

if(data.result == 0){

getJSON("translate.php?job=save_dict&term="+search_text,
function(err, data2) {
  if (err != null) {
  } else {

document.getElementById('ta_wiktionary_results').innerHTML = (data.add_wiki_text);
  }
});


}
else{}
 
  }
});
}
<?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 type="text/javascript">
function dictSearchEnWiktionary() {
var search_text = document.getElementById('search_text').value;
document.getElementById('en_wiktionary_results').innerHTML = ("Fetching..");
getJSON("translate.php?job=dict_search_en_wiktionary&search_text="+search_text,
function(err, data) {
  if (err != null) {
  } else {

    document.getElementById('en_wiktionary_results').innerHTML = (data.text); 
  }
});
}
<?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 type="text/javascript">
function dictSearchMoliniLookup() {
var search_text = document.getElementById('search_text').value;
document.getElementById('molini_lookup_results').innerHTML = ("Fetching..");
getJSON("translate.php?job=dict_search_molini_lookup&search_text="+search_text,
function(err, data) {
  if (err != null) {
  } else {

    document.getElementById('molini_lookup_results').innerHTML = (data.text); 
  }
});
}
<?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 type="text/javascript">
function lineSearchMoliniLookup(text) {

    document.getElementById('molini_lookup_results').innerHTML = (text); 

}
<?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 type="text/javascript">
function dictSearchMadura() {
var search_text = document.getElementById('search_text').value;
document.getElementById('madura_results').innerHTML = ("Fetching..");
getJSON("translate.php?job=dict_search_madura&search_text="+search_text,
function(err, data) {
  if (err != null) {
  } else {

    document.getElementById('madura_results').innerHTML = (data.text); 
  }
});
}
<?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 type="text/javascript">
function changeStatus(line_id, line_status, button_name) {
var b_pending = document.getElementById('pending_button_'+line_id);
var b_complete = document.getElementById('complete_button_'+line_id);
var b_fuzzy = document.getElementById('fuzzy_button_'+line_id);

getJSON("translate.php?job=change_status&line_id="+line_id+"&line_status="+line_status+"&button_name="+button_name,
function(err, data) {
  if (err != null) {
  } else {
if(data.unchanged=='true'){
}
else{
b_pending.classList.remove(data.pending_remove);
b_complete.classList.remove(data.complete_remove);
b_fuzzy.classList.remove(data.fuzzy_remove);

b_pending.classList.add(data.pending_add);
b_complete.classList.add(data.complete_add);
b_fuzzy.classList.add(data.fuzzy_add);
}
  }
});
}
<?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 type="text/javascript">
function deleteLine(line_id) {
getJSON("translate.php?job=delete_line&line_id="+line_id,
function(err, data) {
  if (err != null) {
  } else {

if(data.text=="Fail"){
document.getElementById('source_saved_'+line_id).innerHTML = ("Failed: Contains text");
}
else{
    var row = document.getElementById('row_'+line_id);
    row.parentNode.removeChild(row);
}

  }
});
}
<?php echo '</script'; ?>
>
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





<div class="container" data-spy="affix" style="background-color: #c7c7c7; padding-top: 5px; margin-top: 50px; width: 100%; height: 40px;">
	<div class="col-lg-2">
		<div class="panel panel-default ">
			<a data-toggle="collapse" href="#collapse2"><div class="panel-heading" style="height: 30px; padding-top: 4px;">
				Options
			</div></a>
			<div id="collapse2" class="panel-collapse collapse <?php if ($_smarty_tpl->tpl_vars['translate_array']->value['submit'] == 'true') {?>out<?php } else { ?>in<?php }?>">
				<div class="panel-body" style="z-index: 5000;">
					<form action="translate.php?job=submit" method="POST">
						<div class="form-group col-lg-9">
							<input type="text" class="form-control small_panel" id="job_no" name="job_no" value="<?php echo $_smarty_tpl->tpl_vars['job_no']->value;?>
" placeholder="Job No">
						</div>

						<div class="form-group col-lg-3">
							<button type="submit" class="btn btn-default btn-sm">Go</button>
						</div>
					</form>
					<hr>
					<div>
						<button class="btn btn-primary btn-block btn-sm">Vertical View</button>
						<button class="btn btn-primary btn-block btn-sm">Horizontal View</button>
					</div>


				</div>
			</div>
		</div>	
	</div>
	<div class="col-lg-1">
		
	</div>
	<div class="col-lg-2">
		<div class="form-group">
			<input type="text" class="form-control input-sm" id="search_text" name="search_text" placeholder="Search..">
		</div>
	</div>
	<div class="col-lg-4" style="padding-top: 4px;">
		<button
			type="button"
			class="btn  btn-default btn-xs"
			data-toggle="modal"
			data-target="#ta_wiktionary"
			onclick="dictSearchTaWiktionary();">Tamil Wiktionary</button>
		<button
			type="button"
			class="btn  btn-default btn-xs"
			data-toggle="modal"
			data-target="#en_wiktionary"
			onclick="dictSearchEnWiktionary();">English Wiktionary</button>
		<button
			type="button"
			class="btn  btn-default btn-xs"
			data-toggle="modal"
			data-target="#molini_lookup"
			onclick="dictSearchMoliniLookup();">Molini Lookup</button>
		<button
			type="button"
			class="btn  btn-default btn-xs"
			data-toggle="modal"
			data-target="#madura"
			onclick="dictSearchMadura();">Madura</button>
	</div>
	<div class="col-lg-3" style="padding-top: 4px;">

		<button
			type="button"
			class="btn btn-default btn-xs">
			Translated <span
				class="badge"
				id="translated_percentage"><?php echo $_smarty_tpl->tpl_vars['translate_array']->value['translated_percentage'];?>
</span>
		</button>
		<button
			type="button"
			class="btn btn-default btn-xs">
			Completed <span
				class="badge"
				id="completed_percentage"><?php echo $_smarty_tpl->tpl_vars['translate_array']->value['completed_percentage'];?>
</span>
		</button>

	</div>

</div>


<div class="container col-lg-12" style="margin-top: 100px; margin-bottom: 10px;">
	
	<button type="button" class="btn  btn-primary btn-xs" data-toggle="modal"
		data-target="#view_job"
		onclick="viewJob(<?php echo $_smarty_tpl->tpl_vars['translate_array']->value['job_no'];?>
);">PREVIEW</button>
	<button
		type="button"
		class="btn btn-primary btn-xs"
		data-toggle="modal"
		data-target="#view_job"
		onclick="viewJob(<?php echo $_smarty_tpl->tpl_vars['translate_array']->value['job_no'];?>
);">
		<span class="badge">Job No: <?php echo $_smarty_tpl->tpl_vars['translate_array']->value['job_no'];?>
</span>
		<?php echo $_smarty_tpl->tpl_vars['translate_array']->value['job_name'];?>

	</button>

</div>

<br />
<div class="container" style="min-height: 600px;">

		<?php
$__section_results_0_saved = isset($_smarty_tpl->tpl_vars['__smarty_section_results']) ? $_smarty_tpl->tpl_vars['__smarty_section_results'] : false;
$__section_results_0_loop = (is_array(@$_loop=$_smarty_tpl->tpl_vars['lines_array']->value) ? count($_loop) : max(0, (int) $_loop));
$__section_results_0_total = $__section_results_0_loop;
$_smarty_tpl->tpl_vars['__smarty_section_results'] = new Smarty_Variable(array());
if ($__section_results_0_total != 0) {
for ($__section_results_0_iteration = 1, $_smarty_tpl->tpl_vars['__smarty_section_results']->value['index'] = 0; $__section_results_0_iteration <= $__section_results_0_total; $__section_results_0_iteration++, $_smarty_tpl->tpl_vars['__smarty_section_results']->value['index']++){
?>

		<div	class="row" id="row_<?php echo $_smarty_tpl->tpl_vars['lines_array']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_results']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_results']->value['index'] : null)]['line_id'];?>
">

		<?php $_smarty_tpl->_subTemplateRender("file:horizontal.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>


		

		</div>

		<?php if ($_smarty_tpl->tpl_vars['lines_array']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_results']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_results']->value['index'] : null)]['para_break'] == 'true') {?>
		<hr>
		<?php } else { ?> <br /> <?php }?> <?php
}
}
if ($__section_results_0_saved) {
$_smarty_tpl->tpl_vars['__smarty_section_results'] = $__section_results_0_saved;
}
?>

</div>

<!-- Modal -->
<div
	id="ta_wiktionary"
	class="modal fade"
	role="dialog">
	<div class="modal-dialog">

		<!-- Modal content-->
		<div class="modal-content">
			<div class="modal-header">
				<button
					type="button"
					class="close"
					data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Tamil Wiktionary</h4>
			</div>
			<div class="modal-body">
				<div id="ta_wiktionary_results"></div>
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



<!-- Modal -->
<div
	id="en_wiktionary"
	class="modal fade"
	role="dialog">
	<div class="modal-dialog">

		<!-- Modal content-->
		<div class="modal-content">
			<div class="modal-header">
				<button
					type="button"
					class="close"
					data-dismiss="modal">&times;</button>
				<h4 class="modal-title">English Wiktionary</h4>
			</div>
			<div class="modal-body">
				<div id="en_wiktionary_results"></div>
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

<!-- Modal -->
<div
	id="molini_lookup"
	class="modal fade"
	role="dialog">
	<div class="modal-dialog">

		<!-- Modal content-->
		<div class="modal-content">
			<div class="modal-header">
				<button
					type="button"
					class="close"
					data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Molini Lookup</h4>
			</div>
			<div class="modal-body">
				<div id="molini_lookup_results"></div>
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

<!-- Modal -->
<div
	id="madura"
	class="modal fade"
	role="dialog">
	<div class="modal-dialog">

		<!-- Modal content-->
		<div class="modal-content">
			<div class="modal-header">
				<button
					type="button"
					class="close"
					data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Madura Online</h4>
			</div>
			<div class="modal-body">
				<div id="madura_results"></div>
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
