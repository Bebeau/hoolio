<?php
global $post;
add_action('admin_init','wyzerr_manage_homepage');
function wyzerr_manage_homepage() {
    if(isset($_GET['action']) && $_GET['action'] === "edit") {
        // Add custom meta boxes to display photo management
        $post_id = $_GET['post'] ? $_GET['post'] : $_POST['post_ID'];
        $pageName = get_the_title($post_id);

        // checks for post/page ID
        if ($pageName === "Home" && get_post_type($post_id) === "page") {
            
            remove_post_type_support('page', 'editor');
            remove_post_type_support( 'page', 'thumbnail' );

            add_action( 'add_meta_boxes', 'home_meta_box', 1 );
            function home_meta_box($post) {
                add_meta_box(
                    'sections', 
                    'Manage Homepage Section Content', 
                    'homepage_sections',
                    'page', 
                    'normal', 
                    'low'
                );
                add_meta_box(
                    'homepage_video', 
                    'Featured Video', 
                    'homepage_video',
                    'page', 
                    'side', 
                    'low'
                );
            }
            function homepage_sections($post) {
                // Use nonce for verification
                wp_nonce_field( 'sections', 'sections_noncename' );

                $section1_title = get_post_meta($post->ID,'section1_title',true);
                $section1_desc = get_post_meta($post->ID,'section1_desc',true);
                $section1_button = get_post_meta($post->ID,'section1_button',true);

                echo '<form role="form" method="POST" action="" />';

                    echo '<h3>Section 1</h3>';

                    echo '<label for="section1_title">Headline</label>';
                    echo '<input type="text" name="section1_title" id="section1_title" value="'.$section1_title.'" />';

                    echo '<label for="section1_desc">Tagline</label>';
                    echo '<input type="text" name="section1_desc" id="section1_desc" value="'.$section1_desc.'" />';

                    echo '<label for="section1_button">Button Text</label>';
                    echo '<input type="text" name="section1_button" id="section1_button" value="'.$section1_button.'" />';

                    $section2_title = get_post_meta($post->ID,'section2_title',true);
                    $section2_desc = get_post_meta($post->ID,'section2_desc',true);
                    $icon1 = get_post_meta($post->ID,'icon1',true);
                    $icon2 = get_post_meta($post->ID,'icon2',true);
                    $icon3 = get_post_meta($post->ID,'icon3',true);
                    $section2_button = get_post_meta($post->ID,'section2_button',true);

                    echo '<h3>Section 2</h3>';

                    echo '<label for="section2_title">Headline</label>';
                    echo '<input type="text" name="section2_title" id="section2_title" value="'.$section2_title.'" />';

                    echo '<label for="section2_desc">Description</label>';
                    echo '<textarea type="text" name="section2_desc" id="section2_desc">'.$section2_desc.'</textarea>';

                    echo '<label for="icon1">Icon 1 Text</label>';
                    echo '<textarea type="text" name="icon1" id="icon1">'.$icon1.'</textarea>';

                    echo '<label for="icon2">Icon 2 Text</label>';
                    echo '<textarea type="text" name="icon2" id="icon2">'.$icon2.'</textarea>';

                    echo '<label for="icon3">Icon 3 Text</label>';
                    echo '<textarea type="text" name="icon3" id="icon3">'.$icon3.'</textarea>';

                    echo '<label for="section2_button">Button Text</label>';
                    echo '<input type="text" name="section2_button" id="section2_button" value="'.$section2_button.'" />';

                    $section3_title = get_post_meta($post->ID,'section3_title',true);
                    $section3_desc = get_post_meta($post->ID,'section3_desc',true);

                    echo '<h3>Section 3</h3>';

                    echo '<label for="section3_title">Headline</label>';
                    echo '<input type="text" name="section3_title" id="section3_title" value="'.$section3_title.'" />';

                    echo '<label for="section3_desc">Description</label>';
                    echo '<textarea type="text" name="section3_desc" id="section3_desc">'.$section3_desc.'</textarea>';

                    $section4_title = get_post_meta($post->ID,'section4_title',true);
                    $section4_desc = get_post_meta($post->ID,'section4_desc',true);

                    echo '<h3>Section 4</h3>';

                    echo '<label for="section4_title">Headline</label>';
                    echo '<input type="text" name="section4_title" id="section4_title" value="'.$section4_title.'"/>';

                    echo '<label for="section4_desc">Description</label>';
                    echo '<textarea type="text" name="section4_desc" id="section4_desc">'.$section4_desc.'</textarea>';

                    $section5_title = get_post_meta($post->ID,'section5_title',true);
                    $section5_desc = get_post_meta($post->ID,'section5_desc',true);

                    echo '<h3>Section 5</h3>';

                    echo '<label for="section5_title">Headline</label>';
                    echo '<input type="text" name="section5_title" id="section5_title" value="'.$section5_title.'" />';

                    echo '<label for="section5_desc">Description</label>';
                    echo '<textarea type="text" name="section5_desc" id="section5_desc">'.$section5_desc.'</textarea>';

                echo '</form>';
            }
            function homepage_video($post) {
                // Use nonce for verification
                wp_nonce_field( 'video', 'video_noncename' );

                $video = get_post_meta($post->ID,'featured_video', true);
                $info = new SplFileInfo($video);
                $fileType = $info->getExtension();

                if ( !empty($video) ) {
                    echo '<div class="bg_video" data-post="'.$post->ID.'" data-img="bg_video">';
                        echo '<video muted autoplay id="bgvid" loop>';
                            echo '<source src="'.$video.'" type="video/webm">';
                            echo '<source src="'.$video.'" type="video/ogv">';
                            echo '<source src="'.$video.'" type="video/mp4">';
                        echo '</video>';
                        echo '<span class="button button-remove remove-video">X</span>';
                        echo '<input type="hidden" name="featured_video" id="featured_video" value="'.$video.'" />';
                    echo '</div>';
                } else {
                    echo '<div class="bg_video" data-post="'.$post->ID.'" data-img="bg_video">';
                        echo '<a href="" class="upload-image upload-banner">Set featured video</a>';
                        echo '<input type="hidden" name="featured_video" id="featured_video" value="" />';
                    echo '</div>';
                }

            }
        }
    }
}

/* When the post is saved, saves our custom data */
add_action( 'save_post', 'save_homepage_section_content' );
function save_homepage_section_content( $post_id ) {
    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) 
        return;

    // check for nonce
    if ( !isset( $_POST['video_noncename'] ) || !wp_verify_nonce( $_POST['video_noncename'], 'video' ) )
        return;

    $featured_vid = $_POST['featured_video'];

    if(!empty($featured_vid)) {
        update_post_meta($post_id,'featured_video',$featured_vid);
    }

    // check for nonce
    if ( !isset( $_POST['sections_noncename'] ) || !wp_verify_nonce( $_POST['sections_noncename'], 'sections' ) )
        return;

    $section1_title = $_POST['section1_title'];
    $section1_desc = $_POST['section1_desc'];
    $section1_button = $_POST['section1_button'];

    if(!empty($section1_title)) {
        update_post_meta($post_id,'section1_title',$section1_title);
    }
    if(!empty($section1_desc)) {
        update_post_meta($post_id,'section1_desc',$section1_desc);
    }
    if(!empty($section1_button)) {
        update_post_meta($post_id,'section1_button',$section1_button);
    }

    $section2_title = $_POST['section2_title'];
    $section2_desc = $_POST['section2_desc'];
    $icon1 = $_POST['icon1'];
    $icon2 = $_POST['icon2'];
    $icon3 = $_POST['icon3'];
    $section2_button = $_POST['section2_button'];

    if(!empty($section2_title)) {
        update_post_meta($post_id,'section2_title',$section2_title);
    }
    if(!empty($section2_desc)) {
        update_post_meta($post_id,'section2_desc',$section2_desc);
    }
    if(!empty($icon1)) {
        update_post_meta($post_id,'icon1',$icon1);
    }
    if(!empty($icon2)) {
        update_post_meta($post_id,'icon2',$icon2);
    }
    if(!empty($icon3)) {
        update_post_meta($post_id,'icon3',$icon3);
    }
    if(!empty($section2_button)) {
        update_post_meta($post_id,'section2_button',$section2_button);
    }

    $section3_title = $_POST['section3_title'];
    $section3_desc = $_POST['section3_desc'];

    if(!empty($section3_title)) {
        update_post_meta($post_id,'section3_title',$section3_title);
    }
    if(!empty($section3_desc)) {
        update_post_meta($post_id,'section3_desc',$section3_desc);
    }

    $section4_title = $_POST['section4_title'];
    $section4_desc = $_POST['section4_desc'];

    if(!empty($section4_title)) {
        update_post_meta($post_id,'section4_title',$section4_title);
    }
    if(!empty($section4_desc)) {
        update_post_meta($post_id,'section4_desc',$section4_desc);
    }

    $section5_title = $_POST['section5_title'];
    $section5_desc = $_POST['section5_desc'];

    if(!empty($section5_title)) {
        update_post_meta($post_id,'section5_title',$section5_title);
    }
    if(!empty($section5_desc)) {
        update_post_meta($post_id,'section5_desc',$section5_desc);
    }
}

// ajax response to save download track
add_action('wp_ajax_setVideo', 'setFeaturedVideo');
add_action('wp_ajax_nopriv_setVideo', 'setFeaturedVideo');
function setFeaturedVideo() {

    $imageURL = (isset($_GET['fieldVal'])) ? $_GET['fieldVal'] : 0;
    $postID = (isset($_GET['postID'])) ? $_GET['postID'] : 0;

    if($imageURL !== "") {
        update_post_meta( $postID, 'featured_video', $imageURL);
    } else {
        update_post_meta( $postID, 'featured_video', "");
    }
}

?>