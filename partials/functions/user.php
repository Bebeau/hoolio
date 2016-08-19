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
// add upload logo
add_action( 'show_user_profile', 'upload_profile_image' );
add_action( 'edit_user_profile', 'upload_profile_image' );
function upload_profile_image() {
	if(is_admin()) {
		global $profileuser;
		$user_id = $profileuser->ID;
	} else {
		$current_user = wp_get_current_user();
		$user_id = $current_user->ID;
	}

	$logo = get_user_meta($user_id, 'agent_image', true);

	?>
	<h2>Agent Profile Image</h2>
	<p class="description">Upload your agent head shot.</p>

	<section class="imageUpload" data-input="agent_image" data-user="<?php echo $user_id; ?>" data-img="profile">
		<div class="image-placeholder profile">
			<img src="<?php echo $logo; ?>" alt="" />
		</div>
	    <?php if ( !empty($logo) ) { ?>
	    	<button class="remove-image button button-large">Remove</button>
		<?php } else { ?>
			<button class="add button button-large upload-image" id="upload-logo" style="text-align:center;">
		        Upload/Set Profile Image
		    </button>
		<?php } ?>
	    <input type="hidden" name="agent_image" id="agent_image" value="<?php echo $logo; ?>" />
	</section>
<?php }

// ajax response to save download track
add_action('wp_ajax_setImage', 'setCustomImage');
add_action('wp_ajax_nopriv_setImage', 'setCustomImage');
function setCustomImage() {
	// set userID
	if(is_admin()) {
		global $profileuser;
		$user_id = $profileuser->ID;
	} else {
		$current_user = wp_get_current_user();
		$user_id = $current_user->ID;
	}

	$imageField = (isset($_GET['imageField'])) ? $_GET['imageField'] : 0;
	$imageURL = (isset($_GET['fieldVal'])) ? $_GET['fieldVal'] : 0;
	$userID = (isset($_GET['userID'])) ? $_GET['userID'] : 0;

	if($imageURL !== "") {
        update_user_meta( $userID, $imageField, $imageURL);
    } else {
		update_user_meta( $userID, $imageField, "");
	}
}