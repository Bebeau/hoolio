<?php get_header(); ?>

	<section id="top" class="block">
		<!-- <span class="path"></span> -->
		<article class="outer">
			<div class="inner">
				<!-- <div class="ipad" data-animation="slideInLeft"></div> -->
				<div class="half" data-animation="slideInLeft" id="videos">
					<?php if(wp_is_mobile()) { ?>
						<img src="<?php echo bloginfo('template_directory'); ?>/assets/images/ipad.png" alt="" />
					<?php  } else { ?>
						<video muted preload="auto" loop class="active" id="iphone">
							<source src="<?php echo bloginfo('template_directory'); ?>/assets/videos/iphone.webm" type="video/webm">
							<source src="<?php echo bloginfo('template_directory'); ?>/assets/videos/iphone.ogv" type="video/ogv">
							<source src="<?php echo bloginfo('template_directory'); ?>/assets/videos/iphone.mp4" type="video/mp4">
						</video>
						<video muted preload="auto" loop id="tablet">
							<source src="<?php echo bloginfo('template_directory'); ?>/assets/videos/tablet.webm" type="video/webm">
							<source src="<?php echo bloginfo('template_directory'); ?>/assets/videos/tablet.ogv" type="video/ogv">
							<source src="<?php echo bloginfo('template_directory'); ?>/assets/videos/tablet.mp4" type="video/mp4">
						</video>
						<video muted preload="auto" loop id="laptop">
							<source src="<?php echo bloginfo('template_directory'); ?>/assets/videos/computer.webm" type="video/webm">
							<source src="<?php echo bloginfo('template_directory'); ?>/assets/videos/computer.ogv" type="video/ogv">
							<source src="<?php echo bloginfo('template_directory'); ?>/assets/videos/computer.mp4" type="video/mp4">
						</video>
					<?php } ?>
				</div>
				<div class="copy half">
					<h1 data-animation="slideDown">Wisdom Made Easy.</h1>
					<span data-animation="slideUp">
						<h3>Be Wyzerr, know more.</h3>
						<button class="btn btn-wizard">Be a wizard</button>
					</span>
				</div>
				<!-- <div class="iphone" data-animation="slideInRight"></div> -->
			</div>
		</article>
		<div id="clientLogos" data-animation="slideUp">
			<span><img src="<?php echo bloginfo('template_directory');?>/assets/images/client_logos/walmart.png" alt="" /></span>
			<span><img src="<?php echo bloginfo('template_directory');?>/assets/images/client_logos/kroger.png" alt="" /></span>
			<span><img src="<?php echo bloginfo('template_directory');?>/assets/images/client_logos/unilever.png" alt="" /></span>
			<span><img src="<?php echo bloginfo('template_directory');?>/assets/images/client_logos/uc.png" alt="" /></span>
			<span><img src="<?php echo bloginfo('template_directory');?>/assets/images/client_logos/shopper.png" alt="" /></span>
			<span><img src="<?php echo bloginfo('template_directory');?>/assets/images/client_logos/cac.png" alt="" /></span>
		</div>
	</section>

	<section id="research" class="block">
		<article class="outer">
			<div class="inner">
				<div class="copy" data-animation="slideUp">
					<h1 data-animation="slideDown">Market research reimagined.</h1>
					<p data-animation="slideUp">Wyzerr empowers businesses to make intelligent decisions by constantly listening to their customers and stakeholders.</p>
				</div>
				<div class="thirds">
					<article>
						<img src="<?php echo bloginfo('template_directory');?>/assets/images/icons/market1.svg" alt="" />
						<p>We use color theory<br />to get honest feedback.</p>
					</article>
					<article>
						<img src="<?php echo bloginfo('template_directory');?>/assets/images/icons/market2.svg" alt="" />
						<p>We use neuroscience to<br />keep users engaged.</p>
					</article>
					<article>
						<img src="<?php echo bloginfo('template_directory');?>/assets/images/icons/market3.svg" alt="" />
						<p>We use artificial intelligence<br />for personalized experiences.</p>
					</article>
				</div>
				<button class="btn btn-wizard">Be Wyzerr Now</button>
			</div>
		</article>
	</section>

	<section id="help" class="block">
		<article class="outer">
			<div class="inner">
				<div class="copy" data-animation="slideUp">
					<h1 data-animation="slideDown">What can your Wizard<br /> help you do?</h1>
					<p data-animation="slideUp">Pretty much anything an expert in market research, human resources, data science, technology, innovation, or branding would help you do. Your Wizard is the intersection of management consultancy, market research, and consumer engagement.</p>
					<?php if(wp_is_mobile()) { ?>
						<img src="<?php echo bloginfo('template_directory'); ?>/assets/images/placeholder.png" alt="" />
					<?php } ?>
				</div>
				<?php if(!wp_is_mobile()) { ?>
					<video muted preload="auto">
						<source src="<?php echo bloginfo('template_directory'); ?>/assets/videos/wizards.webm" type="video/webm">
						<source src="<?php echo bloginfo('template_directory'); ?>/assets/videos/wizards.ogv" type="video/ogv">
						<source src="<?php echo bloginfo('template_directory'); ?>/assets/videos/wizards.mp4" type="video/mp4">
					</video>
				<?php } ?>
			</div>
		</article>
	</section>

	<?php 

	$video = get_option('custom_bg_video');
	if(!empty($video)) {
		echo '<section id="video">';
			echo '<video preload="auto" poster="'.get_bloginfo('template_directory').'/assets/images/video_placeholder.jpg">';
				echo '<source src="'.$video.'" type="video/webm">';
				echo '<source src="'.$video.'" type="video/ogv">';
				echo '<source src="'.$video.'" type="video/mp4">';
			echo '</video>';
			echo '<div class="playwrap"></div>';
		echo '</section>';
	}
	?>

	<section id="meet" class="block">
		<article class="outer">
			<div class="inner">
				<div class="copy">
					<img data-animation="slideUp" src="<?php echo bloginfo('template_directory');?>/assets/images/logo_icon.svg" alt="Hoolio" />
					<h1 data-animation="slideDown">Meet Hoolio, our personal wizard.</h1>
					<p data-animation="slideUp">Hoolio is our AI wizard here at Wyzerr. We’re grooming Hoolio to be an expert on sales, R&D, and even HR. However, like a young child, Hoolio has to start with the basics first before he can take on more advanced topics. This is what Hoolio is currently working on:</p>
				</div>
				<ul class="bubblenav">
					<li class="nav nav-1" data-numb="1" title="New Products &amp; Services"></li>
					<li class="nav nav-2" data-numb="2" title="Customer Loyalty"></li>
					<li class="nav nav-3" data-numb="3" title="How To Increase Sales"></li>
					<li class="nav nav-4" data-numb="4" title="Marketing Message"></li>
					<li class="nav nav-5" data-numb="5" title="Employee Retention"></li>
					<li class="nav nav-6" data-numb="6" title="Customer Insights"></li>
					<li class="circleClose">
						<span class="bar cross"></span>
						<span class="bar middle"></span>
						<span class="bar cross"></span>
					</li>
				</ul>
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
							<img src="<?php echo bloginfo('template_directory');?>/assets/images/iphone2.png" alt="" />
							<p>Quick and frequent surveys that provide insight on the health of a company, employees, or consumer base.</p>
							<a href="<?php echo site_url('contact'); ?>" class="btn">Be A Wizard</a>
						</div>
					</div>
					<div class="frame">
						<div class="titleBar">
							<h3><i class="icon icon-voice"></i> Voice of customer (VoC)</h3>
							<div class="circleClose">
								<span class="bar cross"></span>
								<span class="bar middle"></span>
								<span class="bar cross"></span>
							</div>
						</div>
						<div class="frameCopy">
							<img src="<?php echo bloginfo('template_directory');?>/assets/images/iphone2.png" alt="" />
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
							<a href="<?php echo site_url('contact'); ?>" class="btn">Learn More</a>
						</div>
					</div>
					<div class="frame">
						<div class="titleBar">
							<h3><i class="icon icon-db"></i> Employee Happiness</h3>
							<div class="circleClose">
								<span class="bar cross"></span>
								<span class="bar middle"></span>
								<span class="bar cross"></span>
							</div>
						</div>
						<div class="frameCopy">
							<img src="<?php echo bloginfo('template_directory');?>/assets/images/iphone2.png" alt="" />
							<p>Happy employees are critical to growing and scaling a successful business. We’ve developed several tools to identify issues in the workplace, and provide actionable tasks to improve employee satisfaction. The output is a simple dashboard that anyone in the company can use to determine course of action.</p>
							<a href="<?php echo site_url('contact'); ?>" class="btn">Be A Wizard</a>
						</div>
					</div>
					<div class="frame">
						<div class="titleBar">
							<h3><i class="icon icon-behavior"></i> Consumer Behavior Study (market research study)</h3>
							<div class="circleClose">
								<span class="bar cross"></span>
								<span class="bar middle"></span>
								<span class="bar cross"></span>
							</div>
						</div>
						<div class="frameCopy">
							<img src="<?php echo bloginfo('template_directory');?>/assets/images/iphone2.png" alt="" />
							<p>A Wyzerr consumer behavior study is a deep dive into understanding the beliefs, ideologies, preferences, and trends within different communities, social groups, and demographics. Use this insight to develop new products, find product market fit, or create targeted marketing messages.</p>
							<a href="<?php echo site_url('contact'); ?>" class="btn">Be A Wizard</a>
						</div>
					</div>
					<div class="frame">
						<div class="titleBar">
							<h3><i class="icon icon-smile"></i> Screening Tool</h3>
							<div class="circleClose">
								<span class="bar cross"></span>
								<span class="bar middle"></span>
								<span class="bar cross"></span>
							</div>
						</div>
						<div class="frameCopy">
							<img src="<?php echo bloginfo('template_directory');?>/assets/images/iphone2.png" alt="" />
							<p>Whether you’re a Venture Capitalist, or an HR manager, screening applicants is a time-consuming process. Our screening tool allows you to quickly identify people that meet your criteria.</p>
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
							<img src="<?php echo bloginfo('template_directory');?>/assets/images/iphone2.png" alt="" />
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
						<div class="frame">
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
											<img src="<?php echo bloginfo('template_directory');?>/assets/images/screens/PulseSurveys.png" alt="" />
										</div>
									</div>
								</div>
							</div>
						</div>
					</li>
					<li>
						<div class="bubblewrap bubble-2" data-numb="2">
							<div data-animation="bubble" class="bubble">
								<i class="icon icon-voice"></i>
							</div>
							<span class="label" data-animation="slideUp">Voice of<br />customer (VoC)</span>
						</div>
						<div class="frame">
							<div class="outer">
								<div class="inner">
									<div class="copy">
										<div class="half">
											<i class="icon icon-ruler"></i>
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
											<a href="<?php echo site_url('contact'); ?>" class="btn">Learn More</a>
										</div>
										<div class="half">
											<img src="<?php echo bloginfo('template_directory');?>/assets/images/screens/Voiceofcustomer.png" alt="" />
										</div>
									</div>
								</div>
							</div>
						</div>
					</li>
					<li>
						<div class="bubblewrap bubble-3" data-numb="3">
							<div data-animation="bubble" class="bubble">
								<i class="icon icon-db"></i>
							</div>
							<span class="label" data-animation="slideUp">Employee<br />Happiness</span>
						</div>
						<div class="frame">
							<div class="outer">
								<div class="inner">
									<div class="copy">
										<div class="half">
											<i class="icon icon-db"></i>
											<h3>Employee Happiness</h3>
											<p>Happy employees are critical to growing and scaling a successful business. We’ve developed several tools to identify issues in the workplace, and provide actionable tasks to improve employee satisfaction. The output is a simple dashboard that anyone in the company can use to determine course of action.</p>
											<a href="<?php echo site_url('contact'); ?>" class="btn">Be A Wizard</a>
										</div>
										<div class="half">
											<img src="<?php echo bloginfo('template_directory');?>/assets/images/screens/EmployeeHappinessSurveys.png" alt="" />
										</div>
									</div>
								</div>
							</div>
						</div>
					</li>
					<li>
						<div class="bubblewrap bubble-4" data-numb="4">
							<div data-animation="bubble" class="bubble">
								<i class="icon icon-behavior"></i>
							</div>
							<span class="label" data-animation="slideUp">Consumer Behavior Study (market research study)</span>
						</div>
						<div class="frame">
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
											<img src="<?php echo bloginfo('template_directory');?>/assets/images/screens/BehavioralStudy.png" alt="" />
										</div>
									</div>
								</div>
							</div>
						</div>
					</li>
					<li>
						<div class="bubblewrap bubble-5" data-numb="5">
							<div data-animation="bubble" class="bubble">
								<i class="icon icon-smile"></i>
							</div>
							<span class="label" data-animation="slideUp">Screening<br />Tool</span>
						</div>
						<div class="frame">
							<div class="outer">
								<div class="inner">
									<div class="copy">
										<div class="half">
											<i class="icon icon-smile"></i>
											<h3>Screening Tool</h3>
											<p>Whether you’re a Venture Capitalist, or an HR manager, screening applicants is a time-consuming process. Our screening tool allows you to quickly identify people that meet your criteria.</p>
											<a href="<?php echo site_url('contact'); ?>" class="btn">Be A Wizard</a>
										</div>
										<div class="half">
											<img src="<?php echo bloginfo('template_directory');?>/assets/images/screens/ScreeningTool.png" alt="" />
										</div>
									</div>
								</div>
							</div>
						</div>
					</li>
					<li>
						<div class="bubblewrap bubble-6" data-numb="6">
							<div data-animation="bubble" class="bubble">
								<i class="icon icon-life"></i>
							</div>
							<span class="label" data-animation="slideUp">Quality of<br />Life Study</span>
						</div>
						<div class="frame">
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
											<img src="<?php echo bloginfo('template_directory');?>/assets/images/screens/QualityOfLife.png" alt="" />
										</div>
									</div>
								</div>
							</div>
						</div>
					</li>
				</ul>
			</div>
		</article>
	</section>

	<section id="metrics" class="block">
		<div class="half">
			<article class="phone">
				<img src="<?php echo bloginfo('template_directory');?>/assets/images/iphone.png" alt="" />
			</article>
			<article data-animation="slideUp" class="statsWrap">
				<div class="outer">
					<div class="inner">
						<h1>Success Metrics</h1>
						<p>Collect a lot of data.</p>
						<p>Engage your consumers. Make it as
						fun, fast, and easy as possible for your
						customers, employees, and the market 
						place to give you feedback.</p>
						<div class="half counting">
							<article>
								<img src="<?php echo bloginfo('template_directory');?>/assets/images/wyzerr_text.svg" alt="" />
								<div class="stat">
									<span class="timer" data-from="0" data-to="87" data-speed="1000">87</span><span>%</span> 
									<p>Average Completion Rate</p>
								</div>
								<div class="stat">
									<span class="timer" data-from="0" data-to="57" data-speed="1000">57</span> <span class="abbr">secs</span> 
									<p>Avergage Time to Complete</p>
								</div>
								<div class="stat">
									<span class="timer" data-from="0" data-to="12" data-speed="1000">12</span> 
									<p>Average Data Points Collected</p>
								</div>
							</article>
							<article>
								<img src="<?php echo bloginfo('template_directory');?>/assets/images/competitor.png" alt="" />
								<div class="stat">
									<span class="timer" data-from="0" data-to="26" data-speed="1000">26</span><span>%</span> 
									<p>Average Completion Rate</p>
								</div>
								<div class="stat">
									<span class="timer" data-from="0" data-to="6" data-speed="1000">6</span> <span class="abbr">min</span> 
									<p>Avergage Time to Complete</p>
								</div>
								<div class="stat">
									<span class="timer" data-from="0" data-to="12" data-speed="1000">12</span> 
									<p>Average Data Points Collected</p>
								</div>
							</article>
						</div>
					</div>
				</div>
			</article>
		</div>
	</section>

<?php get_footer(); ?>