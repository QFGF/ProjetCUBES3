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
  <link rel="stylesheet" type="text/css" href="../css/responsive/styles-mobile-globaux.css">
  <link rel="stylesheet" type="text/css" href="../css/responsive/styles-mobile-navigation-image.css">
  <link rel="stylesheet" type="text/css" href="../css/responsive/styles-mobile-navigation-rechercher.css">
  <link rel="stylesheet" type="text/css" href="../css/responsive/styles-mobile-navigation.css">
  <link rel="stylesheet" type="text/css" href="../css/styles-contenu.css">
  <link rel="stylesheet" type="text/css" href="../css/footer/styles-footer.css">
  <link href="https://fonts.cdnfonts.com/css/poppins" rel="stylesheet"> <!-- Importation font -->
  <style>
    @import url('https://fonts.cdnfonts.com/css/poppins');
  </style>
</head>
<body>
  <header>
    <nav role="navigation" class="navbar">
      <img src="../images/anime.gif" alt="Icône animée">
      <ul>
        <li><a href="#" class="nav-button">Accueil</a></li>
        <li><a href="#" class="nav-button">Thèmes</a></li>
        <li><a href="#" class="nav-button">Actualités</a></li>
        <li><a href="#" class="nav-button">Profil</a></li>
      </ul>
      <form class="search-form" action="/recherche.php" method="GET">
        <input type="text" name="q" placeholder="Rechercher..." />
        <button type="submit">Rechercher</button>
      </form>
    </nav>
    <div class="menu-button">
      <button class="menu-btn-container" alt="Menu" title="btn-cacher" onclick="toggleNavigation()"></button>
    </div>
  </header>

  <section>
    <div class="content">
      <h1>Espace d'inscript°</h1>
      <form method="POST" action="bienvenue.php">
        <label for="nom">Nom:</label>
        <input type="text" name="nom" id="nom" required>
        <input type="submit" value="Envoyer">
      </form>
    </div>
  </section>

  <footer>
    <div class="footer-content">
      <p>© 2023 Mon Site. Tous droits réservés.</p>
    </div>
  </footer>

<script src="../JS/gestion-button-menu.js"></script>
</body>
</html>