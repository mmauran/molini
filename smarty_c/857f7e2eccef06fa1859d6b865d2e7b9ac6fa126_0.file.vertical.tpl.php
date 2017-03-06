<?php
/* Smarty version 3.1.30, created on 2017-03-06 12:17:36
  from "/home/mauran/nginx/molini/modules/translate/vertical.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_58bd06081f2ed4_48301813',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '857f7e2eccef06fa1859d6b865d2e7b9ac6fa126' => 
    array (
      0 => '/home/mauran/nginx/molini/modules/translate/vertical.tpl',
      1 => 1488782854,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_58bd06081f2ed4_48301813 (Smarty_Internal_Template $_smarty_tpl) {
?>
	<div class="source-box">
				<textarea
					class="form-control animated source-box"
					id="source_line_<?php echo $_smarty_tpl->tpl_vars['lines_array']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_results']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_results']->value['index'] : null)]['line_id'];?>
"
					name="source_line_<?php echo $_smarty_tpl->tpl_vars['lines_array']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_results']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_results']->value['index'] : null)]['line_id'];?>
"
					onblur="saveSourceLine(<?php echo $_smarty_tpl->tpl_vars['lines_array']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_results']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_results']->value['index'] : null)]['line_id'];?>
);"><?php echo $_smarty_tpl->tpl_vars['lines_array']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_results']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_results']->value['index'] : null)]['source_line'];?>
</textarea>
				<div class="row">
					<div class="btn-group col-md-1">
						<button
							class="btn btn-default btn-xs"
							type="button"
							id="delete_button_<?php echo $_smarty_tpl->tpl_vars['lines_array']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_results']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_results']->value['index'] : null)]['line_id'];?>
"
							onclick="deleteLine(<?php echo $_smarty_tpl->tpl_vars['lines_array']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_results']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_results']->value['index'] : null)]['line_id'];?>
);">D</button>


					</div>
<div class="col-md-6">
</div>
		<?php if ($_smarty_tpl->tpl_vars['lines_array']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_results']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_results']->value['index'] : null)]['translation_available'] == 1) {?>
						<button
							type="button"
							class="btn  btn-default btn-xs col-md-2"
							data-toggle="modal"
							data-target="#molini_lookup"
							onclick="lineSearchMoliniLookup('<?php echo $_smarty_tpl->tpl_vars['lines_array']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_results']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_results']->value['index'] : null)]['translation'];?>
');">Translations
							Available!</button>
						<?php } else { ?> 

<div class="col-md-2">
</div>
<?php }?>

					<div class="s_timestamp_box col-md-2">
						<div id="source_saved_<?php echo $_smarty_tpl->tpl_vars['lines_array']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_results']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_results']->value['index'] : null)]['line_id'];?>
">
							<?php echo $_smarty_tpl->tpl_vars['lines_array']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_results']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_results']->value['index'] : null)]['source_updated'];?>
</div>
				
					</div>
 <a
							class="btn  btn-default btn-xs col-md-1"
							href="https://translate.google.com/#auto/<?php echo mb_strtolower($_smarty_tpl->tpl_vars['job_array']->value['target_language'], 'UTF-8');?>
/<?php echo $_smarty_tpl->tpl_vars['lines_array']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_results']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_results']->value['index'] : null)]['source_line'];?>
"
							target="_blank"
							role="button">G</a>
				</div>
			</div>
			<div class="target-box">
				<div class="row">
<div class="col-md-12">
					<textarea
						tabindex="<?php echo $_smarty_tpl->tpl_vars['lines_array']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_results']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_results']->value['index'] : null)]['serial_order'];?>
"
						class="form-control animated "
						id="target_line_<?php echo $_smarty_tpl->tpl_vars['lines_array']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_results']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_results']->value['index'] : null)]['line_id'];?>
"
						name="target_line_<?php echo $_smarty_tpl->tpl_vars['lines_array']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_results']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_results']->value['index'] : null)]['line_id'];?>
"
						onblur="saveLine(<?php echo $_smarty_tpl->tpl_vars['lines_array']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_results']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_results']->value['index'] : null)]['line_id'];?>
);"><?php echo $_smarty_tpl->tpl_vars['lines_array']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_results']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_results']->value['index'] : null)]['target_line'];?>
</textarea>
</div>
				</div>
				<div class="row">
<div class="col-md-9">
</div>
					<div
						class="timestamp_box col-md-2"
						id="saved_<?php echo $_smarty_tpl->tpl_vars['lines_array']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_results']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_results']->value['index'] : null)]['line_id'];?>
">
						<?php echo $_smarty_tpl->tpl_vars['lines_array']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_results']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_results']->value['index'] : null)]['target_updated'];?>
</div>
					<div class="btn-group col-md-1 pull-right">
						<button
							class="btn <?php if ($_smarty_tpl->tpl_vars['lines_array']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_results']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_results']->value['index'] : null)]['line_status'] == 'PENDING') {?> btn-primary <?php } else { ?> btn-default <?php }?> btn-xs"
							type="button"
							id="pending_button_<?php echo $_smarty_tpl->tpl_vars['lines_array']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_results']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_results']->value['index'] : null)]['line_id'];?>
"
							onclick="changeStatus(<?php echo $_smarty_tpl->tpl_vars['lines_array']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_results']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_results']->value['index'] : null)]['line_id'];?>
, '<?php echo mb_strtolower($_smarty_tpl->tpl_vars['lines_array']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_results']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_results']->value['index'] : null)]['line_status'], 'UTF-8');?>
', 'pending');">P</button>
						<button
							class="btn <?php if ($_smarty_tpl->tpl_vars['lines_array']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_results']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_results']->value['index'] : null)]['line_status'] == 'FUZZY') {?> btn-warning <?php } else { ?> btn-default <?php }?> btn-xs"
							onclick="changeStatus(<?php echo $_smarty_tpl->tpl_vars['lines_array']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_results']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_results']->value['index'] : null)]['line_id'];?>
, '<?php echo mb_strtolower($_smarty_tpl->tpl_vars['lines_array']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_results']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_results']->value['index'] : null)]['line_status'], 'UTF-8');?>
', 'fuzzy');"
							type="button"
							id="fuzzy_button_<?php echo $_smarty_tpl->tpl_vars['lines_array']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_results']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_results']->value['index'] : null)]['line_id'];?>
">F</button>
						<button
							class="btn <?php if ($_smarty_tpl->tpl_vars['lines_array']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_results']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_results']->value['index'] : null)]['line_status'] == 'COMPLETE') {?> btn-success <?php } else { ?> btn-default <?php }?> btn-xs"
							onclick="changeStatus(<?php echo $_smarty_tpl->tpl_vars['lines_array']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_results']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_results']->value['index'] : null)]['line_id'];?>
, '<?php echo mb_strtolower($_smarty_tpl->tpl_vars['lines_array']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_results']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_results']->value['index'] : null)]['line_status'], 'UTF-8');?>
', 'complete');"
							type="button"
							id="complete_button_<?php echo $_smarty_tpl->tpl_vars['lines_array']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_results']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_results']->value['index'] : null)]['line_id'];?>
">C</button>

					</div>


				</div>
			</div><?php }
}
