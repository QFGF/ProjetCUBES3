<?php
include 'header.php';

$apiKey = 'AIzaSyCNDwHu0VuRcXerDO5NssytkNymtQSHrfk';

// Paramètres de la requête
$params = array(
    'part' => 'snippet',
    'chart' => 'mostPopular',
    'maxResults' => 5,
    'key' => $apiKey
);

// Construction de l'URL de l'API
$url = 'https://www.googleapis.com/youtube/v3/videos?' . http_build_query($params);

// Requête API
$response = file_get_contents($url);

// Décodage de la réponse JSON
$data = json_decode($response, true);

// Vérification des erreurs
if (isset($data['error'])) {
    echo 'Erreur lors de la récupération des vidéos tendances : ' . $data['error']['message'];
    exit();
}

echo '<div class="page-title"> Bienvenue sur les tendances du web </div>';
// Affichage des vidéos tendances
foreach ($data['items'] as $item) {
    $title = $item['snippet']['title'];
    $description = $item['snippet']['description'];
    $videoId = $item['id'];
    $shortDescription = substr($description, 0, 100) . '...'; // Limite à 100 caractères

    echo '<div class="video-container">';
    echo '<h3 class="video-title">' . $title . '</h3>';
    echo '<iframe src="https://www.youtube.com/embed/' . $videoId . '" frameborder="0" allowfullscreen></iframe>';
    echo '<p class="video-description">' . nl2br($shortDescription) . '</p>';
    echo '</div>';
}
include 'footer.php';
?>