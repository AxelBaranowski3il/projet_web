// Recuperation des elements du carrousel
const carouselContainer = document.getElementById('carousel-container');
const carousel = document.getElementById('carousel');
const images = carousel.querySelectorAll('img');
const prevButton = document.getElementById('prevBtn');
const nextButton = document.getElementById('nextBtn');

// Lazy loading
const observer = new IntersectionObserver((entries, observer) => {
  entries.forEach((entry) => {
    if (entry.isIntersecting) {
      const image = entry.target;
      image.src = image.getAttribute('data-src');
      observer.unobserve(image);
    }
  });
});

images.forEach((image) => {
  observer.observe(image);
})

// Initialisation
let currentImageIndex = 0;

// Ecoute des evenements de clic sur "Precedent" et "Suivant"
prevButton.addEventListener('click', () => {
  showImage(currentImageIndex - 1);
});

nextButton.addEventListener('click', () => {
  showImage(currentImageIndex + 1);
});

// Affichage de l'image courante
function showImage(index) {
  const images = carousel.querySelectorAll('img');
  if (index < 0) {
    currentImageIndex = images.length - 1;
  } else if (index >= images.length) {
    currentImageIndex = 0;
  } else {
    currentImageIndex = index;
  }

  // Masquage des images non courantes
  images.forEach((img, i) => {
    if (i === currentImageIndex) {
      img.style.display = 'block';
    } else {
      img.style.display = 'none';
    }
  });
}

// Affichage de la premiere image
showImage(currentImageIndex);
