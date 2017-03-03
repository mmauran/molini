{literal}
<script type="text/javascript">
(function($){
	$(document).ready(function(){
		$('ul.dropdown-menu [data-toggle=dropdown]').on('click', function(event) {
			event.preventDefault(); 
			event.stopPropagation(); 
			$(this).parent().siblings().removeClass('open');
			$(this).parent().toggleClass('open');
		});
	});
})(jQuery);
</script>
{/literal}

<nav
	class="navbar navbar-default navbar-static-top marginBottom-0"
	role="navigation">
	<div class="navbar-header">
		<button
			type="button"
			class="navbar-toggle"
			data-toggle="collapse"
			data-target="#navbar-collapse-1">
			<span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span>
			<span class="icon-bar"></span> <span class="icon-bar"></span>
		</button>
		<a
			class="navbar-brand"
			href="#"
			target="_blank">{$user_name}</a>
	</div>

	<div
		class="collapse navbar-collapse"
		id="navbar-collapse-1">
		<ul class="nav navbar-nav">
			<li class="active"><a href="#">{$page}</a></li>
			<li><a href="../../index.php?job=logout">Logout</a></li>
<li><a href="../create_job/create_job.php?job=create_job">Create Job</a></li>
<li><a href="../translate/translate.php?job=translate">Translate</a></li>
<li><a href="../view/view.php?job=view">View</a></li>
			<li class="dropdown dropdown-submenu"><a
				href="#"
				class="dropdown-toggle"
				data-toggle="dropdown">Settings</a>
				<ul class="dropdown-menu">
					<li><a href="../create_job/create_job.php?job=create_job">Create Job</a></li>
					<li><a href="../translate/translate.php?job=translate">Translate</a></li>
				</ul></li>

		</ul>
	</div>
	<!-- /.navbar-collapse -->
</nav>

