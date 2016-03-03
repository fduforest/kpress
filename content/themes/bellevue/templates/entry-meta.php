<?php 
$num_comments = get_comments_number(); // get_comments_number returns only a numeric value
$write_comments = "";

if ( comments_open() ) {
	if ( $num_comments == 0 ) {
		$comments = esc_html__('No Comments', 'BELLEVUE');
	} elseif ( $num_comments > 1 ) {
		$comments = $num_comments . esc_html__(' Comments', 'BELLEVUE');
	} else {
		$comments = esc_html__('1 Comment', 'BELLEVUE');
	}
	$write_comments = '| <a href="' . esc_url(get_comments_link()) .'">'. $comments.'</a>';
}
$title = get_the_title();
$perma = get_permalink();
$link_the_date_open = false;
$link_the_date_close = false;

if(!$title > '' && $perma > ""){
    $link_the_date_open = '<a href="'.esc_url($perma).'">';
    $link_the_date_close = '</a>';
}

?>
<div class="post-meta"><?php echo esc_html__('Posted by', 'BELLEVUE'); ?> <?php echo the_author_posts_link(); ?> <span class="show-date"><?php echo esc_html__('on', 'BELLEVUE'); ?> <time class="published" datetime="<?php echo get_the_time('c'); ?>"><?php echo $link_the_date_open;?><?php echo get_the_date(); ?><?php echo $link_the_date_close;?></time></span> <span class="is-sticky">| <?php echo esc_html__('Featured', 'BELLEVUE'); ?></span> <?php echo $write_comments; ?></div>
