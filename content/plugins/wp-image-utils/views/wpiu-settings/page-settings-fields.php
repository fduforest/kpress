<?php
/*
 * Options Section
 */
?>

<?php
if ('wpiu_post-slug' == $field['label_for']) : ?>
    <input type="checkbox" name="wpiu_settings[rename][post-slug]"
           id="wpiu_settings[rename][post-slug]"
           value="1" <?php checked(1, isset($settings['rename']['post-slug']) ? $settings['rename']['post-slug'] : 0) ?>>
<?php
elseif ('wpiu_accents' == $field['label_for']) : ?>
    <input type="checkbox" name="wpiu_settings[rename][accents]"
           id="wpiu_settings[rename][accents]"
           value="1" <?php checked(1, isset($settings['rename']['accents']) ? $settings['rename']['accents'] : 0) ?>>
<?php
elseif ('wpiu_lowercase' == $field['label_for']) : ?>
    <input type="checkbox" name="wpiu_settings[rename][lowercase]"
           id="wpiu_settings[rename][lowercase]"
           value="1" <?php checked(1, isset($settings['rename']['lowercase']) ? $settings['rename']['lowercase'] : 0) ?>>
<?php
elseif ('wpiu_special-chars' == $field['label_for']) : ?>
    <input type="checkbox" name="wpiu_settings[rename][special-chars]"
           id="wpiu_settings[rename][special-chars]"
           value="1" <?php checked(1, isset($settings['rename']['special-chars']) ? $settings['rename']['special-chars'] : 0) ?>>
<?php
elseif ('wpiu_non-ascii' == $field['label_for']) : ?>
    <input type="checkbox" name="wpiu_settings[rename][non-ascii]"
           id="wpiu_settings[rename][non-ascii]"
           value="1" <?php checked(1, isset($settings['rename']['non-ascii']) ? $settings['rename']['non-ascii'] : 0) ?>>
<?php
elseif ('wpiu_md5' == $field['label_for']) : ?>
    <input type="checkbox" name="wpiu_settings[rename][md5]"
           id="wpiu_settings[rename][md5]"
           value="1" <?php checked(1, isset($settings['rename']['md5']) ? $settings['rename']['md5'] : 0) ?>>
<?php
elseif ('wpiu_current-date' == $field['label_for']) : ?>
    <input type="checkbox" name="wpiu_settings[rename][current-date]"
           id="wpiu_settings[rename][current-date]"
           value="1" <?php checked(1, isset($settings['rename']['current-date']) ? $settings['rename']['current-date'] : 0) ?>>
<?php
elseif ('wpiu_site-url' == $field['label_for']) : ?>
    <input type="checkbox" name="wpiu_settings[rename][site-url]"
           id="wpiu_settings[rename][site-url]"
           value="1" <?php checked(1, isset($settings['rename']['site-url']) ? $settings['rename']['site-url'] : 0) ?>>
<?php
elseif ('wpiu_remove-port' == $field['label_for']) : ?>
    <input type="checkbox" name="wpiu_settings[rename][remove-port]"
           id="wpiu_settings[rename][remove-port]"
           value="1" <?php checked(1, isset($settings['rename']['remove-port']) ? $settings['rename']['remove-port'] : 0) ?>>
<?php
elseif ('wpiu_remove-dir' == $field['label_for']) : ?>
    <input type="checkbox" name="wpiu_settings[rename][remove-dir]"
           id="wpiu_settings[rename][remove-dir]"
           value="1" <?php checked(1, isset($settings['rename']['remove-dir']) ? $settings['rename']['remove-dir'] : 0) ?>>
<?php
elseif ('wpiu_remove-tlds' == $field['label_for']) : ?>
    <input type="checkbox" name="wpiu_settings[rename][remove-tlds]"
           id="wpiu_settings[rename][remove-tlds]"
           value="1" <?php checked(1, isset($settings['rename']['remove-tlds']) ? $settings['rename']['remove-tlds'] : 0) ?>>
<?php
elseif ('wpiu_tlds-to-remove' == $field['label_for']) : ?>
    <input type="text" name="wpiu_settings[rename][tlds-to-remove]"
           id="wpiu_settings[rename][tlds-to-remove]"
           value="<?php echo $settings['rename']['tlds-to-remove']; ?>"
           placeholder="e.g. com,org,net">
<?php
elseif ('wpiu_extensions' == $field['label_for']) : ?>
    <input type="text" name="wpiu_settings[rename][extensions]"
           id="wpiu_settings[rename][extensions]"
           value="<?php echo $settings['rename']['extensions']; ?>"
           placeholder="e.g. .jpg,.gif">
    <p class="description"
       style="display: inline;"><?php esc_html_e('Do not forget to write a dot before the actual extension e.g. .jpg and not only jpg.', 'wpiu_domain'); ?></p>
<?php
elseif ('wpiu_first-image' == $field['label_for']) : ?>
    <input type="checkbox" name="wpiu_settings[featured][first-image]"
           id="wpiu_settings[featured][first-image]"
           value="1" <?php checked(1, $settings['featured']['first-image']) ?>>
    <p class="description"
       style="display: inline;"><?php esc_html_e('A featured image will only be set if none has been explicitly defined.', 'wpiu_domain'); ?></p>
    </td>
    </tr>
    <tr>
    <th scope="row"></th>
    <td>
    <p><?php esc_html_e('In the criteria below, a list without selection will be handled the same as when all entries are selected. To deactivate this feature please use the checkbox above.', 'wpiu_domain'); ?></p>
    <br/>
<?php
elseif ('wpiu_auto-category' == $field['label_for']) : ?>
    <?php $categories = get_terms('category'); ?>
    <select style="min-width: 190px;" id="wpiu_settings[featured][auto-category]"
            name="wpiu_settings[featured][auto-category][]" size="4"
            multiple="multiple">
        <?php foreach ($categories as $category) { ?>
            <option
                value="<?php echo esc_attr($category->term_id); ?>" <?php echo(isset($settings['featured']['auto-category']) && in_array($category->term_id, (array)$settings['featured']['auto-category']) ? 'selected="selected"' : ''); ?>><?php echo esc_html($category->name); ?></option>
        <?php } ?>
    </select>
    <button id="clear-category" class="button-secondary"
            onclick="javascript:jQuery('#wpiu_settings\\[featured\\]\\[auto-category\\]')[0].selectedIndex = -1;return false;">
        <?php esc_html_e('Clear', 'wpiu_domain'); ?>
    </button>
<?php
elseif ('wpiu_auto-tag' == $field['label_for']) : ?>
    <?php $tags = get_terms('post_tag'); ?>
    <select style="min-width: 190px;" id="wpiu_settings[featured][auto-tag]"
            name="wpiu_settings[featured][auto-tag][]" size="4"
            multiple="multiple">
        <?php foreach ($tags as $tag) { ?>
            <option
                value="<?php echo esc_attr($tag->term_id); ?>" <?php echo(isset($settings['featured']['auto-tag']) && in_array($tag->term_id, (array)$settings['featured']['auto-tag']) ? 'selected="selected"' : ''); ?>><?php echo esc_html($tag->name); ?></option>
        <?php } ?>
    </select>
    <button id="clear-tag" class="button-secondary"
            onclick="javascript:jQuery('#wpiu_settings\\[featured\\]\\[auto-tag\\]')[0].selectedIndex = -1;return false;">
        <?php esc_html_e('Clear', 'wpiu_domain'); ?>
    </button>
<?php
elseif ('wpiu_auto-user' == $field['label_for']) : ?>
    <?php
    $allUsers = get_users('orderby=post_count&order=DESC');
    $users = array();
    // Remove subscribers from the list as they won't write any articles
    foreach ($allUsers as $currentUser) {
        if (!in_array('subscriber', $currentUser->roles)) {
            $users[] = $currentUser;
        }
    }
    ?>
    <select style="min-width: 190px;" id="wpiu_settings[featured][auto-user]"
            name="wpiu_settings[featured][auto-user][]" size="4"
            multiple="multiple">
        <?php foreach ($users as $user) { ?>
            <option
                value="<?php echo esc_attr($user->ID); ?>" <?php echo(isset($settings['featured']['auto-user']) && in_array($user->ID, (array)$settings['featured']['auto-user']) ? 'selected="selected"' : ''); ?>><?php echo esc_html($user->display_name); ?></option>
        <?php } ?>
    </select>
    <button id="clear-user" class="button-secondary"
            onclick="javascript:jQuery('#wpiu_settings\\[featured\\]\\[auto-user\\]')[0].selectedIndex = -1;return false;">
        <?php esc_html_e('Clear', 'wpiu_domain'); ?>
    </button>
<?php
elseif ('wpiu_auto-post-type' == $field['label_for']) : ?>
    <?php $post_types = get_post_types(); ?>
    <select style="min-width: 190px;" id="wpiu_settings[featured][auto-post-type]"
            name="wpiu_settings[featured][auto-post-type][]" size="4"
            multiple="multiple">
        <?php
        foreach ($post_types as $post_type_name) {
            ?>
            <option
                value="<?php echo esc_attr($post_type_name); ?>" <?php echo(isset($settings['featured']['auto-post-type']) && in_array($post_type_name, (array)$settings['featured']['auto-post-type']) ? 'selected="selected"' : ''); ?>><?php echo esc_html(get_post_type_object($post_type_name)->labels->name); ?></option>
        <?php
        }
        ?>
    </select>
    <button id="clear-post-type" class="button-secondary"
            onclick="javascript:jQuery('#wpiu_settings\\[featured\\]\\[auto-post-type\\]')[0].selectedIndex = -1;return false;">
        <?php esc_html_e('Clear', 'wpiu_domain'); ?>
    </button>
<?php endif; ?>