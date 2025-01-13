let currentSlide = 0;

// Function to show a specific slide
function showSlide(index) {
  const items = document.querySelectorAll('.carousel-item');
  items.forEach((item, i) => {
    item.classList.remove('active');
    if (i === index) {
      item.classList.add('active');
    }
  });
}

// Function to move to the next slide
function nextSlide() {
  const items = document.querySelectorAll('.carousel-item');
  currentSlide = (currentSlide + 1) % items.length; // Loop back to the first slide
  showSlide(currentSlide);
}

// Automatically change the slide every 5 seconds
setInterval(nextSlide, 5000);










document.querySelector('.learn-morel-btn').addEventListener('click', function(event) {
    event.preventDefault(); // Prevent default link behavior
    
    // Scroll to the section with the class 'about-luxury-hotels'
    document.querySelector('.luxury-hotels').scrollIntoView({
      behavior: 'smooth'
    });
  });


  document.querySelector('.learn-mores-btn').addEventListener('click', function(event) {
    event.preventDefault(); // Prevent default link behavior
    
    // Scroll to the section with the class 'about-luxury-hotels'
    document.querySelector('.city-hotels').scrollIntoView({
      behavior: 'smooth'
    });
  });

  document.querySelector('.learn-moresd-btn').addEventListener('click', function(event) {
    event.preventDefault(); // Prevent default link behavior
    
    // Scroll to the section with the class 'about-luxury-hotels'
    document.querySelector('.beach-resorts').scrollIntoView({
      behavior: 'smooth'
    });
  });
  