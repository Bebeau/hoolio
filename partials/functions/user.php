<?php

// Add admin styles for portfolios
add_action( 'admin_enqueue_scripts', 'load_portfolios_admin' );
function load_portfolios_admin() {
    wp_enqueue_style( 'user-styles', get_template_directory_uri() . '/assets/css/user.css', false, '1.0.0' );
    // Registers and enqueues the required javascript.
    wp_register_script( 'meta-box-image-upload', get_template_directory_uri() . '/assets/js/editProfile.js', array( 'jquery' ) );
    wp_localize_script( 'meta-box-image-upload', 'meta_image',
        array(
            'title' => 'Choose or Upload Image',
            'button' => 'Select Image',
            'ajaxurl' => admin_url( 'admin-ajax.php' )
        )
    );
    wp_enqueue_script( 'meta-box-image-upload' );
    wp_enqueue_media();
}

// remove color scheme
remove_action( 'admin_color_scheme_picker', 'admin_color_scheme_picker' );
if ( ! function_exists( 'rdm_remove_personal_options' ) ) {
    // removes the leftover 'Visual Editor', 'Keyboard Shortcuts' and 'Toolbar' options.
  function rdm_remove_personal_options( $subject ) {
    $subject = preg_replace( '#<h2>Personal Options</h2>.+?/table>#s', '', $subject, 1 );
    return $subject;
  }
  function rdm_profile_subject_start() {
    ob_start( 'rdm_remove_personal_options' );
  }
  function rdm_profile_subject_end() {
    ob_end_flush();
  }
}

// remove unneeded contact fields
add_filter('user_contactmethods','hide_contact_fields',10,1);
function hide_contact_fields( $contactmethods ) {
    unset($contactmethods['aim']);
    unset($contactmethods['jabber']);
    unset($contactmethods['yim']);
    return $contactmethods;
}
// add phone number field to contact info
add_filter('user_contactmethods','add_phone',10,1);
function add_phone( $contactmethods ) {
    $contactmethods['jobTitle'] = 'Job Title';
    return $contactmethods;
}
// hide website field
add_action( 'admin_head-user-edit.php', 'remove_website_input' );
add_action( 'admin_head-profile.php',   'remove_website_input' );
function remove_website_input() {
    echo '<style>tr.user-url-wrap,.user-profile-picture{ display: none; }</style>';
}