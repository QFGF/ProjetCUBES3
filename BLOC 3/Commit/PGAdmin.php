<?php

// données de connexion PGAdmin
$host = 'localhost';  
$port = '5432'; //par défaut : 5432
$database = 'postgres';
$user = 'postgres';
$password = 'cesi';

// Connexion à la base de données avec PDO : (Sur Wamp, ajout des extensions PHP pgsql et pdo_pgsql)

try {
    // Connexion à la base de données
    $conn = new PDO("pgsql:host=$host;port=$port;dbname=$database;user=$user;password=$password");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch (PDOException $message) {
    echo "Erreur lors de la connexion à la base de données: " . $message->getMessage();
    exit;
}
?>