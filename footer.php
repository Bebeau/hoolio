		
		<div id="clientLogos">
			<h3>Just A Few Customer's We've Worked With...</h3>
			<span><img src="<?php echo bloginfo('template_directory');?>/assets/images/client_logos/walmart.png" alt="" /></span>
			<span><img src="<?php echo bloginfo('template_directory');?>/assets/images/client_logos/kroger.png" alt="" /></span>
			<span><img src="<?php echo bloginfo('template_directory');?>/assets/images/client_logos/unilever.png" alt="" /></span>
			<span><img src="<?php echo bloginfo('template_directory');?>/assets/images/client_logos/uc.png" alt="" /></span>
			<span><img src="<?php echo bloginfo('template_directory');?>/assets/images/client_logos/shopper.png" alt="" /></span>
			<span><img src="<?php echo bloginfo('template_directory');?>/assets/images/client_logos/cac.png" alt="" /></span>
		</div>

		<?php
		if(is_front_page()) {
			query_posts( array(
		            'order' => 'DESC',
		            'post_type' => 'testimonials'
		        )
		    );
		    if (have_posts()) :
		    	echo '<section id="testimonials">';
					echo '<div class="outer">';
						echo '<div class="inner" data-animation="slideUp">';
		    	echo '<div class="m-scooch m-fluid m-scooch-testimonials">';
		    	echo '<div class="m-scooch-inner">';
		    	while (have_posts()) : the_post();

		        $name = get_post_meta($post->ID,'testimonial_name', true);
		        $title = get_post_meta($post->ID,'testimonial_title', true);
		        $company = get_post_meta($post->ID,'testimonial_company', true);

		        if(!empty($name) && !empty($title) && !empty($company)) {
		            echo '<div class="m-item active">';
		                echo '<blockquote>'.get_the_content().'</blockquote>';
		                echo '<cite>';
		                    echo '<span class="name">'.$name.'</span>';
		                    echo '<span class="title">'.$title.'</span>';
		                    echo '<span class="company">'.$company.'</span>';
		                echo '</cite>';
		            echo '</div>';
		        }
		        endwhile;
		        echo '</div>';
		    endif;
		?>
		<?php
			$c = 1;
		    if (have_posts()) :
		    	echo '<div class="m-scooch-controls m-scooch-bulleted">';
		    	while (have_posts()) : the_post();
		    	echo '<a href="" data-m-slide="'.$c.'"></a>';
		    	$c++;
		    	endwhile;
		    	echo '</div>';
		    	echo '</div>';

		    	echo '</div>';
		        echo '</div>';
		        echo '</section>';
		    endif;
		    wp_reset_query();
	    }
	    ?>
	    <?php 
	    if(!is_page('Checkout')) { ?>
		    <section id="cta">
				<article class="outer">
					<div class="inner" data-animation="slideUp">
						<h2>A New Way To Do Market Research</h2>
						<a href="<?php echo site_url('checkout'); ?>" class="btn">Enroll Now</a>
					</div>
				</article>
			</section>
		<?php } ?>

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

	</body>
</html>

<?php wp_footer(); ?>