<?php
echo '<link rel="stylesheet" type="text/css" href="./APIV22">';
// Requête de recherche
$searchQuery = 'Mario';

// Clé d'API YouTube Data
$apiKey = 'AIzaSyAZFhHNrzuwUWsRa9tYa95jkIi2PRToqFU';

// Nombre de vidéos à récupérer
$maxResults = 8; // multiple de 4 !!!!
// URL de l'API pour récupérer la liste de vidéos
$url = 'https://www.googleapis.com/youtube/v3/search?part=snippet&q=' . urlencode($searchQuery) . '&maxResults=' . $maxResults . '&key=' . $apiKey;

// Effectuer la requête HTTP pour récupérer la liste de vidéos
$response = file_get_contents($url);

// Convertir la réponse JSON en tableau associatif
$data = json_decode($response, true);

//compteur de lignes
$compteur = 0;
echo '<div class="container">';
echo '<div class="ligne">';
// Parcourir la liste de vidéos
foreach ($data['items'] as $item) {
    if ($compteur >= 4) { //Nombre de vidéo sur une ligne
        $compteur = 0;
        echo '</div>';
        echo '<div class="ligne">';
    } else {
        $compteur = $compteur + 1;
    }
    // Récupérer les détails de chaque vidéo
    $videoTitle = $item['snippet']['title'];
    $videoId = $item['id']['videoId'];
    $videoDescription = $item['snippet']['description'] ; 
    $video_code_integration = '<iframe width="560" height="315" src="https://www.youtube.com/embed/' . $videoId . '" frameborder="0" allowfullscreen></iframe>';
    // Récupérer la durée de la vidéo
    $urldetails = 'https://www.googleapis.com/youtube/v3/videos?part=contentDetails&id='.$videoId.'&key='.$apiKey ; //****details***//
    $responsedetails = file_get_contents($urldetails); //****details***// 
    $datad = json_decode($responsedetails, true) ; //****details***//
    $videoDuree = str_replace("PT", "", $datad['items'][0]['contentDetails']['duration']);
    // Vérifier si la requête a réussi
    echo '<div class=contained>';
    if ($data['pageInfo']['totalResults'] > 0) {
        echo '<div class=info>';
        // Afficher le titre et le lien de la vidéo
        echo '<p class=textes><strong>' . 'Titre : </strong>' . $videoTitle . '</p>';
        //echo 'Lien: <a href="https://www.youtube.com/watch?v=' . $videoId . '">Regarder la vidéo</a><br>';
        echo '<p class=textes><strong>' . 'Description : </strong>' . $videoDescription . '</p>'; 
        echo '<p class=textes><strong>' . 'Durée : </strong>' . $videoDuree . '</p>'; 
        echo '</div>';
        //var_dump($responsedetails) ; // n'affiche pas 'contentDetails'
        echo '<p class=video>' . $video_code_integration . '</p>';
    } else {
    echo '<p>' . 'Aucune vidéo trouvée pour la requête de recherche.' . '</p>';
    }
    echo '</div>';
}
echo '</div>'; 
echo '</div>'
?>