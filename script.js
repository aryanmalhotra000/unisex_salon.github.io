const images = document.querySelectorAll('.image-container img');
let currentImageIndex = 0;

document.getElementById('nextBtn').addEventListener('click', function() {
  images[currentImageIndex].classList.remove('current-image');
  currentImageIndex = (currentImageIndex + 1) % images.length;
  images[currentImageIndex].classList.add('current-image');
});
