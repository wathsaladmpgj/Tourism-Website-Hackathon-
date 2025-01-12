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
        <img src="./images/desti4_head.png" alt="Travel Route Map" class="map-image">

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
        <h2>"Explore the Timeless Beauty of Sri Lanka's Cultural Heritage"</h2>
        <p>Immerse yourself in the rich cultural heritage of Sri Lanka, where ancient temples and kovils stand as majestic testaments to the <br> island's spiritual history. Discover the artistry of traditional wood carvings and vibrant masks, reflecting the island's deep-rooted <br> craftsmanship. Experience the perfect blend of history, art, and culture, making Sri Lanka a must-visit destination for cultural <br> enthusiasts.</p>
    </div>
    <div class="timeline-container">
        <!-- Timeline item 1 -->
        <div class="timeline-item">
            <div class="timeline-content">
                <div class="timeline-title">Temple</div>
                <div class="timeline-text">
                  "Sri Lanka’s temples, like the iconic Temple of the Tooth in Kandy and Dambulla Cave Temple, showcase stunning architecture and spiritual significance. Explore these sacred sites to witness intricate carvings, serene rituals, and centuries-old traditions."
                </div>
            </div>
            <div class="timeline-line"></div>
            <div class="timeline-dot"></div>
            <div class="timeline-image">
                <img src="./images/desti_4_time1.png" alt="Sustainability">
            </div>
        </div>

        <!-- Timeline item 2 -->
        <div class="timeline-item">
            <div class="timeline-content">
                <div class="timeline-title">Heritage</div>
                <div class="timeline-text">
                  "Sri Lanka’s cultural heritage is a treasure trove of ancient cities, iconic landmarks, and UNESCO World Heritage Sites. From Sigiriya Rock Fortress to Polonnaruwa’s ruins, each site tells a fascinating story of the island’s history."
                </div>
            </div>
            <div class="timeline-line"></div>
            <div class="timeline-dot"></div>
            <div class="timeline-image">
                <img src="./images/desti_4_time2.png" alt="Strategy">
            </div>
        </div>

        <!-- Timeline item 3 -->
        <div class="timeline-item">
            <div class="timeline-content">
                <div class="timeline-title">Tower</div>
                <div class="timeline-text">
                  "Sri Lanka’s towers, such as the Lotus Tower in Colombo, offer breathtaking panoramic views and unique architectural designs. These landmarks combine cultural symbolism with modern aesthetics, creating memorable experiences for visitors."
                </div>
            </div>
            <div class="timeline-line"></div>
            <div class="timeline-dot"></div>
            <div class="timeline-image">
                <img src="./images/desti_4_time3.png" alt="Metrics">
            </div>
        </div>
        <div class="timeline-item">
            <div class="timeline-content">
                <div class="timeline-title">Traditional industries</div>
                <div class="timeline-text">
                  "Experience Sri Lanka’s traditional industries, from batik making and pottery to tea production. These timeless crafts reflect the island’s rich culture, offering travelers a glimpse into the artistry and heritage of local communities."
                </div>
            </div>
            <div class="timeline-line"></div>
            <div class="timeline-dot"></div>
            <div class="timeline-image">
                <img src="./images/desti_4_time4.png" alt="Metrics">
            </div>
        </div>
    </div>

    <div class="collage">
        <div class="flip-card" onclick="flipCard(this)">
            <div class="flip-card-inner">
              <div class="flip-card-front">
                <img src="./images/desti_4_cl1.png" alt="">
              </div>
              <div class="flip-card-back">
                <p>Content for Image 1</p>
              </div>
            </div>
        </div>
        <div class="flip-card" onclick="flipCard(this)">
            <div class="flip-card-inner">
              <div class="flip-card-front">
                <img src="./images/desti_4_cl2.png" alt="">
              </div>
              <div class="flip-card-back">
                <p>Content for Image 1</p>
              </div>
            </div>
        </div>
        <div class="flip-card" onclick="flipCard(this)">
            <div class="flip-card-inner">
              <div class="flip-card-front">
                <img src="./images/desti_4_cl3.png" alt="">
              </div>
              <div class="flip-card-back">
                <p>Content for Image 1</p>
              </div>
            </div>
        </div>
        <div class="flip-card" onclick="flipCard(this)">
            <div class="flip-card-inner">
              <div class="flip-card-front">
                <img src="./images/desti_4_cl4.png" alt="">
              </div>
              <div class="flip-card-back">
                <p>Content for Image 1</p>
              </div>
            </div>
        </div>
        <div class="flip-card" onclick="flipCard(this)">
            <div class="flip-card-inner">
              <div class="flip-card-front">
                <img src="./images/desti_4_cl5.png" alt="">
              </div>
              <div class="flip-card-back">
                <p>Content for Image 1</p>
              </div>
            </div>
        </div>
        <div class="flip-card" onclick="flipCard(this)">
            <div class="flip-card-inner">
              <div class="flip-card-front">
                <img src="./images/desti_4_cl6.png" alt="">
              </div>
              <div class="flip-card-back">
                <p>Content for Image 1</p>
              </div>
            </div>
        </div>
        <div class="flip-card" onclick="flipCard(this)">
            <div class="flip-card-inner">
              <div class="flip-card-front">
                <img src="./images/desti_4_cl7.png" alt="">
              </div>
              <div class="flip-card-back">
                <p>Content for Image 1</p>
              </div>
            </div>
        </div>
        <div class="flip-card" onclick="flipCard(this)">
            <div class="flip-card-inner">
              <div class="flip-card-front">
                <img src="./images/desti_4_cl8.png" alt="">
              </div>
              <div class="flip-card-back">
                <p>Content for Image 1</p>
              </div>
            </div>
        </div>
        <div class="flip-card" onclick="flipCard(this)">
            <div class="flip-card-inner">
              <div class="flip-card-front">
                <img src="./images/desti_4_cl9.png" alt="">
              </div>
              <div class="flip-card-back">
                <p>Content for Image 1</p>
              </div>
            </div>
        </div>
        <div class="flip-card" onclick="flipCard(this)">
            <div class="flip-card-inner">
              <div class="flip-card-front">
                <img src="./images/desti_4_cl11.png" alt="">
              </div>
              <div class="flip-card-back">
                <p>Content for Image 1</p>
              </div>
            </div>
        </div>
        <img src="./images/desti_4_cl11.png" alt="">
        
    </div>

    <div class="container2">
        <h1 class="main-heading">Iconic Landmarks</h1>
        <div class="landmark">
            <img src="./images/desti_4_dl1.png" alt="Horton Plains" class="landmark-image">
            <div class="landmarl-text">
                <h2>Sigiriya</h2>
                <p>
                  "Sigiriya, the Lion Rock, is a UNESCO World Heritage Site and one of Sri Lanka’s most iconic landmarks. Rising 660 feet above the surrounding plains, this ancient rock fortress showcases impressive frescoes, landscaped gardens, and intricate engineering from the 5th century. Climbing to the summit rewards visitors with panoramic views and the remains of King Kashyapa’s royal palace. Sigiriya is a masterpiece of art, history, and ingenuity, blending natural beauty with ancient architectural brilliance. Surrounded by lush greenery and cultural intrigue, it remains a must-visit destination for history buffs and adventurers alike."
                </p>
            </div>
            
        </div>
        <div class="landmark">
            <div class="landmarl-text">
                <h2>Temple of the Tooth(Sri Dalada Maligawa)</h2>
                <p>
                  "The Temple of the Tooth, located in Kandy, is Sri Lanka’s most sacred Buddhist shrine. Housing the revered relic of Lord Buddha’s tooth, this UNESCO World Heritage Site is a spiritual and cultural marvel. Visitors can witness daily rituals, elaborate architecture, and beautiful carvings that reflect Sri Lanka’s rich Buddhist heritage. The temple also hosts the grand Esala Perahera festival, a vibrant celebration of music, dance, and devotion. Surrounded by the serene Kandy Lake, the Temple of the Tooth is a symbol of faith and a treasure trove of history and spirituality for travelers."
                </p>
            </div>
            <img src="./images/desti_4_dl2.png" alt="Nine Arch Bridge" class="landmark-image">
        </div>
        <div class="landmark">
            <img src="./images/desti_4_dl3.png" alt="Adam's Peak" class="landmark-image">
            <div class="landmarl-text">
                <h2>Galle Fort</h2>
                <p>
                  "Galle Fort, a UNESCO World Heritage Site, is a charming blend of history and culture on Sri Lanka’s southern coast. Built by the Portuguese and later expanded by the Dutch, the fort features cobblestone streets, colonial buildings, and ancient ramparts. Visitors can explore museums, boutique shops, and quaint cafes within the fort’s walls. Overlooking the ocean, the fort offers stunning sunsets and a sense of timeless beauty. Galle Fort’s unique atmosphere, where past and present intertwine, makes it a must-visit destination for history enthusiasts and wanderers alike."
                </p>
            </div> 
        </div>
    </div>

    <?php require 'footer.php'; ?>
    <script src="./script.js"></script>
</body>
</html>