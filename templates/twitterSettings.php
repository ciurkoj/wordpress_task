<p>Display some text when the checkbox is checked:</p>

<label for="myCheck">Checkbox:</label>
<input type="checkbox" class="myCheck" onclick="myFunction()">

<p class="text" style="display:none">Checkbox is CHECKED! </p>

<script>

</script>

<div class="wrap">
	<h1>Twitter Plugin Settings</h1>
	<?php settings_errors();?>

	<ul class="nav nav-tabs">
    <li class="active"><a href="#tab-1">Account Data</a></li>
		<li><a href="#tab-2">Plugin View</a></li>
		<li><a href="#tab-3">LinkedIn</a></li>
	</ul>

	<div class="tab-content">
		<div id="tab-1" class="tab-pane active">

			<form method="post" action="options.php">
				<?php
settings_fields('twitter_options_group');
do_settings_sections('twitter_settings_page');
submit_button();
?>
			</form>

		</div>

		<div id="tab-2" class="tab-pane">
        <form method="post" action="options.php">
				<?php
settings_fields('twitter_options_group1');
do_settings_sections('twitter_settings_page1');
submit_button();
?>
			</form>
		</div>

		<div id="tab-3" class="tab-pane">
			<h3>LinkedIn</h3>
		</div>
	</div>
</div>