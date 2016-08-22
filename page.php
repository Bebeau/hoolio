<?php 

get_header();

	if (have_posts()) : while (have_posts()) : the_post();
		// get image and set it as background of parallax div
		$image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID), 'large' ); 
		if(!empty($image)) { ?>
			<div id="pageBanner" data-parallax='{"y" : 230, "smoothness": 1}' style="background:url(<?php echo $image[0]; ?>) no-repeat scroll center / cover">
		<?php } else { ?>
			<div id="pageBanner" class="default" data-parallax='{"y" : 230, "smoothness": 1}'>
		<?php } ?>
			<div class="outer">
				<div class="inner">
					<?php the_title("<h1>","</h1>"); ?>
				</div>
			</div>
		</div>
		<?php
		echo '<div id="page" class="section">';
			echo '<div class="container">';
		    	the_content();
		    echo '</div>';
		echo '</div>';

	endwhile; endif;

get_footer(); ?>