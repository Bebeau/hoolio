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
		<div class="arrow"><i class="fa fa-angle-down"></i></div>
	</section>

	<section id="meet" class="block">
		<article class="outer">
			<div class="inner">
				<?php
					$section2_title = get_post_meta($post->ID,'section2_title',true);
                    $section2_desc = get_post_meta($post->ID,'section2_desc',true);
                    $section2_button = get_post_meta($post->ID,'section2_button',true);
                    echo '<div class="copy">';
                    	if(!empty($section2_title)) {
                    		echo '<h1 data-animation="slideDown">'.$section2_title.'</h1>';
                    	} else {
                    		echo '<h1 data-animation="slideDown">The Science of Actively Listening to Your Customers</h1>';
                    	}
                    	echo '<img data-animation="slideUp" src="'.get_bloginfo('template_directory').'/assets/images/logo_icon.svg" alt="Hoolio" />';
                    	echo '<h1 data-animation="slideDown">Meet Hoolio.</h1>';
                    	if(!empty($section2_desc)) {
                    		echo '<p data-animation="slideUp">'.$section2_desc.'</p>';
                    	} else {
                    		echo '<p data-animation="slideUp">Hoolio is the AI wizard here at Wyzerr. He takes in feedback data and turns it into real-time insight.  The more data you feed Hoolio, the smarter he becomes.  His insight helps you understand your customers, develop new products, identify sales opportunities, create targeted marketing messages, and ultimately stay ahead of your competitors. Check out what Hoolio is currently working on:</p>';
                    	}
                    	if(!empty($section2_button)) {
		                	echo '<a href="'.site_url('use-cases').'" class="btn">'.$section2_button.'</a>';
		                } else {
		                	echo '<a href="'.site_url('use-cases').'" class="btn">View Use Cases</a>';
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
					$section3_title = get_post_meta($post->ID,'section3_title',true);

					$section3_tab1_icon = get_post_meta($post->ID,'section3_tab1_icon',true);
					$section3_tab1_text = get_post_meta($post->ID,'section3_tab1_text',true);
					$section3_tab1_page = get_post_meta($post->ID,'section3_tab1_page',true);

					$section3_tab2_icon = get_post_meta($post->ID,'section3_tab2_icon',true);
					$section3_tab2_text = get_post_meta($post->ID,'section3_tab2_text',true);
					$section3_tab2_page = get_post_meta($post->ID,'section3_tab2_page',true);

					$section3_tab3_icon = get_post_meta($post->ID,'section3_tab3_icon',true);
					$section3_tab3_text = get_post_meta($post->ID,'section3_tab3_text',true);
					$section3_tab3_page = get_post_meta($post->ID,'section3_tab3_page',true);

                    echo '<div class="copy" data-animation="slideUp">';
                    	if(!empty($section3_title)) {
                    		echo '<h1 data-animation="slideDown">'.$section3_title.'</h1>';
                    	} else {
                    		echo '<h1 data-animation="slideDown">Market research in a box.</h1>';
                    	}
                    echo '</div>';

                    echo '<ul class="thirds">';
                    	if(!empty($section3_tab1_icon) && !empty($section3_tab1_text) && !empty($section3_tab1_page)) {
                    		echo '<li data-page="'.$section3_tab1_page.'" class="active">';
                				echo '<img src="'.$section3_tab1_icon.'" alt="" />';
                				echo '<p>'.$section3_tab1_text.'</p>';
                			echo '</li>';
                		}
                		if(!empty($section3_tab2_icon) && !empty($section3_tab2_text) && !empty($section3_tab2_page)) {
                			echo '<li data-page="'.$section3_tab2_page.'">';
                				echo '<img data-src="'.$section3_tab2_icon.'" src="'.$section3_tab2_icon.'" alt="" />';
                				echo '<p>'.$section3_tab2_text.'</p>';
                			echo '</li>';
                		}
                		if(!empty($section3_tab3_icon) && !empty($section3_tab3_text) && !empty($section3_tab3_page)) {
                			echo '<li data-page="'.$section3_tab3_page.'">';
                				echo '<img data-src="'.$section3_tab3_icon.'" src="'.$section3_tab3_icon.'" alt="" />';
                				echo '<p>'.$section3_tab3_text.'</p>';
                			echo '</li>';
                		}
                    echo '</ul>';

                    echo '<div id="Preview">';
	                    echo '<div class="previewWrap">';
					        echo '<div class="half previewText in">';
					            echo '<h3>'.get_post_meta($section3_tab1_page,'sub_title', true).'</h3>';
					            echo '<p>'.get_post_meta($section3_tab1_page,'quote', true).'</p>';
					            echo '<a href="'.get_the_permalink($section3_tab1_page).'" class="btn">Learn More</a>';
					        echo '</div>';
					        echo '<div class="half previewImage in">';
					            echo '<span>'.get_the_post_thumbnail($section3_tab1_page).'</span>';
					        echo '</div>';
					    echo '</div>';
					echo '</div>';
                    
				?>
			</div>
		</article>
	</section>

	<section id="help" class="block">
		<article class="outer">
			<div class="inner">
				<?php
					$section4_title = get_post_meta($post->ID,'section4_title',true);
					$section4_desc = get_post_meta($post->ID,'section4_desc',true);

                    echo '<div class="copy" data-animation="slideUp">';
                    	if(!empty($section4_title)) {
                    		echo '<h1 data-animation="slideDown">'.$section4_title.'</h1>';
                    	} else {
                    		echo '<h1 data-animation="slideDown">Your customers and employees are your experts.</h1>';
                    	}
                    	if(!empty($section4_desc)) {
                    		echo '<p data-animation="slideUp">'.$section4_desc.'</p>';
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
				<div class="vidPlay"></div>
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
