<?php

/*
Template Name: Research Page
*/

get_header();

global $post; ?>

<div id="pageBanner" class="default" data-parallax='{"y" : 230, "smoothness": 1}'>
	<div class="outer">
		<div class="inner">
			<?php the_title("<h1>","</h1>"); ?>
		</div>
	</div>
</div>

<?php

$subTitle = get_post_meta($post->ID,'sub_title', true);
$quote = get_post_meta($post->ID,'quote', true);

echo '<section id="introWrap">';
	echo '<h2 class="introTitle" data-animation="slideUp">'.$subTitle.'</h2>';
	echo '<span data-animation="slideUp">'.the_post_thumbnail().'</span>';
	echo '<blockquote data-animation="slideUp">'.$quote.'</blockquote>';
echo '</section>';

list_sections($post);

get_footer();

?>