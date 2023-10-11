<!doctype html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <title>Administration</title>
  <link rel="stylesheet" href="css/admin.css">
  <link rel="icon" type="image/png" href="img/admin.png" />

</head>
<body>
<div class="container_haut_de_page">
  <h1>Page d'administration</h1>
  <button class="btn_retour_acc"><a href="index.php">Retour accueil</a></button>
  <button class="btn_retour_acc"><a href="auth.php">Deconnexion</a></button>
</div>

<div class="container">

  <h2>Ajouter un utilisateur</h2>
  <form method="post" action="administration.php">
    <label>Login : <input type="text" name="login" required></label>
    <label>Mot de passe : <input type="password" name="password" required></label>
    <button type="submit" name="ajouter">Ajouter</button>
  </form>

  <h2>Liste des utilisateurs</h2>
  <table>
    <tr>
      <th>Login</th>
      <th>Mot de passe</th>
      <th>Action</th>
    </tr>
    <?php
    $serveur = "localhost";
    $utilisateur = "root";
    $motdepasse = "";
    $basededonnees = "projet_gite";

    $connexion = new mysqli($serveur, $utilisateur, $motdepasse, $basededonnees);

    if ($connexion->connect_error) {
      die("La connexion à la base de données a échoué : " . $connexion->connect_error);
    }

    if (isset($_POST['ajouter'])) {
      $login = $_POST['login'];
      $password = $_POST['password'];
      $requete = $connexion->prepare("INSERT INTO user (login, passwd) VALUES (?, ?)");
      $requete->bind_param("ss", $login, $password);
      $requete->execute();
    }

    if (isset($_GET['supprimer'])) {
      $login = $_GET['supprimer']; // Récupérer le login à partir de la requête GET
      $requete = $connexion->prepare("DELETE FROM user WHERE login = ?");
      $requete->bind_param("s", $login);
      $requete->execute();
    }

    $requete = $connexion->query("SELECT * FROM user");
    while ($utilisateur = $requete->fetch_assoc()) {
      echo "<tr>";
      echo "<td>{$utilisateur['login']}</td>";
      echo "<td>{$utilisateur['passwd']}</td>";
      echo "<td><a href='administration.php?supprimer={$utilisateur['login']}'>Supprimer</a></td>";
      echo "</tr>";
    }
    ?>
  </table>
  </body>
</div>
</html>
