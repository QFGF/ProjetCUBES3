<?php 
include 'header.php';
?>

<div class="container">
    <div class="row justify-content-center">
      <div class="col-md-6">
        <h2>Connexion</h2>
        <form>
          <div class="mb-3">
            <label for="loginEmail" class="form-label">Adresse e-mail</label>
            <input type="email" class="form-control" id="loginEmail" placeholder="Entrez votre adresse e-mail">
          </div>
          <div class="mb-3">
            <label for="loginPassword" class="form-label">Mot de passe</label>
            <input type="password" class="form-control" id="loginPassword" placeholder="Entrez votre mot de passe">
          </div>
          <button type="submit" class="btn btn-primary">Se connecter</button>
        </form>
      </div>
    </div>

    <div class="row mt-4 justify-content-center">
      <div class="col-md-6">
        <h2>Inscription</h2>
        <form>
          <div class="mb-3">
            <label for="signupName" class="form-label">Nom complet</label>
            <input type="text" class="form-control" id="signupName" placeholder="Entrez votre nom complet">
          </div>
          <div class="mb-3">
            <label for="signupEmail" class="form-label">Adresse e-mail</label>
            <input type="email" class="form-control" id="signupEmail" placeholder="Entrez votre adresse e-mail">
          </div>
          <div class="mb-3">
            <label for="signupPassword" class="form-label">Mot de passe</label>
            <input type="password" class="form-control" id="signupPassword" placeholder="Entrez votre mot de passe">
          </div>
          <button type="submit" class="btn btn-primary">S'inscrire</button>
        </form>
      </div>
    </div>
  </div>

<?php 
include 'footer.php';
?>