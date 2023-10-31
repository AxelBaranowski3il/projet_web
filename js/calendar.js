document.addEventListener('DOMContentLoaded', function() {
  loadCalendar();
} );

document.addEventListener("DOMContentLoaded", function() {
  document.getElementById("form-choix-dates").addEventListener("submit", function(event) {
    event.preventDefault();

    var formData = new FormData(this);

    var xhr = new XMLHttpRequest();

    xhr.open("POST", "php/changeDates.php", true);

    xhr.onload = function() {
      if (xhr.status === 200) {
        loadCalendar();
      } else {
        console.log("Erreur : " + xhr.statusText);
      }
    };

    xhr.onerror = function() {
      console.log("Erreur de réseau lors de la requête.");
    };

    xhr.send(formData);
  });
});


function loadCalendar () {
  var calendarEl = document.getElementById('calendar');
  var calendar = new FullCalendar.Calendar(calendarEl, {
    initialView: 'dayGridMonth',
    locale: 'fr',
    firstDay: 1,
    buttonText: {
      today: 'Aujourd\'hui'
    }
  });
  calendar.render();

  var xhr = new XMLHttpRequest();
  xhr.open("GET", 'php/recupDates.php', true);

  xhr.onload = function () {
    if (xhr.status === 200) {
      var data = xhr.responseText;
      var reservations = JSON.parse(data);

      // Boucle à travers les réservations et ajout au calendrier
      reservations.forEach(function (reservation) {
        var reserv = reservation.date;

        calendar.addEvent({
          start: reserv
        });
      });

      // Rafraîchissement du calendrier pour afficher les réservations
      calendar.render();
    } else {
      console.log('Erreur lors de la récupération des réservations depuis la base de données.');
    }
  };

  xhr.onerror = function () {
    console.log('Erreur réseau lors de la récupération des réservations depuis la base de données.');
  };

  xhr.send();
}

