<?php
session_start();
// Détruit la session en cours
session_destroy();
// Redirige l'utilisateur vers une page de confirmation ou toute autre page souhaitée
header('Location: index.php');
exit;
?>