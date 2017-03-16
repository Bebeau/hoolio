<?php

/*
Template Name: About
*/

get_header(); ?>

		<?php if (have_posts()) : while (have_posts()) : the_post();
			// get image and set it as background of parallax div
			$image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID), 'large' );
			if(!empty($image)) { ?>
				<div id="pageBanner" data-parallax='{"y" : 230, "smoothness": 1}' style="background:url(<?php echo $image[0]; ?>) no-repeat scroll center / cover">
			<?php } else { ?>
				<div id="pageBanner" class="default" data-parallax='{"y" : 230, "smoothness": 1}'>
			<?php }
					the_title("<h1>","</h1>");
				echo '</div>';
			?>

		<?php
			echo '<section id="page" class="section">';
				echo '<div class="container">';
			    	the_content();
			    echo '</div>';
			echo '</section>';

			?>

			<div class="pagelax">
		<?php
			echo '<section id="team">';
				echo '<img src="'.get_bloginfo('template_directory').'/assets/images/team.jpg" alt="" />';
			echo '</section>';

			echo '<section id="apply" class="section">';
				echo '<h2>Apply</h2>';
				echo '<div class="container">';
					echo '<p>If you’re ready to solve problems alongside some of the best engineers and data scientists in the world, we want to hear from you.</p>';
					echo '<a href="https://smartforms.wyzerr.com/#/surveys/106/2qQYIGezt8vEVNRI9uZZIN" class="btn">Join The Team</a>';
				echo '</div>';
			echo '</section>';

		echo '</div>';

		endwhile; endif;

	echo '</div>';

get_footer(); ?>
