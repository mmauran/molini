<div class="col-md-6 source-box">
	<textarea
		class="form-control animated source-box"
		id="source_line_{$lines_array[results].line_id}"
		name="source_line_{$lines_array[results].line_id}"
		onblur="saveSourceLine({$lines_array[results].line_id});">{$lines_array[results].source_line}</textarea>
	<div class="row" style="margin-top: 2px; ">
		<div class="btn-group col-md-3">
			<button
				class="btn btn-default btn-xs"
				type="button"
				id="delete_button_{$lines_array[results].line_id}"
				onclick="deleteLine({$lines_array[results].line_id});">D</button>


		</div>
		
		<div class="s_timestamp_box col-md-9">
			<div class="row">
				<div class="col-md-6">
					<div id="source_saved_{$lines_array[results].line_id}">
						{$lines_array[results].source_updated}</div>
				</div>
				<div class="col-md-6">
					{if $lines_array[results].translation_available==1}
					<button
						type="button"
						class="btn  btn-default btn-xs"
						data-toggle="modal"
						data-target="#molini_lookup"
						onclick="lineSearchMoliniLookup('{$lines_array[results].translation}');">Translations
						Available!</button>
					{else} {/if}<a
						class="btn  btn-default btn-xs"
						href="https://translate.google.com/#auto/{$job_array.target_language|lower}/{$lines_array[results].source_line}"
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
						tabindex="{$lines_array[results].serial_order}"
						class="form-control animated"
						id="target_line_{$lines_array[results].line_id}"
						name="target_line_{$lines_array[results].line_id}"
						onblur="saveLine({$lines_array[results].line_id});">{$lines_array[results].target_line}</textarea>
				</div>
				<div class="row" style="margin-top: 2px; ">
					<div
						class="s_timestamp_box col-md-10"
						id="saved_{$lines_array[results].line_id}">
						{$lines_array[results].target_updated}</div>
					<div class="col-md-2" style="padding: 0;">
						<div class="btn-group" style="float: right;">
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
			</div>