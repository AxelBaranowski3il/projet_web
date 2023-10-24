<!doctype html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <title>Login</title>
  <link rel="stylesheet" href="css/login.css">
  <link rel="icon" href="img/LOGO-final-fond-transparent.png">

</head>
<body>
<div class="container">
  <div class="form_area">
    <p class="title">Login</p>
    <form method="post" action="auth.php">

      <div class="form_group">
        <label for="username" class="sub_title">Nom d'utilisateur :</label>
        <input type="text" id="username" name="username" class="form_style" required><br><br>
      </div>

      <div class="form_group">
        <label for="password" class="sub_title">Mot de passe :</label>
        <input type="password" id="password" name="password" class="form_style" required><br><br>
      </div>

      <input type="submit" value="Se Connecter" class="btn">
    </form>
  </div>
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
