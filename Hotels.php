<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Hotels - Tourism Website</title>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&family=Covered+By+Your+Grace&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="Hotels.css">
</head>
<body>
  <?php include("navigation.html") ?>
  <!-- Header with Carousel -->
  <header class="carousel">
    <div class="carousel-item active" style="background-image: url('images/hotels/3.jpg');"></div>
    <div class="carousel-item" style="background-image: url('images/hotels/1.jpg');"></div>
    <div class="carousel-item" style="background-image: url('images/hotels/2.jpg');"></div>
    <div class="carousel-item" style="background-image: url('images/hotels/4.jpg');"></div>
    <div class="carousel-item" style="background-image: url('images/hotels/5.jpg');"></div>
    <div class="carousel-item" style="background-image: url('images/hotels/6.jpg');"></div>
    <div class="carousel-item" style="background-image: url('images/hotels/7.jpg');"></div>
    <div class="carousel-item" style="background-image: url('images/hotels/8.jpg');"></div>
    

    <button class="carousel-btn prev-btn" onclick="moveSlide(-1)">&#10094;</button>
    <button class="carousel-btn next-btn" onclick="moveSlide(1)">&#10095;</button>
  </header>

  <!-- Hotels Section -->
  <section class="hotels">
    <h1 class="section-title">Explore Our Hotels</h1>
    <div class="hotel-cards">
      <div class="hotel-card">
        <img src="images/hotels/luxury hotels.jpg" alt="Luxury Hotel">
        <h2>Luxury Hotel</h2>
        <p>Experience the ultimate luxury with top-notch facilities and breathtaking views.</p>
        <button><a href="#" class="learn-morel-btn">Learn More</a></button>

      </div>
      <div class="hotel-card">
        <img src="images/hotels/city hotel.jpg" alt="City Hotel">
        <h2>City Hotel</h2>
        <p>Stay in the heart of the city and explore everything just a step away.</p>
        <button><a href="#" class="learn-mores-btn">Learn More</a></button>
      </div>
      <div class="hotel-card">
        <img src="images/hotels/beach resort.jpg" alt="Beach Resort">
        <h2>Beach Resort</h2>
        <p>Relax by the beach and enjoy the serene beauty of nature.</p>
        <button><a href="#" class="learn-moresd-btn">Learn More</a></button>
      </div>
    </div>
  </section>

  <section class="luxury-home">
        <div class="luxury-content">
      <h1>Welcome to your luxurious home away from home</h1>
      <p>
        Write a paragraph that talks about your brand or property here. Convince your prospective clients to choose you and your offerings by highlighting the qualities that set you apart from the competition. Your audience is already on your website, so push a little bit harder to seal the deal!
      </p>
      <a href="#" class="learn-more-btn">Learn More</a>
    </div>
    <div class="luxury-image">
      <img src="images/hotels/7.jpg" alt="Luxury lifestyle">
    </div>
  </section>

  <section class="luxury-hotels">
    <div class="container">
      <h2>About Luxury Hotels</h2>
      <p class="section-description">
        Explore the world of luxury and elegance. Our handpicked selection of luxury hotels offers unparalleled comfort, world-class amenities, and exceptional experiences.
      </p>
  
      <div class="hotels-grid">
        <!-- Hotel 1 -->
        <div class="hotel-card">
          <img src="images/hotels/l1.jpg" alt="Hotel 1">
          <h3>The Royal Palace Hotel</h3>
          <p>
            Experience the grandeur of luxurious suites, gourmet dining, and top-notch service in the heart of the city.
          </p>
          <ul class="features">
            <li>Spa & Wellness</li>
            <li>Infinity Pool</li>
            <li>Private Beach Access</li>
          </ul>
        </div>
        <!-- Hotel 2 -->
        <div class="hotel-card">
          <img src="images/hotels/l2.jpg" alt="Hotel 2">
          <h3>Oceanview Resort</h3>
          <p>
            Nestled by the ocean, this resort offers breathtaking views, beachfront villas, and personalized service.
          </p>
          <ul class="features">
            <li>Beachfront Villas</li>
            <li>Gourmet Cuisine</li>
            <li>Water Sports</li>
          </ul>
        </div>
        <!-- Hotel 3 -->
        <div class="hotel-card">
          <img src="images/hotels/l3.jpg" alt="Hotel 3">
          <h3>Mountain Bliss Retreat</h3>
          <p>
            Escape to serenity with stunning mountain views, eco-friendly design, and world-class wellness programs.
          </p>
          <ul class="features">
            <li>Mountain View Suites</li>
            <li>Yoga & Meditation</li>
            <li>Eco-Friendly Design</li>
          </ul>
        </div>
      </div>
    </div>
  </section>

  <section class="city-hotels">
    <div class="container">
      <h2>About City Hotels</h2>
      <p class="section-description">
        Discover the best city hotels that offer modern amenities, convenient locations, and exceptional services tailored for business and leisure travelers.
      </p>
  
      <div class="hotels-grid">
        <!-- Hotel 1 -->
        <div class="hotel-card">
          <img src="images/hotels/city1.webp" alt="City Hotel 1">
          <h3>Urban Stay Grand</h3>
          <p>
            Located in the city's heart, Urban Stay Grand offers modern rooms, rooftop dining, and easy access to shopping and entertainment hubs.
          </p>
          <ul class="features">
            <li>Central Location</li>
            <li>Rooftop Dining</li>
            <li>Business Conference Rooms</li>
          </ul>
        </div>
        <!-- Hotel 2 -->
        <div class="hotel-card">
          <img src="images/hotels/city2.webp" alt="City Hotel 2">
          <h3>Metropolitan Suites</h3>
          <p>
            Experience contemporary design, fine dining, and state-of-the-art facilities for business and relaxation in a bustling city environment.
          </p>
          <ul class="features">
            <li>Executive Suites</li>
            <li>Fitness Center</li>
            <li>Airport Shuttle</li>
          </ul>
        </div>
        <!-- Hotel 3 -->
        <div class="hotel-card">
          <img src="images/hotels/city3.webp" alt="City Hotel 3">
          <h3>Skyline View Inn</h3>
          <p>
            With breathtaking skyline views, Skyline View Inn provides luxury accommodations with personalized services for discerning travelers.
          </p>
          <ul class="features">
            <li>Panoramic City Views</li>
            <li>24/7 Room Service</li>
            <li>High-Speed WiFi</li>
          </ul>
        </div>
      </div>
    </div>
  </section>

  <section class="beach-resorts">
    <div class="container">
      <h2>About Beach Resorts</h2>
      <p class="section-description">
        Escape to paradise with our collection of luxurious beach resorts, offering stunning ocean views, private beaches, and world-class amenities.
      </p>
  
      <div class="resorts-grid">
        <!-- Resort 1 -->
        <div class="resort-card">
          <img src="images/hotels/b1.jpg" alt="Beach Resort 1">
          <h3>Azure Shores Retreat</h3>
          <p>
            Relax in the lap of luxury at Azure Shores Retreat, featuring private beachfront villas, infinity pools, and tropical dining experiences.
          </p>
          <ul class="features">
            <li>Private Beach Access</li>
            <li>Infinity Pools</li>
            <li>Tropical Dining</li>
          </ul>
        </div>
        <!-- Resort 2 -->
        <div class="resort-card">
          <img src="images/hotels/b2.jpg" alt="Beach Resort 2">
          <h3>Ocean Breeze Resort</h3>
          <p>
            Ocean Breeze Resort offers serene beachfront accommodations, water sports, and rejuvenating spa treatments for the ultimate seaside escape.
          </p>
          <ul class="features">
            <li>Water Sports</li>
            <li>Spa & Wellness Center</li>
            <li>All-Inclusive Packages</li>
          </ul>
        </div>
        <!-- Resort 3 -->
        <div class="resort-card">
          <img src="images/hotels/b3.jpg" alt="Beach Resort 3">
          <h3>Coral Bay Paradise</h3>
          <p>
            Surrounded by crystal-clear waters, Coral Bay Paradise offers overwater bungalows, sunset cruises, and exclusive island excursions.
          </p>
          <ul class="features">
            <li>Overwater Bungalows</li>
            <li>Sunset Cruises</li>
            <li>Island Excursions</li>
          </ul>
        </div>
      </div>
    </div>
  </section>
  
  
  

  <section class="promos-offers">
    <h2>Promos and Offers</h2>
    <div class="promos-container">
      <!-- Promo 1 -->
      <div class="promo-item">
        <img src="images/hotels/receptionist-providing-luxury-service.webp" alt="Early Bird Discount">
        <div class="promo-content">
          <h3>Early Bird Discount</h3>
          <p>
            List your offers, promos, or special membership privileges and perks here to entice people to book your property.
          </p>
        </div>
      </div>
      <!-- Promo 2 -->
      <div class="promo-item">
        <img src="images/hotels/portrait-luxury-looking-woman-red-orange-evening-dress-rich-hotel.webp" alt="Wellhall Members Club">
        <div class="promo-content">
          <h3>Wellhall Members Club</h3>
          <p>
            List your offers, promos, or special membership privileges and perks here to entice people to book your property.
          </p>
        </div>
      </div>
      <!-- Promo 3 -->
      <div class="promo-item">
        <img src="images/hotels/female-staff-scanning-boarding-pass-with-mobile-phone.webp" alt="Book 3 Nights, Get 1 Night Free">
        <div class="promo-content">
          <h3>Book 3 Nights, Get 1 Night Free</h3>
          <p>
            List your offers, promos, or special membership privileges and perks here to entice people to book your property.
          </p>
        </div>
      </div>
    </div>
  </section>

  <section class="in-the-press">
    <div class="overlay">
      <h2>In the Press</h2>
      <div class="testimonials-container">
        <!-- Testimonial 1 -->
        <div class="testimonial">
          <p>
            <span class="quote">“</span>
            Boost your product and service's credibility by adding testimonials from your clients. People love recommendations, so feedback from others who've tried it is invaluable.
          </p>
          <p class="source">- Santa Solana Post</p>
        </div>
        <!-- Testimonial 2 -->
        <div class="testimonial">
          <p>
            <span class="quote">“</span>
            Boost your product and service's credibility by adding testimonials from your clients. People love recommendations, so feedback from others who've tried it is invaluable.
          </p>
          <p class="source">- Mariana's Luxe Travels</p>
        </div>
        <!-- Testimonial 3 -->
        <div class="testimonial">
          <p>
            <span class="quote">“</span>
            Boost your product and service's credibility by adding testimonials from your clients. People love recommendations, so feedback from others who've tried it is invaluable.
          </p>
          <p class="source">- Fairhill Journal</p>
        </div>
      </div>
    </div>
  </section>

  <!-- Footer -->
  <?php include("footer.php") ?>

  <script src="Hotels.js"></script>
</body>
</html>
