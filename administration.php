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
if (isset($_POST['username']) || isset($_POST['password'])){
  echo $_POST['username'].'</br>';
//  echo $_SESSION['username'];
}else{
  echo "POST: login non définie</br>";
}
if (isset($_POST['password'])){
  echo $_POST['password'].'</br>';
}else{
  echo "POST: mdp non définie</br>";
}

?>
</body>

</html>
