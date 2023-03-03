<?php
require_once('_inc/functions.php');
require_once('_inc/header.php');
require_once('_inc/nav.php');
session_start();
// Appel de la fonction pour traiter le formulaire de connexion
processLoginForm();

?>

<div class="container">
  <h1>Connexion</h1>
  <form method="post">
    <div class="form-group">
      <label for="email">Email :</label>
      <input type="email" name="email" id="email" class="form-control" required>
    </div>
    <div class="form-group">
      <label for="password">Mot de passe :</label>
      <input type="password" name="password" id="password" class="form-control" required>
    </div>
    <button type="submit" class="btn btn-primary">Se connecter</button>
  </form>
</div>

<?php
require_once('_inc/footer.php');
?>
