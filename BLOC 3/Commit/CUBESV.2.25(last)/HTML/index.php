<?php 
include 'header.php';
?>
<section>
    <div class="content">
      <h1>Espace d'inscription</h1>
      <form method="POST" action="bienvenue.php">
        <label for="nom">Nom:</label>
        <input type="text" name="nom" id="nom" required>
        <input type="submit" value="Envoyer">
      </form>
    </div>
</section>
<?php 
include 'footer.php';
?>