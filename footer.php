		<section id="testimonials">
			<div class="outer">
				<div class="inner" data-animation="slideUp">
					<!-- the viewport -->
					<div class="m-scooch m-fluid m-scooch-testimonials">
						<!-- the slider -->
						<div class="m-scooch-inner">
							<div class="m-item active">
								<blockquote>
									“We have incredible insight into our data thanks to Wyzerr 
									and it’s vision for data collection. We recommend them 
									for any of your survey needs.”
								</blockquote>
								<cite>
									<span class="name">MICHAEL WATSON </span>
									<span class="title">PRODUCT DESIGNER</span>
									<span class="company">TIMES10 MEDIA</span>
								</cite>
							</div>
							<div class="m-item">
								<blockquote>
									“We have incredible insight into our data thanks to Wyzerr 
									and it’s vision for data collection. We recommend them 
									for any of your survey needs.”
								</blockquote>
								<cite>
									<span class="name">MICHAEL WATSON </span>
									<span class="title">PRODUCT DESIGNER</span>
									<span class="company">TIMES10 MEDIA</span>
								</cite>
							</div>
							<div class="m-item">
								<blockquote>
									“We have incredible insight into our data thanks to Wyzerr 
									and it’s vision for data collection. We recommend them 
									for any of your survey needs.”
								</blockquote>
								<cite>
									<span class="name">MICHAEL WATSON </span>
									<span class="title">PRODUCT DESIGNER</span>
									<span class="company">TIMES10 MEDIA</span>
								</cite>
							</div>
						</div>
						<div class="m-scooch-controls m-scooch-bulleted">
							<a href="" data-m-slide="1"></a>
							<a href="" data-m-slide="2"></a>
							<a href="" data-m-slide="3"></a>
						</div>
					</div>
				</div>
			</div>
		</section>

		<section id="cta">
			<article class="outer">
				<div class="inner" data-animation="slideUp">
					<h2>Be Wyzerr, know more.</h2>
					<button class="btn btn-wizard">Be A Wizard</button>
				</div>
			</article>
		</section>

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

		<section id="signUp">
			<div class="close">
				<span class="bar cross"></span>
				<span class="bar middle"></span>
				<span class="bar cross"></span>
			</div>
			<div class="outer">
				<div class="inner">
					<div class="copy">
						<h2>Sign up to request access to our private beta.</h2>
						<form role="form" method="POST" action="">
							<input type="email" name="emailaddress" id="emailaddress" placeholder="email" />
							<span class="enter">Press Enter</span>
						</form>
						<p>Schedule a meeting for premium (immediate) access.</p>
					</div>
				</div>
			</div>
		</section>
    
	</body>
</html>

<?php wp_footer(); ?>  