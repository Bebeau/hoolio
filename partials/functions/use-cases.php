<?php

global $post;

// Create custom post type for recipes
add_action( 'init', 'init_usecases' );
function init_usecases() {

    $artist_type_labels = array(
        'name' => _x('Use Cases', 'post type general name'),
        'singular_name' => _x('Use Cases', 'post type singular name'),
        'add_new' => _x('Add New Use Case', 'video'),
        'add_new_item' => __('Add New Use Case'),
        'edit_item' => __('Edit Use Case'),
        'new_item' => __('Add New Use Case'),
        'all_items' => __('View Use Cases'),
        'view_item' => __('View Use Case'),
        'search_items' => __('Search Use Cases'),
        'not_found' =>  __('No Use Cases found'),
        'not_found_in_trash' => __('No Use Cases found in Trash'), 
        'parent_item_colon' => '',
        'menu_name' => 'Use Cases'
    );
    $artist_type_args = array(
        'labels' => $artist_type_labels,
        'public' => true,
        'publicly_queryable' => true,
        'query_var' => true,
        'rewrite' => array( 'slug' => 'use-cases' ),
        'rewrite' => true,
        'capability_type' => 'post',
        'has_archive' => false, 
        'hierarchical' => false,
        'map_meta_cap' => true,
        'menu_position' => null,
        'supports' => array('title', 'editor', 'thumbnail')
    );
    register_post_type('Use Cases', $artist_type_args);
}
// Add custom meta boxes to use cases
add_action( 'add_meta_boxes', 'use_case_meta_box', 1 );
function use_case_meta_box( $post ) {
    add_meta_box(
        'icon', 
        'Icon', 
        'use_case_icon',
        'usecases',
        'side', 
        'low'
    );
}

function use_case_icon($post) {
    // Use nonce for verification
    wp_nonce_field( 'icon', 'icon_noncename' );

    $icon = get_post_meta($post->ID,'use_case_icon', true);

    echo '<div data-post="'.$post->ID.'">';
        if ( !empty($icon) ) {
            echo '<div class="iconWrap" data-post="'.$post->ID.'" data-input="use_case_icon">';
                echo '<img src="'.$icon.'" alt="" /><a href="#" class="remove-image" data-text="Use Case icon">Remove icon</a>';
                echo '<input type="hidden" name="use_case_icon" id="use_case_icon" value="'.$icon.'" />';
            echo '</div>';
        } else {
            echo '<div class="iconWrap" data-post="'.$post->ID.'" data-input="use_case_icon">';
                echo '<a href="" class="upload-image">Upload/Set Use Case icon</a>';
                echo '<input type="hidden" name="use_case_icon" id="use_case_icon" value="" />';
            echo '</div>';
        }
    echo '</div>';
}

/* When the post is saved, saves our custom data */
add_action( 'save_post', 'save_use_case_postdata' );
function save_use_case_postdata( $post_id ) {
    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) 
        return;

    // check for nonce
    if ( !isset( $_POST['icon_noncename'] ) || !wp_verify_nonce( $_POST['icon_noncename'], 'icon' ) )
        return;

    // save icon if exists
    $icon = $_POST['use_case_icon'];
    if(!empty($icon)) {
        update_post_meta($post_id,'use_case_icon',$icon);
    }
}

// ajax response to save download track
add_action('wp_ajax_setImage', 'setUseCaseIcon');
add_action('wp_ajax_nopriv_setImage', 'setUseCaseIcon');
function setUseCaseIcon() {

    $imageField = (isset($_GET['imageField'])) ? $_GET['imageField'] : 0;
    $imageURL = (isset($_GET['fieldVal'])) ? $_GET['fieldVal'] : 0;
    $postID = (isset($_GET['postID'])) ? $_GET['postID'] : 0;

    var_dump($imageField);
    
    if($imageURL !== "") {
        update_post_meta( $postID, $imageField, $imageURL);
    } else {
        update_post_meta( $postID, $imageField, "");
    }
}

global $post;
add_action('admin_init','wyzerr_use_case_page');
function wyzerr_use_case_page() {
    if(isset($_GET['action']) && $_GET['action'] === "edit") {
        // Add custom meta boxes to display photo management
        if(isset($_GET['post'])) {
            $post_id = $_GET['post'] ? $_GET['post'] : $_POST['post_ID'];
        }
        $pageName = get_the_title($post_id);

        // checks for post/page ID
        if (
            $pageName === "Use Cases" && get_post_type($post_id) === "page"  ) {

            remove_post_type_support('page', 'editor');

            add_action( 'add_meta_boxes', 'use_case_copy', 1 );
            function use_case_copy($post) {
                add_meta_box(
                    'content',
                    'Page Content', 
                    'use_case_content',
                    'page', 
                    'normal', 
                    'high'
                );
            }
            function use_case_content($post) {
                // Use nonce for verification
                wp_nonce_field( 'use_case', 'use_case_noncename' );

                $use_case_title = get_post_meta($post->ID, 'use_case_title', true);
                $use_case_desc = get_post_meta($post->ID, 'use_case_desc', true);

                echo '<section>';

                    echo '<label for="use_case_title">Title</label>';
                    echo '<input type="text" name="use_case_title" id="use_case_title" value="'.$use_case_title.'" />';

                    echo '<label for="use_case_desc">Description</label>';
                    echo '<input type="text" name="use_case_desc" id="use_case_desc" value="'.$use_case_desc.'" />';

                echo '</section>';

            }
        }
    }
    /* When the post is saved, saves our custom data */
    add_action( 'save_post', 'save_use_case_pagedata' );
    function save_use_case_pagedata( $post_id ) {
        if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) 
            return;

        // check for nonce
        if ( !isset( $_POST['use_case_noncename'] ) || !wp_verify_nonce( $_POST['use_case_noncename'], 'use_case' ) )
            return;

        // save icon if exists
        $use_case_title = $_POST['use_case_title'];
        $use_case_desc = $_POST['use_case_desc'];

        if(!empty($use_case_title)) {
            update_post_meta($post_id,'use_case_title',$use_case_title);
        }
        if(!empty($use_case_desc)) {
            update_post_meta($post_id,'use_case_desc',$use_case_desc);
        }
    }
}

?>