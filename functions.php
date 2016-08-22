<?php

// Hide admin bar
add_filter('show_admin_bar', '__return_false');

// Load all styles and scripts for the site
if (!function_exists( 'load_custom_scripts' ) ) {
	function load_custom_scripts() {
		// Styles
		wp_enqueue_style( 'Style CSS', get_bloginfo( 'template_url' ) . '/style.css', false, '', 'all' );

		// Load default Wordpress jQuery
		wp_deregister_script('jquery');
		wp_register_script('jquery', ("http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"), false, '', false);
		wp_enqueue_script('jquery');

		// Load custom scripts
		wp_enqueue_script('custom', get_bloginfo( 'template_url' ) . '/assets/js/custom.js', array('jquery'), null, true);

	}
}
add_action( 'wp_print_styles', 'load_custom_scripts' );

// Thumbnail Support
add_theme_support( 'post-thumbnails', array('post', 'page') );

// Load widget areas
if ( function_exists('register_sidebar') ) {
	register_sidebar(array(
		'id' => 'sidebar',
		'before_widget' => '<div class="widgetWrap">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="widgetTitle">',
		'after_title' => '</h3>',
	));
}

// Register Navigation Menu Areas
add_action( 'after_setup_theme', 'register_my_menu' );
function register_my_menu() {
  register_nav_menu( 'main-menu', 'Main Menu' );
  register_nav_menu( 'footer-menu', 'Footer Menu' );
}

// remove WordPress admin menu items
function remove_menus(){
    // remove_menu_page( 'edit.php' );
    // remove_menu_page( 'edit.php?post_type=page' );
    remove_menu_page( 'edit-comments.php' );
    remove_menu_page( 'tools.php' );
    // remove_menu_page( 'themes.php' );
    remove_menu_page( 'plugins.php' );
    // remove_menu_page( 'users.php' );
    remove_menu_page( 'upload.php' );
}
add_action( 'admin_menu', 'remove_menus' );

add_action('admin_init', 'my_general_section');  
function my_general_section() {  
    add_settings_section(  
        'my_settings_section', // Section ID 
        'Social Media', // Section Title
        'my_section_options_callback', // Callback
        'general' // What Page?  This makes the section show up on the General Settings Page
    );
    add_settings_field( // Option 1
        'facebook', // Option ID
        'Facebook URL', // Label
        'my_textbox_callback', // !important - This is where the args go!
        'general', // Page it will be displayed
        'my_settings_section', // Name of our section (General Settings)
        array( // The $args
            'facebook' // Should match Option ID
        )  
    );
    add_settings_field( // Option 2
        'twitter', // Option ID
        'Twitter URL', // Label
        'my_textbox_callback', // !important - This is where the args go!
        'general', // Page it will be displayed
        'my_settings_section', // Name of our section (General Settings)
        array( // The $args
            'twitter' // Should match Option ID
        )  
    );
    add_settings_field( // Option 2
        'instagram', // Option ID
        'Instagram URL', // Label
        'my_textbox_callback', // !important - This is where the args go!
        'general', // Page it will be displayed
        'my_settings_section', // Name of our section (General Settings)
        array( // The $args
            'instagram' // Should match Option ID
        )  
    );
    add_settings_field( // Option 2
        'youtube', // Option ID
        'Youtube URL', // Label
        'my_textbox_callback', // !important - This is where the args go!
        'general', // Page it will be displayed
        'my_settings_section', // Name of our section (General Settings)
        array( // The $args
            'youtube' // Should match Option ID
        )  
    );


    register_setting('general','facebook', 'esc_attr');
    register_setting('general','twitter', 'esc_attr');
    register_setting('general','instagram', 'esc_attr');
    register_setting('general','youtube', 'esc_attr');

}

function my_section_options_callback() { // Section Callback
    echo '<p>Enter your social media links to have them automatically display in the website footer.</p>';  
}

function my_textbox_callback($args) {  // Textbox Callback
    $option = get_option($args[0]);
    echo '<input type="text" class="regular-text" id="'. $args[0] .'" name="'. $args[0] .'" value="' . $option . '" />';
}

include(TEMPLATEPATH.'/partials/functions/user.php');

function get_contact_form() { ?>
    <form role="form" method="POST" action="<?php echo bloginfo('template_directory');?>/partials/forms/contact.php" id="contactfrm">
        <div class="half">
            <input type="text" name="firstname" id="firstname" class="form-control" placeholder="first name"/>
            <input type="text" name="lastname" id="lastname" class="form-control" placeholder="last name"/>
        </div>
        <div class="half">
            <input type="text" name="company" id="company" class="form-control" placeholder="company"/>
            <input type="text" name="title" id="title" class="form-control" placeholder="title"/>
        </div>
        <div class="half">
            <input type="text" name="emailaddress" id="emailaddress" class="form-control" placeholder="email"/>
            <div id="dropdown">
                <button>Area of interest <i class="fa fa-angle-down"></i></button>
                <ul class="dropdown-menu">
                    <li data-value="Enterprise">Enterprise</li>
                    <li data-value="Partnerships">Partnerships</li>
                    <li data-value="Press/Event">Press / Event Inquiry</li>
                    <li data-value="Other">Other</li>
                </ul>
            </div>
            <input type="hidden" name="interest" id="interest" class="form-control"/>
        </div>
        <textarea type="text" name="message" id="message" class="form-control" placeholder="comment"></textarea>
        <button type="submit" class="btn btn-submit">Submit</button>
        <input type="hidden" name="password" id="password" val="" />
    </form>
<?php 
}