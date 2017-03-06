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


<div class="content-wrapper" style="min-height: 620px;">

	<div class="col-md-3" style="margin-top: 30px;">
		<div class="panel panel-default">
			<a data-toggle="collapse" href="#collapse2"><div class="panel-heading">
				Options
			</div></a>
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
					<div class="well well-sm">Source Text Word Count : <strong>{$view_array.source_text_count}</strong></div>
					<div class="well well-sm">Source Text Page Count : <strong>{$view_array.source_text_page} (A4)</strong></div>
				</div>



			</div>
		</div>
	</div>
	{if  $view_session_array.submit=='true'}
	<div class="row">
		<div class="col-md-6">
			
				<section class="content">
					
					<div class="box box-default">
						<div class="box-header with-border">
							<h3 class="box-title">Source &nbsp;</h3>
							<button	type="button" class="btn  btn-primary btn-sm"	onclick="copyToClipboard('#source')">Copy Text</button>
							
						</div>
						<div class="box-body" id="source">
							{$view_array.source_text}
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
						{$view_array.target_text}
					</div>
					<!-- /.box-body -->
				</div>
				<!-- /.box -->
			</section>
		</div>

	</div>
	{/if}
</div>


	{include file="footer.tpl"}