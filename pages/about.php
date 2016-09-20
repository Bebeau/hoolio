<?php

/*
Template Name: About
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
		echo '<section id="page" class="section">';
			echo '<div class="container">';
		    	the_content();
		    echo '</div>';
		echo '</section>';

	endwhile; endif;

	$args = array(
		'blog_id'      => $GLOBALS['blog_id'],
		'role'         => 'editor',
		'role__in'     => array(),
		'role__not_in' => array(),
		'meta_key'     => '',
		'meta_value'   => '',
		'meta_compare' => '',
		'meta_query'   => array(),
		'date_query'   => array(),
		'include'      => '',
		'exclude'      => array(),
		'orderby'      => 'login',
		'order'        => '',
		'offset'       => '',
		'search'       => '',
		'number'       => '',
		'count_total'  => false,
		'fields'       => 'all',
		'who'          => ''
	);

	$agents = get_users($args);

	// if(!empty($agents)) {
	// 	echo '<section id="team" class="section">';
	// 		echo '<div class="container">';
	// 			echo '<h2>Leadership Team</h2>';
	// 			echo '<div class="thirds">';
	// 				foreach($agents as $agent) {

	// 					$userID = $agent->ID;
	// 					$email = $agent->user_email;
	// 					$title = $agent->jobTitle;

	// 					echo '<article>';
	// 						if(!empty($agent->agent_image)) {
	// 							echo '<img src="'.$agent->agent_image.'" alt="" />';
	// 						} else {
	// 							echo '<img src="" alt="" />';
	// 						}
	// 						echo '<div class="agent-info">';
	// 							echo '<div class="outer">';
	// 								echo '<div class="inner">';
	// 									echo '<h3 class="name">'.$agent->display_name.'</h3>';
	// 									echo '<div class="title">'.$title.'</div>';
	// 								echo '</div>';
	// 							echo '</div>';
	// 						echo '</div>';
	// 					echo '</article>';
	// 				}
	// 			echo '</div>';
	// 		echo '</div>';
	// 	echo '</section>';
	// }

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

get_footer(); ?>
