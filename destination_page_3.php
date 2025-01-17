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
        <img src="./images/desti_3_hero.png" alt="Travel Route Map" class="map-image">

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
        <h2>"Explore Sri Lanka’s Wild Wonders"</h2>
        <p>"Immerse yourself in Sri Lanka’s untamed beauty, from majestic elephants roaming in national parks to vibrant birdlife in lush <br> rainforests. Discover the rich biodiversity of Sinharaja Forest and Yala’s thrilling safaris. This island paradise invites you to experience <br> wildlife and nature at its most captivating, making every encounter unforgettable amidst breathtaking landscapes."</p>
    </div>
    <div class="timeline-container">
        <!-- Timeline item 1 -->
        <div class="timeline-item">
            <div class="timeline-content">
                <div class="timeline-title">Elephant View</div>
                <div class="timeline-text">
                    "Experience the majesty of elephants in their natural habitat in Sri Lanka’s wildlife parks like Udawalawe and Minneriya. Watch these gentle giants roam freely, bathe in waterholes, and interact in family herds, offering an unforgettable wildlife encounter."
                </div>
            </div>
            <div class="timeline-line"></div>
            <div class="timeline-dot"></div>
            <div class="timeline-image">
                <img src="./images/desti_3_time1.png" alt="Sustainability">
            </div>
        </div>

        <!-- Timeline item 2 -->
        <div class="timeline-item">
            <div class="timeline-content">
                <div class="timeline-title">Rain Forest</div>
                <div class="timeline-text">
                    "Sri Lanka’s rainforests, like the Sinharaja Forest Reserve, are lush, biodiverse havens teeming with exotic flora and fauna. Trek through dense greenery, listen to birdsong, and immerse yourself in the serene beauty of these natural wonders."
                </div>
            </div>
            <div class="timeline-line"></div>
            <div class="timeline-dot"></div>
            <div class="timeline-image">
                <img src="./images/desti_3_time2.png" alt="Strategy">
            </div>
        </div>

        <!-- Timeline item 3 -->
        <div class="timeline-item">
            <div class="timeline-content">
                <div class="timeline-title">Bird View</div>
                <div class="timeline-text">
                    "Spot vibrant birdlife in Sri Lanka’s wetlands, forests, and sanctuaries. From colorful kingfishers to rare endemics, these avian wonders make locations like Bundala and Kumana ideal for birdwatchers and nature enthusiasts."
                </div>
            </div>
            <div class="timeline-line"></div>
            <div class="timeline-dot"></div>
            <div class="timeline-image">
                <img src="./images/desti_3_time3.png" alt="Metrics">
            </div>
        </div>
    </div>

    <div class="collage">
        <div class="flip-card" onclick="flipCard(this)">
            <div class="flip-card-inner">
              <div class="flip-card-front">
                <img src="./images/desti_3_cl1.png" alt="">
              </div>
              <div class="flip-card-back">
                <p>Content for Image 1</p>
              </div>
            </div>
        </div>
        <div class="flip-card" onclick="flipCard(this)">
            <div class="flip-card-inner">
              <div class="flip-card-front">
                <img src="./images/desti_3_cl2.png" alt="">
              </div>
              <div class="flip-card-back">
                <p>Content for Image 1</p>
              </div>
            </div>
        </div>
        <div class="flip-card" onclick="flipCard(this)">
            <div class="flip-card-inner">
              <div class="flip-card-front">
                <img src="./images/desti_3_cl3.png" alt="">
              </div>
              <div class="flip-card-back">
                <p>Content for Image 1</p>
              </div>
            </div>
        </div>
        <div class="flip-card" onclick="flipCard(this)">
            <div class="flip-card-inner">
              <div class="flip-card-front">
                <img src="./images/desti_3_cl4.png" alt="">
              </div>
              <div class="flip-card-back">
                <p>Content for Image 1</p>
              </div>
            </div>
        </div>
        <div class="flip-card" onclick="flipCard(this)">
            <div class="flip-card-inner">
              <div class="flip-card-front">
                <img src="./images/desti_3_cl5.png" alt="">
              </div>
              <div class="flip-card-back">
                <p>Content for Image 1</p>
              </div>
            </div>
        </div>
        <div class="flip-card" onclick="flipCard(this)">
            <div class="flip-card-inner">
              <div class="flip-card-front">
                <img src="./images/desti_3_cl6.png" alt="">
              </div>
              <div class="flip-card-back">
                <p>Content for Image 1</p>
              </div>
            </div>
        </div>
        <div class="flip-card" onclick="flipCard(this)">
            <div class="flip-card-inner">
              <div class="flip-card-front">
                <img src="./images/desti_3_cl7.png" alt="">
              </div>
              <div class="flip-card-back">
                <p>Content for Image 1</p>
              </div>
            </div>
        </div>
        <div class="flip-card" onclick="flipCard(this)">
            <div class="flip-card-inner">
              <div class="flip-card-front">
                <img src="./images/desti_3_cl8.png" alt="">
              </div>
              <div class="flip-card-back">
                <p>Content for Image 1</p>
              </div>
            </div>
        </div>
        <div class="flip-card" onclick="flipCard(this)">
            <div class="flip-card-inner">
              <div class="flip-card-front">
                <img src="./images/desti_3_cl9.png" alt="">
              </div>
              <div class="flip-card-back">
                <p>Content for Image 1</p>
              </div>
            </div>
        </div>
        <div class="flip-card" onclick="flipCard(this)">
            <div class="flip-card-inner">
              <div class="flip-card-front">
                <img src="./images/desti_3_cl10.png" alt="">
              </div>
              <div class="flip-card-back">
                <p>Content for Image 1</p>
              </div>
            </div>
        </div>
        <img src="./images/desti_3_cl11.png" alt="">
        
    </div>

    <div class="container2">
        <h1 class="main-heading">Iconic Landmarks</h1>
        <div class="landmark">
            <img src="./images/desti_3_dl1.png" alt="Horton Plains" class="landmark-image">
            <div class="landmarl-text">
                <h2>Yala National Park</h2>
                <p>
                    "Yala National Park, Sri Lanka’s most famous wildlife reserve, is a haven for nature enthusiasts and adventurers. Known for its high leopard population, Yala offers thrilling safaris where you can also spot elephants, crocodiles, sloth bears, and colorful birds. The park’s diverse landscapes, from dense forests to open grasslands and coastal lagoons, create stunning vistas. Yala’s proximity to ancient temples and beaches adds to its allure, making it a perfect blend of nature and history. Whether you’re seeking wildlife encounters or serene escapes, Yala promises an unforgettable journey into Sri Lanka’s wilderness."
                </p>
            </div>
            
        </div>
        <div class="landmark">
            <div class="landmarl-text">
                <h2>Sinharaja Forest</h2>
                <p>
                    "Sinharaja Forest Reserve, a UNESCO World Heritage Site, is a pristine tropical rainforest teeming with biodiversity. Located in southwestern Sri Lanka, this lush paradise is home to rare and endemic species of plants, birds, and animals. Trekking through Sinharaja’s dense greenery, visitors can encounter exotic bird species, colorful butterflies, and fascinating flora. The forest’s tranquil atmosphere, with cascading streams and birdsong, offers a serene escape into nature. As Sri Lanka’s last primary rainforest, Sinharaja is a treasure trove for eco-tourists and nature lovers, preserving the island’s natural heritage in its most unspoiled form."
                </p>
            </div>
            <img src="./images/desti_3_dl2.png" alt="Nine Arch Bridge" class="landmark-image">
        </div>
        <div class="landmark">
            <img src="./images/desti_3_dl3.png" alt="Adam's Peak" class="landmark-image">
            <div class="landmarl-text">
                <h2>Kumana National Park</h2>
                <p>
                    "Kumana National Park, located on Sri Lanka’s southeastern coast, is a birdwatcher’s paradise. Renowned for its wetlands and lagoons, the park is home to vibrant bird species, including pelicans, flamingos, and herons. In addition to its avian wonders, Kumana features diverse wildlife, such as elephants, leopards, and crocodiles. The park’s tranquil setting and lush landscapes provide a peaceful retreat for nature enthusiasts. Seasonal migratory birds add to its charm, making it a must-visit destination for birdwatching and wildlife photography. Kumana’s serene beauty and rich biodiversity make it a unique and rewarding experience for all travelers."
                </p>
            </div> 
        </div>
    </div>

    <?php require 'footer.php'; ?>
    <script src="./script.js"></script>
</body>
</html>