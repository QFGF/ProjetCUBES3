<?php
echo '<link rel="stylesheet" type="text/css" href="../CSS/themes.css">';
// Requête de recherche
$searchQuery = 'Mario';

// Clé d'API YouTube Data
$apiKey = 'AIzaSyCNDwHu0VuRcXerDO5NssytkNymtQSHrfk';

// Nombre de vidéos à récupérer
$maxResults = 8;

// URL de l'API pour récupérer la liste de vidéos
$url = 'https://www.googleapis.com/youtube/v3/search?part=snippet&q=' . urlencode($searchQuery) . '&maxResults=' . $maxResults . '&key=' . $apiKey;

// Effectuer la requête HTTP pour récupérer la liste de vidéos
$response = file_get_contents($url);

// Convertir la réponse JSON en tableau associatif
$data = json_decode($response, true);

// Parcourir la liste de vidéos
echo '<div class="container">';
foreach ($data['items'] as $item) {
    // Récupérer les détails de chaque vidéo
    $videoTitle = $item['snippet']['title'];
    $videoId = $item['id']['videoId'];
    $videoDescription = $item['snippet']['description'] ; 
    $video_code_integration = '<iframe width="560" height="315" src="https://www.youtube.com/embed/' . $videoId . '" frameborder="0" allowfullscreen></iframe>';
    // Récupérer la durée de la vidéo
    $urldetails = 'https://www.googleapis.com/youtube/v3/videos?part=contentDetails&id='.$videoId.'&key='.$apiKey ; //****details***//
    $responsedetails = file_get_contents($urldetails); //****details***// 
    $datad = json_decode($responsedetails, true) ; //****details***//
    $videoDuree = $datad['items'][0]['contentDetails']['duration'];
    // Vérifier si la requête a réussi
    echo '<div>';
    if ($data['pageInfo']['totalResults'] > 0) {
        // Afficher le titre et le lien de la vidéo
        echo '<p>' . 'Titre : ' . $videoTitle . '</p>' . '<br>';
        //echo 'Lien: <a href="https://www.youtube.com/watch?v=' . $videoId . '">Regarder la vidéo</a><br>';
        echo '<p>' . 'Description : ' . $videoDescription . '</p>' . '<br>' ; 
        echo '<p>' . 'Durée : ' . $videoDuree . '</p>' . '<br>' ; 
        //var_dump($responsedetails) ; // n'affiche pas 'contentDetails'
        echo '<p>' . $video_code_integration . '</p>';
        echo '<br>';
    } else {
    echo '<p>' . 'Aucune vidéo trouvée pour la requête de recherche.' . '</p>';
    }
    echo '</div>';
}
echo '</div>'
?>