<?php

/*
Template Name: Use Cases
*/

get_header();

if (have_posts()) : while (have_posts()) : the_post();
	// get image and set it as background of parallax div
	$image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID), 'large' );
	if(!empty($image)) { ?>
		<div id="pageBanner" data-parallax='{"y" : 230, "smoothness": 1}' style="background:url(<?php echo $image[0]; ?>) no-repeat scroll center / cover">
	<?php } else { ?>
		<div id="pageBanner" class="default" data-parallax='{"y" : 230, "smoothness": 1}'>
	<?php } ?>
			<div class="outer">
				<div class="inner">
					<?php the_title("<h1>","</h1>"); ?>
				</div>
			</div>
		</div>
	<?php
endwhile; endif; ?>

<section id="page" class="section">
	<img data-animation="slideUp" src="<?php echo bloginfo('template_directory'); ?>/assets/images/logo_icon.svg" alt="Hoolio" />
	<h2>Hoolio is here to guide<br />you through the use cases.</h2>
	<div id="bubblesMobile">
		<div class="frame">
			<div class="titleBar">
				<h3><i class="icon icon-pulse"></i> Pulse Surveys</h3>
				<div class="circleClose">
					<span class="bar cross"></span>
					<span class="bar middle"></span>
					<span class="bar cross"></span>
				</div>
			</div>
			<div class="frameCopy">
				<img src="<?php echo bloginfo('template_directory');?>/assets/images/screens/PulseSurveys.png" alt="" />
				<p>Quick and frequent surveys that provide insight on the health of a company, employees, or consumer base.</p>
				<a href="<?php echo site_url('contact'); ?>" class="btn">Be A Wizard</a>
			</div>
		</div>
		<div class="frame">
			<div class="titleBar">
				<h3><i class="icon icon-voice"></i> Voice Of Customer</h3>
				<div class="circleClose">
					<span class="bar cross"></span>
					<span class="bar middle"></span>
					<span class="bar cross"></span>
				</div>
			</div>
			<div class="frameCopy">
				<img src="<?php echo bloginfo('template_directory');?>/assets/images/screens/Voiceofcustomer.png" alt="" />
				<p>An on-going study to enhance customer experience.</p>
				<p class="leftText">
					Our VoC program:
					<br>
    				<ul>
						<li>Captures large volumes of customer feedback</li>
						<li>Interprets resulting data in real time</li>
						<li>Provides actionable tasks to improve customer experience</li>
						<li>Monitor results</li>
          			</ul>
				</p>
				<a href="<?php echo site_url('contact'); ?>" class="btn">Be A Wizard</a>
			</div>
		</div>
		<div class="frame">
			<div class="titleBar">
				<h3><i class="icon icon-behavior"></i> Consumer Behavior Study</h3>
				<div class="circleClose">
					<span class="bar cross"></span>
					<span class="bar middle"></span>
					<span class="bar cross"></span>
				</div>
			</div>
			<div class="frameCopy">
				<img src="<?php echo bloginfo('template_directory');?>/assets/images/screens/BehavioralStudy.png" alt="" />
				<p>A Wyzerr consumer behavior study is a deep dive into understanding the beliefs, ideologies, preferences, and trends within different communities, social groups, and demographics. Use this insight to develop new products, find product market fit, or create targeted marketing messages.</p>
				<a href="<?php echo site_url('contact'); ?>" class="btn">Be A Wizard</a>
			</div>
		</div>
		<div class="frame">
			<div class="titleBar">
				<h3><i class="icon icon-db"></i> Screening Tool</h3>
				<div class="circleClose">
					<span class="bar cross"></span>
					<span class="bar middle"></span>
					<span class="bar cross"></span>
				</div>
			</div>
			<div class="frameCopy">
				<img src="<?php echo bloginfo('template_directory');?>/assets/images/screens/ScreeningTool.png" alt="" />
				<p>Whether you’re a Venture Capitalist, or an HR manager, screening applicants is a time-consuming process. Our screening tool allows you to quickly identify people that meet your criteria.</p>
				<a href="<?php echo site_url('contact'); ?>" class="btn">Be A Wizard</a>
			</div>
		</div>
		<div class="frame">
			<div class="titleBar">
				<h3><i class="icon icon-smile"></i> Voice of Employees</h3>
				<div class="circleClose">
					<span class="bar cross"></span>
					<span class="bar middle"></span>
					<span class="bar cross"></span>
				</div>
			</div>
			<div class="frameCopy">
				<img src="<?php echo bloginfo('template_directory');?>/assets/images/screens/EmployeeHappinessSurveys.png" alt="" />
				<p>Happy employees are critical to growing and scaling a successful business. We’ve developed several tools to identify issues in the workplace, and provide actionable tasks to improve employee satisfaction. The output is a simple dashboard that anyone in the company can use to determine course of action.</p>
				<a href="<?php echo site_url('contact'); ?>" class="btn">Be A Wizard</a>
			</div>
		</div>
		<div class="frame">
			<div class="titleBar">
				<h3><i class="icon icon-life"></i> Quality of Life Study</h3>
				<div class="circleClose">
					<span class="bar cross"></span>
					<span class="bar middle"></span>
					<span class="bar cross"></span>
				</div>
			</div>
			<div class="frameCopy">
				<img src="<?php echo bloginfo('template_directory');?>/assets/images/screens/QualityOfLife.png" alt="" />
				<p>This study uncovers satisfaction levels with education, housing, employment, government, and businesses to better understand a community.</p>
				<a href="<?php echo site_url('contact'); ?>" class="btn">Be A Wizard</a>
			</div>
		</div>
	</div>
	<ul id="bubbles">
		<li>
			<div class="bubblewrap bubble-1" data-numb="1">
				<div data-animation="bubble" class="bubble">
					<i class="icon icon-pulse"></i>
				</div>
				<span class="label" data-animation="slideUp">Pulse<br />Surveys</span>
			</div>
		</li>
		<li>
			<div class="bubblewrap bubble-2" data-numb="2">
				<div data-animation="bubble" class="bubble">
					<i class="icon icon-voice"></i>
				</div>
				<span class="label" data-animation="slideUp">Voice Of<br />Customer</span>
			</div>
		</li>
		<li>
			<div class="bubblewrap bubble-3" data-numb="3">
				<div data-animation="bubble" class="bubble">
					<i class="icon icon-behavior"></i>
				</div>
				<span class="label" data-animation="slideUp">Consumer Behavior Study</span>
			</div>
		</li>
		<li>
			<div class="bubblewrap bubble-4" data-numb="4">
				<div data-animation="bubble" class="bubble">
					<i class="icon icon-db"></i>
				</div>
				<span class="label" data-animation="slideUp">Screening<br />Tool</span>
			</div>
		</li>
		<li>
			<div class="bubblewrap bubble-5" data-numb="5">
				<div data-animation="bubble" class="bubble">
					<i class="icon icon-smile"></i>
				</div>
				<span class="label" data-animation="slideUp">Employee<br />Happiness</span>
			</div>
		</li>
		<li>
			<div class="bubblewrap bubble-6" data-numb="6">
				<div data-animation="bubble" class="bubble">
					<i class="icon icon-life"></i>
				</div>
				<span class="label" data-animation="slideUp">Quality of<br />Life Study</span>
			</div>
		</li>
	</ul>
	<div id="frameTabs">
		<div class="frame frame-1 open">
			<div class="outer">
				<div class="inner">
					<div class="copy">
						<div class="half">
							<i class="icon icon-pulse"></i>
							<h3>Pulse Surveys</h3>
							<p>Quick and frequent surveys that provide insight on the health of a company, employees, or consumer base.</p>
							<a href="<?php echo site_url('contact'); ?>" class="btn">Be A Wizard</a>
						</div>
						<div class="half">
							<img src="<?php echo bloginfo('template_directory');?>/assets/images/screens/PulseSurveys.png" src="" alt="" />
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="frame frame-2">
			<div class="outer">
				<div class="inner">
					<div class="copy">
						<div class="half">
							<i class="icon icon-voice"></i>
							<h3>Voice of customer (VoC)</h3>
							<p>An on-going study to enhance customer experience.</p>
							<p class="leftText">
								Our VoC program:
								<ul>
									<li>Captures large volumes of customer feedback</li>
									<li>Interprets resulting data in real time</li>
									<li>Provides actionable tasks to improve customer experience</li>
									<li>Monitor results</li>
								</ul>
							</p>
							<a href="<?php echo site_url('contact'); ?>" class="btn">Be A Wizard</a>
						</div>
						<div class="half">
							<img src="<?php echo bloginfo('template_directory');?>/assets/images/screens/Voiceofcustomer.png" src="" alt="" />
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="frame frame-3">
			<div class="outer">
				<div class="inner">
					<div class="copy">
						<div class="half">
							<i class="icon icon-behavior"></i>
							<h3>Consumer Behavior Study (market research study)</h3>
							<p>A Wyzerr consumer behavior study is a deep dive into understanding the beliefs, ideologies, preferences, and trends within different communities, social groups, and demographics. Use this insight to develop new products, find product market fit, or create targeted marketing messages.</p>
							<a href="<?php echo site_url('contact'); ?>" class="btn">Be A Wizard</a>
						</div>
						<div class="half">
							<img src="<?php echo bloginfo('template_directory');?>/assets/images/screens/BehavioralStudy.png" src="" alt="" />
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="frame frame-4">
			<div class="outer">
				<div class="inner">
					<div class="copy">
						<div class="half">
							<i class="icon icon-db"></i>
							<h3>Screening Tool</h3>
							<p>Whether you’re a Venture Capitalist, or an HR manager, screening applicants is a time-consuming process. Our screening tool allows you to quickly identify people that meet your criteria.</p>
							<a href="<?php echo site_url('contact'); ?>" class="btn">Be A Wizard</a>
						</div>
						<div class="half">
							<img src="<?php echo bloginfo('template_directory');?>/assets/images/screens/ScreeningTool.png" src="" alt="" />
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="frame frame-5">
			<div class="outer">
				<div class="inner">
					<div class="copy">
						<div class="half">
							<i class="icon icon-smile"></i>
							<h3>Employee Happiness</h3>
							<p>Happy employees are critical to growing and scaling a successful business. We’ve developed several tools to identify issues in the workplace, and provide actionable tasks to improve employee satisfaction. The output is a simple dashboard that anyone in the company can use to determine course of action.</p>
							<a href="<?php echo site_url('contact'); ?>" class="btn">Be A Wizard</a>
						</div>
						<div class="half">
							<img src="<?php echo bloginfo('template_directory');?>/assets/images/screens/EmployeeHappinessSurveys.png" src="" alt="" />
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="frame frame-6">
			<div class="outer">
				<div class="inner">
					<div class="copy">
						<div class="half">
							<i class="icon icon-life"></i>
							<h3>Quality of Life Study</h3>
							<p>This study uncovers satisfaction levels with education, housing, employment, government, and businesses to better understand a community.</p>
							<a href="<?php echo site_url('contact'); ?>" class="btn">Be A Wizard</a>
						</div>
						<div class="half">
							<img src="<?php echo bloginfo('template_directory');?>/assets/images/screens/QualityOfLife.png" src="" alt="" />
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

<?php

get_footer();

?>