<?php
require 'PHPMailerAutoload.php';

class Mail
{	
	public function SendMail($to, $name, $subject, $message)
	{
		$mail = new PHPMailer();
		$mail->IsSMTP();                                      // set mailer to use SMTP
		$mail->SMTPAuth = true;     // turn on SMTP authentication
		$mail->SMTPSecure = "ssl";
		$mail->Host = "smtp.gmail.com";  // specify main and backup server
		$mail->Port = 587;
		$mail->Username = "usernmae@gmail.com";  // SMTP username
		$mail->Password = "password"; // SMTP password
		$mail->From = "username@gmail.com";
		$mail->FromName = "Administrator";	

		$mail->WordWrap = 50;                                 // set word wrap to 50 characters
		$mail->IsHTML(true);                                  // set email format to HTML
		
		$mail->AddAddress($to, $name);
		$mail->Subject = $subject;
		$mail->Body    = $message;
		$mail->AltBody = "This is the body in plain text for non-HTML mail clients";
	  
		$mail->SMTPDebug = 2;
		
		if(!$mail->Send())
		{
		    echo "Message could not be sent. <p>";
			echo "Mailer Error: " . $mail->ErrorInfo;
			exit;
		}
		//echo "Message has been sent"; 
  }
}

?>