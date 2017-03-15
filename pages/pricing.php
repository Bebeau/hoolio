<?php 

/*
Template Name: Buy Now
*/

get_header(); 

global $post;
$pricingTitle = get_post_meta($post->ID,'pricingTitle', true);
$contentTitle = get_post_meta($post->ID,'contentTitle', true);

?>

<section id="checkout" data-parallax='{"y" : 230, "smoothness": 1}'>
	<?php
		if(!empty($pricingTitle)) {
			echo '<h1>'.$pricingTitle.'</h1>';
		}
		if(!empty($contentTitle)) {
			echo '<p>'.$contentTitle.'</p>';
		}
	?>
	<article class="green">
		<div class="outer">
			<div class="inner">
				<h2>Professional Plus</h2>
				<p class="price">$499+<span>a month billed annually</span></p>
				<p>All professional features plus:</p>
				<ul>
					<li>10 hours of advisory services per month.</li>
					<li>Assistance designing and impleimenting surveys.</li>
					<li>Assistance improving survey based on previous results.</li>
				</ul>
				<a href="<?php echo site_url('/contact'); ?>" class="btn">Get In Touch</a>
			</div>
		</div>
	</article>
	<article class="blue">
		<div class="outer">
			<div class="inner">
				<h2>Professional</h2>
				<p class="price">$99<span>a month billed annually</span></p>
				<a href="https://editor.wyzerr.com/signup" class="btn">Get Started</a>
				<ul>
					<li>Easy to use survey editor</li>
					<li>Fun and Fast Smart forms</li>
					<li>Innovative Dashboard for quickfeedback analysis</li>
					<li>Unlimited Surveys</li>
					<li>Unlimited Responses</li>
				</ul>
			</div>
		</div>
	</article>
	<article class="grey">
		<div class="outer">
			<div class="inner">
				<h2>Enterprise</h2>
				<p class="price">Custom<span>priced based on needs</span></p>
				<p>Full survey solution including:</p>
				<ul>
					<li>Discovery</li>
					<li>Design</li>
					<li>Delivery</li>
					<li>Iterative learning and data analysis with data scientist</li>
				</ul>
				<a href="<?php echo site_url('/contact'); ?>" class="btn">Get In Touch</a>
			</div>
		</div>
	</article>
</section>

<section id="page" class="section checkoutPage" data-parallax='{"y" : -150, "smoothness": 1}'>
	<div class="container">
		<?php
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
		?>
		<h2>Frequently Asked Questions</h2>
		<?php list_perks($post); ?>
	</div>
</section>

<?php get_footer(); ?>