<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./home_page.css">
    <link href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css" rel="stylesheet">
</head>
<body>
    <?php require 'navigation.html'; ?>
    <!-- Hero Section -->
    <header class="hero-section">
        <p>“Discover Sri Lanka: <br> Paradise Awaits You”.</p>
        <button><b><a href="./plan_your_trip.php">Plain Your Trip</a></b></button>
        <img src="./images/home_hero.png" alt="Delicious Food" class="hero-image">
    </header>

    <!-- About Srilanka -->
    <section class="about-srilanka">
        <h1 data-aos="fade-down" data-aos-duration="1500">About Sri Lanka</h1>
        <p data-aos="fade-down" data-aos-duration="1500">Sri Lanka, an island paradise in the Indian Ocean, is renowned for its rich history, diverse culture, and breathtaking <br> landscapes. From ancient temples and stunning beaches to lush tea plantations and vibrant wildlife, the island offers a <br> perfect blend of nature and tradition. Explore the bustling streets of Colombo, hike through the scenic hill country, or visit <br> UNESCO World Heritage sites like Sigiriya and Anuradhapura. Sri Lanka is also famous for its delicious cuisine, warm <br> hospitality, and colorful festivals. Whether you're seeking adventure, relaxation, or cultural immersion, Sri Lanka promises <br> an unforgettable experience for every traveler.
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
        <div class="image-gallery" data-aos="fade-right" data-aos-duration="1500">
            <img src="./images/home-act1.png" alt="Surfing" class="gallery-img1">
            <img src="./images/home-act-3.png" alt="Bonfire" class="gallery-img2">
            <img src="./images/home-act-2.png" alt="Hiking" class="gallery-img3">
        </div>
        <div class="text-box" data-aos="fade-left" data-aos-duration="1500">
            <h1>"Unleash Your Adventurous Spirit in Sri Lanka"</h1>
            <p>Experience thrilling adventures in Sri Lanka with wild and sea safaris, boat rides, surfing, rope jumping, balloon tows, diving, camping, and bonfires. Discover an unforgettable blend of adrenaline and nature in this tropical paradise.</p>
        </div>
     </div>
     <div class="container">
        <div class="text-box" data-aos="fade-right" data-aos-duration="1500">
            <h1>"Rejuvenate Your Body and Soul in Sri Lanka"</h1>
            <p>Indulge in ultimate relaxation with Sri Lanka's tranquil spas, revitalizing yoga sessions, traditional Ayurveda treatments, and soothing fish therapy. Embrace serenity and holistic wellness amidst the island's natural beauty, leaving you refreshed and recharged.</p>
        </div>
        <div class="image-gallery" data-aos="fade-left" data-aos-duration="1500">
            <img src="./images/hom-act-4.png" alt="Surfing" class="gallery-ig1">
            <img src="./images/home-act-5.png" alt="Bonfire" class="gallery-ig2">
            <img src="./images/home-act-6.png" alt="Hiking" class="gallery-ig3">
        </div>
     </div>
     <div class="container">
        <div class="image-gallery" data-aos="fade-right" data-aos-duration="1500">
            <img src="./images/home-act-7.png" alt="Surfing" class="gallery-img1">
            <img src="./images/home-act-8.png" alt="Bonfire" class="gallery-img2">
            <img src="./images/home-act-9.png" alt="Hiking" class="gallery-img3">
        </div>
        <div class="text-box" data-aos="fade-left" data-aos-duration="1500">
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
            <div class="dot" style="top: 40%; left: 40%;" 
                 data-info="Sigiriya: Details about this point" 
                 data-image="images/map/sigiriya.jpg"></div>
            <div class="dot" style="top: 65%; left: 68%;" 
                 data-info="Badulla: Details about this point" 
                 data-image="images/map/ella.jpg"></div>
            <div class="dot" style="top: 72%; left: 15%;" 
                 data-info="Colombo: Details about this point" 
                 data-image="images/map/colombo.jpg"></div>
            <div class="dot" style="top: 70%; left: 92%;" 
                 data-info="Arugam Bay beach: Details about this point" 
                 data-image="images/map/afrugambe.jpg"></div>
            <div class="dot" style="top: 94.5%; left: 52%;" 
                 data-info="Mirissa: Details about this point" 
                 data-image="images/map/mirissa.jpg"></div>
            <div class="dot" style="top: 96.5%; left: 35%;" 
                 data-info="Gall forest: Details about this point" 
                 data-image="images/map/galle.jpg"></div>
            <div class="dot" style="top: 42%; left: 8%;" 
                 data-info="Kalpitiya: Details about this point" 
                 data-image="images/map/kalpitiya.jpg"></div>
            <div class="dot" style="top: 72%; left: 55%;" 
                 data-info="Nuwara Eliya: Details about this point" 
                 data-image="images/map/nuwaraeliya.jpg"></div>
            <div class="dot" style="top: 4%; left: 20%;" 
                 data-info="Jafna: Details about this point" 
                 data-image="images/map/jafna.jpg"></div>
            <div class="dot" style="top: 68%; left: 44%;" 
                 data-info="Kandy: Details about this point" 
                 data-image="images/map/kandy.jpg"></div>
        </div>
        <div class="hover-image" id="hoverImage"></div>
      </div>
    </section>

    <section class="festival-section">
        <h1>“Celebrate the Spirit of Sri Lanka”</h1>
        <p> Mark your calendar! Experience vibrant festivals, cultural celebrations, and seasonal wonders like whale watching or the <br> Vesak Lantern Festival. Sri Lanka is alive with events to inspire your journey.</p>

        <div class="event-table">
            <div id="eventContainer" class="event-container"></div>
        </div>
    </section>

    <section class="blog-section">
        <h1>“Your Gateway to Inspiration”</h1>
        <div id="blog-container"></div>
    </section>

    <section class="confidence-section">
        <h1>“Plan with Ease, Travel with Confidence”</h1>
        <p>Your ultimate travel companion is here! Find practical tips, itineraries, and insider advice to make your Sri Lankan <br> journey seamless and stress-free.</p>
        <div class="confidence-details">
            <div class="confidence-card">
                <h2>Have best travel giders</h2>
                <p>"Embark on unforgettable adventures with our expert travel guides! Our company ensures personalized experiences, insider tips, and seamless journeys to Sri Lanka's most breathtaking destinations. From hidden gems to iconic landmarks, we make every trip extraordinary. Trust us for exceptional travel guidance and memories that last a lifetime!"</p>
            </div>
            <div class="confidence-card">
                <h2>Best,Security and Safty</h2>
                <p>"Your safety is our top priority! We provide the best security measures and expert guidance for a worry-free travel experience. With local knowledge, trusted partners, and 24/7 support, explore Sri Lanka with confidence, knowing you’re in the safest hands throughout your journey."</p>
            </div>
            <div class="confidence-card">
                <h2>Choice your Vehical</h2>
                <p>"Travel your way with our diverse vehicle options! Choose from comfortable cars, spacious vans, or rugged 4x4s to suit your adventure. Whether it's city tours, mountain treks, or wildlife safaris, we ensure a smooth and stylish ride for every journey."</p>
            </div>
            <div class="confidence-card">
                <h2>Clean Hotel</h2>
                <p>"Stay in the comfort of clean, well-maintained hotels with our carefully curated selections. Enjoy spotless rooms, modern amenities, and exceptional hospitality. Whether in bustling cities or serene landscapes, your accommodation guarantees a hygienic and relaxing retreat after a day of adventure."</p>
            </div>
        </div>
    </section>
    <?php include 'footer.php'; ?>
    <script src="./script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
    <script src="./animation.js"></script>
</body>
</html>