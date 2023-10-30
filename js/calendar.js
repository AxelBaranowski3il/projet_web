document.addEventListener('DOMContentLoaded', function () {
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
          start: reserv,
          rendering: 'background',
          color: 'lightblue'
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
});
