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

<header class="main-header">
    <!-- Logo -->
    <a href="../../index.php" class="logo" style="background-color: #3c8dbc;">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>Molini</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>MOLINI TRANSLATE</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <div class="collapse navbar-collapse pull-left" id="navbar-collapse">
          <ul class="nav navbar-nav">
            <li {if $page=="Translate"}class="active"{/if}><a href="../translate/translate.php?job=translate"><i class="fa fa-exchange" aria-hidden="true"></i>&nbsp; Translate</a></li>
			<li {if $page=="Create Job"}class="active"{/if}><a href="../create_job/create_job.php?job=create_job"><i class="fa fa-plus" aria-hidden="true"></i>&nbsp; Create Job</a></li>
			<li {if $page=="View"}class="active"{/if}><a href="../view/view.php?job=view"><i class="fa fa-eye" aria-hidden="true"></i>&nbsp;  View</a></li>
			<li {if $page=="Settings"}class="dropdown dropdown-submenu active" {else} class="dropdown dropdown-submenu"{/if}>
				<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-cogs" aria-hidden="true"></i>&nbsp; Settings</a>
				<ul class="dropdown-menu">
					<li><a href="../create_job/create_job.php?job=create_job">Create Job</a></li>
					<li><a href="../translate/translate.php?job=translate">Translate</a></li>
				</ul>
			</li>
			</ul>
          
        </div>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- Messages: style can be found in dropdown.less-->
          
          <!-- Notifications: style can be found in dropdown.less -->
          
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-user" aria-hidden="true"></i>&nbsp; <span class="hidden-xs">{$username} (My Account)</span>
            </a>
            
          <!-- Control Sidebar Toggle Button -->
          <li {if $page=="Logout"}class="active"{/if}><a href="../../index.php?job=logout"><i class="fa fa-sign-out" aria-hidden="true"></i>&nbsp; Logout</a></li>
          
        </ul>
      </div>
    </nav>
	
    <!-- Header Navbar: style can be found in header.less -->
    
  </header>