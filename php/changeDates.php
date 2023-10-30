<?php
  // Si l'utilisateur n'est pas authentifie, il est renvoye vers la page de connexion
  session_start();
  if (!isset($_SESSION['user'])) {
    header("location: ../auth.php");
    exit();
  }

  // Si la date de début ou la date de fin n'a pas ete renseignee, l'utilisateur est renvoye vers l'administration
  if (!isset($_POST['dateDebut']) || !isset($_POST['dateFin']) || !isset($_POST['option'])) {
    header("location: ../administration.php#calendar");
    exit();
  }

  $serveur = "localhost";
  $utilisateur = "root";
  $motdepasse = "";
  $basededonnees = "projet_gite";

  $connexion = new mysqli($serveur, $utilisateur, $motdepasse, $basededonnees);

  if ($connexion->connect_error) {
    die("La connexion à la base de données a échoué : " . $connexion->connect_error);
  }

  $courant = new DateTime();
  $dateFin = new DateTime();
  $courant = $_POST['dateDebut'];
  $dateFin = $_POST['dateFin'];

  if ($_POST['option'] == "Réservé") {
    while ($courant <= $dateFin) {
      $requete = $connexion->prepare("INSERT INTO date_reserve VALUES (?)");
      $requete->bind_param("s", $courant);
      $requete->execute();
      $courant++;
    }
  } else {
    while ($courant <= $dateFin) {
      $requete = $connexion->prepare("DELETE FROM date_reserve WHERE date = ?");
      $requete->bind_param("s", $courant);
      $requete->execute();
      $courant++;
    }
  }

  header("location: ../administration.php#calendar");
?>
