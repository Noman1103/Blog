<?php 
	include 'header.php';
	include "check.php";
?>
<?php 
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
			$sql = "SELECT titre, contenu, auteur FROM $tableDB WHERE id=$id";

			$article = $articlesTable->query($sql);
			foreach ($article as $value) {
					$titreDef = $value['titre'];
					$auteurDef = $value['auteur'];
					$contenuDef = $value['contenu'];
				}
		?>
<body>
<section id="admin" class="bloc-white">
		<h2>Mise à jour</h2>
		<form method="post" action="post-article.php">
			<label for="f-titre">Titre</label>
			<input type="text" maxlength="30" name="titre" id="f-titre" value="<?php echo $titreDef;?>"><br>
			<label for="f-auteur">Auteur</label>
			<input type="text" maxlenght="30" name="auteur" id="f-auteur" value="<?php echo $auteurDef?>"><br>
			<label for="f-article">Article</label>
			<textarea rows="8" maxlength="1000" name="contenu" id="f-article"><?php echo $contenuDef;?></textarea><br>
			<input type="hidden" name="updateMode" value="TRUE">
			<input type="hidden" name="id" value="<?php echo $id?>">
			<input type="submit" name="postArticleOK" value="Mettre à jour">
		</form>
		<form method="" action="admin.php"><input class="logout" type="submit" value="cancel"></form>
</section>
</body>
<?php include "footer.php"?>