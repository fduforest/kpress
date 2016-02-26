<?php

if (empty($_SESSION['WPIU']['images_per_page'])) {
    $_SESSION['WPIU']['images_per_page'] = 20;
}
if (empty($_SESSION['WPIU']['order_by'])) {
    $_SESSION['WPIU']['order_by'] = 0;
}
if (empty($_SESSION['WPIU']['search'])) {
    $_SESSION['WPIU']['search'] = false;
}
$current_page = 0;

$base_url = remove_query_var($_SERVER['REQUEST_URI'], 'current_page');
$base_url = $base_url . rtrim($base_url, '&');

if (isset($_POST['images_per_page']) && is_numeric($_POST['images_per_page'])) {
    $_SESSION['WPIU']['images_per_page'] = intval($_POST['images_per_page']);
}
if (isset($_POST['order_by']) && is_numeric($_POST['order_by'])) {
    $_SESSION['WPIU']['order_by'] = intval($_POST['order_by']);
}
if (isset($_GET['current_page']) && is_numeric($_GET['current_page'])) {
    $current_page = intval($_GET['current_page']) - 1;
}
if (isset($_POST['s'])) {
    $_SESSION['WPIU']['search'] = $_POST['s'];
}

error_log("session=".print_r($_SESSION['WPIU'], true));
error_log("GET=".print_r($_GET, true));
error_log("POST=".print_r($_POST, true));

$images = get_images($current_page, $_SESSION['WPIU']['images_per_page'], $_SESSION['WPIU']['order_by'], $_SESSION['WPIU']['search']);
$wpiu_image_table = new WPIU_Image_Table();
if (isset($images)) {
    $wpiu_image_table->prepare_further_items($images);
}
?>
    <div class="wrap">
        <div id="icon-options-general" class="icon32"><br/></div>
        <h2><?php esc_html_e('Cleanup Images', 'wpiu_domain'); ?></h2>

        <div id="updated" style="display:none;" class="updated"></div>

        <h3><?php esc_html_e('Options', 'wpiu_domain'); ?></h3>

        <form method="post" action="">
            <?php $wpiu_image_table->search_box('search', 'search_id'); ?>
            <table class="form-table">
                <tbody>
                <tr>
                    <th scope="row">
                        <label for="images_per_page"><?= __("Images per page:", 'wpiu_domain') ?></label>
                    </th>
                    <td>
                        <input id="images_per_page" type="number" name="images_per_page"
                               value="<?php echo $_SESSION['WPIU']['images_per_page'] ?>"
                               max="200" min="1"/>
                    </td>
                </tr>
                <tr>
                    <th scope="row">
                        <label for="order_by"><?= __("Ordered by:", 'wpiu_domain') ?></label>
                    </th>
                    <td>
                        <?php
                        $order_by_values = array(
                            0 => __("Date Added ascending (first added first)", 'wpiu_domain'),
                            1 => __("Date Added descending (last added first)", 'wpiu_domain'),
                        );
                        ?>
                        <select name="order_by" id="order_by">
                            <?php foreach ($order_by_values as $id => $name) { ?>
                                <option <?php selected($_SESSION['WPIU']['order_by'], $id); ?>
                                    value="<?= $id; ?>"><?= $name ?></option>
                            <?php } ?>
                        </select>
                    </td>
                </tr>
                </tbody>
            </table>

            <p class="submit">
                <input type="submit" id="scan-images"
                       class="button-primary" value="<?php esc_attr_e('Scan Images', 'wpiu_domain'); ?>">
            </p>
        </form>
        <?php
            $wpiu_image_table->display();
        pagination($base_url, $_SESSION['WPIU']['images_per_page'], $current_page);
        ?>
    </div>
<?php
function pagination($base_url, $items_per_page, $current_page)
{
    $pagination = array(
        'base' => $base_url . '%_%',
        'format' => '&current_page=%#%',
        'current' => $current_page + 1,
        'total' => ceil(count_images() / $items_per_page),
        'next_text' => __("Next", 'wpiu_domain'),
        'prev_text' => __("Previous", 'wpiu_domain'),
    );
    echo '</pre><div class="pagination primary-links">' . paginate_links($pagination) . '</div><pre>';
}

function get_images($current_page, $images_per_page, $order = 0, $search = false)
{
    global $wpdb;

    $sql = "SELECT id, meta_id, meta_value, post_title";
    $sql .= " FROM $wpdb->posts";
    $sql .= " INNER JOIN $wpdb->postmeta ON $wpdb->posts.id=$wpdb->postmeta.post_id";
    $sql .= " WHERE post_type='attachment'";
    $sql .= " AND $wpdb->posts.post_mime_type LIKE 'image%'";
    $sql .= " AND $wpdb->postmeta.meta_key='_wp_attachment_metadata'";
    if ($search) {
        $sql .= " AND $wpdb->posts.post_title LIKE '%$search%'";
    }
    $sql .= " ORDER BY $wpdb->postmeta.meta_id";
    if ($order == 0) {
        $sql .= ' ASC';
    } else {
        $sql .= ' DESC';
    }
    $sql .= ' LIMIT ' . ($current_page * $images_per_page) . ", $images_per_page";
    $results = $wpdb->get_results($sql, "ARRAY_A");
	$wp_content_dir_elements = explode( "/", WP_CONTENT_DIR );
	$content_dir = array_pop( $wp_content_dir_elements );
    $upload_dir = wp_upload_dir();
    $upload_dir = $upload_dir['baseurl'];
    $upload_dir = preg_replace('/.*?\/' . $content_dir . '(.*)$/', $content_dir . '$1', $upload_dir);
    if (!empty($results)) {
        $parent_image_count = 0;
        foreach ($results as $result) {
            $id = $result['id'];
            $meta_values = unserialize($result['meta_value']);
            $name = $meta_values['file'];
            $files[$id]['parent'][] = $name;
            $files[$id]['parent'][] = $result['post_title'];
            $files[$id]['meta_id'][] = $result['meta_id'];
            if (check_image_db(trailingslashit($upload_dir) . $name)) {
                $files[$id]['parent']['used'] = true;
            } else {
                $files[$id]['parent']['used'] = false;
            }
            $parent_image_count++;
            if (!empty($meta_values['sizes'])) {
                foreach ($meta_values['sizes'] as $size_key => $sizes) {
                    $name = $sizes['file'];
                    $files[$id]['child'][$size_key][] = $sizes['file'];
                    if (check_image_db($name)) {
                        $files[$id]['child'][$size_key]['used'] = true;
                        $files[$id]['parent']['used'] = true;
                    } else {
                        $files[$id]['child'][$size_key]['used'] = false;
                    }
                }
            }
        }
    }

    return $files;
}

function count_images()
{
    global $wpdb;

    $sql = "SELECT COUNT(*) FROM $wpdb->posts INNER JOIN $wpdb->postmeta ON $wpdb->posts.id=$wpdb->postmeta.post_id WHERE post_type='attachment' AND $wpdb->posts.post_mime_type LIKE 'image%' AND $wpdb->postmeta.meta_key='_wp_attachment_metadata' ORDER BY $wpdb->postmeta.meta_id";

    return $wpdb->get_var($sql);
}

function check_image_db($image_name)
{
    global $wpdb;
    $sql = "SELECT COUNT(*) FROM $wpdb->posts INNER JOIN $wpdb->postmeta ON $wpdb->posts.id=$wpdb->postmeta.post_id WHERE post_content LIKE '%/" . $image_name . "%' OR meta_value LIKE '%/" . $image_name . "%'";
    $result = $wpdb->get_results($sql, "ARRAY_A");
    $count = $result[0]['COUNT(*)'];
    if ($count == 0) {
        $sql = "SELECT COUNT(*) FROM $wpdb->options	WHERE option_value LIKE '%/" . $image_name . "%'";
        $result = $wpdb->get_results($sql, "ARRAY_A");
        $count = $result[0]['COUNT(*)'];
    }
    if ($count == 0) {
        $sql = "SELECT COUNT(*) FROM $wpdb->postmeta INNER JOIN $wpdb->posts ON $wpdb->posts.id=$wpdb->postmeta.meta_value WHERE guid LIKE '%/" . $image_name . "%' AND meta_key NOT LIKE '[_]%'";
        $result = $wpdb->get_results($sql, "ARRAY_A");
        $count = $result[0]['COUNT(*)'];
    }
    return $count > 0;
}

function remove_query_var($url, $var_name)
{
    return preg_replace('/([?&])' . $var_name . '=[^&]+(&|$)/', '$1', $url);
}