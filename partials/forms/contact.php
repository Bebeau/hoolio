<?php 

if( empty($_POST['password']) ) {

	$success = false;

	$firstname = isset( $_POST['firstname'] ) ? preg_replace( "/[^\.\-\' a-zA-Z0-9]/", "", $_POST['firstname'] ) : "";
	$lastname = isset( $_POST['lastname'] ) ? preg_replace( "/[^\.\-\' a-zA-Z0-9]/", "", $_POST['lastname'] ) : "";
	$lastname = isset( $_POST['company'] ) ? preg_replace( "/[^\.\-\' a-zA-Z0-9]/", "", $_POST['company'] ) : "";
	$lastname = isset( $_POST['title'] ) ? preg_replace( "/[^\.\-\' a-zA-Z0-9]/", "", $_POST['title'] ) : "";
	$emailaddress = filter_var($_POST['emailaddress'], FILTER_SANITIZE_EMAIL);
	$interest = isset( $_POST['interest'] ) ? preg_replace( "/[^\.\-\' a-zA-Z0-9]/", "", $_POST['interest'] ) : "";
	$message = isset( $_POST['message'] ) ? preg_replace( "/[^\.\-\' a-zA-Z0-9]/", "", $_POST['message'] ) : "";

	$email = 'Wyzerr <info@wyzerr.com>';
 	$to = $firstname.' '.$lastname.' <'.$emailaddress.'>';

	if ( $firstname && $lastname && $emailaddress && $message ) {

		$subject = "Wyzerr Contact Lead";

		$headers = array(
			    'From' => $to,
			    'Subject' => $subject,
			    'Reply-To' => $email,
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

		wp_mail( $email, $subject, $formcontent, $headers );
	}

	// Return an appropriate response to the browser
	if ( isset($_GET["ajax"]) ) {
		
		echo $success ? "Success" : "E";

	}
}
?>
