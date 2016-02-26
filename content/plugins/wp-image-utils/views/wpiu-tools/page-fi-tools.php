<div class="wrap">
    <div id="icon-options-general" class="icon32"><br/></div>
    <h2><?php esc_html_e('Bulk Feature Images', 'wpiu_domain'); ?></h2>

    <div id="updated" style="display:none;" class="updated"></div>

    <p><?php esc_html_e('Sets the first image as featured image (if none available) for all posts matching the criteria below.', 'wpiu_domain'); ?></p>

    <table>
        <tr>
            <th scope="row">
                <label for="selected-category"><?php esc_html_e('Categories', 'wpiu_domain'); ?></label>
            </th>
            <td>
                <?php $categories = get_terms('category'); ?>
                <select style="min-width: 190px;" id="selected-category"
                        size="4"
                        multiple="multiple">
                    <?php foreach ($categories as $category) { ?>
                        <option
                            value="<?php echo esc_attr($category->term_id); ?>"><?php echo esc_html($category->name); ?></option>
                    <?php } ?>
                </select>
                <button id="clear-category" class="button-secondary"
                        onclick="javascript:jQuery('#selected-category')[0].selectedIndex = -1;return false;">
                    <?php esc_html_e('Clear', 'wpiu_domain'); ?>
                </button>
            </td>
        </tr>
        <tr>
            <th scope="row">
                <label for="selected-tag"><?php esc_html_e('Tags', 'wpiu_domain'); ?></label>
            </th>
            <td>
                <?php $tags = get_terms('post_tag'); ?>
                <select style="min-width: 190px;" id="selected-tag"
                        size="4"
                        multiple="multiple">
                    <?php foreach ($tags as $tag) { ?>
                        <option
                            value="<?php echo esc_attr($tag->term_id); ?>"><?php echo esc_html($tag->name); ?></option>
                    <?php } ?>
                </select>
                <button id="clear-tag" class="button-secondary"
                        onclick="javascript:jQuery('#selected-tag')[0].selectedIndex = -1;return false;">
                    <?php esc_html_e('Clear', 'wpiu_domain'); ?>
                </button>
            </td>
        </tr>
        <tr>
            <th scope="row">
                <label for="selected-author"><?php esc_html_e('Authors', 'wpiu_domain'); ?></label>
            </th>
            <td>
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
                <select style="min-width: 190px;" id="selected-author"
                        size="4"
                        multiple="multiple">
                    <?php foreach ($users as $user) { ?>
                        <option
                            value="<?php echo esc_attr($user->ID); ?>"><?php echo esc_html($user->display_name); ?></option>
                    <?php } ?>
                </select>
                <button id="clear-user" class="button-secondary"
                        onclick="javascript:jQuery('#selected-author')[0].selectedIndex = -1;return false;">
                    <?php esc_html_e('Clear', 'wpiu_domain'); ?>
                </button>
            </td>
        </tr>
        <tr>
            <th scope="row">
                <label for="selected-type"><?php esc_html_e('Post Types', 'wpiu_domain'); ?></label>
            </th>
            <td>
                <?php $post_types = get_post_types(); ?>
                <select style="min-width: 190px;" id="selected-type"
                        size="4"
                        multiple="multiple">
                    <?php
                    foreach ($post_types as $post_type_name) {
                        ?>
                        <option
                            value="<?php echo esc_attr($post_type_name); ?>"><?php echo esc_html(get_post_type_object($post_type_name)->labels->name); ?></option>
                    <?php
                    }
                    ?>
                </select>
                <button id="clear-post-type" class="button-secondary"
                        onclick="javascript:jQuery('#selected-type')[0].selectedIndex = -1;return false;">
                    <?php esc_html_e('Clear', 'wpiu_domain'); ?>
                </button>
            </td>
        </tr>
    </table>

    <p class="submit">
        <button id="bulk-feature"
                class="button-primary"><?php esc_attr_e('Bulk Feature Images', 'wpiu_domain'); ?></button>
    </p>
</div> <!-- .wrap -->
