<!DOCTYPE html>
<html>
<head>
  <title>Page de bienvenue</title>
</head>
<body>
  <?php
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nom = $_POST["nom"];
    echo "<h1>Bienvenue, $nom !</h1>";
  }
  ?>
</body>
</html>