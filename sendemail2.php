<?php

// Define some constants
define( "RECIPIENT_NAME", "Asesor de Servicio" );
define( "RECIPIENT_EMAIL", "servicio.albatros@bosch-service.com.mx" );


// Read the form values
$success = false;
$senderName = isset( $_POST['username'] ) ? preg_replace( "/[^\.\-\' a-zA-Z0-9]/", "", $_POST['username'] ) : "";
$senderEmail = isset( $_POST['email'] ) ? preg_replace( "/[^\.\-\_\@a-zA-Z0-9]/", "", $_POST['email'] ) : "";
$subject = isset( $_POST['service'] ) ? preg_replace( "/[^\.\-\' a-zA-Z0-9]/", "", $_POST['service'] ) : "";
$subject = isset( $_POST['date'] ) ? preg_replace( "/[^\.\-\' a-zA-Z0-9]/", "", $_POST['date'] ) : "";

// If all values exist, send the email
if ( $senderName && $senderEmail && $subject && $message) {
  $recipient = RECIPIENT_NAME . " <" . RECIPIENT_EMAIL . ">";
  $headers = "From: " . $senderName . " <" . $senderEmail . ">";
  $msgBody = " Subject: " . $subject ." Message: " . $message . "";
  $success = mail( $recipient, $headers, $msgBody );

  //Set Location After Successsfull Submission
  header('Location: contact.html');
}

else{
	//Set Location After Unsuccesssfull Submission
  	header('Location: index.html');	
}

?>