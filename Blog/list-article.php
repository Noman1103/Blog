<?php
	$servernameDB = "localhost";
	$usernameDB = "root";
	$passwordDB = "";
	$nameDB = "cmsproject";
	$tableDB = "articles";

	$DBconnect = new mysqli($servernameDB, $usernameDB, $passwordDB, $nameDB);

	if($DBconnect->connect_error){
		die();
	}

	$sql = "SELECT id, titre FROM $tableDB";

	$listArticle = $DBconnect->query($sql);

	echo "<table>";
		echo "<tr><th>Titre</th></tr>";
	foreach ($listArticle as $article) {
		echo "<tr>";
		echo "<td>{$article['titre']}</td>";
		echo "<td>
				<form method='post' action='delete.php'>
					<input type='hidden' name='id' value='{$article['id']}'>
					<input type='submit' name='deleteOK' value='🚮'>
				</form>
			</td>";
		echo "<td>
				<form method='post' action='update.php'>
					<input type='hidden' name='id' value='{$article['id']}'>
					<input type='submit' name='updateOK' value='📝'>
				</form>
			</td>";
		echo "</tr>";
	}
	echo "</table>";

	$DBconnect->close();
?>