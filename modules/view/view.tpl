{include file="header.tpl"} {include file="navigation.tpl"} 
<script type="text/javascript">
{literal}
function copyToClipboard(element) {
  var $temp = $("<input>");
  $("body").append($temp);
  $temp.val($(element).text()).select();
  document.execCommand("copy");
  $temp.remove();

}
</script>
{/literal}


<div class="container-fluid">

	<div class="container-fluid col-md-3">
		<div class="panel panel-default">
			<div class="panel-heading">
				<a
					data-toggle="collapse"
					href="#collapse2">Options</a>
			</div>
			<div
				id="collapse2"
				class="panel-collapse collapse {if  $view_session_array.submit=='true'}out{else}in{/if}">
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
								value="{$job_no}"
								placeholder="Job_no">

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
<div class="well well-sm">Source Text Word Count : <strong>{$view_array.source_text_count}</strong></div>
<div class="well well-sm">Source Text Page Count : <strong>{$view_array.source_text_page} (A4)</strong></div>
				</div>



			</div>
		</div>
	</div>
</div>


<div class="container-fluid">

<div class="col-md-6">
<div>
{if  $view_session_array.submit=='true'}
<button
			type="button"
			class="btn  btn-primary btn-sm"
			onclick="copyToClipboard('#source')">Copy Text</button>
{/if}
</div>
<br />
<div id="source">
{$view_array.source_text}
</div>
</div>
<div class="col-md-6">
<div>
{if  $view_session_array.submit=='true'}
<button
			type="button"
			class="btn  btn-primary btn-sm"
			onclick="copyToClipboard('#target')">Copy Text</button>
{/if}
</div>
<br />
<div id="target">
{$view_array.target_text}
</div>
</div>

</div>


	{include file="footer.tpl"}