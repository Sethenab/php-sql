<?php 
include('../_inc/functions.php'); 
session_start();

checkAuthentication();

$games = getAllGames();
?>

<?php


require_once '_inc/header.php';
require_once 'admin/_inc/nav.php';

?>

<h1>Liste des jeux vidéo</h1>

<table>
  <tr>
    <?php foreach ($games as $game): ?>
      <td>
        <img src="<?php echo $game['image_url']; ?>" alt="<?php echo $game['title']; ?>">
        <h2><?php echo $game['title']; ?></h2>
        <p>Prix : <?php echo $game['price']; ?> €</p>
        <p>Date de sortie : <?php echo $game['release_date']; ?></p>
        <a href="edit_game.php?id=<?php echo $game['id']; ?>">Modifier</a>
        <a href="delete_game.php?id=<?php echo $game['id']; ?>">Supprimer</a>
      </td>
      <?php if ($loop_index % 5 == 4): ?>
        </tr><tr>
      <?php endif; ?>
    <?php endforeach; ?>
  </tr>
</table>


<?php

require_once '_inc/footer.php';

?>