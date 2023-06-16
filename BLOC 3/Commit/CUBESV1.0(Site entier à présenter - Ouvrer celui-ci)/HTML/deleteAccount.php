<?php
session_start();

require '../PGADmin.php';

// Get user ID from GET parameters
$user_id = $_GET['id'];

if (!isset($user_id)) {
    header('Location /');
    die();
}

$querydel = "DELETE FROM \"LMT_User\" WHERE \"IDuser\" = '" . $user_id . "'";
$result = $conn->query($querydel);

header('Refresh: 1;url=administrateur.php');
die();