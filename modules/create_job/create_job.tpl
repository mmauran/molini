{include file="header.tpl"} {include file="navigation.tpl"} {literal}
<script type="text/javascript">
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
</script>
{/literal}
<div class="content-wrapper" style="min-height: 620px;">
<div class="container">
	<div class="row" style="margin-top: 30px;">
	<div class="panel panel-default">
		<a data-toggle="collapse" href="#collapse2">
		<div class="panel-heading">
			Create Job
		</div></a>
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
								value="{$job_no}"
								readonly>

						</div>

						<div class="col-md-10 form-group">
							<label for="job_name">Title</label> <input
								type="text"
								class="form-control"
								id="job_name"
								name="job_name"
								value="{$job_name}"
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
								value="{$source_text}"
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

	{section name=job loop=$job_array} {if $smarty.section.job.first}

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
			{else}{/if}
			<tr>
				<td>{$job_array[job].serial_order}</td>
				<td><a
					class="btn  btn-primary btn-xs"
					href="../translate/translate.php?job=submit&job_no={$job_array[job].job_no}"
					role="button">TRANSLATE</a></td>
				<td><button
						type="button"
						class="btn  btn-default btn-xs"
						data-toggle="modal"
						data-target="#view_job"
						onclick="viewJob({$job_array[job].job_no});">VIEW</button></td>
				<td>{$job_array[job].job_no}</td>
				<td>{$job_array[job].source_language}</td>
				<td>{$job_array[job].target_language}</td>
				<td class="text-nowrap">{$job_array[job].job_name}</td>
				<td>{$job_array[job].created}</td>
				<td>{$job_array[job].translated}%</td>
				<td>{$job_array[job].completed}%</td>
				<td>{$job_array[job].privacy}</td>
				<td></td>
				<td></td>
			</tr>

			{if $smarty.section.job.last}
		</tbody>
	</table>
	{else}{/if} {/section}
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

{include file="footer.tpl"}
