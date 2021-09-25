<?php

/**
 * Provide a admin area view for the plugin
 *
 * This file is used to markup the admin-facing aspects of the plugin.
 *
 * @link       https://wppb.me/
 * @since      1.0.0
 *
 * @package    Weather
 * @subpackage Weather/admin/partials
 */
?>

<!-- This file should primarily consist of HTML with a little bit of PHP. -->
<div class="wrap">
    <h1>Weather Test Plugin Settings</h1>
    <div class="form-group">
        <form action="options.php" method="POST">
            <input type="text" name="test_city" id="test_city" value="<?php echo get_option( 'test_city' );?>">
            <?php  
                settings_fields( 'testPlugin' );
                submit_button();
            ?> 
        </form>   
    </div> 
</div>