<?php

$serveur = "localhost";
$utilisateur = "root";
$motdepasse = "";
$basededonnees = "projet_gite";

$connexion = new mysqli($serveur, $utilisateur, $motdepasse, $basededonnees);

if ($connexion->connect_error) {
  die("La connexion à la base de données a échoué : " . $connexion->connect_error);
}

$dates = "SELECT date FROM date_reserve";

$resultDates = $connexion->query($dates);

$reservations = array();

if ($resultDates->num_rows > 0) {
  while ($row = $resultDates->fetch_assoc()) {
    $reservations[] = $row;
  }
}

// Fermeture de la connexion
$connexion->close();

// Renvoyer les reservations au format JSON
echo json_encode($reservations);
