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

  <script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.9/index.global.min.js'></script>
  <script>

    document.addEventListener('DOMContentLoaded', function() {
      var calendarEl = document.getElementById('calendar');
      var calendar = new FullCalendar.Calendar(calendarEl, {
        initialView: 'dayGridMonth'
      });
      calendar.render();
    });

  </script>

</head>

<body>

  <div id='calendar'></div>


  <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
        integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo="
        crossorigin=""></script>
  <div id="container_map">
    <div id="map"></div>
  </div>
  <script>
    const map = L.map('map').setView([44.44900, 2.49332], 15);
    var marker = L.marker([44.44900, 2.49332]).addTo(map);
    marker.bindPopup("<b>Gite de figuies</b>").openPopup();

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
    <div class="container_reseaux">
      <a class="logo_res" href="https://www.facebook.com/gitefiguies" target="_blank"><img src="img/facebook.png"></a>
      <a class="logo_res" href="https://twitter.com/votrecomptetwitter" target="_blank"><img src="img/twitter.svg"></a>
      <a class="logo_res" href="https://www.linkedin.com/in/votreprofillinkedin" target="_blank"><img src="img/linkedin.png"></a>
      <a class="logo_res" href="https://www.instagram.com/votrecompteinstagram" target="_blank"><img src="img/instagram.png"></a>
    </div>


  </div>

  <div class="partners">
    <h3>Partenaires</h3>
    <div class="container_part">
      <a class="logo_part" href="/pdf/tourisme-handicap.pdf" data-target="_blank"><img src="img/logo-handicap.png" alt="Logo Tourisme et Handicap"></a>
      <a class="logo_part" href="/pdf/vignobles-decouvertes.pdf" data-target="_blank"><img src="img/logo-vignobles.png" alt="Logo Vignobles et Découvertes"></a>
      <a class="logo_part" href="http://www.les-plus-beaux-villages-de-france.org/fr/conques-0" data-target="_blank"><img src="img/logo-beauxvillages.png" alt="Logo Les Plus Beaux Villages de France"></a>
    </div>
    <div class="container_part">
      <a class="logo_part" href="http://www.cc-conques-marcillac.fr" data-target="_blank"><img src="img/logo-cc-conques.jpg" alt="Logo Communauté de Communes de Conques-Marcillac"></a>
      <a class="logo_part" href="http://www.itervitis.fr" data-target="_blank"><img src="img/logo-iter-vitis.jpg" alt="Logo Iter Vitis"></a>
      <a class="logo_part" href="https://aveyron.fr/" data-target="_blank"><img src="img/logo-aveyron.png" alt="Logo de l'Aveyron"></a>
    </div>


  </div>
</footer>

</html>
