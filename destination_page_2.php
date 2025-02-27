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
        <img src="./images/desti_2_head.png" alt="Travel Route Map" class="map-image">

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
        <h2> "Dive into Sri Lanka’s Coastal Paradise"</h2>
        <p>"Sri Lanka’s beachside paradise offers something for every traveler. Snorkel through vibrant coral reefs, explore secluded islands, and <br> marvel at the colorful marine life during fish-watching adventures. With golden sands, turquoise waters, and stunning sunsets, these <br> beautiful beaches—from Mirissa to Trincomalee—are perfect for relaxation, water sports, and creating unforgettable memories along <br> the Indian Ocean coastline."</p>
    </div>
    <div class="timeline-container">
        <!-- Timeline item 1 -->
        <div class="timeline-item">
            <div class="timeline-content">
                <div class="timeline-title">Coral</div>
                <div class="timeline-text">
                    "Sri Lanka’s coral reefs are a vibrant underwater wonder, teeming with life and color. Snorkel or dive to discover these ecosystems, home to dazzling fish, sea turtles, and other marine species. From Pigeon Island’s reefs to the coral gardens of Hikkaduwa, these breathtaking natural formations offer a magical glimpse into the ocean’s hidden beauty."
                </div>
            </div>
            <div class="timeline-line"></div>
            <div class="timeline-dot"></div>
            <div class="timeline-image">
                <img src="./images/desti_2_time1.png" alt="Sustainability">
            </div>
        </div>

        <!-- Timeline item 2 -->
        <div class="timeline-item">
            <div class="timeline-content">
                <div class="timeline-title">Islands</div>
                <div class="timeline-text">
                    "Sri Lanka is home to some of the most enchanting waterfalls in the world, nestled within its lush forests and misty hills. From the towering Bambarakanda Falls, the highest in the country, to the picturesque Diyaluma and Ravana Falls, these cascades offer breathtaking views and serene escapes into nature."
                </div>
            </div>
            <div class="timeline-line"></div>
            <div class="timeline-dot"></div>
            <div class="timeline-image">
                <img src="./images/desti_2_time2.png" alt="Strategy">
            </div>
        </div>

        <!-- Timeline item 3 -->
        <div class="timeline-item">
            <div class="timeline-content">
                <div class="timeline-title">Fish Watching</div>
                <div class="timeline-text">
                    "Sri Lanka’s offshore islands are hidden treasures waiting to be explored. Pigeon Island offers stunning coral reefs, Delft Island boasts unique landscapes and Dutch history, and Mannar charms with its birdlife. Each island provides a distinct experience, blending natural beauty with cultural intrigue, making them a fascinating addition to any Sri Lankan adventure."
                </div>
            </div>
            <div class="timeline-line"></div>
            <div class="timeline-dot"></div>
            <div class="timeline-image">
                <img src="./images/desti_2_time2.png" alt="Metrics">
            </div>
        </div>
        <div class="timeline-item">
            <div class="timeline-content">
                <div class="timeline-title">Beautifu Beach</div>
                <div class="timeline-text">
                    "Sri Lanka’s beaches are a paradise of golden sands, swaying palms, and turquoise waters. Perfect for relaxation, swimming, or water sports, these coastal gems—like Mirissa, Unawatuna, and Nilaveli—offer stunning views and serene escapes. Whether you seek adventure or tranquility, the island’s beaches cater to every traveler’s dream."
                </div>
            </div>
            <div class="timeline-line"></div>
            <div class="timeline-dot"></div>
            <div class="timeline-image">
                <img src="./images/desti_2_time3.png" alt="Metrics">
            </div>
        </div>
    </div>

    <div class="collage">
        <div class="flip-card" onclick="flipCard(this)">
            <div class="flip-card-inner">
              <div class="flip-card-front">
                <img src="./images/desti_2_cl1.png" alt="">
              </div>
              <div class="flip-card-back">
                <p>Content for Image 1</p>
              </div>
            </div>
        </div>
        <div class="flip-card" onclick="flipCard(this)">
            <div class="flip-card-inner">
              <div class="flip-card-front">
                <img src="./images/desti_2_cl2.png" alt="">
              </div>
              <div class="flip-card-back">
                <p>Content for Image 1</p>
              </div>
            </div>
        </div>
        <div class="flip-card" onclick="flipCard(this)">
            <div class="flip-card-inner">
              <div class="flip-card-front">
                <img src="./images/desti_2_cl3.png" alt="">
              </div>
              <div class="flip-card-back">
                <p>Content for Image 1</p>
              </div>
            </div>
        </div>
        <div class="flip-card" onclick="flipCard(this)">
            <div class="flip-card-inner">
              <div class="flip-card-front">
                <img src="./images/desti_2_cl4.png" alt="">
              </div>
              <div class="flip-card-back">
                <p>Content for Image 1</p>
              </div>
            </div>
        </div>
        <div class="flip-card" onclick="flipCard(this)">
            <div class="flip-card-inner">
              <div class="flip-card-front">
                <img src="./images/desti_2_cl5.png" alt="">
              </div>
              <div class="flip-card-back">
                <p>Content for Image 1</p>
              </div>
            </div>
        </div>
        <div class="flip-card" onclick="flipCard(this)">
            <div class="flip-card-inner">
              <div class="flip-card-front">
                <img src="./images/desti_2_cl6.png" alt="">
              </div>
              <div class="flip-card-back">
                <p>Content for Image 1</p>
              </div>
            </div>
        </div>
        <div class="flip-card" onclick="flipCard(this)">
            <div class="flip-card-inner">
              <div class="flip-card-front">
                <img src="./images/desti_2_cl7.png" alt="">
              </div>
              <div class="flip-card-back">
                <p>Content for Image 1</p>
              </div>
            </div>
        </div>
        <div class="flip-card" onclick="flipCard(this)">
            <div class="flip-card-inner">
              <div class="flip-card-front">
                <img src="./images/desti_2_cl8.png" alt="">
              </div>
              <div class="flip-card-back">
                <p>Content for Image 1</p>
              </div>
            </div>
        </div>
        <div class="flip-card" onclick="flipCard(this)">
            <div class="flip-card-inner">
              <div class="flip-card-front">
                <img src="./images/desti_2_cl9.png" alt="">
              </div>
              <div class="flip-card-back">
                <p>Content for Image 1</p>
              </div>
            </div>
        </div>
        <div class="flip-card" onclick="flipCard(this)">
            <div class="flip-card-inner">
              <div class="flip-card-front">
                <img src="./images/desti_2_cl10.png" alt="">
              </div>
              <div class="flip-card-back">
                <p>Content for Image 1</p>
              </div>
            </div>
        </div>
        <img src="./images/desti_2_cl11.png" alt="">
        
    </div>

    <div class="container2">
        <h1 class="main-heading">Iconic Landmark</h1>
        <div class="landmark">
            <img src="./images/desti_2_dl1.png" alt="Horton Plains" class="landmark-image">
            <div class="landmarl-text">
                <h2>Weligama Natural Pool</h2>
                <p>
                    "Weligama’s natural pool is a serene haven where the ocean’s waves create a calm and crystal-clear swimming area, ideal for relaxation and safe for all ages. Surrounded by the picturesque Weligama coastline, this unique spot offers tranquil waters perfect for a refreshing dip or snorkeling. The natural rock formations protect the pool, making it an inviting escape for those seeking peace and a connection to nature. With its stunning views and gentle ambiance, the Weligama natural pool is a hidden gem that captures the charm and beauty of Sri Lanka’s southern coast."
                </p>
            </div>
            
        </div>
        <div class="landmark">
            <div class="landmarl-text">
                <h2>Hikkaduwa Corral</h2>
                <p>
                    "Hikkaduwa’s coral reefs are a vibrant underwater paradise, renowned for their stunning marine biodiversity. Located on Sri Lanka’s southwestern coast, these reefs are ideal for snorkeling and diving, allowing visitors to explore colorful corals, exotic fish, and even sea turtles. The shallow waters make it accessible for all, offering a safe and enchanting experience. Hikkaduwa’s coral gardens are a testament to nature’s artistry, providing an up-close glimpse of Sri Lanka’s marine treasures. Whether you’re an avid diver or a curious traveler, these reefs promise an unforgettable journey beneath the waves."
                </p>
            </div>
            <img src="./images/desti_2_dl2.png" alt="Nine Arch Bridge" class="landmark-image">
        </div>
        <div class="landmark">
            <img src="./images/desti_2_dl3.png" alt="Adam's Peak" class="landmark-image">
            <div class="landmarl-text">
                <h2>Hiriketiya Beach</h2>
                <p>
                    "Hiriketiya Beach, also known as 'Hiri,' is a hidden paradise nestled on Sri Lanka’s southern coast. This horseshoe-shaped bay is famous for its crystal-clear waters, golden sands, and laid-back vibe. Perfect for surfing, swimming, or simply relaxing, Hiriketiya caters to adventurers and tranquility seekers alike. Lush palm trees frame the beach, adding to its tropical charm. With its mix of local cafes, yoga retreats, and vibrant marine life, Hiriketiya offers a unique blend of excitement and serenity, making it a must-visit destination for travelers exploring Sri Lanka’s coastal wonders."
                </p>
            </div> 
        </div>
    </div>

    <?php require 'footer.php'; ?>
    <script src="./script.js"></script>
</body>
</html>