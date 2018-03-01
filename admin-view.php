<div class="wrap">
    <h2>Blue Side Postcode Checker</h2>
    <form action="options.php" method="POST">
        <?php settings_fields( 'postcode-settings-group' ); ?>
        <?php do_settings_sections( 'bs-postcode-checker' ); ?>
        <?php submit_button(); ?>
    </form>
</div>
