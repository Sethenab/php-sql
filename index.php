<?php 
include('_inc/functions.php'); 
session_start();
?>

<?php
$games = getRandomGames(3);
connectDb();

require_once '_inc/header.php';
require_once '_inc/nav.php';

?>

<h1>Accueil</h1>

<?php
  $notice = getSessionFlashMessage('notice');
  if ($notice !== null) {
    echo '<p>' . $notice . '</p>';
  }
?>  

<div>
    
		<?php foreach ($games as $game): ?>
			<div style="display: inline-block; margin: 10px;">
				<h2><?php echo $game['title']; ?></h2>
				<img src="<?php echo $game['poster']; ?>" alt="<?php echo $game['title']; ?>" width="200">
				<p>Prix: <?php echo $game['price']; ?> €</p>
				<a href="game.php?id=<?php echo $game['id']; ?>"><button>Consulter</button></a>
			</div>
		<?php endforeach; ?>
	</div>

<?php

require_once '_inc/footer.php';

?>