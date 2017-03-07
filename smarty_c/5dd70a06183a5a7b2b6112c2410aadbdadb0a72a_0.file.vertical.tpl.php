<?php
/* Smarty version 3.1.30, created on 2017-03-07 15:48:10
  from "/var/www/html/molini/modules/translate/vertical.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_58be88e2085ea4_79228201',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '5dd70a06183a5a7b2b6112c2410aadbdadb0a72a' => 
    array (
      0 => '/var/www/html/molini/modules/translate/vertical.tpl',
      1 => 1488881879,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_58be88e2085ea4_79228201 (Smarty_Internal_Template $_smarty_tpl) {
?>
<div class="col-lg-12" style="margin-left: 1%;">
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
			<div class="s_timestamp_box col-md-9">
				<div id="source_saved_<?php echo $_smarty_tpl->tpl_vars['lines_array']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_results']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_results']->value['index'] : null)]['line_id'];?>
">
					<?php echo $_smarty_tpl->tpl_vars['lines_array']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_results']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_results']->value['index'] : null)]['source_updated'];?>
</div>
		
			</div>
			<div class="col-md-2">
				<div class="btn-group" style="float: right;">
					<?php if ($_smarty_tpl->tpl_vars['lines_array']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_results']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_results']->value['index'] : null)]['translation_available'] == 1) {?>
						<button
							type="button"
							class="btn  btn-default btn-xs"
							data-toggle="modal"
							data-target="#molini_lookup"
							onclick="lineSearchMoliniLookup('<?php echo $_smarty_tpl->tpl_vars['lines_array']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_results']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_results']->value['index'] : null)]['translation'];?>
');">Translations
							Available!</button>
					<?php } else { ?> 
		
					<?php }?>

					
					<a
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
			<div class="btn-group col-md-1">
				<div style="float: right;">
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
			
	</div>
</div><?php }
}
