<?php
global $post;
add_action('admin_init','wyzerr_thankyou_page');
function wyzerr_thankyou_page() {
    if(isset($_GET['action']) && $_GET['action'] === "edit") {
        // Add custom meta boxes to display photo management
        if(isset($_GET['post'])) {
            $post_id = $_GET['post'] ? $_GET['post'] : $_POST['post_ID'];
        }
        $pageName = get_the_title($post_id);

        // checks for post/page ID
        if ( $pageName === "Thank You" && get_post_type($post_id) === "page" ) {

        	remove_post_type_support('page', 'editor');

        	add_action( 'add_meta_boxes', 'contact_meta_box', 1 );
        	function contact_meta_box($post) {
                add_meta_box(
                    'content',
                    'Content', 
                    'thankyou_content',
                    'page', 
                    'normal', 
                    'high'
                );
            }
            function thankyou_content($post) {
                wp_nonce_field( 'thankyou', 'thankyou_noncename' );

                $thankyou_title = get_post_meta($post->ID,'thankyou_title',true);
                $thankyou_desc = get_post_meta($post->ID,'thankyou_desc',true);
                $thankyou_desc2 = get_post_meta($post->ID,'thankyou_desc2',true);

                echo '<section>';
                    echo '<h3>Section 1</h3>';
                    echo '<label for="thankyou_title">Title</label>';
                    echo '<input type="text" name="thankyou_title" id="thankyou_title" value="'.$thankyou_title.'" />';
                    echo '<label for="thankyou_desc">Paragraph</label>';
                    echo '<input type="text" name="thankyou_desc" id="thankyou_desc" value="'.$thankyou_desc.'" />';
                    echo '<label for="thankyou_desc2">Paragraph 2</label>';
                    echo '<input type="text" name="thankyou_desc2" id="thankyou_desc2" value="'.$thankyou_desc2.'" />';
                echo '</section>';

                $thankyou_section2_title = get_post_meta($post->ID,'thankyou_section2_title',true);
                $thankyou_section2_desc = get_post_meta($post->ID,'thankyou_section2_desc',true);

                $thankyou_square1_title = get_post_meta($post->ID,'thankyou_square1_title',true);
                $thankyou_square1_desc = get_post_meta($post->ID,'thankyou_square1_desc',true);

                $thankyou_square2_title = get_post_meta($post->ID,'thankyou_square2_title',true);
                $thankyou_square2_desc = get_post_meta($post->ID,'thankyou_square2_desc',true);

                $thankyou_square3_title = get_post_meta($post->ID,'thankyou_square3_title',true);
                $thankyou_square3_desc = get_post_meta($post->ID,'thankyou_square3_desc',true);

                $thankyou_square4_title = get_post_meta($post->ID,'thankyou_square4_title',true);
                $thankyou_square4_desc = get_post_meta($post->ID,'thankyou_square4_desc',true);

                echo '<section>';
                    echo '<h3>Section 2</h3>';
                    echo '<label for="thankyou_section2_title">Title</label>';
                    echo '<input type="text" name="thankyou_section2_title" id="thankyou_section2_title" value="'.$thankyou_section2_title.'" />';
                    echo '<label for="thankyou_section2_desc">Paragraph</label>';
                    echo '<input type="text" name="thankyou_section2_desc" id="thankyou_section2_desc" value="'.$thankyou_section2_desc.'" />';
                    echo '<h3>Squares</h3>';
                    echo '<label for="thankyou_square1_title">Square 1 Title</label>';
                    echo '<input type="text" name="thankyou_square1_title" id="thankyou_square1_title" value="'.$thankyou_square1_title.'" />';
                    echo '<label for="thankyou_square1_desc">Square 1 Paragraph</label>';
                    echo '<input type="text" name="thankyou_square1_desc" id="thankyou_square1_desc" value="'.$thankyou_square1_desc.'" />';
                    echo '<label for="thankyou_square2_title">Square 2 Title</label>';
                    echo '<input type="text" name="thankyou_square2_title" id="thankyou_square2_title" value="'.$thankyou_square2_title.'" />';
                    echo '<label for="thankyou_square2_desc">Square 2 Paragraph</label>';
                    echo '<input type="text" name="thankyou_square2_desc" id="thankyou_square2_desc" value="'.$thankyou_square2_desc.'" />';
                    echo '<label for="thankyou_square3_title">Square 3 Title</label>';
                    echo '<input type="text" name="thankyou_square3_title" id="thankyou_square3_title" value="'.$thankyou_square3_title.'" />';
                    echo '<label for="thankyou_square3_desc">Square 3 Paragraph</label>';
                    echo '<input type="text" name="thankyou_square3_desc" id="thankyou_square3_desc" value="'.$thankyou_square3_desc.'" />';
                    echo '<label for="thankyou_square4_title">Square 4 Title</label>';
                    echo '<input type="text" name="thankyou_square4_title" id="thankyou_square4_title" value="'.$thankyou_square4_title.'" />';
                    echo '<label for="thankyou_square4_desc">Square 4 Paragraph</label>';
                    echo '<input type="text" name="thankyou_square4_desc" id="thankyou_square4_desc" value="'.$thankyou_square4_desc.'" />';
                echo '</section>';

                $thankyou_section3_title = get_post_meta($post->ID,'thankyou_section3_title',true);
                $thankyou_section3_desc = get_post_meta($post->ID,'thankyou_section3_desc',true);
                $thankyou_section3_image = get_post_meta($post->ID,'thankyou_section3_image',true);
                $thankyou_section3_desc2 = get_post_meta($post->ID,'thankyou_section3_desc2',true);

                echo '<section>';
                    echo '<h3>Section 3</h3>';
                    echo '<label for="thankyou_section3_title">Title</label>';
                    echo '<input type="text" name="thankyou_section3_title" id="thankyou_section3_title" value="'.$thankyou_section3_title.'" />';
                    echo '<label for="thankyou_section3_desc">Paragraph</label>';
                    echo '<input type="text" name="thankyou_section3_desc" id="thankyou_section3_desc" value="'.$thankyou_section3_desc.'" />';
                    echo '<label for="thankyou_section3_image">Image</label>';
                    echo '<div class="thankyou_section3_image sub_image" data-img="icon" data-input="thankyou_section3_image" data-post="'.$post->ID.'">';
                        if(!empty($thankyou_section3_image)) {
                            echo '<img src="'.$thankyou_section3_image.'" alt="" /><span class="remove-image button-remove" data-text="icon">X</span>';
                        } else {
                            echo '<a href="#" class="upload-image">Upload/Set Image</a>';
                        }
                        echo '<input type="hidden" name="thankyou_section3_image" id="" />';
                    echo '</div>';
                    echo '<label for="thankyou_section3_desc2">Paragraph 2</label>';
                    echo '<input type="text" name="thankyou_section3_desc2" id="thankyou_section3_desc2" value="'.$thankyou_section3_desc2.'" />';
                echo '</section>';

                $thankyou_section4_title = get_post_meta($post->ID,'thankyou_section4_title',true);
                $thankyou_section4_desc = get_post_meta($post->ID,'thankyou_section4_desc',true);
                $thankyou_section4_image = get_post_meta($post->ID,'thankyou_section4_image',true);
                $thankyou_section4_desc2 = get_post_meta($post->ID,'thankyou_section4_desc2',true);

                echo '<section>';
                    echo '<h3>Section 4</h3>';
                    echo '<label for="thankyou_section4_title">Title</label>';
                    echo '<input type="text" name="thankyou_section4_title" id="thankyou_section4_title" value="'.$thankyou_section4_title.'" />';
                    echo '<label for="thankyou_section4_desc">Paragraph</label>';
                    echo '<input type="text" name="thankyou_section4_desc" id="thankyou_section4_desc" value="'.$thankyou_section4_desc.'" />';
                    echo '<label for="thankyou_section4_image">Image</label>';
                    echo '<div class="thankyou_section4_image sub_image" data-img="icon" data-input="thankyou_section4_image" data-post="'.$post->ID.'">';
                        if(!empty($thankyou_section4_image)) {
                            echo '<img src="'.$thankyou_section4_image.'" alt="" /><span class="remove-image button-remove" data-text="icon">X</span>';
                        } else {
                            echo '<a href="#" class="upload-image">Upload/Set Image</a>';
                        }
                        echo '<input type="hidden" name="thankyou_section4_image" id="" />';
                    echo '</div>';
                    echo '<label for="thankyou_section4_desc2">Paragraph 2</label>';
                    echo '<input type="text" name="thankyou_section4_desc2" id="thankyou_section4_desc2" value="'.$thankyou_section4_desc2.'" />';
                echo '</section>';
            }
        }
    }
}
/* When the post is saved, saves our custom data */
add_action( 'save_post', 'save_thankyou_section_content' );
function save_thankyou_section_content( $post_id ) {
    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) 
        return;

    if ( !isset( $_POST['thankyou_noncename'] ) || !wp_verify_nonce( $_POST['thankyou_noncename'], 'thankyou' ) )
        return;

    $thankyou_title = $_POST['thankyou_title'];
    $thankyou_desc = $_POST['thankyou_desc'];
    $thankyou_desc2 = $_POST['thankyou_desc2'];

    if(!empty($thankyou_title)) {
        update_post_meta($post_id,'thankyou_title',$thankyou_title);
    }
    if(!empty($thankyou_desc)) {
        update_post_meta($post_id,'thankyou_desc',$thankyou_desc);
    }
    if(!empty($thankyou_desc2)) {
        update_post_meta($post_id,'thankyou_desc2',$thankyou_desc2);
    }

    $thankyou_section2_title = $_POST['thankyou_section2_title'];
    $thankyou_section2_desc = $_POST['thankyou_section2_desc'];
    
    $thankyou_square1_title = $_POST['thankyou_square1_title'];
    $thankyou_square1_desc = $_POST['thankyou_square1_desc'];
    
    $thankyou_square2_title = $_POST['thankyou_square2_title'];
    $thankyou_square2_desc = $_POST['thankyou_square2_desc'];
    
    $thankyou_square3_title = $_POST['thankyou_square3_title'];
    $thankyou_square3_desc = $_POST['thankyou_square3_desc'];
    
    $thankyou_square4_title = $_POST['thankyou_square4_title'];
    $thankyou_square4_desc = $_POST['thankyou_square4_desc'];

    if(!empty($thankyou_section2_title)) {
        update_post_meta($post_id,'thankyou_section2_title',$thankyou_section2_title);
    }
    if(!empty($thankyou_section2_desc)) {
        update_post_meta($post_id,'thankyou_section2_desc',$thankyou_section2_desc);
    }
    if(!empty($thankyou_square1_title)) {
        update_post_meta($post_id,'thankyou_square1_title',$thankyou_square1_title);
    }
    if(!empty($thankyou_square1_desc)) {
        update_post_meta($post_id,'thankyou_square1_desc',$thankyou_square1_desc);
    }
    if(!empty($thankyou_square2_title)) {
        update_post_meta($post_id,'thankyou_square2_title',$thankyou_square2_title);
    }
    if(!empty($thankyou_square2_desc)) {
        update_post_meta($post_id,'thankyou_square2_desc',$thankyou_square2_desc);
    }
    if(!empty($thankyou_square3_title)) {
        update_post_meta($post_id,'thankyou_square3_title',$thankyou_square3_title);
    }
    if(!empty($thankyou_square3_desc)) {
        update_post_meta($post_id,'thankyou_square3_desc',$thankyou_square3_desc);
    }
    if(!empty($thankyou_square4_title)) {
        update_post_meta($post_id,'thankyou_square4_title',$thankyou_square4_title);
    }
    if(!empty($thankyou_square4_desc)) {
        update_post_meta($post_id,'thankyou_square4_desc',$thankyou_square4_desc);
    }

    $thankyou_section3_title = $_POST['thankyou_section3_title'];
    $thankyou_section3_desc = $_POST['thankyou_section3_desc'];
    $thankyou_section3_image = $_POST['thankyou_section3_image'];
    $thankyou_section3_desc2 = $_POST['thankyou_section3_desc2'];

    if(!empty($thankyou_section3_title)) {
        update_post_meta($post_id,'thankyou_section3_title',$thankyou_section3_title);
    }
    if(!empty($thankyou_section3_desc)) {
        update_post_meta($post_id,'thankyou_section3_desc',$thankyou_section3_desc);
    }
    if(!empty($thankyou_section3_image)) {
        update_post_meta($post_id,'thankyou_section3_image',$thankyou_section3_image);
    }
    if(!empty($thankyou_section3_desc2)) {
        update_post_meta($post_id,'thankyou_section3_desc2',$thankyou_section3_desc2);
    }

    $thankyou_section4_title = $_POST['thankyou_section4_title'];
    $thankyou_section4_desc = $_POST['thankyou_section4_desc'];
    $thankyou_section4_image = $_POST['thankyou_section4_image'];
    $thankyou_section4_desc2 = $_POST['thankyou_section4_desc2'];

    if(!empty($thankyou_section4_title)) {
        update_post_meta($post_id,'thankyou_section4_title',$thankyou_section4_title);
    }
    if(!empty($thankyou_section4_desc)) {
        update_post_meta($post_id,'thankyou_section4_desc',$thankyou_section4_desc);
    }
    if(!empty($thankyou_section4_image)) {
        update_post_meta($post_id,'thankyou_section4_image',$thankyou_section4_image);
    }
    if(!empty($thankyou_section4_desc2)) {
        update_post_meta($post_id,'thankyou_section4_desc2',$thankyou_section4_desc2);
    }
}
?>