<?php
session_start();
require_once('../api/function.php');
$id = $_SESSION['username'];
$x = new apiFunction;
$a =$x-> getEmail($id);
	while($rw= $a->fetch_object()){
		$fromsender= $rw->user_email;
	}
require 'PHPMailer/PHPMailerAutoload.php';

//$fromsender="admin@hotmail.com";
$to = $_POST['emailtotxt'];
$_subject = $_POST['subjecttxt'];
$_message = $_POST['msgtxt'];
$mail = new PHPMailer;

$mail->isSMTP();                                   // Set mailer to use SMTP
$mail->Host = 'smtp.gmail.com';                    // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                            // Enable SMTP authentication
$mail->Username = 'jaysondelapaz16@gmail.com';          // SMTP username
$mail->Password = 'JaysonDelapaz@24'; // SMTP password
$mail->SMTPSecure = 'tls';                         // Enable TLS encryption, `ssl` also accepted
$mail->Port = 587;                                 // TCP port to connect to

//$mail->setFrom('email@MIS.com', 'MIS: Jayson'); // sender
$mail->setFrom($fromsender,$fromsender); // sender  
//$mail->addReplyTo('MIS Department', 'Jayson Dela Paz');
$mail->addReplyTo($fromsender, $fromsender);
$mail->addAddress($to);   // Add a recipient
//$mail->addCC('cc@example.com');
//$mail->addBCC('bcc@example.com');

$mail->isHTML(true);  // Set email format to HTML

//$bodyContent = '<h1>Send Mail Transfer Protocol</h1>'; //header body
//$bodyContent .= '<p>Hello Everyone!</p><p>created by: &nbsp <font color="blue">Jayson Dela Paz</font> </b></p>'; //message

$mail->Subject = $_subject; 
$mail->Body    = $_message;

if(!$mail->send()) {
    echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {
    echo 'Message has been sent!';
    //header("Refresh:1;url=../home.php");
}

?>
