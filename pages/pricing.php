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
		<h2>Professional Plus</h2>
		<p class="price">$499+<span>a month billed annually</span></p>
		<p>Work with our team to expore custom options for your business.</p>
		<a href="" class="btn">Get In Touch</a>
	</article>
	<article class="blue">
		<h2>Professional</h2>
		<p class="price">$99<span>a month billed annually</span></p>
		<p>Everything you need to build Smartforms and easily create awesome reports.</p>
		<a href="" class="btn">Get Started</a>
		<ul>
			<li>Ulimited Surveys</li>
			<li>Unlimited Responses</li>
			<li>Awesome Support</li>
			<li>Data Export and Reports</li>
		</ul>
	</article>
	<article class="grey">
		<h2>Enterprise</h2>
		<p>If you are looking for a personalized solution to fit your specific needs, we’re here to help. Get in touch with us and we can package Wyzerrto best suit your needs.</p>
		<a href="" class="btn">Get In Touch</a>
	</article>
</section>

<section id="page" class="section checkoutPage" data-parallax='{"y" : -150, "smoothness": 1}'>
	<div class="container">
		<h2>Frequently Asked Questions</h2>
		<?php list_perks($post); ?>
	</div>
</section>

<?php get_footer(); ?>