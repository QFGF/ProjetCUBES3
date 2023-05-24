<?php

function convertToHHMMSS($videoDuree)
{
    $pattern = '/PT(?:(\d+)H)?(?:(\d+)M)?(?:(\d+)S)?/';
    preg_match($pattern, $videoDuree, $uniteTemps);

    $hours = isset($uniteTemps[1]) ? intval($uniteTemps[1]) : 0;
    $minutes = isset($uniteTemps[2]) ? intval($uniteTemps[2]) : 0;
    $seconds = isset($uniteTemps[3]) ? intval($uniteTemps[3]) : 0;

    return sprintf("%02d:%02d:%02d", $hours, $minutes, $seconds);
}

// Requête de recherche
$searchQuery = 'mario';

// Clé d'API YouTube Data
$apiKey = 'AIzaSyCNDwHu0VuRcXerDO5NssytkNymtQSHrfk';

// Nombre de vidéos à récupérer
$maxResults = 5;

// URL de l'API pour récupérer la liste de vidéos
$url = 'https://www.googleapis.com/youtube/v3/search?part=snippet&q=' . urlencode($searchQuery) . '&maxResults=' . $maxResults . '&key=' . $apiKey;

// Effectuer la requête HTTP pour récupérer la liste de vidéos
$response = file_get_contents($url);

// Convertir la réponse JSON en tableau associatif
$data = json_decode($response, true);

// Parcourir la liste de vidéos
foreach ($data['items'] as $item) {
    // Récupérer les détails de chaque vidéo
    $videoTitle = $item['snippet']['title'];
    $videoId = $item['id']['videoId'];
    $videoDescription = $item['snippet']['description'] ; 
    $video_code_intégration = '<iframe width="560" height="315" src="https://www.youtube.com/embed/' . $videoId . '" frameborder="0" allowfullscreen></iframe>';
    // Récupérer la durée de la vidéo
    $urldetails = 'https://www.googleapis.com/youtube/v3/videos?part=contentDetails&id='.$videoId.'&key='.$apiKey ; //****details***//
    $responsedetails = file_get_contents($urldetails); //****details***// 
    $datad = json_decode($responsedetails, true) ; //****details***//
    $videoDuree = $datad['items'][0]['contentDetails']['duration'];
    $convertedTime = convertToHHMMSS($videoDuree);
    // Vérifier si la requête a réussi
    if ($data['pageInfo']['totalResults'] > 0) {
        // Afficher le titre et le lien de la vidéo
        echo 'Titre : ' . $videoTitle . '<br>';
        //echo 'Lien: <a href="https://www.youtube.com/watch?v=' . $videoId . '">Regarder la vidéo</a><br>';
        echo 'Description : '. $videoDescription.'<br>' ; 
        echo 'Duree : '.$convertedTime.'<br>' ; 
        //var_dump($responsedetails) ; // n'affiche pas 'contentDetails'
        echo $video_code_intégration ;
        echo '<br>';
    } else {
    echo 'Aucune vidéo trouvée pour la requête de recherche.';
    }
}


?>