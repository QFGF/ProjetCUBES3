<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Creacompte</title>
</head>

<body>
    <p> Renseignez vos informations personnelles pour créer votre compte</p>
    <form action="Creacompte.php" method="post"> 
            <label for="email">Adresse mail</label> <br>
            <input type="email" name="email" placeholder="Adresse mail"> <br><br>
            <label for ="password"> Mot de passe </label> <br>
            <input type ="password" name="password" placeholder="Mot de passe"><span class="*"></span><br><br>
            <input type="submit" value="Créer mon compte">
    </form>

<?php  


    require 'PGADmin.php' ; 
    $query = "SELECT * FROM \"LMT_User\" WHERE \"Email\" = '" . $_POST['email'] . "'";
    $result = $conn->query($query);

    // Affichage des résultats
    $row = $result->fetch(PDO::FETCH_ASSOC) ; 

    if ($row !== false && $_POST['email']== $row['Email']) {
        echo "Vous avez déjà un compte";
    } else {

        $email = $_POST['email']; 
        $password = $_POST['password']; 

        $querycrea = "INSERT INTO \"LMT_User\" (\"Email\", \"Password\") VALUES ('" . $email . "', '" . $password . "')";
        $resultcrea = $conn->query($querycrea);
        var_dump ($resultcrea);

        echo "Votre compte a bien été créé";
        }

?>

</body>
</html>