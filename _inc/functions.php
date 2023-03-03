<?php
function processContactForm() {
  if (isset($_POST['submit'])) {
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];

    if (isEmail($email) && isLong($subject) && isLong($message)) {
      $submissionDate = new DateTime();
      $submissionDate->setTimestamp($_SERVER['REQUEST_TIME']);

      $formattedDate = $submissionDate->format('d/m/Y H:i:s');

      $_SESSION['notice'] = 'Vous serez contacté dans les plus brefs délais.';
      header('Location: index.php');
      exit();
    } else {
      echo "<p>Une erreur est survenue lors de la soumission du formulaire.</p>";
    }
  }
}

function getSessionFlashMessage($key) {
  if (array_key_exists($key, $_SESSION)) {
    $message = $_SESSION[$key];
    unset($_SESSION[$key]);
    return $message;
  }
  return null;
}

function isEmail($email) {
  return filter_var($email, FILTER_VALIDATE_EMAIL);
}

function isLong($value) {
  return strlen($value) >= 10;
}

function connectDb() {
    $host = 'localhost:3306';
    $username = 'root';
    $password = '';
    $dbname = 'videogames';
  
    try {
      $db = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
      $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      return $db;
    } catch(PDOException $e) {
      echo "Erreur de connexion à la base de données : " . $e->getMessage();
      die();
    }
  }

  function getRandomGames($limit = 3) {
    $db = connectDB();
    $sql = "SELECT * FROM game ORDER BY RAND() LIMIT $limit";
    $result = $db->query($sql);
    $games = array();
    if ($result->rowCount() > 0) {
        while($row = $result->fetch(PDO::FETCH_ASSOC)) {
            $games[] = $row;
        }
    }
    $db = null;
    return $games;
}

// Récupère tous les jeux vidéo présents dans la table game
function getAllGames() {
    $db = connectDB();
    $sql = "SELECT * FROM game";
    $result = $db->query($sql);
    $games = array();
    if ($result->rowCount() > 0) {
        while($row = $result->fetch(PDO::FETCH_ASSOC)) {
            $games[] = $row;
        }
    }
    $db = null;
    return $games;
}

// Récupère un jeu vidéo à l'aide de son identifiant
function getGameById($id) {
  $db = connectDB();
  $sql = "SELECT * FROM game WHERE id = $id";
  $result = $db->query($sql);
  $game = null;
  if ($result->rowCount() > 0) {
      $game = $result->fetch(PDO::FETCH_ASSOC);
  }
  $db = null;
  return $game;
}

function validateLoginForm() {
  $errors = array();

  // Vérification de l'email
  if (empty($_POST['email'])) {
    $errors[] = "L'email est obligatoire.";
  } else if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
    $errors[] = "L'email est invalide.";
  }

  // Vérification du mot de passe
  if (empty($_POST['password'])) {
    $errors[] = "Le mot de passe est obligatoire.";
  }

  return $errors;
}

// Vérification de l'existence d'un administrateur à l'aide de son email
function getAdminByEmail($email) {
  $db = connectDB();
  $email = $db->quote($email);
  $result = $db->query("SELECT * FROM admin WHERE email = $email");
  $admin = $result->fetch(PDO::FETCH_ASSOC);
  $db = null;
  return $admin;
}

// Vérification de l'identifiant et du mot de passe d'un administrateur
function checkAdminCredentials($email, $password) {
  $admin = getAdminByEmail($email);
  if (!$admin) {
    return false;
  }
  return password_verify($password, $admin['password']);
}

// Traitement du formulaire de connexion
function processLoginForm() {
  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $errors = validateLoginForm();
    if (count($errors) === 0) {
      $admin = getAdminByEmail($_POST['email']);
      if ($admin !== null && password_verify($_POST['password'], $admin['password'])) {
        // Création de l'entrée "user" dans la session avec l'identifiant de l'administrateur connecté
        session_start();
        $_SESSION['user'] = $admin['id'];
        header('Location: index.php');
        exit();
      } else {
        $errors[] = "L'identifiant ou le mot de passe est incorrect.";
      }
    }
    if (count($errors) > 0) {
      // Création de l'entrée "notice" dans la session avec le message d'erreur
      session_start();
      $_SESSION['notice'] = "Identifiants incorrects";
      header('Location: login.php');
      exit();
    }
  }
}

function getSessionData($key) {
  if (isset($_SESSION) && is_array($_SESSION) && array_key_exists($key, $_SESSION)) {
    return $_SESSION[$key];
  } else {
    return null;  
  }
}

function checkAuthentication() {
  if (!array_key_exists('user', $_SESSION)) {
    $_SESSION['notice'] = 'Accès refusé';
    header('Location: index.php');
    exit();
  }
}