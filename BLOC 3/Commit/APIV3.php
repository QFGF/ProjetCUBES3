<?php

// Requête de recherche
$searchQuery = 'tuto youtube API';

// Clé d'API YouTube Data
$apiKey = 'AIzaSyCNDwHu0VuRcXerDO5NssytkNymtQSHrfk';

// Nombre de vidéos à récupérer
$maxResults = 5;

// URL de l'API pour récupérer la liste de vidéos
$url = 'https://www.googleapis.com/youtube/v3/search?part=snippet&q=' . urlencode($searchQuery) . '&maxResults=' . $maxResults . '&key=' . $apiKey;

// Récupérer la durée de la vidéo
$urldetails = 'https://www.googleapis.com/youtube/v3/videos?part=contentDetails&id='.$videoId.'&key='.$apiKey ; //****details***//


// Effectuer la requête HTTP pour récupérer la liste de vidéos
$response = file_get_contents($url);
$responsedetails = file_get_contents($urldetails); //****details***// 

// Convertir la réponse JSON en tableau associatif
$data = json_decode($response, true);
$datad = json_decode($responsedetails, true) ; //****details***//

// Vérifier si la requête a réussi
if ($data['pageInfo']['totalResults'] > 0) {
// Parcourir la liste de vidéos
foreach ($data['items'] as $item) {
// Récupérer les détails de chaque vidéo
$videoTitle = $item['snippet']['title'];
$videoId = $item['id']['videoId'];
$videoDescription = $item['snippet']['description'] ; 
$videoDuree = $item['contentDetails']['duration'] ;  //****details***//
$video_code_intégration = '<iframe width="560" height="315" src="https://www.youtube.com/embed/' . $videoId . '" frameborder="0" allowfullscreen></iframe>';



// Afficher le titre et le lien de la vidéo
echo 'Titre : ' . $videoTitle . '<br>';
//echo 'Lien: <a href="https://www.youtube.com/watch?v=' . $videoId . '">Regarder la vidéo</a><br>';
echo 'Description : '. $videoDescription.'<br>' ; 
//echo 'Duree : '.$videoDuree.'<br>' ; 
var_dump($responsedetail) ; // n'affiche pas 'contentDetails'
echo $video_code_intégration ;
echo '<br>';
}
} else {
echo 'Aucune vidéo trouvée pour la requête de recherche.';
}
#test
?>