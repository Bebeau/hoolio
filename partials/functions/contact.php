<?php
global $post;
add_action('admin_init','wyzerr_contact_page');
function wyzerr_contact_page() {
    if(isset($_GET['action']) && $_GET['action'] === "edit") {
        // Add custom meta boxes to display photo management
        if(isset($_GET['post'])) {
            $post_id = $_GET['post'] ? $_GET['post'] : $_POST['post_ID'];
        }
        $pageName = get_the_title($post_id);

        // checks for post/page ID
        if ( $pageName === "Contact" && get_post_type($post_id) === "page" ) {

        	remove_post_type_support('page', 'editor');

        	add_action( 'add_meta_boxes', 'contact_meta_box', 1 );
        	function contact_meta_box($post) {
                add_meta_box(
                    'contact',
                    'Contact Copy', 
                    'contact_copy',
                    'page', 
                    'normal', 
                    'high'
                );
            }
            function contact_copy($post) {
                wp_nonce_field( 'contact', 'contact_noncename' );

                $contactTitle = get_post_meta($post->ID,'contactTitle', true);
                $contactDesc = get_post_meta($post->ID,'contactDesc', true);

                echo '<form role="form">';
                    echo '<label for="contactTitle">Title</label>';
                    echo '<input type="text" name="contactTitle" id="contactTitle" value="'.$contactTitle.'" />';
                    echo '<label for="contactDesc">Paragraph</label>';
                    echo '<input type="text" name="contactDesc" id="contactDesc" value="'.$contactDesc.'" />';
                echo '</form>';
            }
        }
    }
}
/* When the post is saved, saves our custom data */
add_action( 'save_post', 'save_contact_section_content' );
function save_contact_section_content( $post_id ) {
    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) 
        return;

    if ( !isset( $_POST['contact_noncename'] ) || !wp_verify_nonce( $_POST['contact_noncename'], 'contact' ) )
        return;

    $contactTitle = $_POST['contactTitle'];
    $contactDesc = $_POST['contactDesc'];

    if(!empty($contactTitle)) {
        update_post_meta($post_id,'contactTitle',$contactTitle);
    }
    if(!empty($contactDesc)) {
        update_post_meta($post_id,'contactDesc',$contactDesc);
    }
}
?>