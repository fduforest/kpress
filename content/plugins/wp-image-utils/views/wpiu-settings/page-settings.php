<div class="wrap">
    <div id="icon-options-general" class="icon32"><br/></div>
    <h2><?php echo esc_html(sprintf(__('%s Settings', 'wpiu_domain'), WPIU_NAME)); ?></h2>

    <form method="post" action="options.php">
        <?php settings_fields('wpiu_settings'); ?>
        <?php do_settings_sections('wpiu_settings'); ?>

        <p class="submit">
            <input type="submit" name="submit" id="submit" class="button-primary"
                   value="<?php esc_attr_e('Save Changes', 'wpiu_domain'); ?>"/>
        </p>
    </form>
</div> <!-- .wrap -->
