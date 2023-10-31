<!doctype html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <title>Administration</title>
  <link rel="stylesheet" href="css/admin.css">
  <link rel="icon" href="img/LOGO-final-fond-transparent.png">

  <script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.9/index.global.min.js'></script>
  <script src='js/calendar.js'></script>
</head>
<body>
  <?php
    session_start();

    if (!isset($_SESSION['user'])) {
      header("location: auth.php");
      exit();
    }
  ?>
  <div class="container_haut_de_page">
    <h1>Page d'administration</h1>
    <button class="btn_retour_acc"><a href="index.php">Retour accueil</a></button>
    <button class="btn_retour_acc"><a href="php/deconnexion.php">Deconnexion</a></button>
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


    <h2>Ajouter une image</h2>

    <form method="post" action="php/upload.php" enctype="multipart/form-data">
      <label for="image">Sélectionnez une image :</label>
      <input type="file" name="image" id="image" accept="image/*" required>
      <button type="submit" name="upload">Envoyer l'image</button>
    </form>

    <h2>Liste des images</h2>
    <table>
      <tr>
        <th>Image</th>
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
      $resultatImages = $connexion->query("SELECT * FROM images");

      if (isset($_GET['supprimer'])) {
        $id = $_GET['supprimer'];

        // Supprimer le fichier du serveur
        $resultatImages = $connexion->query("SELECT nom_fichier FROM images WHERE id = $id");

        if ($resultatImages->num_rows > 0) {
          $image = $resultatImages->fetch_assoc();
          $cheminFichier = $image['nom_fichier'];

          if (file_exists($cheminFichier)) {
            if (unlink($cheminFichier)) {
              header("location: administration.php");
            } else {
              echo "Erreur lors de la suppression du fichier.";
            }
          } else {
            echo "Le fichier " . $cheminFichier  ." n'existe pas.";
          }
        }

        // Supprimer l'entrée de la base de données
        $requete = $connexion->prepare("DELETE FROM images WHERE id = ?");
        $requete->bind_param("s", $id);
        $requete->execute();
      }
      while ($image = $resultatImages->fetch_assoc()) {




        echo "<tr>";
        echo "<td><img class='image_bdd' src='" . $image['nom_fichier'] . "' alt='Image'></td>";
        echo "<td><a href='administration.php?supprimer={$image['id']}'>Supprimer</a></td>";
        echo "</tr>";
      }
      ?>
    </table>

    <div id='calendar'></div>

    <div id="container-form-choix-dates">
      <h2>Modifier des disponibilités</h2>
      <form id="form-choix-dates" method="post" action="php/changeDates.php">
        <label>
          De : <input type="date" name="dateDebut" required>
        </label>
        <label>
          A : <input type="date" name="dateFin" required>
        </label>
        <label>
          Changer en : <select name="option" required>
            <option>Réservé</option>
            <option>Libre</option>
          </select>
        </label>
        <input type="submit" value="Enregistrer">
      </form>
    </div>
  </body>
</html>
