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
$subDesc = get_post_meta($post->ID,'sub_desc', true);
$subDesc2 = get_post_meta($post->ID,'sub_desc2', true);
$quote = get_post_meta($post->ID,'quote', true);

echo '<section id="introWrap">';
	echo '<article>';
		if($subTitle) {
			echo '<h2 class="introTitle">'.$subTitle.'</h2>';
		}
		if($subDesc) {
			echo '<p>'.$subDesc.'</p>';
		}
		echo '<div>'.the_post_thumbnail().'</div>';
		if($subDesc2) {
			echo '<p>'.$subDesc2.'</p>';
		}
	echo '</article>';
echo '</section>';

if($quote) {
	echo '<blockquote>'.$quote.'</blockquote>';
}

list_sections($post);

get_footer();

?>