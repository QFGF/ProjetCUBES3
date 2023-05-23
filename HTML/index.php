<!DOCTYPE html>
<html lang="fr-FR">
<head>
  <title>Mon site</title>
  <link rel="stylesheet" type="text/css" href="../css/styles-globaux.css">
  <link rel="stylesheet" type="text/css" href="../css/styles-barre-navigation.css">
  <link rel="stylesheet" type="text/css" href="../css/styles-responsive.css">
  <link rel="stylesheet" type="text/css" href="../css/styles-contenu.css">
  <link href="https://fonts.cdnfonts.com/css/poppins" rel="stylesheet"> <!-- Importation font -->
</head>
<body>
  <style>
    @import url('https://fonts.cdnfonts.com/css/poppins');
  </style>

  <header>
    <nav role="navigation" class="navbar">
      <img src="../images/Animation.gif" alt="Icône animée">
      <a href="#">Accueil</a>
      <a href="#">À propos</a>
      <a href="#">Contact</a>
    </nav>
  </header>

  <section>
    <div class="content">
      <h1>Formulaire de bienvenue</h1>

      <form method="POST" action="bienvenue.php">
        <label for="nom">Nom:</label>
        <input type="text" name="nom" id="nom" required>
        
        <input type="submit" value="Envoyer">
      </form>
    </div>
  </section>
</body>
</html>