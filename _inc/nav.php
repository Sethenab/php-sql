

<nav>
    <a href="/"><img src="../img/images.png" alt=""></a>
    <a href="/contact.php">Contact</a>
    <a class="nav-link" href="/games.php">Jeux vidéo</a>
    <?php require_once '_inc/functions.php';

     if (getSessionData('user') === null) { ?>
      <a href="login.php">Connexion</a>
    <?php require_once '_inc/functions.php'; 
 } else { ?>
      <a href="logout.php">Déconnexion</a>
    <?php } ?>
</nav>