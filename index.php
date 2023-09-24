<?php

if(isset($_POST['submit'])){
    $mobile = '91'.$_POST['mobile'];
    $message = $_POST['message'];
    // Account details
	$apiKey = urlencode('Mzk1NzZmNmM0YzczMzQ2NTUxNDM2MTUzNDc0NjQxNDE=');
	
	// Message details
	$numbers = array($mobile);
	$sender = urlencode('TXTLCL');
	$message = rawurlencode($message);
 
	$numbers = implode(',', $numbers);
 
	// Prepare data for POST request
	$data = array('apikey' => $apiKey, 'numbers' => $numbers, "sender" => $sender, "message" => $message);
 
	// Send the POST request with cURL
	$ch = curl_init('https://api.textlocal.in/send/');
	curl_setopt($ch, CURLOPT_POST, true);
	curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	$response = curl_exec($ch);
	curl_close($ch);
	
	// Process your response here
	echo $response;
   

}


?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<form action="index.php" method="POST">
        <input type="number" name="mobile" id="mobile" placeholder="Enter Number">
        <br>
        <textarea name="message" id="" placeholder="Enter Message"></textarea>
        <br>
        <input type="submit" value="submit">
    </form>
    
</body>
</html>

