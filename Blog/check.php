<?php
	session_start();
	if(isset($_SESSION['status']) && ($_SESSION['status'] == TRUE)){}
	else{
		header('Location: login.php');
	}
?>