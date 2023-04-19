<?php
	extract($_POST);
	session_start();
	$servernameDB = "localhost";
	$usernameDB = "root";
	$passwordDB = "";
	$nameDB = "cmsproject";
	$tableDB = "users";

	$connectOK = FALSE;

	$userDB = new mysqli($servernameDB, $usernameDB, $passwordDB, $nameDB);

	if($userDB->connect_error){
		die("Erreur connexion base de donnée");
	}

	$sql = "SELECT username, password FROM $tableDB";

	$tableauUsers = $userDB->query($sql);

	foreach ($tableauUsers as $rangee) {
		if(($username === $rangee["username"]) && ($password === $rangee["password"])){
			$connectOK = TRUE;
		}
	}

	if($connectOK === TRUE){
		$_SESSION['status'] = $connectOK;
	}

	header('Location: login.php');
		
?>