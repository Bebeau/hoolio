<?php

/*
Template Name: Use Cases
*/

get_header();

if (have_posts()) : while (have_posts()) : the_post();
	// get image and set it as background of parallax div
	$image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID), 'large' );
	if(!empty($image)) { ?>
		<div id="pageBanner" data-parallax='{"y" : 230, "smoothness": 1}' style="background:url(<?php echo $image[0]; ?>) no-repeat scroll center / cover">
	<?php } else { ?>
		<div id="pageBanner" class="default" data-parallax='{"y" : 230, "smoothness": 1}'>
	<?php }
		the_title("<h1>","</h1>");
	echo '</div>';
endwhile; endif; ?>

<section id="page" class="section">
	<?php
		$use_case_title = get_post_meta($post->ID, 'use_case_title', true);
		$use_case_desc = get_post_meta($post->ID, 'use_case_desc', true);

		if(!empty($use_case_title)) {
			echo '<h2>'.$use_case_title.'</h2>';
		} else {
			echo '<h2>Ways other people use smart forms.</h2>';
		}

		if(!empty($use_case_desc)) {
			echo '<p class="desc">'.$use_case_desc.'</p>';
		} else {
			echo '<p class="desc">You most likely came looking for a survey tool with your own survey in mind but just in case, here are some examples of how others are getting better data with smart forms.</p>';
		}

		$args=array(
			'post_type' => 'usecases',
			'posts_per_page'=> 6,
			'orderby' => 'DESC'
		);
	
		$useCases = new wp_query( $args );
		$count = 1;
		$frame = 1;
		if ($useCases->have_posts()) {

			echo '<div id="bubblesMobile">';
				while ($useCases->have_posts()) {
					$useCases->the_post();
					$iconURL = get_post_meta($post->ID, 'use_case_icon', true);
					echo '<div class="frame">';
						echo '<div class="titleBar">';
							echo '<h3>';
								echo '<img src="'.$iconURL.'" alt="" />';
								the_title();
							echo '</h3>';
							echo '<div class="circleClose">';
								echo '<span class="bar cross"></span>';
								echo '<span class="bar middle"></span>';
								echo '<span class="bar cross"></span>';
							echo '</div>';
							echo '<div class="frameCopy">';
								the_post_thumbnail();
								the_content();
								echo '<a href="'.get_site_url('pricing').'" class="btn">Get Wyzerr</a>';
							echo '</div>';
						echo '</div>';
					echo '</div>';
				}
			echo '</div>';

			echo '<ul id="bubbles">';
				while ($useCases->have_posts()) {	
					$useCases->the_post();
					$iconURL = get_post_meta($post->ID, 'use_case_icon', true);
					echo '<li>';
						echo '<div class="bubblewrap bubble-'.$count.'" data-numb="'.$count.'">';
							echo '<div class="bubble" data-animation="bubble">';
								echo '<img src="'.$iconURL.'" alt="'.get_the_title().'" />';
							echo '</div>';
							echo '<span class="label" data-animation="slideUp">'.get_the_title().'</span>';
						echo '</div>';
					echo '</li>';
					$count++;
				}
			echo '</ul>';

			echo '<div id="frameTabs">';
				while ($useCases->have_posts()) {
					$useCases->the_post();
					$iconURL = get_post_meta($post->ID, 'use_case_icon', true);
					echo '<div class="frame frame-'.$frame.'">';
						echo '<div class="outer"><div class="inner">';
							echo '<div class="copy">';
								echo '<div class="half frameCopy">';
									echo '<img class="frame-icon" src="'.$iconURL.'" alt="'.get_the_title().'" />';
									the_title("<h3>","</h3>");
									the_content();
									echo '<a href="'.site_url('pricing').'" class="btn">Get Wyzerr</a>';
								echo '</div>';
								echo '<div class="half frameImage">';
									$image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID), 'large' );
									if(!empty($image)) {
										echo '<img src="'.$image[0].'" alt="" />';
									}
								echo '</div>';
							echo '</div>';
						echo '</div></div>';
					echo '</div>';
					$frame++;
				}
			echo '</div>';

		}
	?>
</section>

<?php

get_footer();

?>