<?php
/* Smarty version 3.1.30, created on 2017-03-07 15:11:21
  from "/var/www/html/molini/modules/translate/horizontal.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_58be804124a684_41921425',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '78e6ec4ff477cc58b9219767774c49d626f3a937' => 
    array (
      0 => '/var/www/html/molini/modules/translate/horizontal.tpl',
      1 => 1488879677,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_58be804124a684_41921425 (Smarty_Internal_Template $_smarty_tpl) {
?>
<div class="col-md-6 source-box">
	<textarea
		class="form-control animated source-box"
		id="source_line_<?php echo $_smarty_tpl->tpl_vars['lines_array']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_results']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_results']->value['index'] : null)]['line_id'];?>
"
		name="source_line_<?php echo $_smarty_tpl->tpl_vars['lines_array']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_results']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_results']->value['index'] : null)]['line_id'];?>
"
		onblur="saveSourceLine(<?php echo $_smarty_tpl->tpl_vars['lines_array']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_results']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_results']->value['index'] : null)]['line_id'];?>
);"><?php echo $_smarty_tpl->tpl_vars['lines_array']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_results']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_results']->value['index'] : null)]['source_line'];?>
</textarea>
	<div class="row" style="margin-top: 2px; ">
		<div class="btn-group col-md-3">
			<button
				class="btn btn-default btn-xs"
				type="button"
				id="delete_button_<?php echo $_smarty_tpl->tpl_vars['lines_array']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_results']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_results']->value['index'] : null)]['line_id'];?>
"
				onclick="deleteLine(<?php echo $_smarty_tpl->tpl_vars['lines_array']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_results']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_results']->value['index'] : null)]['line_id'];?>
);">D</button>


		</div>
		
		<div class="s_timestamp_box col-md-9">
			<div class="row">
				<div class="col-md-6">
					<div id="source_saved_<?php echo $_smarty_tpl->tpl_vars['lines_array']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_results']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_results']->value['index'] : null)]['line_id'];?>
">
						<?php echo $_smarty_tpl->tpl_vars['lines_array']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_results']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_results']->value['index'] : null)]['source_updated'];?>
</div>
				</div>
				<div class="col-md-6">
					<?php if ($_smarty_tpl->tpl_vars['lines_array']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_results']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_results']->value['index'] : null)]['translation_available'] == 1) {?>
					<button
						type="button"
						class="btn  btn-default btn-xs"
						data-toggle="modal"
						data-target="#molini_lookup"
						onclick="lineSearchMoliniLookup('<?php echo $_smarty_tpl->tpl_vars['lines_array']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_results']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_results']->value['index'] : null)]['translation'];?>
');">Translations
						Available!</button>
					<?php } else { ?> <?php }?><a
						class="btn  btn-default btn-xs"
						href="https://translate.google.com/#auto/<?php echo mb_strtolower($_smarty_tpl->tpl_vars['job_array']->value['target_language'], 'UTF-8');?>
/<?php echo $_smarty_tpl->tpl_vars['lines_array']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_results']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_results']->value['index'] : null)]['source_line'];?>
"
						target="_blank"
						role="button">G</a>
				 </div>
			</div>
		</div>
	</div>
</div>
			<div class="col-md-6 target-box">
				<div class="row">

					<textarea
						tabindex="<?php echo $_smarty_tpl->tpl_vars['lines_array']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_results']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_results']->value['index'] : null)]['serial_order'];?>
"
						class="form-control animated"
						id="target_line_<?php echo $_smarty_tpl->tpl_vars['lines_array']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_results']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_results']->value['index'] : null)]['line_id'];?>
"
						name="target_line_<?php echo $_smarty_tpl->tpl_vars['lines_array']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_results']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_results']->value['index'] : null)]['line_id'];?>
"
						onblur="saveLine(<?php echo $_smarty_tpl->tpl_vars['lines_array']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_results']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_results']->value['index'] : null)]['line_id'];?>
);"><?php echo $_smarty_tpl->tpl_vars['lines_array']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_results']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_results']->value['index'] : null)]['target_line'];?>
</textarea>
				</div>
				<div class="row" style="margin-top: 2px; ">
					<div
						class="s_timestamp_box col-md-10"
						id="saved_<?php echo $_smarty_tpl->tpl_vars['lines_array']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_results']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_results']->value['index'] : null)]['line_id'];?>
">
						<?php echo $_smarty_tpl->tpl_vars['lines_array']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_results']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_results']->value['index'] : null)]['target_updated'];?>
</div>
					<div class="col-md-2" style="padding: 0;">
						<div class="btn-group" style="float: right;">
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


				</div>
			</div><?php }
}
