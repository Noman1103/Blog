<?php 
	extract($_POST);
	$servernameDB = "localhost";
	$usernameDB = "root";
	$passwordDB = "";
	$nameDB = "cmsproject";
	$tableDB = "articles";

	$DBconnect = new mysqli($servernameDB, $usernameDB, $passwordDB, $nameDB);

	if($DBconnect->connect_error){
		die();
	}

	$sql = "DELETE FROM $tableDB WHERE id = $id";

	$DBconnect->query($sql);

	$DBconnect->close();

	header('Location: admin.php');

?>