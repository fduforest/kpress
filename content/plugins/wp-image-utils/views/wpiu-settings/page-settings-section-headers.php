<?php if ('wpiu_section-rename' == $section['id']) { ?>
    <p><?php esc_html_e('Set options influencing how the files will be renamed.', 'wpiu_domain'); ?></p>
    <input type="hidden" name="wpiu_settings[rename][md5]" value="0">
<?php
} elseif ('wpiu_section-featured' == $section['id']) {
    ?>
    <p><?php esc_html_e('Set options for featured images.', 'wpiu_domain'); ?></p>
    <input type="hidden" name="wpiu_settings[featured][first-image]" value="0">
<?php } ?>
