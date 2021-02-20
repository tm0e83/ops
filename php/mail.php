<?php
$mail_target = 'tm0e83@gmail.com';
$mail_subject = 'Ops! Kundennachricht';
$errFields = array();

// Name
$name = '';
if(isset($_POST['name'])) {
	$name = $_POST['name'];
}

$name_regexp = '/^[A-Za-z0-9\s]{1,}$/';
if(preg_match($name_regexp, $name) === false || preg_match($name_regexp, $name) == 0) {
	array_push($errFields, 'name');
}

// Email
$email = '';
if(isset($_POST['email']) && $_POST['email'] != '') {
	$email = $_POST['email'];
}

$email_regexp = '/^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/';
if(preg_match($email_regexp, $email) === false || preg_match($email_regexp, $email) == 0) {
	array_push($errFields, 'email');
}

// Phone
$phone = '';
if(isset($_POST['phone']) && $_POST['phone'] != '') {
	$phone = $_POST['phone'];
}

$phone_regexp = '/^\+?(?:[0-9]-?\/?){6,14}[0-9]$/';
if(preg_match($phone_regexp, $phone) === false || preg_match($phone_regexp, $phone) == 0) {
	array_push($errFields, 'phone');
}

// Request
$message = '';
if(isset($_POST['message']) && $_POST['message'] != '') {
	$message = $_POST['message'];
}

$message_regexp = '/\w/';
if(preg_match($message_regexp, $message) === false || preg_match($message_regexp, $message) == 0) {
	array_push($errFields, 'message');
}

$mail_message = '<html><body>' .
				'Name: ' . $_POST['name'] . '<br />' .
				'E-Mail: ' . $_POST['email'] . '<br />' .
				'Telefon: ' . $_POST['phone'] . '<br />' .
				'Request: ' . $_POST['message'] .
				'</body></html>';

// Mail Header
$mail_header = "From: guetlich-consulting.de - " . $name . "<" . $email . ">\r\n";
$mail_header .= "Reply-To: ". strip_tags($email) . "\r\n";
// $mail_header .= "CC: susan@example.com\r\n";
$mail_header .= "MIME-Version: 1.0\r\n";
$mail_header .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

// Send mail or return errors
if(count($errFields) == 0) {
	mail($mail_target, $mail_subject, $mail_message, $mail_header);
	echo json_encode([
		'status' => 1
	]);
} else {
	echo json_encode([
		'errors' => $errFields,
		'status' => 0
	]);
}

?>