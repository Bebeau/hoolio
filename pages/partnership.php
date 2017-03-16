<?php 

/*
Template Name: Partnership
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
			$pTitle = get_post_meta($post->ID,'pTitle', true);
            $pDesc = get_post_meta($post->ID,'pDesc', true);

            if(!empty($pTitle) || !empty($pDesc)) {
            	echo '<section id="pIntro">';
            		echo '<article>';
						if(!empty($pTitle)) {
							echo '<h2>'.$pTitle.'</h2>';
						}       
						if(!empty($pDesc)) {
							echo '<p>'.$pDesc.'</p>';
						}
					echo '</article>';
            	echo '</section>';
            }
		?>

		<section id="partnership">
    		<form role="form" method="POST" action="" id="partnershipfrm">
    			<h2>Fill out the form below.</h2>
		        <input type="text" name="name" id="name" class="form-control" placeholder="name"/>
	            <input type="text" name="emailaddress" id="emailaddress" class="form-control" placeholder="email@address.."/>
	            <input type="text" name="phone" id="phone" class="form-control" placeholder="(555)-555-5555"/>
	            <input type="text" name="title" id="title" class="form-control" placeholder="job title"/>
	            <input type="text" name="company" id="company" class="form-control" placeholder="company"/>
	            <div class="dropdown">
	                <button>Type of Partnership <i class="fa fa-angle-down"></i></button>
	                <ul class="dropdown-menu" data-input="pType">
	                    <li data-value="Channel">Channel Partnership</li>
	                    <li data-value="Reseller">Reseller Partnership</li>
	                    <li data-value="Both">Both</li>
	                </ul>
	            </div>
	            <input type="hidden" name="pType" id="pType" class="form-control"/>
		        <button type="submit" class="btn btn-submit">Submit</button>
		        <input type="hidden" name="password" id="password" val="" />
		    </form>
		</section>

	<?php
	endwhile; endif;

get_footer(); ?>