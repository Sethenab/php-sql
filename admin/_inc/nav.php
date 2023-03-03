<nav>
    <a href="/">Home</a>
    <a href="/contact.php">Contact</a>
    <a class="nav-link" href="admin/_games/index.php">games</a>
    <?php require_once '_inc/functions.php';

     if (getSessionData('user') === null) { ?>
      <a href="login.php">Connexion</a>
    <?php require_once '_inc/functions.php'; 
 } else { ?>
      <a href="logout.php">Déconnexion</a>
    <?php } ?>
</nav>