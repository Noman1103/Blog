<?php include 'header.php';?>
<body>
		<h1>TITRE SITE</h1>
		<nav id="nav-index" class="bloc-white">
			<a href="login.php">Accès Admin</a>
		</nav>
		<?php 
			$servernameDB = "localhost";
			$usernameDB = "root";
			$passwordDB = "";
			$nameDB = "cmsproject";
			$tableDB = "articles";

			$articlesTable = new mysqli($servernameDB, $usernameDB,$passwordDB, $nameDB);

				if($articlesTable->connect_error){
					die("Erreur connexion base de donnée");
				}
			$sql = "SELECT titre, contenu, auteur,img FROM $tableDB";

			$content = $articlesTable->query($sql);

			foreach ($content as $article) {
				echo "<article class='bloc-white'>";
				echo "<h3>{$article['titre']}</h3>";
				echo "<h5>Auteur : {$article['auteur']}</h5>";
				echo "<p>{$article['contenu']}</p>";
				if($article['img'] !== 'null'){
					echo "<img src='{$article['img']}'
						alt='img article' width=400px>";
				}
				echo "</article>";
			}

			$articlesTable->close();
		?>
</body>
<?php include 'footer.php';?>