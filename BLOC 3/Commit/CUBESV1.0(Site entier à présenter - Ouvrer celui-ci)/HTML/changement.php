<?php 
include 'header.php';
require '../PGADmin.php'
?>
<?php  
if(isset($_POST) && $_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['email']))  { // Si l'utilisateur clique sur changer de mdp

        $query = "SELECT * FROM \"LMT_User\" WHERE \"Email\" = '" . $_POST['email'] . "'";
        $result = $conn->query($query);
        $newpassword = isset($_POST['newPassword']) ? $_POST['newPassword'] : '';
        $oldpassword = isset($_POST['oldPassword']) ? $_POST['oldPassword'] : '';
        // Affichage des résultats
        $row = $result->fetch(PDO::FETCH_ASSOC) ;
        if ($row !== false && $_POST['email'] == $row['Email'] && password_verify($oldpassword, $row['Password'])) { // attention il faut vérifier l'ancien mot de passe aussi ALERT
            $newhashedPassword = password_hash($newpassword, PASSWORD_DEFAULT);
            $querynew = "UPDATE \"LMT_User\" SET \"Password\" = '" . $newhashedPassword . "'" ; 
            $resultnew = $conn->query($querynew);
            echo "<div class='messageerror'>Mot de passe modifié avec succès</div>";
            header("Refresh: 1");
            } 
        }
?>

    <div class="container">
        <h2>Changer le mot de passe</h2>
        <form method="POST" action="">
        <div class="mb-3">
                <label for="email" class="form-label">Adresse e-mail</label>
                <input type="email" class="form-control" id="email" name="email"
                    placeholder="Entrez votre adresse mail" required>
            </div>
            <div class="mb-3">
                <label for="oldPassword" class="form-label">Ancien mot de passe</label>
                <input type="password" class="form-control" id="oldPassword" name="oldPassword"
                    placeholder="Entrez votre ancien mot de passe" required>
            </div>
            <div class="mb-3">
                <label for="newPassword" class="form-label">Nouveau mot de passe</label>
                <input type="password" class="form-control" id="newPassword" name="newPassword"
                    placeholder="Entrez votre nouveau mot de passe" required>
            </div>
            <button type="submit" class="btn btn-primary">Changer le mot de passe</button>
        </form>
    </div>


<?php 
include 'footer.php';
?>