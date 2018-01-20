<h1>Express Theme Options</h1>

<!-- Display Notifications -->
<?php settings_errors() ?>
<!-- Generate form to save settings using Setting API -->
<form method="post" action="options.php">
    <?php settings_fields( 'express-setting-group' ) ?>
    <?php do_settings_sections( 'ash_express' )  ?>
    <?php submit_button() ?>
</form>