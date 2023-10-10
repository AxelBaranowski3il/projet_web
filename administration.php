<!doctype html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <title>Administration</title>
  <link rel="stylesheet" href="css/administration.css">
  <link rel="icon" type="image/png" href="img/admin.png" />

</head>
<body>
<p>Vous êtes sur la page d'admin</p>
<?php
session_start();
if(isset($_COOKIE["user"])){
  echo $_COOKIE["user"];
  //echo "Pas d'utilisateur connecté, veuillez vous connecter !";
  //sleep(5);
  //header("location: auth.php");
  //echo "Utilisateur : " . $_SESSION['username'];
} else {

}

if (isset($_POST['deco'])) {
  $nomCookie = "user";
  $valeurCookie = "";
  $dureeCookie = time() - 300; // Le cookie expire dans 1 heure (3600 secondes)
  setcookie($nomCookie, $valeurCookie, $dureeCookie, "/");
  echo "Cookie modifié avec succès!";
}
?>
<form method="post" action="">
  <input type="submit" name="deco">
</form>
</body>

</html>
