<?php 

/*
Template Name: Home
*/

get_header(); ?>

	<section id="top" class="block" data-parallax='{"y" : 230, "smoothness": 1}'>
		<?php
			$section1_title = get_post_meta($post->ID,'section1_title',true);
            $section1_desc = get_post_meta($post->ID,'section1_desc',true);
            $section1_vidThumb = get_post_meta($post->ID,'section1_vidThumb',true);
            $section1_desc3 = get_post_meta($post->ID,'section1_desc3',true);
            if(!empty($section1_title)) {
        		echo '<h1>'.$section1_title.'</h1>';
        	} else {
        		echo '<h1>Surveys that dont suck.</h1>';
        	}
        	if(!empty($section1_desc)) {
        		echo '<p>'.$section1_desc.'</p>';
        	} else {
        		echo '<p>Create full interactive surveys that look and feel like a game. No market research skills required.</p>';
        	}
        	echo '<div class="featureVid">';
	        	if(!empty($section1_vidThumb)) {
	        		if(!wp_is_mobile()) {
		        		echo '<i class="fa fa-play"></i>';
		        		echo '<img src="'.$section1_vidThumb.'" alt="" />';
		        	} else {
		        		echo '<iframe src="https://player.vimeo.com/video/192497090" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>';
		        	}
	        	}
        	echo '</div>';
        	echo '<div class="client_logos">';
        		if(!empty($section1_desc3)) {
        			echo '<p>'.$section1_desc3.'</p>';
        		} else {
        			echo '<p>Trusted by forward thinking individuals at companies of all sizes.</p>';
        		}
        		echo '<img src="'.get_bloginfo('template_directory').'/assets/images/client_logos/unilever_white.png" alt="Unilever" />';
        		echo '<img src="'.get_bloginfo('template_directory').'/assets/images/client_logos/uc_white.png" alt="University of Cincinnati" />';
        		echo '<img src="'.get_bloginfo('template_directory').'/assets/images/client_logos/walmart_white.png" alt="Walmart" />';
        		echo '<img src="'.get_bloginfo('template_directory').'/assets/images/client_logos/disney_white.png" alt="Disney" />';
        		echo '<img src="'.get_bloginfo('template_directory').'/assets/images/client_logos/cac_white.png" alt="CAC" />';
        		echo '<img src="'.get_bloginfo('template_directory').'/assets/images/client_logos/shopper_white.png" alt="Shopper" />';
        	echo '</div>';
        ?>
	</section>

	<section id="videoModal">
		<div class="close">
			<span class="bar cross"></span>		
			<span class="bar middle"></span>		
			<span class="bar cross"></span>		
		</div>
		<div class="outer">
			<div class="inner">
				<?php
					$section1_modalBtnText = get_post_meta($post->ID,'section1_modalBtnText',true);
	    			$section1_modalBtnLink = get_post_meta($post->ID,'section1_modalBtnLink',true);
					if($section1_modalBtnText && $section1_modalBtnLink) {
						echo '<a href="'.$section1_modalBtnLink.'" class="btn">'.$section1_modalBtnText.'</a>';
					} else {
						echo '<a href="#" class="btn">Try demo survey</a>';
					}
				?>
			</div>
		</div>
	</section>

	<section id="meet" class="block">
		<?php
			$section2_title = get_post_meta($post->ID,'section2_title',true);
            $section2_desc = get_post_meta($post->ID,'section2_desc',true);

            $section2_square1_image = get_post_meta($post->ID,'section2_square1_image',true);
            $section2_square1_title = get_post_meta($post->ID,'section2_square1_title',true);
            $section2_square1 = get_post_meta($post->ID,'section2_square1',true);
            
            $section2_square2_image = get_post_meta($post->ID,'section2_square2_image',true);
            $section2_square2_title = get_post_meta($post->ID,'section2_square2_title',true);
            $section2_square2 = get_post_meta($post->ID,'section2_square2',true);
            
            $section2_square3_image = get_post_meta($post->ID,'section2_square3_image',true);
            $section2_square3_title = get_post_meta($post->ID,'section2_square3_title',true);
            $section2_square3 = get_post_meta($post->ID,'section2_square3',true);

            echo '<div class="copy" data-animation="slideUp">';
            	if(!empty($section2_title)) {
            		echo '<h1>'.$section2_title.'</h1>';
            	} else {
            		echo '<h1>The Science of Actively Listening to Your Customers</h1>';
            	}
            	if(!empty($section2_desc)) {
            		echo '<p class="desc">'.$section2_desc.'</p>';
            	} else {
            		echo '<p class="desc">Collect data that matters from the people that matter most.</p>';
            	}
            echo '</div>';

            echo '<div class="squares">';
            	if(!empty($section2_square1_image) && !empty($section2_square1_title) && !empty($section2_square1)) {
            		echo '<article class="outer" style="background:url('.$section2_square1_image.') no-repeat scroll center / cover;">';
            			echo '<p><strong>'.$section2_square1_title.'</strong>'.$section2_square1.'</p>';
            		echo '</article>';
            	}
            	if(!empty($section2_square2_image) && !empty($section2_square2_title) && !empty($section2_square2)) {
            		echo '<article class="outer" style="background:url('.$section2_square2_image.') no-repeat scroll center / cover;">';
            			echo '<p><strong>'.$section2_square2_title.'</strong>'.$section2_square2.'</p>';
            		echo '</article>';
            	}
            	if(!empty($section2_square3_image) && !empty($section2_square3_title) && !empty($section2_square3)) {
            		echo '<article class="outer" style="background:url('.$section2_square3_image.') no-repeat scroll center / cover;">';
            			echo '<p><strong>'.$section2_square3_title.'</strong>'.$section2_square3.'</p>';
            		echo '</article>';
            	}
            echo '</div>';

		?>
	</section>

	<section id="research" class="block" data-parallax='{"y" : -150, "smoothness": 1}'>
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

            echo '<div class="copy">';
            	if(!empty($section3_title)) {
            		echo '<h1>'.$section3_title.'</h1>';
            	} else {
            		echo '<h1>Market research in a box.</h1>';
            	}
            echo '</div>';

            echo '<div class="hide_mobile">';

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

                echo '<div id="Preview" class="hide_mobile">';
                	echo '<i class="fa fa-spinner fa-spin"></i>';
                    echo '<div class="previewWrap">';
				        echo '<div class="half previewText in">';
				            echo '<h3>'.get_post_meta($section3_tab1_page,'sub_title', true).'</h3>';
				            echo '<p>'.get_post_meta($section3_tab1_page,'quote', true).'</p>';
				            echo '<a href="'.get_the_permalink($section3_tab1_page).'" class="btn">Learn More</a>';
				        echo '</div>';
				        echo '<div class="half previewImage in">';
				            echo '<span><img src="'.get_post_meta($section3_tab1_page,'tabImage',true).'" alt="" /></span>';
				        echo '</div>';
				    echo '</div>';
				echo '</div>';

			echo '</div>';

			if(wp_is_mobile()) {
				echo '<div id="Preview" class="noTablet mobile">';
                    echo '<div class="previewWrap">';
                    	echo '<div class="half previewImage in">';
				            echo '<span>'.get_post_meta($section3_tab1_page,'tabImage',true).'</span>';
				        echo '</div>';
				        echo '<div class="half previewText in">';
				            echo '<h3>'.get_post_meta($section3_tab1_page,'sub_title', true).'</h3>';
				            echo '<p>'.get_post_meta($section3_tab1_page,'quote', true).'</p>';
				            echo '<a href="'.get_the_permalink($section3_tab1_page).'" class="btn">Learn More</a>';
				        echo '</div>';
				    echo '</div>';
				    echo '<div class="previewWrap">';
				    	echo '<div class="half previewImage in">';
				            echo '<span>'.get_post_meta($section3_tab2_page,'tabImage',true).'</span>';
				        echo '</div>';
				        echo '<div class="half previewText in">';
				            echo '<h3>'.get_post_meta($section3_tab2_page,'sub_title', true).'</h3>';
				            echo '<p>'.get_post_meta($section3_tab2_page,'quote', true).'</p>';
				            echo '<a href="'.get_the_permalink($section3_tab2_page).'" class="btn">Learn More</a>';
				        echo '</div>';
				    echo '</div>';
				    echo '<div class="previewWrap">';
				        echo '<div class="half previewImage in">';
				            echo '<span>'.get_post_meta($section3_tab3_page,'tabImage',true).'</span>';
				        echo '</div>';
				        echo '<div class="half previewText in">';
				            echo '<h3>'.get_post_meta($section3_tab3_page,'sub_title', true).'</h3>';
				            echo '<p>'.get_post_meta($section3_tab3_page,'quote', true).'</p>';
				            echo '<a href="'.get_the_permalink($section3_tab3_page).'" class="btn">Learn More</a>';
				        echo '</div>';
				    echo '</div>';
				echo '</div>';
			}
            
		?>
	</section>

	<section id="testimonials" class="block">
		<?php
			$testimonial_title = get_post_meta($post->ID,'testimonial_title',true);
			$testimonial_desc = get_post_meta($post->ID,'testimonial_desc',true);

			echo '<div class="copy">';
				echo '<h1>'.$testimonial_title.'</h1>';
				echo '<p>'.$testimonial_desc.'</p>';
			echo '</div>';

			echo '<div class="quotewrap">';

				query_posts( array(
			            'orderby' => 'rand',
			            'post_type' => 'testimonials',
			            'posts_per_page' => 2
			        )
			    );
			    
			    if (have_posts()) : while (have_posts()) : the_post();

			        $name = get_post_meta($post->ID,'testimonial_name', true);
			        $title = get_post_meta($post->ID,'testimonial_title', true);
			        $company = get_post_meta($post->ID,'testimonial_company', true);

			        echo '<div class="quote">';
			        	if(!wp_is_mobile()) {
				        	echo '<div class="quote_copy">';
					        	echo '<blockquote>'.get_the_content().'</blockquote>';
					        	echo '<cite>- <strong>'.$name.'</strong> '.$company.'</cite>';
					        echo '</div>';
					        echo '<div class="quote_image">';
				        		the_post_thumbnail();
				        	echo '</div>';
					    } else {
					    	echo '<div class="quote_image">';
				        		the_post_thumbnail();
				        	echo '</div>';
					    	echo '<div class="quote_copy">';
					        	echo '<blockquote>'.get_the_content().'</blockquote>';
					        	echo '<cite>- <strong>'.$name.'</strong> '.$company.'</cite>';
					        echo '</div>';
					    }
			        echo '</div>';

			        endwhile;
			    endif;

			    wp_reset_query();

		    echo '</div>';

		    echo '<div class="client_logos">';
        		echo '<p>Trusted by forward thinking individuals at companies of all sizes.</p>';
        		echo '<img src="'.get_bloginfo('template_directory').'/assets/images/client_logos/unilever.png" alt="Unilever" />';
        		echo '<img src="'.get_bloginfo('template_directory').'/assets/images/client_logos/uc.png" alt="University of Cincinnati" />';
        		echo '<img src="'.get_bloginfo('template_directory').'/assets/images/client_logos/walmart.png" alt="Walmart" />';
        		echo '<img src="'.get_bloginfo('template_directory').'/assets/images/client_logos/disney.png" alt="Disney" />';
        		echo '<img src="'.get_bloginfo('template_directory').'/assets/images/client_logos/cac.png" alt="CAC" />';
        		echo '<img src="'.get_bloginfo('template_directory').'/assets/images/client_logos/shopper.png" alt="Shopper" />';
        	echo '</div>';
	    ?>
	</section>

	<div class="bottom" data-parallax='{"y" : 230, "smoothness": 1}'>;
		<section id="help" class="block">
			<article class="outer">
				<div class="inner">
					<?php
						$section4_title = get_post_meta($post->ID,'section4_title',true);
						$section4_desc = get_post_meta($post->ID,'section4_desc',true);

	                    echo '<div class="copy">';
	                    	if(!empty($section4_title)) {
	                    		echo '<h1>'.$section4_title.'</h1>';
	                    	} else {
	                    		echo '<h1>Your customers and employees are your experts.</h1>';
	                    	}
	                    	if(!empty($section4_desc)) {
	                    		echo '<p>'.$section4_desc.'</p>';
	                    	} else {
	                    		echo '<p>Whether you’re a small business owner, or a marketer at a large enterprise, we help you make intelligent decisions by constantly listening to the people that know your company best. We call it the science of active listening.</p>';
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
