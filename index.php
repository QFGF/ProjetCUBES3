<!DOCTYPE html>
<html>
<head>
	<title>Maquette de site de lecture de vidéos</title>
	<link rel="stylesheet" href="style.css">
</head>
<body>
	<header>
		<img src="logo.png" alt="Logo du site">
		<form method="get" action="search.php">
			<input type="text" placeholder="Rechercher..." name="query">
			<button type="submit">Rechercher</button>
		</form>
	</header>
	
	<section>
		<?php
			// Connexion à la base de données
			$bdd = new PDO('mysql:host=localhost;dbname=nom_de_la_base_de_donnees;charset=utf8', 'nom_utilisateur', 'mot_de_passe');
			
			// Récupération des vidéos depuis la base de données
			$req = $bdd->query('SELECT * FROM videos ORDER BY date_upload DESC LIMIT 10');
			
			// Affichage des vidéos
			while ($video = $req->fetch()) {
				echo '<div class="video">';
				echo '<a href="watch.php?id=' . $video['id'] . '">';
				echo '<img src="' . $video['thumbnail'] . '" alt="' . $video['title'] . '">';
				echo '<h2>' . $video['title'] . '</h2>';
				echo '<p>' . $video['views'] . ' vues</p>';
				echo '<button class="like">' . $video['likes'] . ' likes</button>';
				echo '<button class="comment">' . $video['comments'] . ' commentaires</button>';
				echo '</a></div>';
			}
		?>
	</section>
</body>
</html>