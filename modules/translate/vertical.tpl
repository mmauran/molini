	<div class="source-box">
				<textarea
					class="form-control animated source-box"
					id="source_line_{$lines_array[results].line_id}"
					name="source_line_{$lines_array[results].line_id}"
					onblur="saveSourceLine({$lines_array[results].line_id});">{$lines_array[results].source_line}</textarea>
				<div class="row">
					<div class="btn-group col-md-1">
						<button
							class="btn btn-default btn-xs"
							type="button"
							id="delete_button_{$lines_array[results].line_id}"
							onclick="deleteLine({$lines_array[results].line_id});">D</button>


					</div>
<div class="col-md-6">
</div>
		{if $lines_array[results].translation_available==1}
						<button
							type="button"
							class="btn  btn-default btn-xs col-md-2"
							data-toggle="modal"
							data-target="#molini_lookup"
							onclick="lineSearchMoliniLookup('{$lines_array[results].translation}');">Translations
							Available!</button>
						{else} 

<div class="col-md-2">
</div>
{/if}

					<div class="s_timestamp_box col-md-2">
						<div id="source_saved_{$lines_array[results].line_id}">
							{$lines_array[results].source_updated}</div>
				
					</div>
 <a
							class="btn  btn-default btn-xs col-md-1"
							href="https://translate.google.com/#auto/{$job_array.target_language|lower}/{$lines_array[results].source_line}"
							target="_blank"
							role="button">G</a>
				</div>
			</div>
			<div class="target-box">
				<div class="row">
<div class="col-md-12">
					<textarea
						tabindex="{$lines_array[results].serial_order}"
						class="form-control animated "
						id="target_line_{$lines_array[results].line_id}"
						name="target_line_{$lines_array[results].line_id}"
						onblur="saveLine({$lines_array[results].line_id});">{$lines_array[results].target_line}</textarea>
</div>
				</div>
				<div class="row">
<div class="col-md-9">
</div>
					<div
						class="timestamp_box col-md-2"
						id="saved_{$lines_array[results].line_id}">
						{$lines_array[results].target_updated}</div>
					<div class="btn-group col-md-1 pull-right">
						<button
							class="btn {if $lines_array[results].line_status == 'PENDING'} btn-primary {else} btn-default {/if} btn-xs"
							type="button"
							id="pending_button_{$lines_array[results].line_id}"
							onclick="changeStatus({$lines_array[results].line_id}, '{$lines_array[results].line_status|lower}', 'pending');">P</button>
						<button
							class="btn {if $lines_array[results].line_status == 'FUZZY'} btn-warning {else} btn-default {/if} btn-xs"
							onclick="changeStatus({$lines_array[results].line_id}, '{$lines_array[results].line_status|lower}', 'fuzzy');"
							type="button"
							id="fuzzy_button_{$lines_array[results].line_id}">F</button>
						<button
							class="btn {if $lines_array[results].line_status == 'COMPLETE'} btn-success {else} btn-default {/if} btn-xs"
							onclick="changeStatus({$lines_array[results].line_id}, '{$lines_array[results].line_status|lower}', 'complete');"
							type="button"
							id="complete_button_{$lines_array[results].line_id}">C</button>

					</div>


				</div>
			</div>