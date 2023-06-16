<?php 
include 'header.php';
require '../PGADmin.php';
?>
<?php


$query = "SELECT * FROM \"LMT_User\"";
$result = $conn->query($query);
$emailArray = array();
while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
    // Traitement des données de chaque ligne
    array_push($emailArray, $row['Email']);
    echo "Email: " . $row['Email'] .'   ';
    echo '<a href="deleteAccount.php?id='.$row['IDuser'].'" id='.$row['IDuser'].'  type="submit" class="btn btn-primary">Supprimer le compte</a>';
    echo "<br>";

    // Ajoutez d'autres colonnes selon votre structure de table
    echo "<br>";
}

?>
<?php
include 'footer.php';
?>