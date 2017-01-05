<?php
global $post;
add_action('admin_init','wyzerr_checkout_page');
function wyzerr_checkout_page() {
    if(isset($_GET['action']) && $_GET['action'] === "edit") {
        // Add custom meta boxes to display photo management
        if(isset($_GET['post'])) {
            $post_id = $_GET['post'] ? $_GET['post'] : $_POST['post_ID'];
        }
        $pageName = get_the_title($post_id);

        // checks for post/page ID
        if ( $pageName === "Checkout" && get_post_type($post_id) === "page" ) {

        	remove_post_type_support('page', 'editor');

        	add_action( 'add_meta_boxes', 'checkout_meta_box', 1 );
        	function checkout_meta_box($post) {
                add_meta_box(
                    'sectionTitles',
                    'Page Titles', 
                    'page_titles',
                    'page', 
                    'normal', 
                    'high'
                );
                add_meta_box(
                    'checkoutPerk',
                    'Perks to Being a Beta Wizard', 
                    'checkout_sections',
                    'page', 
                    'normal', 
                    'low'
                );
            }
            function page_titles($post) {
                wp_nonce_field( 'titles', 'titles_noncename' );

                $pricingTitle = get_post_meta($post->ID,'pricingTitle', true);
                $contentTitle = get_post_meta($post->ID,'contentTitle', true);

                echo '<form role="form">';
                    echo '<label for="pricingTitle">Pricing Form Title</label>';
                    echo '<input type="text" name="pricingTitle" id="pricingTitle" value="'.$pricingTitle.'" />';
                    echo '<label for="contentTitle">Content Page Title</label>';
                    echo '<input type="text" name="contentTitle" id="contentTitle" value="'.$contentTitle.'" />';
                echo '</form>';
            }
            function checkout_sections($post) {
            	wp_nonce_field( 'checkout', 'checkout_noncename' );

			    $sections = get_post_meta($post->ID,'sections', true);

			    echo '<div id="sectionWrap" class="sortable" data-post="'.$post->ID.'">';
			        $c = 0;
			        if ( !empty($sections) ) {
			            foreach( $sections as $key => $section ) {
			                $title = $section['title'];
						    $desc = $section['desc'];
						    echo '<section data-post="'.$post->ID.'" data-type="sections" data-key="'.$key.'">';
                                echo '<i class="remove_section">X</i>';
					        	echo '<label for="section['.$c.'][title]">Title</label>';
					            echo '<input type="text" name="section['.$c.'][title]" placeholder="title" value="'.$title.'" />';
					            echo '<label for="section['.$c.'][desc]">Description</label>';
					            echo '<textarea type="text" name="section['.$c.'][desc]">'.$desc.'</textarea>';
						    echo '</section>';
			                $c++;
			            }
			        } else {
			            echo '<section>';
			                echo '<label for="section[0][title]">Title</label>';
		                    echo '<input type="text" name="section[0][title]" placeholder="title" value="" />';
		                   	echo '<label for="section[0][desc]">Description</label>';
		                   	echo '<textarea type="text" name="section[0][desc]" value=""></textarea>';
			            echo '</section>';
			            $c++;
			        }
			    echo '</div>';
			    echo '<button class="button button-large btn-checkout">Add Section</button>';
            }
        }
    }
    // ajax response to save case study section
	add_action('wp_ajax_addCheckoutPerk', 'addCheckoutPerk');
	add_action('wp_ajax_nopriv_addCheckoutPerk', 'addCheckoutPerk');
	function addCheckoutPerk() {
	    echo '<section>';
	        echo '<label for="section['.$_GET['count'].'][title]">Title</label>';
            echo '<input type="text" name="section['.$_GET['count'].'][title]" placeholder="title" value="" /><i class="remove_section">X</i>';
            echo '<label for="section['.$_GET['count'].'][desc]">Description</label>';
            echo '<textarea type="text" name="section['.$_GET['count'].'][desc]"></textarea>';
    	echo '</section>';
	    exit;
	}
}
/* When the post is saved, saves our custom data */
add_action( 'save_post', 'save_checkout_section_content' );
function save_checkout_section_content( $post_id ) {
    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) 
        return;

    if ( !isset( $_POST['titles_noncename'] ) || !wp_verify_nonce( $_POST['titles_noncename'], 'titles' ) )
        return;

    $pricingTitle = $_POST['pricingTitle'];
    if(!empty($pricingTitle)) {
        update_post_meta($post_id,'pricingTitle',$pricingTitle);
    }
    $contentTitle = $_POST['contentTitle'];
    if(!empty($contentTitle)) {
        update_post_meta($post_id,'contentTitle',$contentTitle);
    }

    if ( !isset( $_POST['checkout_noncename'] ) || !wp_verify_nonce( $_POST['checkout_noncename'], 'checkout' ) )
        return;

    $sections = $_POST['section'];
    if(!empty($sections)) {
        foreach($sections as $section) {
            
            $title = $section['title'];
            $desc = $section['desc'];

            $new[] = array(
                'title'     => $title,
                'desc'      => $desc
            );
        }
        update_post_meta($post_id,'sections',$new);
    } else {
        $new = "";
        update_post_meta($post_id,'sections',$new);
    }
}
function list_perks($post) {
    $sections = get_post_meta($post->ID,'sections', true);

    if ( !empty($sections) ) {
        foreach( $sections as $key => $section ) {

            $title = $section['title'];
            $desc = $section['desc'];

            echo '<article>';
                echo '<h3>'.$title.'</h3>';
                echo '<p>'.$desc.'</p>';
            echo '</article>';
        }
    }
}
?>