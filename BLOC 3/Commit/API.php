<?php

// Inclure le fichier d'autoloader de la bibliothèque client de l'API YouTube Data v3
require_once 'google-api-php-client/vendor/autoload.php';

// Définir votre clé d'API YouTube
$API_key = 'AIzaSyCNDwHu0VuRcXerDO5NssytkNymtQSHrfk';

// Créer un client YouTube
$client = new Google_Client();
$client->setDeveloperKey($API_key);
$youtube = new Google_Service_YouTube($client);

// Paramètres de recherche
$parametres = array(
    'q' => 'chat', // Le terme de recherche
    'type' => 'video', // Type de contenu à rechercher (vidéos)
    'maxResults' => 10 // Nombre maximal de résultats
);

try {
    // Effectuer la recherche de vidéos
    $resultats = $youtube->search->listSearch('snippet', $parametres);

    // Afficher les titres et les URL des vidéos trouvées
    foreach ($resultats->getItems() as $video) {
        $titre = $video->getSnippet()->getTitle();
        $url = 'https://www.youtube.com/watch?v=' . $video->getId()->getVideoId();
        echo $titre . ': ' . $url . '<br>';
    }
} catch (Google_Service_Exception $e) {
    echo 'Une erreur s\'est produite : ' . $e->getMessage();
} catch (Google_Exception $e) {
    echo 'Une erreur s\'est produite : ' . $e->getMessage();
}

?>
