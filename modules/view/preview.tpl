{include file="header.tpl"} 

<div class="container-fluid">

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

{$view_array.source_text}
</div>
<div class="col-md-6">
{$view_array.target_text}
</div>

</div>


	{include file="footer.tpl"}