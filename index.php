<!doctype html>
<html class="no-js" lang="fr">

<head>
  <meta charset="utf-8">
  <title>Figuiès - Gîte</title>

  <link rel="icon" href="img/LOGO-final-fond-transparent.png">

  <link rel="stylesheet" href="css/main.css">



  <link rel="stylesheet" href="css/index.css">
  <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
        integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY="
        crossorigin=""/>

  <script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.9/index.global.min.js'></script>
  <script src='js/calendar.js'></script>

</head>

<body>

  <header>
    <div class="bandeau-en-tete">
      <a href="#visu">
        <img class="logo" src="img/LOGO-final-fond-transparent.png" alt="Logo du gite">
      </a>
        <div class="bandeau-en-tete-titre">
        <h1>Gite de Figuiès</h1>
      </div>
      <a href="auth.php"><button class="btn">Se connecter</button></a>
    </div>

    <nav class="menu">
      <a href="#description">Le gîte</a>
      <a href="#infos-cles">Infos clés</a>
      <a href="#calendar">Disponibilités</a>
      <a href="#container_map">Localisation</a>
    </nav>
  </header>
  <div class="typewriter-text">
    Bienvenue sur le Gite de Figuiès !
  </div>
  <div id="visu">
    <img src="img/cascade.jpg">
  </div>
  <div class="contenu_total">
    <div id="contenu">
      <div class="texte_desc">
        <div id="description">
          <h2>Le gîte</h2>
          <p>
            Notre maison en pierre, située sur les hauteurs, entre vignes, falaises et le causse vous séduira par sa vue magnifique et son environnement agréable.
            A 20 mn de Rodez, 10 mn de Marcillac et 30 mn de Conques, vous êtes idéalement situés pour visiter quelques un des sites naturels ou culturels remarquables de l'Aveyron.
            Figuies est un hameau charmant, que l'on visite à pied. Une belle balade par un chemin, vous mènera de la cascade de la Roque, à celles de Salles-la source, en profitant de nombreux points de vue sur le paysage. On adore aussi le sentier à flanc de versant avec des passages en encorbellement creusé dans la roche ! Il nous fait pénétrer dans le paysage des falaises calcaires avec de beaux points de vue sur la vallée.  Vous êtes sur le GR 62 de Rodez à Conques.
            Le gîte de Figuies,  d'une superficie de 75 m² sur deux niveaux, a été entièrement rénové en 2021. Une agréable décoration allie un style contemporain et des matériaux naturels comme le bois et le rotin.
            Il se compose, au rez-de-chaussée d'une pièce lumineuse ouverte sur le paysage grâce à une grande baie vitrée.  De 35 m² et climatisée, cet espace offre une cuisine moderne bien équipée, un séjour et un coin salon chaleureux et cosys.
            La terrasse plein sud, offre une vue imprenable sur la vallée que l'on peut contempler en prenant ses repas. Vous pourrez même admirer de superbes couchers du soleil.
            A l'étage, vous disposerez de deux chambres mansardées et confortables. L'une avec un lit en 140/190 et l'autre avec deux lits en 90/190. Vous y trouverez aussi la salle de bain avec son WC.
            Le jardin, très agréable, est non clos. Pourvu d'un bar extérieur, d'un barbecue, d'un évier et de mobilier de jardin, vous pourrez y prendre vos repas ou vous reposer à l'ombre de la glycine. Un WC et une douche complètent l'équipement.
            Pour des vacances authentiques et au grand air, dans un lieu paisible à l'écart de la circulation, vous vous sentirez chez vous tout en étant dépaysé.
          </p>

        </div>
        <div id="infos-cles">
          <div class="tarifs">
            <h2>Tarifs 2023</h2>
            <h3>Moyenne saison</h3>
            <ul>
              <li>Nuitée : 85€</li>
              <li>Semaine : 550€</li>
            </ul>
            <h3>Haute saison</h3>
            <ul>
              <li>Nuitée : 110€</li>
              <li>Semaine : 650€</li>
            </ul>
          </div>
          <div class="infos-annexes">
            <h2>Quelques informations</h2>
            <ul>
              <li>Capacité : 4</li>
              <li>Nombre de chambres : 2</li>
              <li>Animaux acceptés</li>
              <li>Parking</li>
            </ul>
          </div>
        </div>
      </div>
      <div id="carousel-container">
        <div id="carousel">
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

          while ($image = $resultatImages->fetch_assoc()) {
            echo "<div class=\"carousel-slide\">";
            echo "<img data-src=\"" . $image['nom_fichier'] . "\" alt=\"" . $image['nom_fichier'] . "\">";
            echo "</div>";
          }
          ?>
        </div>
        <button id="prevBtn"><</button>
        <button id="nextBtn">></button>
        <script src="js/carousel.js"></script>
      </div>
    </div>

    <script src="js/vendor/modernizr-3.11.2.min.js"></script>
    <script src="js/plugins.js"></script>

    <div class="espace_reserve">
      <h3>Legende : </h3>
      <p>Réservé</p>
    </div>

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
      marker.bindPopup("<b class='nom_gite'>Gite de figuies</b>").openPopup();

      const tiles = L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
        maxZoom: 19,
        attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
      }).addTo(map);
    </script>
  </div>

</body>

<footer>
  <div class="contact-info">
    <h3>Coordonnées</h3>
    <p>Gite Figuies</p>
    <p>Adresse : 140 rue de Figuiès</p>
    <p>12330 Salles-la-Source</p>
    <p>Téléphone : +33(0)6 41 57 73 20</p>
    <p>Email : <a href="mailto:beatrice.boyer29@orange.fr" >beatrice.boyer29@orange.fr</a></p>
  </div>
  <div class="social-media">
    <h3>Réseaux Sociaux</h3>
    <div class="container_reseaux">
      <a class="logo_res" href="https://www.facebook.com/gitefiguies" target="_blank"><img src="img/facebook.png"></a>
      <a class="logo_res" href="https://twitter.com/votrecomptetwitter" target="_blank"><img src="img/twitter.png"></a>
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
