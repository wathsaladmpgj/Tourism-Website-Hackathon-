<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./benifit.css">
</head>
<body>
    <?php require 'navigation.html'; ?>
    <section class="hero-section">
        <h1>"Exclusive Benefits for Our Travelers"</h1>
        <p>"When you join our guided tours, you don’t just explore Sri Lanka—you unlock a world of exclusive <br> perks, from stunning image collections to special discounts at partner shops and hotels."</p>
        <img src="./images/benifi_hed.png" alt="Delicious Food" class="hero-image">
    </section>

    <section class="benifit-cards">
        <div class="benifit-card1">
            <img src="./images/benifit-d1.png" alt="">
            <div>
                <h2>Beautiful Image Collection</h2>
                <p>"Relive your adventure with our professionally curated image collection from the destinations you visit. This web-based gallery features breathtaking photos of cultural sites, natural wonders, and iconic moments of your journey."</p>
            </div>
        </div>

        <div class="benifit-card2">
            <img src="./images/benifit-d2.png" alt="">
            <div>
                <h2>Exclusive Partner Discounts</h2>
                <p>"Enjoy exclusive discounts at shops and hotels through our trusted partners. From souvenirs to luxury stays, your tour ID unlocks incredible deals."</p>
            </div>
        </div>

        <div class="benifit-card3">
            <div>
                <h2>Human Guide Expertise</h2>
                <p>"Our experienced guides bring Sri Lanka to life with their rich storytelling and local knowledge. Enjoy personalized attention and exclusive insights at every stop."</p>
            </div>
            <img src="./images/benifit-d1.png" alt="">
        </div>

        <div class="benifit-card4">
            <div>
                <h2>Priority Service and Support</h2>
                <p>"Travel worry-free with our 24/7 customer support and priority assistance for all tour-related needs."</p>
            </div>
            <img src="./images/benifit-d4.png" alt="">
        </div>
    </section>

    <section class="blog-section">
    <h2>Now Available Partner Discounts</h2>
    <div class="blogs">
        <?php
        // Database connection
        $conn = new mysqli('localhost', 'root', '', 'tour_database');

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Fetch blog posts from the database
        $sql = "SELECT image FROM blog_images ORDER BY created_at DESC";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // Display each blog
            while ($row = $result->fetch_assoc()) {
                echo '<div class="blog">';
                if (!empty($row['image'])) {
                    echo '<img src="' . htmlspecialchars($row['image']) . '" alt="Blog Image">';
                }
                echo '</div>';
            }
        } else {
            echo '<p>No blogs available at the moment. Please check back later!</p>';
        }

        // Close the connection
        $conn->close();
        ?>
    </div>
</section>


    <section class="details-section">
        <h2>Ordering and ID Usage Details</h2>
        <div class="use-details">
            <div class="details">
                <h3>1 How to Order</h3>
                <p>"Booking your tour is simple! Choose your preferred tour, submit your details, and receive your exclusive ID upon confirmation."</p>
                <p><b>A step-by-step guide with icons:</b></p>
                <ul>
                    <li>Select a tour.</li>
                    <li>Fill out the booking form.</li>
                    <li>Receive your tour confirmation and ID.</li>
                </ul>
            </div>
            <div class="details">
                <h3>2 Using Your ID for Benefits</h3>
                <p>"Show your tour ID at partner locations to unlock discounts and perks. It’s your key to an elevated travel experience!"</p>
            </div>
        </div>
    </section>

    <?php include("./footer.php") ?>
</body>
</html>