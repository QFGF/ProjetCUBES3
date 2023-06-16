<?php 
include 'header.php';
require '../PGADmin.php';
?>
<?php
// Définir le nombre maximal de tentatives de connexion échouées autorisées
$maxFailedAttempts = 5;
$admin=false;

// Vérifier si le formulaire de connexion a été soumis
if ($_SERVER['REQUEST_METHOD'] === 'POST' && ((isset($_POST['loginEmail'])) || (isset($_POST['signupEmail'])))) {
    // Récupérer les données du formulaire et hash le mdp
    $email = isset($_POST['loginEmail']) ? $_POST['loginEmail'] : '';
    $password = isset($_POST['loginPassword']) ? $_POST['loginPassword'] : '';
    
    // Vérifier les tentatives de connexion précédentes stockées dans la session
    if (!isset($_SESSION['login_attempts'])) {
        $_SESSION['login_attempts'] = 0;
        $_SESSION['last_reset_time'] = time(); // Enregistrer le temps de la dernière réinitialisation
    }

    if(60 - abs($_SESSION['last_reset_time']-time()) < 0){
      $_SESSION['login_attempts'] = 0;
      $_SESSION['last_reset_time'] = time();
    }
    
    // Vérifier le nombre maximal de tentatives de connexion échouées atteint
    if ($_SESSION['login_attempts'] >= $maxFailedAttempts) {
        // Vérifier si le temps écoulé depuis la dernière réinitialisation est supérieur à 60 secondes
        if (time() - $_SESSION['last_reset_time'] >= 60) {
            $_SESSION['login_attempts'] = 0; // Réinitialiser le compteur
            $_SESSION['last_reset_time'] = time(); // Enregistrer le temps de la nouvelle réinitialisation
        } else {
            // Afficher un message d'erreur ou effectuer une action appropriée (par exemple, bloquer l'IP)
            echo "<div class='messageerror'>Trop de tentatives de connexion échouées. Veuillez réessayer ultérieurement dans : " . 60 - abs($_SESSION['last_reset_time']-time()) . " secondes restantes</div>";
            exit;
        }
    }

    //Co bdd Côté CONNEXXXIONNN
    $query = "SELECT * FROM \"LMT_User\" WHERE \"Email\" = '" . $email . "'";
    $result = $conn->query($query);
    $row = $result->fetch(PDO::FETCH_ASSOC); 

    if($email && $password){
    // Effectuer la vérification des informations de connexion ici
    if ($row !== false && $row['Email'] == $email && password_verify($password, $row['Password'])) {
      echo "<div class='messageerror'>Connexion valide</div>";
      $_SESSION['Connect'] = true; // Session connect
      $_SESSION['login_attempts'] = 0;
      if($row['Role'] == true){
        header("Refresh: 1;url=administrateur.php");
      }else{
        header("Refresh: 1;url=index.php");
      }
      exit; // Important pour arrêter l'exécution du script après l'en-tête
      } else {
        // Augmenter le compteur de tentatives de connexion échouées
        $_SESSION['login_attempts']++;
        // Afficher un message d'erreur de connexion
          echo "<div class='messageerror'>Identifiant ou mot de passe incorrect. Veuillez réessayer, tentatives restantes : " . 6-$_SESSION['login_attempts'] . "</div>";
      } 
    }



    //Côté Inscriptionnnn$
    $passwordd = isset($_POST['signupPassword']) ? $_POST['signupPassword'] : '';
    $emaill = isset($_POST['signupEmail']) ? $_POST['signupEmail'] : '';
    // Hacher le mot de passe
    $hashedPassword = password_hash($passwordd, PASSWORD_DEFAULT);

    $query = "SELECT * FROM \"LMT_User\" WHERE \"Email\" = '" . $emaill . "'";
    $result = $conn->query($query);

    // Affichage des résultats
    $row = $result->fetch(PDO::FETCH_ASSOC);
    if($emaill && $passwordd){
     if ($row !== false && $_POST['signupEmail'] == $row['Email']) {
      echo "<div class='messageerror'>Vous avez déjà un compte </div>";
         unset($_POST['signupEmail']);
         unset($_POST['signupPassword']);
         header("Refresh: 0");
     } else {
         $querycrea = "INSERT INTO \"LMT_User\" (\"Email\", \"Password\") VALUES ('" . $emaill . "', '" . $hashedPassword . "')";
         $resultcrea = $conn->query($querycrea);
         unset($_POST['signupEmail']);
         unset($_POST['signupPassword']);
         echo "<div class='messageerror'>Compte créé avec succès</div>";
         header("Refresh: 1");
     }
    }
}
?>

<div class="container">
    <div class="row justify-content-center">
      <div class="col-md-6">
        <h2>Connexion</h2>
        <form method="POST" action="">
          <div class="mb-3">
            <label for="loginEmail" class="form-label">Adresse e-mail</label>
            <input type="email" class="form-control" id="loginEmail" name="loginEmail" placeholder="Entrez votre adresse e-mail" required>
          </div>
          <div class="mb-3">
            <label for="loginPassword" class="form-label">Mot de passe</label>
            <input type="password" class="form-control" id="loginPassword" name="loginPassword" placeholder="Entrez votre mot de passe" required>
          </div>
          <button type="submit" class="btn btn-primary">Se connecter</button>
        </form>
      </div>
    </div>

    <div class="row mt-4 justify-content-center">
      <div class="col-md-6">
        <h2>Inscription</h2>
        <form method="POST" action="">
          <div class="mb-3">
            <label for="signupName" class="form-label">Nom complet</label>
            <input type="text" class="form-control" id="signupName" placeholder="Entrez votre nom complet">
          </div>
          <div class="mb-3">
            <label for="signupEmail" class="form-label">Adresse e-mail</label>
            <input type="email" class="form-control" id="signupEmail" name="signupEmail" placeholder="Entrez votre adresse e-mail" required>
          </div>
          <div class="mb-3">
            <label for="signupPassword" class="form-label">Mot de passe</label>
            <input type="password" class="form-control" id="signupPassword" name="signupPassword" placeholder="Entrez votre mot de passe" required>
          </div>
          <button type="submit" class="btn btn-primary">S'inscrire</button>
        </form>
      </div>
    </div>
  </div>

<?php 
include 'footer.php';
?>