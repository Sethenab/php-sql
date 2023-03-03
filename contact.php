

<?php include('_inc/functions.php'); 
session_start();
?>

<?php
 processContactForm(); 
?>

<?php include('_inc/header.php'); ?>
<?php include('_inc/nav.php'); ?>

<form method="POST">
  <label for="firstname">Prénom :</label>
  <input type="text" id="firstname" name="firstname"><br>

  <label for="lastname">Nom :</label>
  <input type="text" id="lastname" name="lastname"><br>

  <label for="email">Email :</label>
  <input type="email" id="email" name="email"><br>

  <label for="subject">Sujet :</label>
  <input type="text" id="subject" name="subject"><br>

  <label for="message">Message :</label>
  <textarea id="message" name="message"></textarea><br>

  <input type="submit" name="submit" value="Envoyer">
</form>

<?php include('footer.php'); ?>