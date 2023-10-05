<!doctype html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <title>Login</title>
  <link rel="stylesheet" href="css/login.css">
  <link rel="icon" type="image/png" href="img/cadenas.png" />

</head>
<body>
<div class="container">
  <h2 id="titre_login">Login</h2>
  <form method="post" action="administration.php">
    <label for="username">Nom d'utilisateur :</label>
    <input type="text" id="username" name="username" required><br><br>

    <label for="password">Mot de passe :</label>
    <input type="password" id="password" name="password" required><br><br>

    <input type="submit" value="Se Connecter">
  </form>
</div>

<?php
session_start();
$serveur = "localhost";
$utilisateur = "root";
$motdepasse = "";
$basededonnees = "projet_gite";

$connexion = new mysqli($serveur, $utilisateur, $motdepasse, $basededonnees);

if ($connexion->connect_error) {
  die("La connexion à la base de données a échoué : " . $connexion->connect_error);
}

// Vérification des informations de connexion
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $username = $_POST['username'];
  $password = $_POST['password'];



  $requete = $connexion->prepare("SELECT * FROM user WHERE login = ? AND passwd = ?");
  $requete->bind_param("ss", $username, $password);

  $requete->execute();

  $resultat = $requete->get_result();

  if ($resultat->num_rows > 0) {
    $_SESSION['username'] = $username;
    header("location: administration.php");
  } else {
    echo "<p>Identifiants incorrects. Veuillez réessayer.</p>";
  }

  $requete->close();
  $connexion->close();

}
?>
</body>
</html>
