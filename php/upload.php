<?php
if (isset($_POST['upload'])) {
  $serveur = "localhost";
  $utilisateur = "root";
  $motdepasse = "";
  $basededonnees = "projet_gite";
  $connexion = new mysqli($serveur, $utilisateur, $motdepasse, $basededonnees);

  if ($connexion->connect_error) {
    die("La connexion à la base de données a échoué : " . $connexion->connect_error);
  }

  // Gestion de l'envoi de l'image
  if (isset($_FILES['image'])) {
    $imageNom = $_FILES['image']['name'];
    $imageCheminTemporaire = $_FILES['image']['tmp_name'];
    $dossierImages = "C:/xampp/htdocs/projet_web/img/"; // Répertoire où vous stockerez les images
    $imageCheminFinal = $dossierImages . $imageNom;

    if (move_uploaded_file($imageCheminTemporaire, $imageCheminFinal)) {
      $imageCheminFinal = "img/" . $imageNom;
      $requete = $connexion->prepare("INSERT INTO images (nom_fichier) VALUES (?)");
      $requete->bind_param("s", $imageCheminFinal);
      $requete->execute();
      header("location: ../administration.php");
    } else {
      echo "Échec du téléchargement de l'image.";
    }
  } else {
    echo "Aucune image sélectionnée.";
  }

  // Fermer la connexion à la base de données
  $connexion->close();
}
?>
