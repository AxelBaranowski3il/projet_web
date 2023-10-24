// Sélectionnez les éléments du carrousel
const carouselContainer = document.getElementById('carousel-container');
const carousel = document.getElementById('carousel');
const prevButton = document.getElementById('prev-btn');
const nextButton = document.getElementById('next-btn');

// Initialisez l'index de l'image actuelle
let currentImageIndex = 0;

// Écoutez les clics sur les boutons précédent et suivant
prevButton.addEventListener('click', () => {
  showImage(currentImageIndex - 1);
});

nextButton.addEventListener('click', () => {
  showImage(currentImageIndex + 1);
});

// Fonction pour afficher l'image en fonction de l'index
function showImage(index) {
  const images = carousel.querySelectorAll('img');
  if (index < 0) {
    currentImageIndex = images.length - 1;
  } else if (index >= images.length) {
    currentImageIndex = 0;
  } else {
    currentImageIndex = index;
  }

  // Utilisez la propriété transform pour déplacer les images horizontalement
  carousel.style.transform = `translateX(-${currentImageIndex * 300}px)`; // 300px est la largeur de chaque image

  // Mettez à jour les styles pour afficher la première image
  images.forEach((img, i) => {
    if (i === currentImageIndex) {
      img.style.display = 'block';
    } else {
      img.style.display = 'none';
    }
  });
}

// Affichez la première image au chargement de la page
showImage(currentImageIndex);
