<?php 

// Send confirmation email
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require 'phpmailer/Exception.php';
require 'phpmailer/PHPMailer.php';
require 'phpmailer/SMTP.php';

//Create a new PHPMailer instance
$mail = new PHPMailer;

$mail->SMTPOptions = array(
    'ssl' => array(
        'verify_peer' => false,
        'verify_peer_name' => false,
        'allow_self_signed' => true
    )
);

//Tell PHPMailer to use SMTP
$mail->isSMTP();

//Enable SMTP debugging
// 0 = off (for production use)
// 1 = client messages
// 2 = client and server messages
$mail->SMTPDebug = 2;

//Set the hostname of the mail server
$mail->Host = 'smtp.gmail.com';
$mail->Port = 587;

//Set the encryption system to use - ssl (deprecated) or tls
$mail->SMTPSecure = 'tls';

//Whether to use SMTP authentication
$mail->SMTPAuth = true;
$mail->Username = 'david@thoughtbubble.ca';
$mail->Password = '_Trustno1_';

//Set who the message is to be sent from
$mail->setFrom('david@thoughtbubble.ca');

$mail->addAddress('david@thoughtbubble.ca');

//Set the subject line
$mail->Subject = 'HTML Mail Tester';

$body = file_get_contents('./body.html');
$mail->msgHTML($body);

//send the message, check for errors
if (!$mail->send()) {
    echo "Mailer Error: " . $mail->ErrorInfo;
} else {
    echo "success";
}
