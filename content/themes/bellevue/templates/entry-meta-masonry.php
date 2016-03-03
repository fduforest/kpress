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
?>
<div class="post-meta">
	<?php echo esc_html__('Posted by', 'BELLEVUE'); ?> <?php the_author_posts_link(); ?> <?php echo $write_comments; ?>
</div>
