<?php
global $post;
add_action('admin_init','wyzerr_manage_homepage');
function wyzerr_manage_homepage() {
    if(isset($_GET['action']) && $_GET['action'] === "edit") {
        // Add custom meta boxes to display photo management
        if(isset($_GET['post'])) {
            $post_id = $_GET['post'] ? $_GET['post'] : $_POST['post_ID'];
        }
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
                    $section2_button = get_post_meta($post->ID,'section2_button',true);

                    echo '<h3>Section 2</h3>';

                    echo '<label for="section2_title">Headline</label>';
                    echo '<input type="text" name="section2_title" id="section2_title" value="'.$section2_title.'" />';

                    echo '<label for="section2_desc">Description</label>';
                    echo '<textarea type="text" name="section2_desc" id="section2_desc">'.$section2_desc.'</textarea>';

                    echo '<label for="section1_button">Button Text</label>';
                    echo '<input type="text" name="section2_button" id="section2_button" value="'.$section2_button.'" />';

                    $section3_title = get_post_meta($post->ID,'section3_title',true);

                    $section3_tab1_icon = get_post_meta($post->ID,'section3_tab1_icon',true);
                    $section3_tab1_text = get_post_meta($post->ID,'section3_tab1_text',true);
                    $section3_tab1_page = get_post_meta($post->ID,'section3_tab1_page',true);

                    $section3_tab2_icon = get_post_meta($post->ID,'section3_tab2_icon',true);
                    $section3_tab2_text = get_post_meta($post->ID,'section3_tab2_text',true);
                    $section3_tab2_page = get_post_meta($post->ID,'section3_tab2_page',true);

                    $section3_tab3_icon = get_post_meta($post->ID,'section3_tab3_icon',true);
                    $section3_tab3_text = get_post_meta($post->ID,'section3_tab3_text',true);
                    $section3_tab3_page = get_post_meta($post->ID,'section3_tab3_page',true);

                    echo '<section id="tabs">';

                        echo '<h3>Section 3</h3>';

                        echo '<label for="section3_title">Headline</label>';
                        echo '<input type="text" name="section3_title" id="section3_title" value="'.$section3_title.'" />';

                        echo '<div class="tab" data-tab="1">';
                            echo '<div class="icon" data-img="icon" data-input="section3_tab1_icon" data-post="'.$post->ID.'">';
                                // var_dump($section3_tab1_icon);
                                if(!empty($section3_tab1_icon)) {
                                    echo '<img src="'.$section3_tab1_icon.'" alt="" /><span class="remove-image button-remove" data-text="icon">X</span>';
                                } else {
                                    echo '<a href="#" class="upload-image">Upload/Set Icon</a>';
                                }
                                echo '<input type="hidden" name="section3_tab1_icon" id="" />';
                            echo '</div>';

                            echo '<div class="copy">';
                                echo '<label for="tab1_text">Tab Title</label>';
                                echo '<input type="text" name="section3_tab1_text" id="section3_tab1_text" value="'.$section3_tab1_text.'" />';
                                
                                echo '<label for="tab1_page">Tab Page</label>';
                                $args = array(
                                    'selected' => $section3_tab1_page
                                );
                                wp_dropdown_pages($args);
                                echo '<input type="hidden" name="section3_tab1_page" id="section3_tab1_page" />';
                            echo '</div>';

                        echo '</div>';

                        echo '<div class="tab" data-tab="2">';
                            echo '<div class="icon" data-img="icon" data-input="section3_tab2_icon" data-post="'.$post->ID.'">';
                                if(!empty($section3_tab2_icon)) {
                                    echo '<img src="'.$section3_tab2_icon.'" alt="" /><span class="remove-image button-remove" data-text="icon">X</span>';
                                } else {
                                    echo '<a href="#" class="upload-image">Upload/Set Icon</a>';
                                }
                                echo '<input type="hidden" name="section3_tab2_icon" id="" />';
                            echo '</div>';

                            echo '<div class="copy">';
                                echo '<label for="section3_tab2_text">Tab Title</label>';
                                echo '<input type="text" name="section3_tab2_text" id="section3_tab2_text" value="'.$section3_tab2_text.'" />';
                                
                                echo '<label for="section3_tab2_page">Tab Page</label>';
                                $args = array(
                                    'selected' => $section3_tab2_page
                                );
                                wp_dropdown_pages($args);
                                echo '<input type="hidden" name="section3_tab2_page" id="section3_tab2_page" />';
                            echo '</div>';

                        echo '</div>';

                        echo '<div class="tab" data-tab="3">';
                            echo '<div class="icon" data-img="icon" data-input="section3_tab3_icon" data-post="'.$post->ID.'">';
                                if(!empty($section3_tab3_icon)) {
                                    echo '<img src="'.$section3_tab3_icon.'" alt="" /><span class="remove-image button-remove" data-text="icon">X</span>';
                                } else {
                                    echo '<a href="#" class="upload-image">Upload/Set Icon</a>';
                                }
                                echo '<input type="hidden" name="section3_tab3_icon" id="" />';
                            echo '</div>';

                            echo '<div class="copy">';
                                echo '<label for="section3_tab3_text">Tab Title</label>';
                                echo '<input type="text" name="section3_tab3_text" id="section3_tab3_text" value="'.$section3_tab3_text.'" />';
                                
                                echo '<label for="section3_tab3_page">Tab Page</label>';
                                $args = array(
                                    'selected' => $section3_tab3_page
                                );
                                wp_dropdown_pages($args);
                                echo '<input type="hidden" name="section3_tab3_page" id="section3_tab3_page" />';
                            echo '</div>';

                        echo '</div>';

                    echo '</section>';
                    
                    $section4_title = get_post_meta($post->ID,'section4_title',true);
                    $section4_desc = get_post_meta($post->ID,'section4_desc',true);

                    echo '<h3>Section 4</h3>';

                    echo '<label for="section4_title">Headline</label>';
                    echo '<input type="text" name="section4_title" id="section4_title" value="'.$section4_title.'"/>';

                    echo '<label for="section4_desc">Description</label>';
                    echo '<textarea type="text" name="section4_desc" id="section4_desc">'.$section4_desc.'</textarea>';

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
    $section2_button = $_POST['section2_button'];

    if(!empty($section2_title)) {
        update_post_meta($post_id,'section2_title',$section2_title);
    }
    if(!empty($section2_desc)) {
        update_post_meta($post_id,'section2_desc',$section2_desc);
    }
    if(!empty($section2_button)) {
        update_post_meta($post_id,'section2_button',$section2_button);
    }

    $section3_title = $_POST['section3_title'];

    $section3_tab1_icon = $_POST['section3_tab1_icon'];
    $section3_tab1_text = $_POST['section3_tab1_text'];
    $section3_tab1_page = $_POST['section3_tab1_page'];

    $section3_tab2_icon = $_POST['section3_tab2_icon'];
    $section3_tab2_text = $_POST['section3_tab2_text'];
    $section3_tab2_page = $_POST['section3_tab2_page'];

    $section3_tab3_icon = $_POST['section3_tab3_icon'];
    $section3_tab3_text = $_POST['section3_tab3_text'];
    $section3_tab3_page = $_POST['section3_tab3_page'];

    if(!empty($section3_title)) {
        update_post_meta($post_id,'section3_title',$section3_title);
    }

    if(!empty($section3_tab1_icon)) {
        update_post_meta($post_id,'section3_tab1_icon',$section3_tab1_icon);
    }
    if(!empty($section3_tab1_text)) {
        update_post_meta($post_id,'section3_tab1_text',$section3_tab1_text);
    }
    if(!empty($section3_tab1_page)) {
        update_post_meta($post_id,'section3_tab1_page',$section3_tab1_page);
    }

    if(!empty($section3_tab2_icon)) {
        update_post_meta($post_id,'section3_tab2_icon',$section3_tab2_icon);
    }
    if(!empty($section3_tab2_text)) {
        update_post_meta($post_id,'section3_tab2_text',$section3_tab2_text);
    }
    if(!empty($section3_tab2_page)) {
        update_post_meta($post_id,'section3_tab2_page',$section3_tab2_page);
    }

    if(!empty($section3_tab3_icon)) {
        update_post_meta($post_id,'section3_tab3_icon',$section3_tab3_icon);
    }
    if(!empty($section3_tab3_text)) {
        update_post_meta($post_id,'section3_tab3_text',$section3_tab3_text);
    }
    if(!empty($section3_tab3_page)) {
        update_post_meta($post_id,'section3_tab3_page',$section3_tab3_page);
    }

    $section4_title = $_POST['section4_title'];
    $section4_desc = $_POST['section4_desc'];

    if(!empty($section4_title)) {
        update_post_meta($post_id,'section4_title',$section4_title);
    }
    if(!empty($section4_desc)) {
        update_post_meta($post_id,'section4_desc',$section4_desc);
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