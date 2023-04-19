<?php include "header.php"; ?>
<?php include "check.php"; ?>

<body>
	<main id="page-admin">
		<section id="list-article" class="bloc-white">
			<?php include "list-article.php";?>
		</section>
		<section id="admin" class="bloc-white">
		<h2>Nouvel Article</h2>
		<form method="post" action="post-article.php" enctype="multipart/form-data">
			<label for="f-titre">Titre</label>
			<input type="text" maxlength="30" name="titre" id="f-titre"><br>

			<label for="f-auteur">Auteur</label>
			<input type="text" maxlenght="30" name="auteur" id="f-auteur"><br>
			
			<label for="f-article">Article</label>
			<textarea rows="8" maxlength="1000" name="contenu" id="f-article"></textarea><br>
			
			<label for="img">Image d'en-tête</label>
			<input type="file" name="img" id="img"><br>

			<input type="submit" name="postArticleOK" value="poster article">
		</form>
		<form method="" action="session-end.php"><input class="logout" type="submit" value="logout"></form>
		</section>
	</main>
</body>
<? include "footer.php"; ?>