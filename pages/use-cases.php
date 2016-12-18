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
	<?php } ?>
			<div class="outer">
				<div class="inner">
					<?php the_title("<h1>","</h1>"); ?>
				</div>
			</div>
		</div>
	<?php
endwhile; endif; ?>

<section id="page" class="section">
	<img data-animation="slideUp" src="<?php echo bloginfo('template_directory'); ?>/assets/images/logo_icon.svg" alt="Hoolio" />
	<h2>Hoolio is here to guide<br />you through the use cases.</h2>
	<?php
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
								the_post_thumbnail('large');
								the_content();
								echo '<a href="'.get_site_url('checkout').'" class="btn">Be a Wizard</a>';
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
								echo '<div class="half">';
									echo '<img class="frame-icon" src="'.$iconURL.'" alt="'.get_the_title().'" />';
									the_title("<h3>","</h3>");
									the_content();
									echo '<a href="'.get_site_url('checkout').'" class="btn">Be a Wizard</a>';
								echo '</div>';
								echo '<div class="half">';
									the_post_thumbnail('large');
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