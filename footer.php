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