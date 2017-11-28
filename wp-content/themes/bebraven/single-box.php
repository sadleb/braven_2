<?php 
/**
 * Template for a single sub-page "square" and its content.
 * This is called from functions.php where a query is generated by a shortcode. 
 */

global $post;


$post_title = get_the_title();

// Decide whether to display a logo or just the title of the post:
$box_content = (has_post_thumbnail() && 'post' != $post->post_type) ? get_the_post_thumbnail($post->ID, 'logo', array ('title' => $post_title) ) : '<h3>'.$post_title.'</h3>';

?>
<div class="mosaic-element">
	<div class="box">
		<div class="box-content">
			<?php 
			echo $box_content;
			$content = get_the_content();
			if ( $content ) {
				?>
					<div class="box-text">
						<?php echo apply_filters('the_content', $content); ?>
					</div>
				<?php
			}
			?>
		</div>
	</div>
</div>