<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="./destination.css">
    <link rel="stylesheet" href="./nav_fotter.css">
</head>
<body>
    <!-- Navigation Bar -->
    <div class="map-container">
    <?php require 'navigation.html'; ?>
        <img src="./images/desc1_head.png" alt="Travel Route Map" class="map-image">

        <svg class="route-overlay" viewBox="0 0 100 100" preserveAspectRatio="none">
            <!-- Winding path from Delhi to Manali -->
            <path d="M 15 70 C 20 50, 25 41, 30 40 S 35 35, 40 45" 
                  stroke="white" 
                  stroke-width="1.5" 
                  stroke-dasharray="2,2" 
                  fill="none"/>
            
            <!-- Winding path from Manali to Kasol -->
            <path d="M 40 45 C 45 50, 43 60, 52 65 S 58 49, 70 48" 
                  stroke="white" 
                  stroke-width="1.5" 
                  stroke-dasharray="2,2" 
                  fill="none"/>
            
            <!-- Winding path from Kasol to Kheerganga -->
            <path d="M 70 48 C 73 49, 77 50, 79 51 S 83 52, 90 30" 
                  stroke="white" 
                  stroke-width="1.5" 
                  stroke-dasharray="2,2" 
                  fill="none"/>
        </svg>

        <div class="location-point" style="left: 15%; top: 70%;" data-location="Hillcountry"><a href="./destination_page_1.php">HillCountry</a></div>
        <div class="location-point" style="left: 40%; top: 45%;" data-location="Beaches"><a href="./destination_page_2.php">Beaches</a></div>
        <div class="location-point" style="left: 70%; top: 48%;" data-location="Wildlife and nature"><a href="./destination_page_3.php">WildLife&Nature</a></div>
        <div class="location-point" style="left: 90%; top: 30%;" data-location="Cultrul"><a href="./destination_page_4.php">Cultrul</a></div>
      </div>

    <div class="head_text">
        <h2>"Escape to Sri Lanka’s Misty Highlands: Where <br> Nature Meets Serenity"</h2>
        <p>"Nestled in the heart of Sri Lanka, the hill country is a haven of mist-clad mountains, cascading waterfalls, and lush tea plantations. <br> From the scenic train rides of Ella to the tranquil charm of Nuwara Eliya, the region offers a refreshing escape into nature. Whether <br> you’re hiking through verdant trails, sipping freshly brewed Ceylon tea, or marveling at colonial architecture, the hill country captivates <br> with its timeless beauty. Explore iconic landmarks like Horton Plains, Adam’s Peak, and the enchanting Nine Arches Bridge. Let the cool <br> mountain breeze guide you to an unforgettable adventure."</p>
    </div>
    <div class="timeline-container">
        <!-- Timeline item 1 -->
        <div class="timeline-item">
            <div class="timeline-content">
                <div class="timeline-title">Lush Tea Plantation</div>
                <div class="timeline-text">
                    "Explore Sri Lanka’s lush tea plantations, where rolling emerald hills and crisp mountain air create a serene escape. From the world-famous Ceylon tea fields of Nuwara Eliya to the scenic estates in Ella, immerse yourself in the art of tea-making with guided tours, tastings, and breathtaking views."
                </div>
            </div>
            <div class="timeline-line"></div>
            <div class="timeline-dot"></div>
            <div class="timeline-image">
                <img src="./images/des_1.png" alt="Sustainability">
            </div>
        </div>

        <!-- Timeline item 2 -->
        <div class="timeline-item">
            <div class="timeline-content">
                <div class="timeline-title">Cascading Waterfalls</div>
                <div class="timeline-text">
                    "Sri Lanka is home to some of the most enchanting waterfalls in the world, nestled within its lush forests and misty hills. From the towering Bambarakanda Falls, the highest in the country, to the picturesque Diyaluma and Ravana Falls, these cascades offer breathtaking views and serene escapes into nature."
                </div>
            </div>
            <div class="timeline-line"></div>
            <div class="timeline-dot"></div>
            <div class="timeline-image">
                <img src="./images/des_2.png" alt="Strategy">
            </div>
        </div>

        <!-- Timeline item 3 -->
        <div class="timeline-item">
            <div class="timeline-content">
                <div class="timeline-title">Mist-Clad Mountains</div>
                <div class="timeline-text">
                    "Sri Lanka’s mist-covered mountains offer a magical escape into nature’s tranquility. From the rolling hills of Ella to the lush peaks of Nuwara Eliya, these misty highlands are a haven of tea plantations, cascading waterfalls, and cool breezes, perfect for hiking and relaxation."
                </div>
            </div>
            <div class="timeline-line"></div>
            <div class="timeline-dot"></div>
            <div class="timeline-image">
                <img src="./images/des_3.png" alt="Metrics">
            </div>
        </div>
        <div class="timeline-item">
            <div class="timeline-content">
                <div class="timeline-title">Train View</div>
                <div class="timeline-text">
                    "Sri Lanka’s train journeys are a feast for the senses, offering breathtaking views of lush tea plantations, misty mountains, and charming villages. The iconic ride from Kandy to Ella is a must-experience adventure, where every turn reveals a new scenic wonder."
                </div>
            </div>
            <div class="timeline-line"></div>
            <div class="timeline-dot"></div>
            <div class="timeline-image">
                <img src="./images/des_4.png" alt="Metrics">
            </div>
        </div>
    </div>

    <div class="collage">
        <div class="flip-card" onclick="flipCard(this)">
            <div class="flip-card-inner">
              <div class="flip-card-front">
                <img src="./images/kkk.png" alt="">
              </div>
              <div class="flip-card-back">
                <p>Content for Image 1</p>
              </div>
            </div>
        </div>
        <div class="flip-card" onclick="flipCard(this)">
            <div class="flip-card-inner">
              <div class="flip-card-front">
                <img src="./images/desc4.png" alt="">
              </div>
              <div class="flip-card-back">
                <p>Content for Image 1</p>
              </div>
            </div>
        </div>
        <div class="flip-card" onclick="flipCard(this)">
            <div class="flip-card-inner">
              <div class="flip-card-front">
                <img src="./images/desc5.png" alt="">
              </div>
              <div class="flip-card-back">
                <p>Content for Image 1</p>
              </div>
            </div>
        </div>
        <div class="flip-card" onclick="flipCard(this)">
            <div class="flip-card-inner">
              <div class="flip-card-front">
                <img src="./images/Bomburu Ella, Sri Lanka.png" alt="">
              </div>
              <div class="flip-card-back">
                <p>Content for Image 1</p>
              </div>
            </div>
        </div>
        <div class="flip-card" onclick="flipCard(this)">
            <div class="flip-card-inner">
              <div class="flip-card-front">
                <img src="./images/Nainital.png" alt="">
              </div>
              <div class="flip-card-back">
                <p>Content for Image 1</p>
              </div>
            </div>
        </div>
        <div class="flip-card" onclick="flipCard(this)">
            <div class="flip-card-inner">
              <div class="flip-card-front">
                <img src="./images/Watawala, Sri Lanka.png" alt="">
              </div>
              <div class="flip-card-back">
                <p>Content for Image 1</p>
              </div>
            </div>
        </div>
        <div class="flip-card" onclick="flipCard(this)">
            <div class="flip-card-inner">
              <div class="flip-card-front">
                <img src="./images/Baker’s Falls - Horton Plains National Park, SriLanka.png" alt="">
              </div>
              <div class="flip-card-back">
                <p>Content for Image 1</p>
              </div>
            </div>
        </div>
        <div class="flip-card" onclick="flipCard(this)">
            <div class="flip-card-inner">
              <div class="flip-card-front">
                <img src="./images/Sri Lanka Wildlife.png" alt="">
              </div>
              <div class="flip-card-back">
                <p>Content for Image 1</p>
              </div>
            </div>
        </div>
        <div class="flip-card" onclick="flipCard(this)">
            <div class="flip-card-inner">
              <div class="flip-card-front">
                <img src="./images/Knuckles Mountain Range 🇱🇰.png" alt="">
              </div>
              <div class="flip-card-back">
                <p>Content for Image 1</p>
              </div>
            </div>
        </div>
        <div class="flip-card" onclick="flipCard(this)">
            <div class="flip-card-inner">
              <div class="flip-card-front">
                <img src="./images/Narangala.png" alt="">
              </div>
              <div class="flip-card-back">
                <p>Content for Image 1</p>
              </div>
            </div>
        </div>
        <img src="./images/desc4.png" alt="">
        
    </div>

    <div class="container2">
        <h1 class="main-heading">Iconic Landmarks</h1>
        <div class="landmark">
            <img src="./images/Horton plains Nuwaraeliya sri lanka🇱🇰.png" alt="Horton Plains" class="landmark-image">
            <div class="landmarl-text">
                <h2>Horton Plains</h2>
                <p>
                   "Horton Plains National Park, a UNESCO World Heritage Site, is a breathtaking plateau located in Sri Lanka’s central highlands. Known for its rolling grasslands, misty forests, and crystal-clear streams, it’s a haven for nature lovers and trekkers. The park’s most famous attraction is World’s End, a dramatic 4000-foot sheer cliff offering panoramic views of the valley below. Visitors can also explore Baker’s Falls, a stunning waterfall surrounded by lush greenery. Home to unique flora and fauna, including the elusive Sri Lankan leopard and endemic bird species, Horton Plains promises an unforgettable journey into the island’s pristine wilderness."
                </p>
            </div>
            
        </div>
        <div class="landmark">
            <div class="landmarl-text">
                <h2>Nine Arch Bridge</h2>
                <p>
                    "The Nine Arches Bridge, also known as the 'Bridge in the Sky,' is a stunning colonial-era viaduct nestled in the misty hills of Ella, Sri Lanka. Built entirely of stone and brick without any steel, this engineering marvel stands gracefully amidst lush tea plantations and dense forests. Spanning over 90 feet, the bridge is a popular spot for photography, especially when the iconic blue train winds its way across the arches. A short hike through scenic trails leads to this architectural gem, offering visitors panoramic views and a glimpse into Sri Lanka’s rich history and natural beauty."
                </p>
            </div>
            <img src="./images/Nine Arches Bridge - Ella, SriLanka.png" alt="Nine Arch Bridge" class="landmark-image">
        </div>
        <div class="landmark">
            <img src="./images/The Sacred Climb! Adam's Peak (Sri Padaya), Sri Lanka_.png" alt="Adam's Peak" class="landmark-image">
            <div class="landmarl-text">
                <h2>Adam's Peak (Sri Pada)</h2>
                <p>
                   "Adam’s Peak, or Sri Pada, is one of Sri Lanka’s most iconic and sacred mountains, standing tall at 2,243 meters. Revered by Buddhists, Hindus, Muslims, and Christians alike, the peak is home to a mysterious footprint-shaped rock formation believed to hold spiritual significance. The climb to Adam’s Peak is a pilgrimage for many, with thousands ascending its illuminated path during the season from December to May. The reward at the summit is a breathtaking sunrise, where golden rays light up the surrounding hills and valleys. This unforgettable journey combines spiritual devotion with awe-inspiring natural beauty."
                </p>
            </div> 
        </div>
    </div>

    <?php require 'footer.php'; ?>
    <script src="./script.js"></script>
</body>
</html>