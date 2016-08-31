<?php 

wp_head();

if( empty($_POST['password']) ) {

	$success = false;

	$firstname = isset( $_POST['firstname'] ) ? preg_replace( "/[^\.\-\' a-zA-Z0-9]/", "", $_POST['firstname'] ) : "";
	$lastname = isset( $_POST['lastname'] ) ? preg_replace( "/[^\.\-\' a-zA-Z0-9]/", "", $_POST['lastname'] ) : "";
	$company = isset( $_POST['company'] ) ? preg_replace( "/[^\.\-\' a-zA-Z0-9]/", "", $_POST['company'] ) : "";
	$title = isset( $_POST['title'] ) ? preg_replace( "/[^\.\-\' a-zA-Z0-9]/", "", $_POST['title'] ) : "";
	$emailaddress = filter_var($_POST['emailaddress'], FILTER_SANITIZE_EMAIL);
	$interest = isset( $_POST['interest'] ) ? preg_replace( "/[^\.\-\' a-zA-Z0-9]/", "", $_POST['interest'] ) : "";
	$message = isset( $_POST['message'] ) ? preg_replace( "/[^\.\-\' a-zA-Z0-9]/", "", $_POST['message'] ) : "";

	$email = get_option('admin_email');
 	$to = $firstname.' '.$lastname.' <'.$emailaddress.'>';

	if ( $firstname && $lastname && $emailaddress && $message ) {

		$subject = "Wyzerr Contact Lead";

		$headers = array(
			    'From' => $to,
			    'Subject' => $subject,
			    'Reply-To' => $to,
			    'X-Mailer' => 'PHP/'.phpversion(),
			    'MIME-Version' => '1.0',
			    'Content-Type' => 'text/html',
			    'charset' => 'ISO-8859-1'
			);

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

		$key = get_option('mailchimp_api');
		$list = get_option('mailchimp_list');

		if(!empty($key) && !empty($list)) {

			$auth = base64_encode( 'user:'.$key );

		    $data = array(
		        'apikey'        => $key,
		        'email_address' => $emailaddress,
		        'status'        => 'subscribed',
		        'merge_fields'  => array(
		            'FNAME' 	=> $firstname,
		            'LNAME' 	=> $lastname,
		            'COMPANY' 	=> $company,
		            'TITLE' 	=> $title,
		            'INTEREST' 	=> $interest
		        )
		    );

		    $json_data = json_encode($data);

		    $ch = curl_init();
		    curl_setopt($ch, CURLOPT_URL, 'https://us8.api.mailchimp.com/3.0/lists/'.$list.'/members/');
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
	if ( isset($_GET["ajax"]) ) {
		
		echo $success ? "Success" : "E";

	}
}
?>
