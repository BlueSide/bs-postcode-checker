<?php

/**
 * Provide a admin area view for the plugin
 *
 * This file is used to markup the admin-facing aspects of the plugin.
 *
 * @link       https://www.blueside.nl/
 * @since      1.0.0
 *
 * @package    Bs_Postcode_Checker
 * @subpackage Bs_Postcode_Checker/admin/partials
 */
?>

<div class="wrap">
    <h2>Blue Side Postcode Checker</h2>
    <form action="options.php" method="POST">
        <?php
        settings_fields( 'postcode-settings-group' );
        do_settings_sections( 'bs-postcode-checker' );
        submit_button();
        ?>
    </form>
</div>
