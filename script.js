// Form Validation
document.getElementById('footerContactForm').addEventListener('submit', function(event) {
  let fullName = document.getElementById('footerFullName').value;
  let email = document.getElementById('footerEmail').value;
  let message = document.getElementById('footerMessage').value;

  let emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

  let errors = []; // Array to store error messages

  if (fullName.length < 3) {
      errors.push("Full name must be at least 3 characters.");
  }

  if (!emailRegex.test(email)) {
      errors.push("Please enter a valid email address.");
  }

  if (message.length < 10) {
      errors.push("Message must be at least 10 characters.");
  }

  if (errors.length > 0) {
      event.preventDefault(); // Prevent form submission
      alert(errors.join('\n')); // Display error messages
  }
});

// Slider functionality for Hero Banner
const slides = document.querySelectorAll('.slide');
const prevButton = document.querySelector('.slider-prev');
const nextButton = document.querySelector('.slider-next');
let currentSlide = 0;

function showSlide(index) {
  slides.forEach(slide => slide.style.display = 'none');
  slides[index].style.display = 'block';
}

function nextSlide() {
  currentSlide = (currentSlide + 1) % slides.length;
  showSlide(currentSlide);
}

function prevSlide() {
  currentSlide = (currentSlide - 1 + slides.length) % slides.length;
  showSlide(currentSlide);
}

if (nextButton && prevButton) { // Check if buttons exist before adding listeners
  nextButton.addEventListener('click', nextSlide);
  prevButton.addEventListener('click', prevSlide);

  setInterval(nextSlide, 5000); // Auto-advance the slider
}

// Header Slider Functionality
const headerSlides = document.querySelectorAll('.header-slide');
const headerPrevButton = document.querySelector('.header-slider-prev');
const headerNextButton = document.querySelector('.header-slider-next');
let currentHeaderSlide = 0;

function showHeaderSlide(index) {
  headerSlides.forEach(slide => slide.style.display = 'none');
  headerSlides[index].style.display = 'block';
}

function nextHeaderSlide() {
  currentHeaderSlide = (currentHeaderSlide + 1) % headerSlides.length;
  showHeaderSlide(currentHeaderSlide);
}

function prevHeaderSlide() {
  currentHeaderSlide = (currentHeaderSlide - 1 + headerSlides.length) % headerSlides.length;
  showHeaderSlide(currentHeaderSlide);
}

if(headerNextButton && headerPrevButton){ // Check if buttons exist before adding listeners.
  headerNextButton.addEventListener('click', nextHeaderSlide);
  headerPrevButton.addEventListener('click', prevHeaderSlide);

  setInterval(nextHeaderSlide, 5000); // Auto-advance header slider
}

const mobileNav = document.querySelector('.mobile-nav');
const menuButton = document.querySelector('.menu-button');

menuButton.addEventListener('click', () => {
    mobileNav.style.display = mobileNav.style.display === 'block' ? 'none' : 'block';
});