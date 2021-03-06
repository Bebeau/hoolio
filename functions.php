<?php

// Hide admin bar
add_filter('show_admin_bar', '__return_false');

// Load all styles and scripts for the site
if (!function_exists( 'load_custom_scripts' ) ) {
	function load_custom_scripts() {
		// Styles
		wp_enqueue_style( 'Style CSS', get_bloginfo( 'template_url' ) . '/style.css', true, '', 'all' );

		// Load default Wordpress jQuery
		wp_deregister_script('jquery');
		wp_register_script('jquery', ("https://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"), false, '', true);
		wp_enqueue_script('jquery');

        wp_enqueue_script( 'stripe', 'https://js.stripe.com/v2/', array( 'jquery' ), null, true );

        wp_register_script( 'custom', get_bloginfo( 'template_url' ) . '/assets/js/custom.min.js', array( 'jquery' ), null, true );
        wp_localize_script( 'custom', 'meta',
            array(
                'ajaxurl' => admin_url( 'admin-ajax.php' ),
                'nonce' => wp_create_nonce( "contact" ),
                'charge_nonce' => wp_create_nonce( "charge" ),
                'publishable_key' => esc_attr(get_option('stripe_publish_key'))
            )
        );
        wp_enqueue_script( 'custom' );
        wp_enqueue_media();
	}
}
add_action( 'wp_print_styles', 'load_custom_scripts' );

// Thumbnail Support
add_theme_support( 'post-thumbnails', array('post', 'page', 'usecases', 'testimonials') );

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
    register_nav_menu( 'header-menu', 'Header Menu' );
    register_nav_menu( 'main-menu', 'Main Menu' );
    register_nav_menu( 'footer-menu', 'Footer Menu' );
}

// remove WordPress admin menu items
add_action( 'admin_menu', 'remove_menus' );
function remove_menus(){
    // remove_menu_page( 'edit.php' );
    // remove_menu_page( 'edit.php?post_type=page' );
    remove_menu_page( 'edit-comments.php' );
    // remove_menu_page( 'tools.php' );
    // remove_menu_page( 'themes.php' );
    // remove_menu_page( 'plugins.php' );
    // remove_menu_page( 'users.php' );
    // remove_menu_page( 'upload.php' );
}

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

add_action('wp_ajax_sendContact', 'emailSubmit');
add_action('wp_ajax_nopriv_sendContact', 'emailSubmit');
function emailSubmit() {
    global $post;
    if( empty($_POST['password']) ) {

        $success = false;

        $firstname = isset( $_POST['firstname'] ) ? $_POST['firstname'] : "";
        $lastname = isset( $_POST['lastname'] ) ? $_POST['lastname'] : "";
        $company = isset( $_POST['company'] ) ? $_POST['company'] : "";
        $title = isset( $_POST['title'] ) ? $_POST['title'] : "";
        $emailaddress = filter_var($_POST['emailaddress'], FILTER_SANITIZE_EMAIL);
        $interest = isset( $_POST['interest'] ) ? $_POST['interest'] : "";
        $message = isset( $_POST['message'] ) ? $_POST['message'] : "";

        $email = esc_attr(get_option('admin_email'));
        $to = $firstname.' '.$lastname.' <'.$emailaddress.'>';

        if ( $firstname && $lastname && $emailaddress && $message ) {

            $subject = "Wyzerr Contact Lead";

            $headers = 'From:' . $email . "\r\n";
            $headers .= 'Reply-To:' . $to . "\r\n";
            $headers .= "MIME-Version: 1.0\r\n";
            $headers .= "Content-Type: text/html\r\n";
            $headers .= "charset: ISO-8859-1\r\n";
            $headers .= "X-Mailer: PHP/".phpversion()."\r\n";

            $formcontent = '<html><body><center>';
                $formcontent .= '<table rules="all" style="border: 1px solid #cccccc; width: 600px;" cellpadding="10">';
                $formcontent .= "<tr><td><strong>Name:</strong></td><td>" . $firstname .' '. $lastname . "</td></tr>";
                $formcontent .= "<tr><td><strong>Company:</strong></td><td>".$company."</td></tr>";
                $formcontent .= "<tr><td><strong>Title:</strong></td><td>".$title."</td></tr>";
                $formcontent .= "<tr><td><strong>Email:</strong></td><td>" . $emailaddress . "</td></tr>";
                $formcontent .= "<tr><td><strong>Interest:</strong></td><td>".$interest."</td></tr>";
                $formcontent .= "<tr><td><strong>Message:</strong></td><td>" . $message . "</td></tr>";
            $formcontent .= '</table></center></body></html>';

            $success = mail( $email, $subject, $formcontent, $headers );

            $key = esc_attr(get_option('mailchimp_api'));
            $list = esc_attr(get_option('mailchimp_list'));

            if(!empty($key) && !empty($list)) {

                $auth = base64_encode( 'user:'.$key );

                $data = array(
                    'apikey'        => $key,
                    'email_address' => $emailaddress,
                    'status'        => 'subscribed',
                    'merge_fields'  => array(
                        'FNAME'     => $firstname,
                        'LNAME'     => $lastname,
                        'COMPANY'   => $company,
                        'TITLE'     => $title,
                        'INTEREST'  => $interest
                    )
                );

                $json_data = json_encode($data);

                $ch = curl_init();
                curl_setopt($ch, CURLOPT_URL, 'https://us11.api.mailchimp.com/3.0/lists/'.$list.'/members/');
                curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json',
                                                            'Authorization: Basic '.$auth));
                curl_setopt($ch, CURLOPT_USERAGENT, 'PHP-MCAPI/2.0');
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                curl_setopt($ch, CURLOPT_TIMEOUT, 10);
                curl_setopt($ch, CURLOPT_POST, true);
                curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
                curl_setopt($ch, CURLOPT_POSTFIELDS, $json_data);

                $result = curl_exec($ch);
            }
        }

        // Return an appropriate response to the browser
        if ( defined( 'DOING_AJAX' ) ) {
            echo $success ? "Success" : "E";
        }
    }
    die();

}

add_action('wp_ajax_sendPartnership', 'partnershipSubmit');
add_action('wp_ajax_nopriv_sendPartnership', 'partnershipSubmit');
function partnershipSubmit() {
    global $post;
    if( empty($_POST['password']) ) {

        $success = false;

        $name = isset( $_POST['name'] ) ? $_POST['name'] : "";
        $emailaddress = filter_var($_POST['emailaddress'], FILTER_SANITIZE_EMAIL);
        $phone = isset( $_POST['phone'] ) ? $_POST['phone'] : "";
        $title = isset( $_POST['title'] ) ? $_POST['title'] : "";
        $company = isset( $_POST['company'] ) ? $_POST['company'] : "";
        $pType = isset( $_POST['pType'] ) ? $_POST['pType'] : "";

        if ( !empty($name) && !empty($emailaddress) && !empty($phone) ) {
            // split name
            $name = explode($name);
            $email = esc_attr(get_option('admin_email'));
            $to = $name[0].' '.$name[1].' <'.$emailaddress.'>';

            $subject = "Wyzerr Partnership Lead";

            $headers = 'From:' . $email . "\r\n";
            $headers .= 'Reply-To:' . $to . "\r\n";
            $headers .= "MIME-Version: 1.0\r\n";
            $headers .= "Content-Type: text/html\r\n";
            $headers .= "charset: ISO-8859-1\r\n";
            $headers .= "X-Mailer: PHP/".phpversion()."\r\n";

            $formcontent = '<html><body><center>';
                $formcontent .= '<table rules="all" style="border: 1px solid #cccccc; width: 600px;" cellpadding="10">';
                $formcontent .= "<tr><td><strong>Name:</strong></td><td>" . $name[0] ." ". $name[1] ."</td></tr>";
                $formcontent .= "<tr><td><strong>Email:</strong></td><td>" . $emailaddress . "</td></tr>";
                $formcontent .= "<tr><td><strong>Phone:</strong></td><td>" . $phone . "</td></tr>";
                $formcontent .= "<tr><td><strong>Title:</strong></td><td>".$title."</td></tr>";
                $formcontent .= "<tr><td><strong>Company:</strong></td><td>".$company."</td></tr>";
                $formcontent .= "<tr><td><strong>Partnership Type:</strong></td><td>".$pType."</td></tr>";
            $formcontent .= '</table></center></body></html>';

            $success = mail( $email, $subject, $formcontent, $headers );

            // $key = esc_attr(get_option('mailchimp_api'));
            // $list = esc_attr(get_option('mailchimp_list'));

            // if(!empty($key) && !empty($list)) {

            //     $auth = base64_encode( 'user:'.$key );

            //     $data = array(
            //         'apikey'        => $key,
            //         'email_address' => $emailaddress,
            //         'status'        => 'subscribed',
            //         'merge_fields'  => array(
            //             'FNAME'     => $name[0],
            //             'LNAME'     => $name[1],
            //             'PHONE'     => $phone,
            //             'COMPANY'   => $company,
            //             'TITLE'     => $title,
            //             'PARTNERSHIP'     => $pType
            //         )
            //     );

            //     $json_data = json_encode($data);

            //     $ch = curl_init();
            //     curl_setopt($ch, CURLOPT_URL, 'https://us11.api.mailchimp.com/3.0/lists/'.$list.'/members/');
            //     curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json',
            //                                                 'Authorization: Basic '.$auth));
            //     curl_setopt($ch, CURLOPT_USERAGENT, 'PHP-MCAPI/2.0');
            //     curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            //     curl_setopt($ch, CURLOPT_TIMEOUT, 10);
            //     curl_setopt($ch, CURLOPT_POST, true);
            //     curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            //     curl_setopt($ch, CURLOPT_POSTFIELDS, $json_data);

            //     $result = curl_exec($ch);
            // }
        }

        // Return an appropriate response to the browser
        if ( defined( 'DOING_AJAX' ) ) {
            echo $success ? "Success" : "E";
        }
    }
    die();

}

add_action('wp_ajax_newsletterSubmit', 'newsletterSubmit');
add_action('wp_ajax_nopriv_newsletterSubmit', 'newsletterSubmit');
function newsletterSubmit() {

    if(!empty($_POST['email'])) {

        $emailaddress = $_POST['email'];

        $key = esc_attr(get_option('mailchimp_api'));
        $list = esc_attr(get_option('mailchimp_list'));

        if(!empty($key) && !empty($list)) {

            $auth = base64_encode( 'user:'.$key );

            $data = array(
                'apikey'        => $key,
                'email_address' => $emailaddress,
                'status'        => 'subscribed',
                'merge_fields'  => array(
                    'FNAME'     => '',
                    'LNAME'     => ''
                )
            );

            $json_data = json_encode($data);

            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, 'https://us11.api.mailchimp.com/3.0/lists/'.$list.'/members/');
            curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json',
                                                        'Authorization: Basic '.$auth));
            curl_setopt($ch, CURLOPT_USERAGENT, 'PHP-MCAPI/2.0');
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_TIMEOUT, 10);
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $json_data);

            $result = curl_exec($ch);

            // Return an appropriate response to the browser
            if ( defined( 'DOING_AJAX' ) ) {
                echo $result ? "Success" : "E";
            }
        }

    } else {
        echo "E";
    }

    die();
}   

// add_action('wp_ajax_charge', 'checkout');
// add_action('wp_ajax_nopriv_charge', 'checkout');
// function checkout() {
//     require_once('stripe/config.php');

//     // Get the credit card details submitted by the form
//     $token = $_POST['token'];

//     $firstname = isset( $_POST['firstname'] ) ? $_POST['firstname'] : "";
//     $lastname = isset( $_POST['lastname'] ) ? $_POST['lastname'] : "";
//     $emailaddress = filter_var($_POST['emailaddress'], FILTER_SANITIZE_EMAIL);

//     if(!empty($token) && !empty($emailaddress)) {
//         $customer = false;
//         // create customer from user email
//         $customer = \Stripe\Customer::create(array(
//             "source" => $token,
//             "email" => $emailaddress
//         ));
//         // charge customer by ID
//         $charge = \Stripe\Charge::create(array(
//             "amount" => 9900, // Amount in cents
//             "currency" => "usd",
//             "customer" => $customer->id)
//         );
//         // get mailchimp api and list
//         $key = esc_attr(get_option('mailchimp_api'));
//         $list = esc_attr(get_option('mailchimp_list'));

//         if(!empty($key) && !empty($list)) {

//             $auth = base64_encode( 'user:'.$key );

//             $data = array(
//                 'apikey'        => $key,
//                 'email_address' => $emailaddress,
//                 'status'        => 'subscribed',
//                 'merge_fields'  => array(
//                     'FNAME'     => $firstname,
//                     'LNAME'     => $lastname,
//                     'INTEREST'  => 'Pre-paid Subscriber'
//                 )
//             );

//             $json_data = json_encode($data);

//             $ch = curl_init();
//             curl_setopt($ch, CURLOPT_URL, 'https://us11.api.mailchimp.com/3.0/lists/'.$list.'/members/');
//             curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json',
//                                                         'Authorization: Basic '.$auth));
//             curl_setopt($ch, CURLOPT_USERAGENT, 'PHP-MCAPI/2.0');
//             curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
//             curl_setopt($ch, CURLOPT_TIMEOUT, 10);
//             curl_setopt($ch, CURLOPT_POST, true);
//             curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
//             curl_setopt($ch, CURLOPT_POSTFIELDS, $json_data);

//             $result = curl_exec($ch);
//         }

//         // Return an appropriate response to the browser
//         if ( defined( 'DOING_AJAX' ) ) {
//             echo $customer ? "Success" : "E";
//         }
//     } else {
//         echo "E";
//     }

//     die();
// }

// Custom Scripting to Move JavaScript from the Head to the Footer
function remove_head_scripts() { 
   remove_action('wp_head', 'wp_print_scripts'); 
   remove_action('wp_head', 'wp_print_head_scripts', 9); 
   remove_action('wp_head', 'wp_enqueue_scripts', 1);

   add_action('wp_footer', 'wp_print_scripts', 5);
   add_action('wp_footer', 'wp_enqueue_scripts', 5);
   add_action('wp_footer', 'wp_print_head_scripts', 5);
} 
add_action( 'wp_enqueue_scripts', 'remove_head_scripts' );

function add_tracking_codes(){ ?>
    <!-- Google Analytics -->
    <script type="text/javascript">
        (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
        (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
        m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
        })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

        ga('create', 'UA-82839208-2', 'auto');
        ga('send', 'pageview');
    </script>
    <!-- LinkedIn Insight Tag -->
    <script type="text/javascript"> _linkedin_data_partner_id = "32247"; </script>
    <script type="text/javascript"> (function(){var s = document.getElementsByTagName("script")[0]; var b = document.createElement("script"); b.type = "text/javascript";b.async = true; b.src = "https://snap.licdn.com/li.lms-analytics/insight.min.js"; s.parentNode.insertBefore(b, s);})(); </script>

<?php }
add_action('wp_footer', 'add_tracking_codes');

include(TEMPLATEPATH.'/partials/functions/user.php');
include(TEMPLATEPATH.'/partials/functions/theme.php');
include(TEMPLATEPATH.'/partials/functions/testimonials.php');
include(TEMPLATEPATH.'/partials/functions/homepage.php');

include(TEMPLATEPATH.'/partials/functions/use-cases.php');
include(TEMPLATEPATH.'/partials/functions/research.php');
include(TEMPLATEPATH.'/partials/functions/checkout.php');
include(TEMPLATEPATH.'/partials/functions/partnership.php');
include(TEMPLATEPATH.'/partials/functions/contact.php');
include(TEMPLATEPATH.'/partials/functions/thankyou.php');