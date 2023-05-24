<?php

// Requête de recherche
$searchQuery = 'arbre';

// Clé d'API YouTube Data
$apiKey = 'AIzaSyCNDwHu0VuRcXerDO5NssytkNymtQSHrfk';

// Nombre de vidéos à récupérer
$maxResults = 25;

// URL de l'API pour récupérer la liste de vidéos
$url = 'https://www.googleapis.com/youtube/v3/search?part=snippet&q=' . urlencode($searchQuery) . '&maxResults=' . $maxResults . '&key=' . $apiKey;


// Effectuer la requête HTTP pour récupérer la liste de vidéos
$response = file_get_contents($url);


// Convertir la réponse JSON en tableau associatif
$data = json_decode($response, true);

// Vérifier si la requête a réussi
if ($data['pageInfo']['totalResults'] > 0) {
// Parcourir la liste de vidéos
foreach ($data['items'] as $item) {
// Récupérer les détails de chaque vidéo
$videoTitle = $item['snippet']['title'];
$videoId = $item['id']['videoId'];

// Afficher le titre et le lien de la vidéo
echo 'Titre: ' . $videoTitle . '<br>';
echo 'Lien: <a href="https://www.youtube.com/watch?v=' . $videoId . '">Regarder la vidéo</a><br>';
echo '<br>';
}
} else {
echo 'Aucune vidéo trouvée pour la requête de recherche.';
}

?>