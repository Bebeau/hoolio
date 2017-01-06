<?php
global $post;
add_action('admin_init','wyzerr_research_pages');
function wyzerr_research_pages() {
    if(isset($_GET['action']) && $_GET['action'] === "edit") {
        // Add custom meta boxes to display photo management
        if(isset($_GET['post'])) {
            $post_id = $_GET['post'] ? $_GET['post'] : $_POST['post_ID'];
        }
        $pageName = get_the_title($post_id);

        // checks for post/page ID
        if (
        	$pageName === "Smartforms" && get_post_type($post_id) === "page" || 
        	$pageName === "Builder" && get_post_type($post_id) === "page" || 
        	$pageName === "Insights" && get_post_type($post_id) === "page" ) {

        	remove_post_type_support('page', 'editor');

        	add_action( 'add_meta_boxes', 'research_meta_box', 1 );
        	function research_meta_box($post) {
                add_meta_box(
                    'content',
                    'Page Content', 
                    'research_content',
                    'page', 
                    'normal', 
                    'low'
                );
                add_meta_box(
                    'sections',
                    'Page Sections', 
                    'research_sections',
                    'page', 
                    'normal', 
                    'low'
                );
            }
            function research_content($post) {
            	// Use nonce for verification
                wp_nonce_field( 'content', 'content_noncename' );

                $subTitle = get_post_meta($post->ID, 'sub_title', true);
                $quote = get_post_meta($post->ID, 'quote', true);

                echo '<form method="post" action="">';

	                echo '<label for="sub_title">Extended Title</label>';
	                echo '<input type="text" name="sub_title" id="sub_title" value="'.$subTitle.'" />';

	                echo '<label for="quote">Quote</label>';
	                echo '<textarea type="text" name="quote" id="quote">'.$quote.'</textarea>';

	            echo '</form>';

            }
            function research_sections($post) {
            	wp_nonce_field( 'sections', 'sections_noncename' );

			    $sections = get_post_meta($post->ID,'sections', true);

			    echo '<div id="sectionWrap" class="sortable" data-post="'.$post->ID.'">';
			        $c = 0;
			        if ( !empty($sections) ) {
			            foreach( $sections as $key => $section ) {

			                $title = $section['title'];
						    $desc = $section['desc'];
						    $image = $section['image'];

						    echo '<section data-post="'.$post->ID.'" data-type="sections" data-key="'.$key.'">';
						        echo '<div class="layout" data-post="'.$post->ID.'" data-img="section" data-input="section['.$c.'][image]">';
						            if(!empty($image)) {
						                echo '<a href="#" class="upload-image upload-section" data-numb="'.$c.'"><img src="'.$image.'" alt="" /></a><input type="hidden" name="section['.$c.'][image]" value="'.$image.'" />';
						            } else {
						                echo '<a href="#" class="upload-image upload-section" data-numb="'.$c.'">Upload/Set image</a><input type="hidden" name="section['.$c.'][image]" value="" />';
						            }
						        echo '</div>';
						        echo '<div class="details">';
                                    echo '<i class="remove_section">X</i>';
						        	echo '<label for="section['.$c.'][title]">Title</label>';
						            echo '<input type="text" name="section['.$c.'][title]" placeholder="title" value="'.$title.'" />';
						            echo '<label for="section['.$c.'][desc]">Description</label>';
						            echo '<textarea type="text" name="section['.$c.'][desc]">'.$desc.'</textarea>';
						        echo '</div>';
						    echo '</section>';
			                $c++;
			            }
			        } else {
			            echo '<section>';
			                echo '<div class="layout" data-post="'.$post->ID.'" data-img="section" data-input="section[0][image]">';
			                    echo '<a href="" class="upload-image upload-section">Upload/Set image</a><input type="hidden" name="section[0][image]" value="" />';
			                echo '</div>';
			                echo '<div class="details">';
			                	echo '<label for="section[0][title]">Title</label>';
			                    echo '<input type="text" name="section[0][title]" placeholder="title" value="" />';
			                   	echo '<label for="section[0][desc]">Description</label>';
			                   	echo '<textarea type="text" name="section[0][desc]" value=""></textarea>';
			                echo '</div>';
			            echo '</section>';
			            $c++;
			        }
			    echo '</div>';
			    echo '<button class="button button-large btn-section">Add Section</button>';
            }
        }
    }
}
function list_sections($post) {
    $sections = get_post_meta($post->ID,'sections', true);

    echo '<div id="sectionWrap">';
        if ( !empty($sections) ) {
            foreach( $sections as $key => $section ) {

                $title = $section['title'];
                $desc = $section['desc'];
                $image = $section['image'];

                echo '<section>';
                    echo '<div class="layout">';
                        echo '<img src="'.$image.'" alt="" />';
                    echo '</div>';
                    echo '<div class="details" data-animation="slideUp">';
                        echo '<h3>'.$title.'</h3>';
                        echo '<p>'.$desc.'</p>';
                    echo '</div>';
                echo '</section>';
            }
        }
    echo '</div>';
}
// ajax response to save case study section
add_action('wp_ajax_addSection', 'newSection');
add_action('wp_ajax_nopriv_addSection', 'newSection');
function newSection() {
    echo '<section>';
        echo '<div class="layout">';
            echo '<a href="#" class="upload-image upload-section" data-numb="'.$_GET['count'].'">Upload/Set image<input type="hidden" name="section['.$_GET['count'].'][image]" id="section['.$_GET['count'].'][image]" value="" /></a>';
        echo '</div>';
        echo '<div class="details">';
        	echo '<label for="section['.$_GET['count'].'][title]">Title</label>';
            echo '<input type="text" name="section['.$_GET['count'].'][title]" placeholder="title" value="" /><i class="remove_section">X</i>';
            echo '<label for="section['.$_GET['count'].'][desc]">Description</label>';
            echo '<textarea type="text" name="section['.$_GET['count'].'][desc]"></textarea>';
        echo '</div>';
    echo '</section>';
    exit;
}

add_action('wp_ajax_showTab', 'tabContent');
add_action('wp_ajax_nopriv_showTab', 'tabContent');
function tabContent() {

    $pageID = (isset($_GET['postID'])) ? $_GET['postID'] : 0;

    $subTitle = get_post_meta($pageID,'sub_title', true);
    $quote = get_post_meta($pageID,'quote', true);

    echo '<i class="fa fa-spinner fa-spin"></i>';
    echo '<div class="previewWrap">';
        echo '<div class="half previewText">';
            echo '<h3>'.$subTitle.'</h3>';
            echo '<p>'.$quote.'</p>';
            echo '<a href="'.get_the_permalink($pageID).'" class="btn">Learn More</a>';
        echo '</div>';
        echo '<div class="half previewImage">';
            echo '<span>'.get_the_post_thumbnail($pageID).'</span>';
        echo '</div>';
    echo '</div>';
    
    exit();
}

/* When the post is saved, saves our custom data */
add_action( 'save_post', 'save_research_section_content' );
function save_research_section_content( $post_id ) {
    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) 
        return;

    if ( !isset( $_POST['content_noncename'] ) || !wp_verify_nonce( $_POST['content_noncename'], 'content' ) )
        return;

    $subTitle = $_POST['sub_title'];
    if(!empty($subTitle)) {
        update_post_meta($post_id,'sub_title',$subTitle);
    }
    $quote = $_POST['quote'];
    if(!empty($quote)) {
        update_post_meta($post_id,'quote',$quote);
    }

    if ( !isset( $_POST['sections_noncename'] ) || !wp_verify_nonce( $_POST['sections_noncename'], 'sections' ) )
        return;

    $sections = $_POST['section'];
    if(!empty($sections)) {
        foreach($sections as $section) {
            
            $title = $section['title'];
            $desc = $section['desc'];
            $image = $section['image'];

            $new[] = array(
                'title'     => $title,
                'desc'      => $desc,
                'image'     => $image
            );
        }
        update_post_meta($post_id,'sections',$new);
    } else {
        $new = "";
        update_post_meta($post_id,'sections',$new);
    }
}
