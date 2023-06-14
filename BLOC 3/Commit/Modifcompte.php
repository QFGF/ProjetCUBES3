<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifcompte</title>
</head>

<body>
    <p> Modifiez vos informations personnelles pour créer votre compte</p>
    <form action="Modifcompte.php" method="post"> 
            <label for="email">Adresse mail</label> <br>
            <input type="email" name="email" placeholder="Adresse mail"> <br><br>
            <label for ="oldpassword"> Ancien mot de passe </label> <br>
            <input type ="oldpassword" name="oldpassword" placeholder="Mot de passe"><span class="*"></span><br><br>
            <label for ="newpassword"> Nouveau mot de passe </label> <br>
            <input type ="newpassword" name="newpassword" placeholder="Mot de passe"><span class="*"></span><br><br>
            <input type="submit" value="Modifier mon compte">
    </form>

<?php  


    require 'PGADmin.php' ; 

    if(isset($_POST)) { // Si l'utilisateur clique sur connexion

        // on vérifie que le champ "email" n'est pas vide
        if(empty($_POST['email'])){
            echo "Le champ email est vide.";
        
        // on vérifie que le mot de passe n'est pas vide
        } else { 
            if(empty($_POST['oldpassword'])){
                echo "Le champ Mot de passe est vide.";
            
            //Si ok, on vérifie la présence de l'identifiant (=email) dans la BDD
            } else {
            $query = "SELECT * FROM \"LMT_User\" WHERE \"Email\" = '" . $_POST['email'] . "'";
            $result = $conn->query($query);
            
            // Affichage des résultats
            $row = $result->fetch(PDO::FETCH_ASSOC) ;
            if ($row !== false && $_POST['email']== $row['Email']) { // attention il faut vérifier l'ancien mot de passe
                
                $querynew = "UPDATE \"LMT_User\" SET \"Password\" = '" . $_POST['newpassword'] . "'" ; 
                $resultnew = $conn->query($querynew);
                var_dump ($resultnew);
        
                echo "Votre compte a bien été modifié";
                } }}}

    

?>

</body>
</html>