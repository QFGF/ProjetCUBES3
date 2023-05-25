<?php

// Connexion à la base de données
$host = 'localhost';  
$port = '5432'; //par défaut : 5432
$database = 'postgres';
$user = 'postgres';
$password = 'cesi';

try {
    // Sur Wampserver, ajout des extensions PHP pgsql et pdo_pgsql
    // Connexion à la base de données
    $conn = new PDO("pgsql:host=$host;port=$port;dbname=$database;user=$user;password=$password");

    // Configuration des options de PDO (PHP Data Objects). Interface qui permet au scripts PHP d’interroger la BDD via des requêtes SQL.

    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Exemple de requête
    //$query = 'INSERT INTO LMT_User ("IDuser", "Email", "Password") VALUES (\'000000\', \'foo@example.com\', \'mypassword\')';
    $query = 'SELECT * FROM "LMT_User"';
    $result = $conn->query($query);

    // Affichage des résultats
    while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
        echo $row['IDuser'] . ' - ' . $row['Email'] .' - '.$row['Password']. '<br>';
    }

    // Fermeture de la connexion à la base de données
    $conn = null;   
} catch (PDOException $e) {
    echo "Erreur de connexion à la base de données : " . $e->getMessage();
}



?>
