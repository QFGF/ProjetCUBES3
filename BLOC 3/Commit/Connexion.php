<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
</head>

<body>   

    <form action="Connexion.php" method="post"> 
        <label for="email">Adresse mail</label> <br>
        <input type="email" name="email" placeholder="Adresse mail"> <br><br>
        <label for ="password"> Mot de passe </label> <br>
        <input type ="password" name="password" placeholder="Mot de passe"><span class="*"></span><br><br>
        <input type="submit" value="Connexion">
    </form>
       
    <?php   

// Connexion à la base de données

require 'PGAdmin.php' ;
          
// Connexion d'un utilisateur  

if(isset($_POST)) { // Si l'utilisateur clique sur connexion

        // on vérifie que le champ "email" n'est pas vide
        if(empty($_POST['email'])){
            echo "Le champ email est vide.";
        
        // on vérifie que le mot de passe n'est pas vide
        } else { 
            if(empty($_POST['password'])){
                echo "Le champ Mot de passe est vide.";
            
            //Si ok, on vérifie la présence de l'identifiant (=email) dans la BDD
            } else {
            $query = "SELECT * FROM \"LMT_User\" WHERE \"Email\" = '" . $_POST['email'] . "'";
            $result = $conn->query($query);
            
            // Affichage des résultats
            $row = $result->fetch(PDO::FETCH_ASSOC) ; 

            // Vérif si $result renvoie bien un résultat: 
            //if ($row=='') {var_dump( "erreur");} else {var_dump("connexion ok");}
            if ($row !== false && $row['Email']== $_POST['email'] && $row['Password']==$_POST['password']) {
               echo "Vous etes connecté" ;
               ?>
               <br>
               <a href="Accueil.php">Accédez à l'accueil LetMeThink</a>
           <?php 
               } else {echo "L'e-mail ou l'idenfiant n'est pas valide"; } 
            }
        }
            
    }
    ?>

</body>

</html>