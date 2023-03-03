<?php
require_once('_inc/functions.php');
require_once('_inc/header.php');
require_once('_inc/nav.php');
session_start();
?>

<div class="container">
  <?php
  // Récupération du paramètre d'URL
  $id = isset($_GET['id']) ? $_GET['id'] : null;
  // Récupération du jeu vidéo correspondant à l'identifiant
  $game = getGameById($id);

  // Si le jeu n'existe pas, afficher un message d'erreur
  if (!$game) {
    echo '<div class="alert alert-danger">Jeu vidéo non trouvé</div>';
  } else {
    // Affichage des informations du jeu vidéo
    echo '<h1>' . $game['title'] . '</h1>';
    echo '<img src="' . $game['poster'] . '" alt="' . $game['title'] . '">';
    echo '<p><strong>Description :</strong> ' . $game['descriptions'] . '</p>';
    echo '<p><strong>Date de sortie :</strong> ' . (new DateTime($game['release_date']))->format('d/m/Y') . '</p>';
    echo '<p><strong>Prix :</strong> ' . $game['price'] . ' €</p>';
  }
  ?>
</div>

<?php
require_once('_inc/footer.php');
?>