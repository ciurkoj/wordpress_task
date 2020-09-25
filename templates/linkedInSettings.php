<div class="wrap">
	<h1>LinkedIn Plugin Settings</h1>
	<?php settings_errors();?>

	<ul class="nav nav-tabs">
		<li class="active"><a href="#tab-1">Account Data</a></li>
		<li><a href="#tab-2">Plugin View</a></li>
	</ul>

	<div class="tab-content">
		<div id="tab-1" class="tab-pane active">

			<form method="post" action="options.php">
				<?php
settings_fields('linkedin_options_group');
do_settings_sections('linkedin_settings_page');
submit_button();
?>
			</form>

		</div>

		<div id="tab-2" class="tab-pane">
			<h3>Sorry, it's empty at the moment...</h3>
		</div>


	</div>
</div>