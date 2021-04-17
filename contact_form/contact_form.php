<?php 
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require "./PHPMailer/src/PHPMailer.php";
require "./PHPMailer/src/Exception.php";
require "./PHPMailer/src/SMTP.php";

$mail = new PHPMailer(true);

@$name = $_POST['name'];
@$email = $_POST['email'];
@$message = $_POST['message'];

try {
	// Settings
	$mail->IsSMTP();
	$mail->CharSet = 'UTF-8';

	$mail->Host       = "smtp.gmail.com"; // SMTP server example
	$mail->SMTPDebug  = 0;                     // 0/1 enables SMTP debug information (for testing)
	$mail->SMTPAuth   = true;                  // enable SMTP authentication
	$mail->Port       = 587;                    // set the SMTP port for the GMAIL server
	$mail->Username   = "daniel.aguirre.dev@gmail.com"; // SMTP account username example
	$mail->Password   = "Eliticodancore10";        // SMTP account password example

	// Content
	$mail->isHTML(true); // Set email format to HTML
	$mail->setFrom('daniel.aguirre.dev@gmail.com', 'Daniel Aguirre');
	// $mail->addAddress('daguirre@zlivio.com');
	$mail->addAddress($email);
	$mail->Subject = 'Contacto Developer';
	$mail->Body    = 'Hola '.$name.'.</br> Pronto me pondré en contacto para información sobre "'.$message.'"';
	// $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
	// $mail->addAttachment('./img/fullstack.jpg');

	$mail->send();
		echo 'Message has been sent';
	} catch (Exception $e) {
		echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
	}

?>