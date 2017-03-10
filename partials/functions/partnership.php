<?php
global $post;
add_action('admin_init','wyzerr_partnership_page');
function wyzerr_partnership_page() {
    if(isset($_GET['action']) && $_GET['action'] === "edit") {
        // Add custom meta boxes to display photo management
        if(isset($_GET['post'])) {
            $post_id = $_GET['post'] ? $_GET['post'] : $_POST['post_ID'];
        }
        $pageName = get_the_title($post_id);

        // checks for post/page ID
        if ( $pageName === "Partnership" && get_post_type($post_id) === "page" ) {

        	remove_post_type_support('page', 'editor');

        	add_action( 'add_meta_boxes', 'partnership_meta_box', 1 );
        	function partnership_meta_box($post) {
                add_meta_box(
                    'partnershipTitles',
                    'Page Titles', 
                    'partnership_titles',
                    'page', 
                    'normal', 
                    'high'
                );
            }
            function partnership_titles($post) {
                wp_nonce_field( 'partnership', 'partnership_noncename' );

                $pTitle = get_post_meta($post->ID,'pTitle', true);
                $pDesc = get_post_meta($post->ID,'pDesc', true);

                echo '<form role="form">';
                    echo '<label for="pTitle">Title</label>';
                    echo '<input type="text" name="pTitle" id="pTitle" value="'.$pTitle.'" />';
                    echo '<label for="pDesc">Desc</label>';
                    echo '<textarea type="text" name="pDesc" id="pDesc">'.$pDesc.'</textarea>';
                echo '</form>';
            }
        }
    }
}
/* When the post is saved, saves our custom data */
add_action( 'save_post', 'save_partnership_section_content' );
function save_partnership_section_content( $post_id ) {
    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) 
        return;

    if ( !isset( $_POST['partnership_noncename'] ) || !wp_verify_nonce( $_POST['partnership_noncename'], 'partnership' ) )
        return;

    $pTitle = $_POST['pTitle'];
    $pDesc = $_POST['pDesc'];
    if(!empty($pTitle)) {
        update_post_meta($post_id,'pTitle',$pTitle);
    }
    if(!empty($pDesc)) {
        update_post_meta($post_id,'pDesc',$pDesc);
    }
}
?>