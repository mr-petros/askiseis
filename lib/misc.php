<?php
function mask_email($email)
{
	list( $user, $domain ) = preg_split("/@/", $email );
	return mask_str($user) .'@' .mask_str($domain, 50);
} 

function mask_str( $str, $percent=75, $mask_char="*" )
{
	$len = strlen( $str );
	$mask_count = floor( $len * $percent /100 );
	$offset = floor( ( $len - $mask_count ) / 2 );

	return substr( $str, 0, $offset )
			.str_repeat( $mask_char, $mask_count )
			.substr( $str, $mask_count+$offset );
}




//if ($auth = 1) $pwd = substr(str_shuffle("0123456789abcdefghijkmnopqrstuvwxyz"), 0, 5);

//


function mySendMail ($to, $username, $pwd, $reason){
	
	if ($reason == "signup") {
		$subject = 'Εγγραφή στο algo.pk';
		$message = "H εγγραφή σας στο algo.pk ήταν επιτυχής. \r\nΤα στοιχεία του λογαριασμού σας είναι: \r\n\r\n" .
					"Όνομα χρήστη: ". $username . "\r\nΚωδικός εισόδου: " .$pwd."\r\n\r\nΠλέον μπορείτε να συνδεθείτε στο algo.pk".
					"\r\n\r\nΜε εκτίμηση,\r\n Η ομάδα υποστήριξης του algo.pk";
	}
	else if ($reason == "oneTimePwd") {
		$subject = 'Κωδικος μίας χρήσης για το algo.pk';
		$message = "Ζητήσατε νέο κωδικό για τον λογαριασμό σας στο algo.pk. \r\nΤα νέα στοιχεία του λογαριασμού σας είναι: \r\n\r\n" .
					"Όνομα χρήστη: ". $username . "\r\nΚωδικός εισόδου: " .$pwd."\r\n\r\nΠλέον μπορείτε να συνδεθείτε κανονικά στο algo.pk".
					"\r\n\r\nΜε εκτίμηση,\r\n Η ομάδα υποστήριξης του algo.pk";
	}
	else 
		return (false);
	
	return file_put_contents("send_mail/".time()."_".$to.".txt", $subject . "\r\n". $message) !== false;
	
	
	$subject='=?UTF-8?B?'.base64_encode($subject).'?=';
	
	//Set Content-type header
	$headers  = "MIME-Version: 1.0" . PHP_EOL;
	$headers .= "Content-type: text/plain; charset=utf-8" . PHP_EOL;
	//Additional headers
	$headers .= "From: algo.pk <info@algo.pk>" . PHP_EOL;
	$headers .= "Reply-To: algo.pk <info@algo.pk>" . PHP_EOL;
	
	//$headers = "From:  "."\r\n"." Reply-To: algo.pk <info@algo.pk> \r\n Content-Type: text/plain;charset=utf-8\r\n X-Mailer: PHP/" . phpversion();
	//echo $headers;
	return mail($to, $subject, $message, $headers);
	
	
}