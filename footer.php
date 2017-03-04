		<?php
		if(!is_front_page()) {
			
			echo '<section id="testimonials" class="block">';
				
					$testimonial_title = get_post_meta(get_option( 'page_on_front' ),'testimonial_title',true);
					$testimonial_desc = get_post_meta(get_option( 'page_on_front' ),'testimonial_desc',true);

					echo '<div class="copy">';
						echo '<h2>'.$testimonial_title.'</h2>';
						echo '<p>'.$testimonial_desc.'</p>';
					echo '</div>';

					echo '<div class="quotewrap">';

						query_posts( array(
					            'orderby' => 'rand',
					            'post_type' => 'testimonials',
					            'posts_per_page' => 2
					        )
					    );
						$c = 0;
					    if (have_posts()) : while (have_posts()) : the_post();

					        $name = get_post_meta($post->ID,'testimonial_name', true);
					        $title = get_post_meta($post->ID,'testimonial_title', true);
					        $company = get_post_meta($post->ID,'testimonial_company', true);

					        echo '<div class="quote">';
					        	if(!wp_is_mobile()) {
						        	if($c % 2 === 0) {
							        	echo '<div class="quote_image">';
							        		the_post_thumbnail();
							        	echo '</div>';
							        }
						        	echo '<div class="quote_copy">';
							        	echo '<blockquote>'.get_the_content().'</blockquote>';
							        	echo '<cite>- <strong>'.$name.'</strong> '.$company.'</cite>';
							        echo '</div>';
							        if($c % 2 !== 0) {
							        	echo '<div class="quote_image">';
							        		the_post_thumbnail();
							        	echo '</div>';
							        }
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

					        $c++;
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

			echo '</section>';
		}
		?>

	    <?php 
	    if(!is_page('Checkout')) {
	    	echo '<section class="cta">';
				$cta_title = get_post_meta($post->ID,'cta_title',true);
	            $cta_desc = get_post_meta($post->ID,'cta_desc',true);
	            $cta_button = get_post_meta($post->ID,'cta_button',true);
	            if(!empty($cta_title)) {
	            	echo '<h1>'.$cta_title.'</h1>';
	            } else {
	            	echo '<h1>Sign up now to join our first class of Wizards.</h1>';
	            }
				if(!empty($cta_desc)) {
					echo '<p>'.$cta_desc.'</p>';
				} else {
					echo '<p>Join the disruptors saying no more to bad surveys</p>';
				}
				if(!empty($cta_button)) {
					echo '<a href="'.site_url('pricing').'" class="btn">'.$cta_button.'</a>';
				} else {
					echo '<a href="'.site_url('pricing').'" class="btn">Buy Presale</a>';
				}
			echo '</section>';
		} ?>

		<footer>
			<div class="outer">
				<div class="inner">
					<?php
						$menu_args = array(
							'theme_location'  => 'footer-menu',
							'menu'            => 'Footer Menu',
							'container'       => 'div',
							'container_class' => 'menu',
							'container_id'    => '',
							'menu_class'      => 'nav',
							'menu_id'         => '',
							'echo'            => true,
							'fallback_cb'     => 'wp_page_menu',
							'before'          => '',
							'after'           => '',
							'link_before'     => '',
							'link_after'      => '',
							'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
							'depth'           => 0,
							'walker'          => ''
						);
						wp_nav_menu($menu_args);

						get_template_part( 'partials/theme/social', 'icons' );

						echo '<div class="legal">&copy; '.date("Y").' '.get_bloginfo("name").'. All Rights Reserved.</div>';
					?>
				</div>
			</div>
		</footer>

	</div>

	</body>
</html>

<?php wp_footer(); ?>