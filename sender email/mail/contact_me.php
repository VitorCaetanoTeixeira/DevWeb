<?php
// Check for empty fields


if(empty($_POST['name'])  		||
   empty($_POST['email']) 		||
   empty($_POST['message'])	||
   !filter_var($_POST['email'],FILTER_VALIDATE_EMAIL))
   {
	echo "No arguments Provided!";
	return false;
   }
	
$name = $_POST['name'];
$email_address = $_POST['email'];
//$phone = $_POST['phone'];
$message = $_POST['message'];

$to  = '$email_address';//'contato@emporiodogeloseco.com.br' . ', '; // note the comma
//$to .= 'wez@example.com';

// subject
$subject = 'Contato Via Site';

// message
$message = '
<html>
<head><meta http-equiv="Content-Type" content="text/html; charset=gb18030">

</head>
<body>
<p><strong>Mensagem de Contato</strong></p>
<table>
 <tr>
 <th><strong>Nome: </strong></th><th>'.$name.'</th>
 </tr>
 
</table>
<p>'.$message.'</p>
</body>
</html>
';

// To send HTML mail, the Content-type header must be set
$headers  = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=utf-8' . "\r\n";

// Additional headers
$headers .= 'To: Magaya <marketingbr@magaya.com>' . "\r\n";
$headers .= 'From:'. $name.' <'.$email_address.'>' . "\r\n";
//$headers .= 'Cc: '. $name.' <'.$email_address.'>' . "\r\n";
//$headers .= 'Bcc: birthdaycheck@example.com' . "\r\n";

// Mail it
$resp = mail($to, $subject, $message, $headers);
return $resp;
/*
$to = 'vitor130595@gmail.com'; // Add your email address inbetween the '' replacing yourname@yourdomain.com - This is where the form will send a message to.
$email_subject = "Website Contact Form:  $name";
$email_body = "You have received a new message from your website contact form.\n\n"."Here are the details:\n\nName: $name\n\nEmail: $email_address\n\nPhone: $phone\n\nMessage:\n$message";
$headers = "From: noreply@yourdomain.com\n"; 
$headers .= "Reply-To: $email_address";	
mail($to,$email_subject,$email_body,$headers);*/
//return true;