		
		<?php 
			query_posts( array(
		            'posts_per_page' => 1,
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
		        echo '</section>'; ?>
		        <section id="cta">
					<article class="outer">
						<div class="inner" data-animation="slideUp">
							<h2>Be Wyzerr, know more.</h2>
							<button class="btn btn-wizard">Be A Wizard</button>
						</div>
					</article>
				</section>
		    <?php endif;
		    wp_reset_query();
	    ?>

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

		<section id="checkout">
			<div class="close">
				<span class="bar cross"></span>
				<span class="bar middle"></span>
				<span class="bar cross"></span>
			</div>
			<div class="left">
				<div class="outer">
					<div class="inner">
						<img src="<?php echo bloginfo('template_directory'); ?>/assets/images/ipad.png" alt="" />
					</div>
				</div>
			</div>
			<div class="right">
				<div class="outer">
					<div class="inner">
						<div class="copy">
							<h2>Become A Wizard</h2>
							<ul>
								<li>1 year pre-paid subscription to Wyzerr</li>
								<li>Full priority access to our campaign wizard</li>
								<li>Unlimited responses</li>
								<li>Locked-in rate of $5/month (reguarly $39)</li>
							</ul>
							<?php require_once('stripe/config.php'); ?>
							<form action="" method="POST" id="checkoutFrm">
								<div class="group half">
									<article>
										<label for="firstname">First</label>
										<input type="text" name="firstname" id="firstname" placeholder="john" />
									</article>
									<article>
										<label for="lastname">Last</label>
										<input type="text" name="lastname" id="lastname" placeholder="doe" />
									</article>
								</div>
								<div class="group">
									<label for="name">Email</label>
									<input type="text" name="emailaddress" id="emailaddress" placeholder="email@address.." />
								</div>
								<div class="group">
									<label for="name">Card Number</label>
									<input type="text" id="card_numb" placeholder="*****************" data-stripe="number" />
								</div>
								<div class="group dropdowns">
									<label for="expire_month">Expiration Date</label>
									<span>
										<div class="dropdown month">
							                <button>Month <i class="fa fa-angle-down"></i></button>
							                <ul class="dropdown-menu" data-input="expire_month">
							                    <li data-value="01">January</li>
							                    <li data-value="02">February</li>
							                    <li data-value="03">March</li>
							                    <li data-value="04">April</li>
							                    <li data-value="05">May</li>
							                    <li data-value="06">June</li>
							                    <li data-value="07">July</li>
							                    <li data-value="08">August</li>
							                    <li data-value="09">September</li>
							                    <li data-value="10">October</li>
							                    <li data-value="11">November</li>
							                    <li data-value="12">December</li>
							                </ul>
							            </div>
							            <input type="hidden" id="expire_month" data-stripe="exp_month" />
							        </span>
							        <span>
										<div class="dropdown year">
							                <button>Year <i class="fa fa-angle-down"></i></button>
							                <ul class="dropdown-menu" data-input="expire_year">
							                    <li data-value="2017">2017</li>
							                    <li data-value="2018">2018</li>
							                    <li data-value="2019">2019</li>
							                    <li data-value="2020">2020</li>
							                    <li data-value="2021">2021</li>
							                    <li data-value="2022">2022</li>
							                    <li data-value="2023">2023</li>
							                    <li data-value="2024">2024</li>
							                    <li data-value="2025">2025</li>
							                    <li data-value="2026">2026</li>
							                    <li data-value="2026">2028</li>
							                </ul>
							            </div>
										<input type="hidden" id="expire_year" data-stripe="exp_year" />
									</span>
								</div>
								<div class="cvc">
									<label for="cvc">CVC</label>
									<input type="text" id="cvc" placeholder="***" data-stripe="cvc" />
								</div>
								<div class="payment">
									<span class="price">$220/year</span>
									<button type="submit" class="btn btn-submit">Pay Now</button>
								</div>
								<span class="payment-errors"></span>
							</form>
						</div>
						<div class="successMessage">
							<h2>Success!</h2>
							<p>Thank you for purchasing your pre-paid subscription to Wyzerr!</p>
							<p>A confirmation email of your order will be sent to you, along with additional information, special perks, and progress updates leading up to our great unveil.</p>
						</div>
					</div>
				</div>
			</div>
		</section>
    
	</body>
</html>

<?php wp_footer(); ?>  