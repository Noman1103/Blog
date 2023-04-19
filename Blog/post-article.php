<?php
	if(!isset($_POST)){
		die();
	}
/*************************MISE EN LIGNES IMAGES***************************** */
if(isset($_FILES)){
	$dir = "image/";
	$file = $dir . basename($_FILES['img']['name']);
	$type = strtolower(pathinfo($file, PATHINFO_EXTENSION));	
	$imgOk = 0;
/*****************On vérifie s'il s'agit bien d'une image******************* */
	$chek = getimagesize($_FILES["img"]["tmp_name"]);
	$imgOk = ($chek !== false)? 1: 0;

/**********************Vérification taille de fichier*********************** */
	if($_FILES["img"]["size"] > 2000000){
		$imgOk = 0;
	}

/**********************Vérification extension du fichier******************** */

	if($type != "jpg" && $type != "png" && $type != "jpeg"){
		$imgOk = 0;
	}

/****************************Mise en ligne********************************** */

	if($imgOk == 1){
		move_uploaded_file($_FILES['img']['tmp_name'],$file);
	}
}
	if(basename($_FILES['img']['name']) == ""){
		$file = null;
	}

/*************************MISE EN LIGNES ARTICLE**************************** */
	extract($_POST);
	$servernameDB = "localhost";
	$usernameDB = "root";
	$passwordDB = "";
	$nameDB = "cmsproject";
	$tableDB = "articles";

	$articlesTable = new mysqli($servernameDB, $usernameDB, $passwordDB, $nameDB);

	if($articlesTable->connect_error){
		die("Erreur connexion base de donnée");
	}

	if(!isset($updateMode)){
		$sql = "INSERT INTO $tableDB (titre, contenu, auteur,img) VALUES ('$titre', '$contenu', '$auteur', '$file')";
	}
	else{
		if($file === 'null'){
			$sql = "UPDATE $tableDB SET titre='$titre', contenu='$contenu', auteur='$auteur' WHERE id=$id";
		}
		else{
			$sql = "UPDATE $tableDB SET titre='$titre', contenu='$contenu', auteur='$auteur', img='$file' WHERE id=$id";
	
		}
	}
	$articlesTable->query($sql);

	$articlesTable->close();
	header('Location: admin.php');

?>