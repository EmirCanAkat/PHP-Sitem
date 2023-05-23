<?php
require_once ('../PHPMailer/PHPMailerAutoload.php');
$mail = new PHPMailer;

$ds = DIRECTORY_SEPARATOR;
$base_dir = realpath(dirname(__FILE__)  . $ds ) . $ds;

require_once ('FetchData.class.php');

// FetchData Object
$fetchDataObj = new FetchData();
$dataSet = (object) $fetchDataObj->getDataSet();

// Get inputs from user
$name = @trim(stripslashes($_POST['name'])); 
$phone = @trim(stripslashes($_POST['phone'])); 
$email = @trim(stripslashes($_POST['email']));
$message = @trim(stripslashes($_POST['message']));
$subject = $name . " [$phone]";
// mail Body
$mailBody = 'Name: ' . $name . "\n\n" . 'Phone: ' . $phone . "\n\n" . 'Email: ' . $email . "\n\n" . 'Message: ' . $message;

//Server settings
$mail->isSMTP(); // Set mailer to use SMTP
$mail->Host = $dataSet->smtp_host; // Specify main and backup SMTP servers
$mail->SMTPAuth = true; // Enable SMTP authentication
$mail->Username = $dataSet->smtp_username; // SMTP username
$mail->Password = $dataSet->smtp_password; // SMTP password
$mail->SMTPSecure = $dataSet->smtp_secure; // Enable TLS encryption, `ssl` also accepted
$mail->Port = $dataSet->smtp_port; // TCP port to connect to

$mail->SMTPOptions = array(
    'ssl' => array(
        'verify_peer' => false,
        'verify_peer_name' => false,
        'allow_self_signed' => true
    )
);

//Recipients
$mail->setFrom($dataSet->smtp_username);
$mail->addAddress($dataSet->noreply_email);
$mail->addReplyTo($email);

// Content
$mail->isHTML(true);    // Set email format to HTML
$mail->Subject = $subject;
$mail->Body    = $mailBody;

if(!$mail->send()) {
    $response = [
    	'success' => false,
        'msg' => $dataSet->contact_error_msg
    ];
} else {
    $response = [
    	'success' => true,
        'msg' => $dataSet->contact_success_msg
    ];
}

echo json_encode($response);
