<?php
	$ownerEmail = $_POST['owner_email'];
	$headers = 'From: ' . $_POST["sender"] . "\r\n" . 'Content-Type: text/plain; charset=UTF-8' . "\r\n";
	$subject = 'An order from your site visitor';
	$messageBody = "";	
	
	$arr=array();
	foreach ($_POST as $key => $value) {
	   if (($value != 'nope') && ($key != 'owner_email') && ($key != 'sender')) {
		   $messageBody .="$key" . ': '."$value" . "\n\n";
		   $messageBody .= $key . ': ' . $value . "\n\n";
	}
	}
	try{
		echo $_POST['Email'];
		if (isset($_POST['Email'])) {
			echo $_POST['Email'];
		}
		echo $subject;
		echo $messageBody;
		if(!mail($ownerEmail, $subject, $messageBody, $headers)){
			throw new Exception('mail failed');
		}else{
			echo 'mail sent';
		}
	}
	catch(Exception $e){
		echo $e->getMessage() ."\n";
	}
?>