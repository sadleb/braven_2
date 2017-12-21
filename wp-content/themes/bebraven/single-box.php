<?php 
/**
 * Template for a single sub-page "square" and its content.
 * This is called from functions.php where a query is generated by a shortcode. 
 */

global $post;


$post_title = get_the_title();

// Decide whether to display a logo or just the title of the post:
$box_title_or_image = (has_post_thumbnail() && 'post' != $post->post_type) ? get_the_post_thumbnail($post->ID, 'logo', array ('title' => $post_title) ) : '<h3>'.$post_title.'</h3>';



// Indicate when the box has body content so we can add a visual cue in case it's only visible on hover/click
$content = get_the_content();
$has_more = ($content) ? 'has-content' : 'no-content';


?>
<article class="mosaic-element <?php echo $has_more; ?>">
	<div class="box">
		<div class="box-content">
			<?php 
			
			echo $box_title_or_image;

			?>
			<div class="excerpt"><?php the_excerpt(); ?></div>
			<?php

			
			// If this has content:
			if ( $content ) {
				// show the formatted content:
				?>
					<div class="box-text">
						<?php echo apply_filters('the_content', $content); ?>
					</div>
				<?php
			}
			?>
		</div>
	</div>
	<?php bz_show_edit_link(); ?>
</article>