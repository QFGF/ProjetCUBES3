<?php
session_start();

// Vérifie si le cookie "accept_cookies" n'est pas déjà défini
if (!isset($_COOKIE['accept_cookies'])) {
    // Affiche le pop-up de cookie
    echo '
    <div id="cookie-popup">
        <p>Nous utilisons des cookies pour améliorer votre expérience sur notre site. En continuant à naviguer, vous acceptez notre utilisation des cookies.</p>
        <form method="post" action="">
            <input type="submit" name="accept_cookies" value="Accepter">
        </form>
    </div>
    ';
}

// Vérifie si le formulaire a été soumis
if (isset($_POST['accept_cookies'])) {
    // Définit le cookie "accept_cookies" avec une expiration d'un an (ou la durée souhaitée)
    setcookie('accept_cookies', 'true', time() + (10), '/');
}
?>
<!DOCTYPE html>
<html lang="fr-FR">
<head>
  <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Mon site</title>
  <link rel="stylesheet" type="text/css" href="../css/styles-globaux.css">
  <link rel="stylesheet" type="text/css" href="../css/navigation/styles-barre-navigation-globaux.css">
  <link rel="stylesheet" type="text/css" href="../css/navigation/styles-menu-button-navigation.css">
  <link rel="stylesheet" type="text/css" href="../css/navigation/styles-recherche-navigation.css">
  <link rel="stylesheet" type="text/css" href="../css/navigation/styles-button-navigation.css">
  <link rel="stylesheet" type="text/css" href="../css/navigation/styles-image-navigation.css">
  <link rel="stylesheet" type="text/css" href="../css/responsive/styles-mobile-navigation-rechercher.css">
  <link rel="stylesheet" type="text/css" href="../css/responsive/styles-mobile-navigation.css">
  <link rel="stylesheet" type="text/css" href="../css/styles-contenu.css">
  <link rel="stylesheet" type="text/css" href="../css/footer/styles-footer.css">
  <link rel="stylesheet" type="text/css" href="../css/themes/styles-page-themes.css">
  <link rel="stylesheet" type="text/css" href="../css/popup/styles-pop-up.css">
  <link href="https://fonts.cdnfonts.com/css/poppins" rel="stylesheet"> <!-- Importation font -->
  <!--CSS bootstrap-->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  <style>
    @import url('https://fonts.cdnfonts.com/css/poppins');
  </style>
</head>
<body>
  <header>
    <nav role="navigation" class="navbar-web">
      <img class='img-icone'src="../images/anime.gif" alt="Icône animée">
      <ul>
        <li><a href="#" class="nav-button-web">Accueil</a></li>
        <li><a href="#" class="nav-button-web">Thèmes</a></li>
        <li><a href="#" class="nav-button-web">Actualités</a></li>
        <li><a href="#" class="nav-button-web">Profil</a></li>
      </ul>
      <form class="search-form" action="/recherche.php" method="GET">
        <input type="text" name="q" placeholder="Rechercher..." />
        <button type="submit">Rechercher</button>
      </form>
    </nav>
    <!-- Navbar mobile boostrap : -->
<nav class="navbar navbar-dark bg-dark fixed-top">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">LetMeThink</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasDarkNavbar" aria-controls="offcanvasDarkNavbar" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="offcanvas offcanvas-end text-bg-dark" tabindex="-1" id="offcanvasDarkNavbar" aria-labelledby="offcanvasDarkNavbarLabel">
      <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="offcanvasDarkNavbarLabel">Menu</h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas" aria-label="Close"></button>
      </div>
      <div class="offcanvas-body">
        <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Thèmes</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Actualités</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Compte
            </a>
            <ul class="dropdown-menu dropdown-menu-dark">
              <li><a class="dropdown-item" href="#">Connexion</a></li>
              <li><a class="dropdown-item" href="#">Mes enregistrements</a></li>
              <li>
                <hr class="dropdown-divider">
              </li>
              <li><a class="dropdown-item" href="#">Se déconnecter</a></li>
            </ul>
          </li>
        </ul>
        <form class="d-flex mt-3" role="search">
          <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
          <button class="btn btn-success" type="submit">Search</button>
        </form>
      </div>
    </div>
  </div>
</nav>
    <!-- Fin navbar mobile -->
    <div class="menu-button">
      <button class="menu-btn-container" alt="Menu" title="btn-cacher" onclick="toggleNavigation()"></button>
    </div>
  </header>