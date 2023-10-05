<!doctype html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <title>Gite de </title>
  <link rel="stylesheet" href="css/index.css">
  <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
        integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY="
        crossorigin=""/>
  <link rel="icon" type="image/png" href="img/logo.png" />

</head>

<body>


  <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
        integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo="
        crossorigin=""></script>
  <div id="map"></div>
  <style>
    /* Style pour définir la taille de la carte */
    #map {
      height: 400px;
      width: 100%;
    }
  </style>



  <script>


    const map = L.map('map').setView([44.44900, 2.49332], 15);
    var marker = L.marker([44.44900, 2.49332]).addTo(map);

    const tiles = L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
      maxZoom: 19,
      attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
    }).addTo(map);


  </script>
</body>

<footer>
  <div class="contact-info">
    <h3>Coordonnées</h3>
    <p>Gite Figuies</p>
    <p>Adresse : 140 rue de Figuiès</p>
    <p>12330 Salles-la-Source</p>
    <p>Téléphone : +33(0)6 41 57 73 20</p>
    <p>Email : beatrice.boyer29@orange.fr</p>
  </div>
  <div class="social-media">
    <h3>Réseaux Sociaux</h3>
    <ul>
      <li><a href="https://www.facebook.com/gitefiguies" target="_blank">Facebook</a></li>
      <li><a href="https://twitter.com/votrecomptetwitter" target="_blank">Twitter</a></li>
      <li><a href="https://www.linkedin.com/in/votreprofillinkedin" target="_blank">LinkedIn</a></li>
      <li><a href="https://www.instagram.com/votrecompteinstagram" target="_blank">Instagram</a></li>
    </ul>
  </div>

  <div class="partners">
    <h3>Partenaires</h3>
    <ul>
      <li><a href="/pdf/tourisme-handicap.pdf" data-target="_blank"><img src="/img/logo-handicap.png" alt="Logo Tourisme et Handicap"></a></li>
      <li><a href="/pdf/vignobles-decouvertes.pdf" data-target="_blank"><img src="/img/logo-vignobles.png" alt="Logo Vignobles et Découvertes"></a></li>
      <li><a href="http://www.europe-en-france.gouv.fr/L-Europe-s-engage/Fonds-europeens-2014-2020/Politique-de-developpement-rural/FEADER" data-target="_blank"><img src="/img/logo-europe-projet.png" alt="Logo du fonds européen agricole pour le développement rural (FEADER)"></a></li>
      <li><a href="http://www.les-plus-beaux-villages-de-france.org/fr/conques-0" data-target="_blank"><img src="/img/logo-beauxvillages.png" alt="Logo Les Plus Beaux Villages de France"></a></li>
      <li><a href="http://www.cc-conques-marcillac.fr" data-target="_blank"><img src="/img/logo-cc-conques.jpg" alt="Logo Communauté de Communes de Conques-Marcillac"></a></li>
      <li><a href="http://www.itervitis.fr" data-target="_blank"><img src="/img/logo-iter-vitis.jpg" alt="Logo Iter Vitis"></a></li>
      <li><a href="http://www.chemins-compostelle.com/les-patrimoines-de-lunesco" data-target="_blank"><img src="/img/logo-unesco.png" alt="Logo de l'UNESCO"></a></li>
      <li><a href="https://aveyron.fr/" data-target="_blank"><img src="/img/logo-aveyron.png" alt="Logo de l'Aveyron"></a></li>
    </ul>

  </div>
</footer>

</html>
