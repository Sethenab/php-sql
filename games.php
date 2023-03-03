<?php
// Inclure les fichiers requis
require_once '_inc/functions.php';
require_once '_inc/header.php';
require_once '_inc/nav.php';
session_start();

// Récupérer tous les jeux vidéo
$games = getAllGames();

?>

<div class="container py-5">
  <div class="row row-cols-1 row-cols-md-3 g-4">

    <?php foreach ($games as $game): ?>
    <div class="col">
      <div class="card h-100">
        <img src="<?= $game['poster'] ?>" class="card-img-top" alt="<?= $game['title'] ?>">
        <div class="card-body">
          <h5 class="card-title"><?= $game['title'] ?></h5>
          <p class="card-text"><?= $game['descriptions'] ?></p>
          <p class="card-text"><?= $game['price'] ?></p>
          <a href="game.php?id=<?= $game['id'] ?>" class="btn btn-primary">Consulter</a>
        </div>
      </div>
    </div>
    <?php endforeach; ?>

  </div>
</div>

<?php
// Inclure le fichier footer.php
require_once '_inc/footer.php';
?>