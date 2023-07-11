<?php 
	require_once ('Google/autoload.php');
	const CLIENT_ID = '608088875273-psgj3gnngi3n8s3qobeo7mbii0qra5ji.apps.googleusercontent.com';
	const CLIENT_SECRET = 'Anzdaq-832SmQD34ow_LDmlT';
	const REDIRECT_URI = '';
	
	session_start();
	
	$client = new Google_Client();
	$client->setClientId(CLIENT_ID);
	$client->setClientSecret(CLIENT_SECRET);
	$client->setRedirectUri(REDIRECT_URI);
	
	$plus = new Google_Service_PLis($client);
	
	if(isset($_REQUEST['logout'])){
		session_unset();
	}
	if(isset($_GET['code'])){
		$client->authenticate($_GET['code']);
		$_SESSION['access_token'] = $client->getAccessToken();
	}
	if(isset($_SESSION['access_token']) && $_SESSION['access_token']){
		$client->setAccessToken($_SESSION['access_token']);
		$me = $plus->people->get('me');
		
		$id = $me['id'];
		$name = $me['displayName'];
	}else{
		$authUrl = $client->creatAuthUrl();
	}
?>
<div>
<?php
 if(isset($authUrl)){
	 echo "<a class='login' href='".$authUrl."'/>";
 }else{
	 print"Name: {$name}";
 }$name
?>
</div>