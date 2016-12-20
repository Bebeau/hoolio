<?php 

/*
Template Name: Home
*/

get_header(); ?>

	<section id="top" class="block" data-parallax='{"y" : 230, "smoothness": 1}'>
		<!-- <span class="path"></span> -->
		<article class="outer">
			<div class="inner">
				<!-- <div class="ipad" data-animation="slideInLeft"></div> -->
				<div class="half" data-animation="slideInLeft" id="videos">
					<?php if(wp_is_mobile()) { ?>
						<img src="<?php echo bloginfo('template_directory'); ?>/assets/images/ipad_mobile.jpg" alt="" />
					<?php  } else { ?>
						<video muted preload="auto" loop class="active" id="iphone">
							<source src="<?php echo bloginfo('template_directory'); ?>/assets/videos/iphone.webm" type="video/webm">
							<source src="<?php echo bloginfo('template_directory'); ?>/assets/videos/iphone.ogv" type="video/ogv">
							<source src="<?php echo bloginfo('template_directory'); ?>/assets/videos/iphone.mp4" type="video/mp4">
						</video>
						<video muted preload="auto" loop id="tablet">
							<source src="<?php echo bloginfo('template_directory'); ?>/assets/videos/tablet.webm" type="video/webm">
							<source src="<?php echo bloginfo('template_directory'); ?>/assets/videos/tablet.ogv" type="video/ogv">
							<source src="<?php echo bloginfo('template_directory'); ?>/assets/videos/tablet.mp4" type="video/mp4">
						</video>
						<video muted preload="auto" loop id="laptop">
							<source src="<?php echo bloginfo('template_directory'); ?>/assets/videos/computer.webm" type="video/webm">
							<source src="<?php echo bloginfo('template_directory'); ?>/assets/videos/computer.ogv" type="video/ogv">
							<source src="<?php echo bloginfo('template_directory'); ?>/assets/videos/computer.mp4" type="video/mp4">
						</video>
					<?php } ?>
				</div>
				<div class="copy half">
					<?php 
						$section1_title = get_post_meta($post->ID,'section1_title',true);
		                $section1_desc = get_post_meta($post->ID,'section1_desc',true);
		                $section1_button = get_post_meta($post->ID,'section1_button',true);

		                echo '<span data-animation="slideUp">';
			                if(!empty($section1_title)) {
			                	echo '<h1 data-animation="slideDown">'.$section1_title.'</h1>';
			                } else {
			                	echo '<h1 data-animation="slideDown">Wisdom made easy.</h1>';
			                }
			                if(!empty($section1_desc)) {
			                	echo '<h3>'.$section1_desc.'</h3>';
			                } else {
			                	echo '<h3>We empower businesses to make better decisions.</h3>';
			                }
			                if(!empty($section1_button)) {
			                	echo '<a href="'.site_url('checkout').'" class="btn">'.$section1_button.'</a>';
			                } else {
			                	echo '<a href="'.site_url('checkout').'" class="btn">Sign Up</a>';
			                }
			            echo '</span>';
					?>
				</div>
				<!-- <div class="iphone" data-animation="slideInRight"></div> -->
			</div>
		</article>
	</section>

	<section id="meet" class="block">
		<article class="outer">
			<div class="inner">
				<?php
					$section4_title = get_post_meta($post->ID,'section4_title',true);
                    $section4_desc = get_post_meta($post->ID,'section4_desc',true);

                    echo '<div class="copy">';
                    	echo '<h1>The Science of Actively Listening to Your Customers</h1>';
                    	echo '<img data-animation="slideUp" src="'.get_bloginfo('template_directory').'/assets/images/logo_icon.svg" alt="Hoolio" />';
                    	if(!empty($section4_title)) {
                    		echo '<h1 data-animation="slideDown">'.$section4_title.'</h1>';
                    	} else {
                    		echo '<h1 data-animation="slideDown">Meet Hoolio.</h1>';
                    	}
                    	if(!empty($section4_desc)) {
                    		echo '<p data-animation="slideUp">'.$section4_desc.'</p>';
                    	} else {
                    		echo '<p data-animation="slideUp">Hoolio is the AI wizard here at Wyzerr. He takes in feedback data and turns it into real-time insight.  The more data you feed Hoolio, the smarter he becomes.  His insight helps you understand your customers, develop new products, identify sales opportunities, create targeted marketing messages, and ultimately stay ahead of your competitors. Check out what Hoolio is currently working on:</p>';
                    	}
                    echo '</div>';
				?>
			</div>
		</article>
	</section>

	<section id="research" class="block">
		<article class="outer">
			<div class="inner">
				<?php 
					$section2_title = get_post_meta($post->ID,'section2_title',true);
                    $section2_desc = get_post_meta($post->ID,'section2_desc',true);
                    $icon1 = get_post_meta($post->ID,'icon1',true);
                    $icon2 = get_post_meta($post->ID,'icon2',true);
                    $icon3 = get_post_meta($post->ID,'icon3',true);
                    $section2_button = get_post_meta($post->ID,'section2_button',true);

                    echo '<div class="copy" data-animation="slideUp">';
                    	if(!empty($section2_title)) {
                    		echo '<h1 data-animation="slideDown">'.$section2_title.'</h1>';
                    	} else {
                    		echo '<h1 data-animation="slideDown">Market research in a box.</h1>';
                    	}
                    	if(!empty($section2_desc)) {
                    		echo '<p data-animation="slideUp">'.$section2_desc.'</p>';
                    	} else {
                    		echo '<p data-animation="slideUp">Wyzerr allows you to do high quality market research on your own. Our technology:</p>';
                    	}
                    echo '</div>';

                    echo '<div class="thirds">';
                    	echo '<article>';
                    		echo '<img data-src="'.get_bloginfo('template_directory').'/assets/images/icons/market1.svg" src="" alt="" />';
                    		echo '<p>Smartforms</p>';
                    	echo '</article>';
                    	echo '<article>';
                    		echo '<img data-src="'.get_bloginfo('template_directory').'/assets/images/icons/market2.svg" src="" alt="" />';
                    		echo '<p>Builder</p>';
                    	echo '</article>';
                    	echo '<article>';
                    		echo '<img data-src="'.get_bloginfo('template_directory').'/assets/images/icons/market3.svg" src="" alt="" />';
                    		echo '<p>Insights</p>';
                    	echo '</article>';
                    echo '</div>';
                    
				?>
			</div>
		</article>
	</section>

	<section id="help" class="block">
		<article class="outer">
			<div class="inner">
				<?php
					$section3_title = get_post_meta($post->ID,'section3_title',true);
                    $section3_desc = get_post_meta($post->ID,'section3_desc',true);

                    echo '<div class="copy" data-animation="slideUp">';
                    	if(!empty($section3_title)) {
                    		echo '<h1 data-animation="slideDown">'.$section3_title.'</h1>';
                    	} else {
                    		echo '<h1 data-animation="slideDown">Your customers and employees are your experts.</h1>';
                    	}
                    	if(!empty($section3_desc)) {
                    		echo '<p data-animation="slideUp">'.$section3_desc.'</p>';
                    	} else {
                    		echo '<p data-animation="slideUp">Whether you’re a small business owner, or a marketer at a large enterprise, we help you make intelligent decisions by constantly listening to the people that know your company best. We call it the science of active listening.</p>';
                    	}
                    	if(wp_is_mobile()) {
                    		echo '<img src="'.get_bloginfo('template_directory').'/assets/images/placeholder.png" alt="" />';
                    	}
                    echo '</div>';

                    if(!wp_is_mobile()) { ?>
						<video muted preload="auto">
							<source src="<?php echo bloginfo('template_directory'); ?>/assets/videos/wizards.webm" type="video/webm">
							<source src="<?php echo bloginfo('template_directory'); ?>/assets/videos/wizards.ogv" type="video/ogv">
							<source src="<?php echo bloginfo('template_directory'); ?>/assets/videos/wizards.mp4" type="video/mp4">
						</video>
				<?php } ?>
			</div>
		</article>
	</section>

	<?php

	$video = get_post_meta($post->ID,'featured_video', true);
	if(!empty($video)) {
		echo '<section id="video">';
			echo '<video preload="metadata">';
				echo '<source src="'.$video.'#t=1" type="video/webm">';
				echo '<source src="'.$video.'#t=1" type="video/ogv">';
				echo '<source src="'.$video.'#t=1" type="video/mp4">';
			echo '</video>';
			echo '<div class="playwrap"></div>';
		echo '</section>';
	}
	?>

<?php get_footer(); ?>
