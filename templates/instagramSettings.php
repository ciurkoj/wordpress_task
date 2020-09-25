<div class="wrap">
	<h1>Instagram Plugin Settings</h1>
	<?php settings_errors(); ?>

	<ul class="nav nav-tabs">
		<li class="active"><a href="#tab-1">Twitter</a></li>
		<li><a href="#tab-2">Facebook</a></li>
		<li><a href="#tab-3">LinkedIn</a></li>
	</ul>

	<div class="tab-content">
		<div id="tab-1" class="tab-pane active">

			<form method="post" action="options.php">
				<?php 
					settings_fields( 'options_group' );
					do_settings_sections( 'alecaddd_plugin' );
					submit_button();
				?>
			</form>
			
		</div>

		<div id="tab-2" class="tab-pane">
			<h3>Facebook</h3>
		</div>

		<div id="tab-3" class="tab-pane">
			<h3>LinkedIn</h3>
		</div>
	</div>
</div>