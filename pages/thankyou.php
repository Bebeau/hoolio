<?php

/*
Template Name: Thank You
*/

get_header();

	echo '<section id="page">';
		$thankyou_title = get_post_meta($post->ID,'thankyou_title',true);
		$thankyou_desc = get_post_meta($post->ID,'thankyou_desc',true);
		$thankyou_desc2 = get_post_meta($post->ID,'thankyou_desc2',true);
		echo '<section>';
			echo '<div class="copy">';
				if(!empty($thankyou_title)) {
					echo '<h1>'.$thankyou_title.'</h1>';
				}
				if(!empty($thankyou_desc)) {
					echo '<p class="desc">'.$thankyou_desc.'</p>';
				}
				if(!empty($thankyou_desc2)) {
					echo '<p class="desc">'.$thankyou_desc2.'</p>';
				}
			echo '</div>';
		    echo '<div class="cta">';
				$cta_title = get_post_meta(get_option( 'page_on_front' ),'cta_title',true);
	            $cta_desc = get_post_meta(get_option( 'page_on_front' ),'cta_desc',true);
	            $cta_button = get_post_meta(get_option( 'page_on_front' ),'cta_button',true);
	            echo '<div class="copy">';
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
				echo '</div>';
			echo '</div>';
		echo '</section>';
		echo '<section class="squares">';
			echo '<div class="copy">';
			$thankyou_section2_title = get_post_meta($post->ID,'thankyou_section2_title',true);
			$thankyou_section2_desc = get_post_meta($post->ID,'thankyou_section2_desc',true);
			if(!empty($thankyou_section2_title)) {
				echo '<h1>'.$thankyou_section2_title.'</h1>';
			}
			if(!empty($thankyou_section2_desc)) {
				echo '<p class="desc">'.$thankyou_section2_desc.'</p>';
			}
			$thankyou_square1_title = get_post_meta($post->ID,'thankyou_square1_title',true);
			$thankyou_square1_desc = get_post_meta($post->ID,'thankyou_square1_desc',true);
			if(!empty($thankyou_square1_title) && !empty($thankyou_square1_desc) ) {
				echo '<div class="squareWrap">';
					echo '<article class="square square1">';
						echo '<h3>'.$thankyou_square1_title.'</h3>';
						echo '<p>'.$thankyou_square1_desc.'</p>';
					echo '</article>';
				echo '</div>';
			}
			$thankyou_square2_title = get_post_meta($post->ID,'thankyou_square2_title',true);
			$thankyou_square2_desc = get_post_meta($post->ID,'thankyou_square2_desc',true);
			if(!empty($thankyou_square2_title) && !empty($thankyou_square2_desc) ) {
				echo '<div class="squareWrap">';
					echo '<article class="square square2">';
						echo '<h3>'.$thankyou_square2_title.'</h3>';
						echo '<p>'.$thankyou_square2_desc.'</p>';
					echo '</article>';
				echo '</div>';
			}
			$thankyou_square3_title = get_post_meta($post->ID,'thankyou_square3_title',true);
			$thankyou_square3_desc = get_post_meta($post->ID,'thankyou_square3_desc',true);
			if(!empty($thankyou_square3_title) && !empty($thankyou_square3_desc) ) {
				echo '<div class="squareWrap">';
					echo '<article class="square square3">';
						echo '<h3>'.$thankyou_square3_title.'</h3>';
						echo '<p>'.$thankyou_square3_desc.'</p>';
					echo '</article>';
				echo '</div>';
			}
			$thankyou_square4_title = get_post_meta($post->ID,'thankyou_square4_title',true);
			$thankyou_square4_desc = get_post_meta($post->ID,'thankyou_square4_desc',true);
			if(!empty($thankyou_square4_title) && !empty($thankyou_square4_desc) ) {
				echo '<div class="squareWrap">';
					echo '<article class="square square4">';
						echo '<h3>'.$thankyou_square4_title.'</h3>';
						echo '<p>'.$thankyou_square4_desc.'</p>';
					echo '</article>';
				echo '</div>';
			}
			echo '</div>';
		echo '</section>';
		echo '<section class="smartforms">';
			$thankyou_section3_title = get_post_meta($post->ID,'thankyou_section3_title',true);
			$thankyou_section3_desc = get_post_meta($post->ID,'thankyou_section3_desc',true);
			$thankyou_section3_image = get_post_meta($post->ID,'thankyou_section3_image',true);
			$thankyou_section3_desc2 = get_post_meta($post->ID,'thankyou_section3_desc2',true);
			echo '<div class="copy">';
				if(!empty($thankyou_section3_title)) {
					echo '<h1>'.$thankyou_section3_title.'</h1>';
				}
				if(!empty($thankyou_section3_desc)) {
					echo '<p>'.$thankyou_section3_desc.'</p>';
				}
				if(!empty($thankyou_section3_image)) {
					echo '<img src="'.$thankyou_section3_image.'" alt="" />';
				}
				if(!empty($thankyou_section3_desc2)) {
					echo '<p>'.$thankyou_section3_desc2.'</p>';
				}
			echo '</div>';
		echo '</section>';
		echo '<section class="reporting">';
			$thankyou_section4_title = get_post_meta($post->ID,'thankyou_section4_title',true);
			$thankyou_section4_desc = get_post_meta($post->ID,'thankyou_section4_desc',true);
			$thankyou_section4_image = get_post_meta($post->ID,'thankyou_section4_image',true);
			$thankyou_section4_desc2 = get_post_meta($post->ID,'thankyou_section4_desc2',true);
			echo '<div class="copy">';
				if(!empty($thankyou_section4_title)) {
					echo '<h1>'.$thankyou_section4_title.'</h1>';
				}
				if(!empty($thankyou_section4_desc)) {
					echo '<p>'.$thankyou_section4_desc.'</p>';
				}
				if(!empty($thankyou_section4_image)) {
					echo '<img src="'.$thankyou_section4_image.'" alt="" />';
				}
				if(!empty($thankyou_section4_desc2)) {
					echo '<p>'.$thankyou_section4_desc2.'</p>';
				}
			echo '</div>';
		echo '</section>';
	echo '</section>';

get_footer(); ?>
