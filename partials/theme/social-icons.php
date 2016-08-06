<!-- add social media icons if url is posted in general settings within WP admin. -->
<?php if( get_option('facebook') || get_option('twitter') || get_option('instagram') || get_option('pinterest') || get_option('youtube') ) { ?>
	<div class="social">
		<?php if( get_option('facebook')) { ?>
			<a href="<?php echo get_option('facebook'); ?>" target="_blank">
				<i class="fa fa-facebook"></i>
			</a>
		<?php } ?>
		<?php if( get_option('twitter')) { ?>
			<a href="<?php echo get_option('twitter'); ?>" target="_blank">
				<i class="fa fa-twitter"></i>
			</a>
		<?php } ?>
		<?php if( get_option('instagram')) { ?>
			<a href="<?php echo get_option('instagram'); ?>" target="_blank">
				<i class="fa fa-instagram"></i>
			</a>
		<?php } ?>
		<?php if( get_option('youtube')) { ?>
			<a href="<?php echo get_option('youtube'); ?>" target="_blank">
				<i class="fa fa-youtube"></i>
			</a>
		<?php } ?>
	</div>
<?php } ?>