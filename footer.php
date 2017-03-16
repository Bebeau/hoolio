	    <?php 
	    if(!is_page('Pricing')) {
	    	echo '<section class="cta">';
				$cta_title = get_post_meta(get_option( 'page_on_front' ),'cta_title',true);
	            $cta_desc = get_post_meta(get_option( 'page_on_front' ),'cta_desc',true);
	            $cta_button = get_post_meta(get_option( 'page_on_front' ),'cta_button',true);
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
					echo '<a href="https://editor.wyzerr.com/signup" class="btn">'.$cta_button.'</a>';
				} else {
					echo '<a href="https://editor.wyzerr.com/signup" class="btn">Buy Presale</a>';
				}
			echo '</section>';
		} ?>

		<!-- <form id="newsletterFrm" method="POST">
			<label for="newsletteremail">Enter your email for updates.</label>
			<input type="text" name="newsletteremail" id="newsletteremail" placeholder="email@address.." />
			<button type="submit" class="btn-submit"><i class="fa fa-arrow-circle-right"></i></button>
		</form> -->

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

	<script>
	(function(){var w=window;var ic=w.Intercom;if(typeof ic==="function"){ic('reattach_activator');ic('update',intercomSettings);}else{var d=document;var i=function(){i.c(arguments)};i.q=[];i.c=function(args){i.q.push(args)};w.Intercom=i;function l(){var s=d.createElement('script');s.type='text/javascript';s.async=true;s.src='https://widget.intercom.io/widget/jfnvyan7';var x=d.getElementsByTagName('script')[0];x.parentNode.insertBefore(s,x);}if(w.attachEvent){w.attachEvent('onload',l);}else{w.addEventListener('load',l,false);}}})()
	window.Intercom("boot", {
		app_id: "jfnvyan7"
	});
	</script>

	</body>
</html>

<?php wp_footer(); ?>