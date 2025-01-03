<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./nav_fotter.css">
    <link rel="stylesheet" href="./home_page.css">
</head>
<body>
    <nav class="navbar">
      <ul class="nav-links">
          <li><a href="./home_page.php">Home</a></li>
          <li><a href="./destination_page_1.html">Destination</a></li>
          <li><a href="#">Activities</a></li>
          <li><a href="#">Foods</a></li>
          <li><a href="#">Festival</a></li>
          <li><a href="#">Hotel</a></li>
          <li><a href="#">Plan Your Trip</a></li>
          <li><a href="#">Blog</a></li>
      </ul>
    </nav>
    <!-- Hero Section -->
    <header class="hero-section">
        <p>“Discover Sri Lanka: <br> Paradise Awaits You”.</p>
        <button><b><a href="./plan_your_trip.php">Plain Your Trip</a></b></button>
        <img src="./images/home_hero.png" alt="Delicious Food" class="hero-image">
    </header>

    <!-- About Srilanka -->
    <section class="about-srilanka">
        <h1>About Sri Lanka</h1>
        <p>Sri Lanka, an island paradise in the Indian Ocean, is renowned for its rich history, diverse culture, and breathtaking <br> landscapes. From ancient temples and stunning beaches to lush tea plantations and vibrant wildlife, the island offers a <br> perfect blend of nature and tradition. Explore the bustling streets of Colombo, hike through the scenic hill country, or visit <br> UNESCO World Heritage sites like Sigiriya and Anuradhapura. Sri Lanka is also famous for its delicious cuisine, warm <br> hospitality, and colorful festivals. Whether you're seeking adventure, relaxation, or cultural immersion, Sri Lanka promises <br> an unforgettable experience for every traveler.
        </p>
    </section>

    <!-- Popular Destinations -->
    <section>
        <h1 class="destination-cards-section-head">“Discover Your Next Adventure”</h1>
        <div class="destination-cards-section">
            <div class="destination-card">
                <h2>Sigiriya</h2>
                <img src="./images/home-desti-card1.png" alt="Popular Destination 1">
                <p>Sigiriya, a UNESCO World Heritage site, is an ancient rock fortress in Sri Lanka. Known for its stunning frescoes, massive lion's paw entrance, and panoramic views, it’s a must-visit landmark.
                </p>
                <button><b><a href=""></a>SeaMore</b></button>
            </div>
            <div class="destination-card">
                <h2>Ella</h2>
                <img src="./images/home-desti-card.png" alt="Popular Destination 1">
                <p>Ella is a charming hill town in Sri Lanka, known for its scenic beauty, waterfalls, and hiking trails. Popular attractions include Ella Rock, Ravana Falls, and the Nine Arches Bridge.
                </p>
                <button><b><a href=""></a>SeaMore</b></button>
            </div>
            <div class="destination-card">
                <h2>Mirissa</h2>
                <img src="./images/home-desti-card3.png" alt="Popular Destination 1">
                <p>Mirissa is a beautiful coastal town in Sri Lanka, famous for its pristine beaches, whale watching, and vibrant nightlife. It's a perfect destination for relaxation, water sports, and enjoying breathtaking sunsets.
                </p>
                <button><b><a href=""></a>SeaMore</b></button>
            </div>
            <div class="destination-card">
                <h2>Yala Nationa Park</h2>
                <img src="./images/home-desti-card4.png" alt="Popular Destination 1">
                <p>Yala National Park, located in Sri Lanka, is renowned for its diverse wildlife, including leopards, elephants, and birds. It offers thrilling safari experiences amidst stunning landscapes and rich biodiversity.
                </p>
                <button><b><a href=""></a>SeaMore</b></button>
            </div>
        </div>
    </section>

    <!-- Popular Activities -->
    <section class="popular-activities">
        <h1> “Adventures Beyond Imagination”</h1>
     <div class="container">
        <div class="image-gallery">
            <img src="./images/home-act1.png" alt="Surfing" class="gallery-img1">
            <img src="./images/home-act-3.png" alt="Bonfire" class="gallery-img2">
            <img src="./images/home-act-2.png" alt="Hiking" class="gallery-img3">
        </div>
        <div class="text-box">
            <h1>"Unleash Your Adventurous Spirit in Sri Lanka"</h1>
            <p>Experience thrilling adventures in Sri Lanka with wild and sea safaris, boat rides, surfing, rope jumping, balloon tows, diving, camping, and bonfires. Discover an unforgettable blend of adrenaline and nature in this tropical paradise.</p>
        </div>
     </div>
     <div class="container">
        <div class="text-box">
            <h1>"Rejuvenate Your Body and Soul in Sri Lanka"</h1>
            <p>Indulge in ultimate relaxation with Sri Lanka's tranquil spas, revitalizing yoga sessions, traditional Ayurveda treatments, and soothing fish therapy. Embrace serenity and holistic wellness amidst the island's natural beauty, leaving you refreshed and recharged.</p>
        </div>
        <div class="image-gallery">
            <img src="./images/hom-act-4.png" alt="Surfing" class="gallery-ig1">
            <img src="./images/home-act-5.png" alt="Bonfire" class="gallery-ig2">
            <img src="./images/home-act-6.png" alt="Hiking" class="gallery-ig3">
        </div>
     </div>
     <div class="container">
        <div class="image-gallery">
            <img src="./images/home-act-7.png" alt="Surfing" class="gallery-img1">
            <img src="./images/home-act-8.png" alt="Bonfire" class="gallery-img2">
            <img src="./images/home-act-9.png" alt="Hiking" class="gallery-img3">
        </div>
        <div class="text-box">
            <h1>"Immerse Yourself in Sri Lanka's Cultural Wonders"</h1>
            <p>Experience authentic Sri Lankan culture with village tours, tea picking, traditional cooking classes, vibrant festivals, and bustling local markets. Engage with the island's rich traditions and warm hospitality for a truly memorable and enriching journey.</p>
        </div>
     </div>
    </section>

    <!-- Sri lanka map and details -->
    <section>
      <div class="container2">
        <div class="info-box" id="infoBox">
            Click on a dot to see details.
        </div>
        <div id="map">
            <img src="./images/Sri Lanka Satellite Map.png" alt="Map" style="width: 100%; height: auto;">
            <!-- Example dots -->
            <div class="dot" style="top: 30%; left: 40%;" 
                 data-info="Location 1: Details about this point" 
                 data-image="images/Nainital.png"></div>
            <div class="dot" style="top: 50%; left: 60%;" 
                 data-info="Location 2: Details about this point" 
                 data-image="images/des_2.png"></div>
            <div class="dot" style="top: 70%; left: 30%;" 
                 data-info="Location 3: Details about this point" 
                 data-image="location3.jpg"></div>
        </div>
        <div class="hover-image" id="hoverImage"></div>
      </div>
    </section>

    <footer>
        <h1>hi</h1>
    </footer>

    <script src="./script.js"></script>
</body>
</html>