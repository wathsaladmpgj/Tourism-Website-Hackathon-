<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog Page - Tourism Website</title>
    <!-- Import Poppins Font -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="Blog.css">
</head>
<body>
    <!-- Navigation Bar -->
     <?php include("navigation.html") ?>
    <!-- Hero Section -->
    <section class="hero">
        <h1>Explore Our Latest Blogs</h1>
        <p>Discover beautiful destinations and travel tips to make your journey unforgettable.</p>
    </section>

    <!-- About Us Section -->
    <section id="about-us" class="about-us">
        <div class="container">
            <h2>About Us</h2>
            <div class="about-content">
                <div class="about-text">
                    <p>
                        Welcome to our tourism company! We are passionate about creating unforgettable travel experiences for our customers. 
                        Whether you're looking to explore stunning destinations, indulge in delicious cuisines, or immerse yourself in diverse cultures, 
                        we've got you covered. Our mission is to inspire wanderlust and ensure your travels are seamless, exciting, and memorable.
                    </p>
                    <p>
                        Join us to discover hidden gems, breathtaking landscapes, and rich cultural heritage. Let us take you on a journey that goes 
                        beyond expectations and helps you make lifelong memories.
                    </p>
                </div>
                <div class="about-images">
                    <img src="images/Blog/about 1.png" alt="Beautiful Scenery">
                    <img src="images/Blog/about 2.jpg" alt="Tourist Adventure">
                </div>
            </div>
        </div>
    </section>

    <!-- Blog Section -->
    <section class="blog-section">
    <h2>Blogs</h2>
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

     <!-- Trending Blog Section -->
     <section id="trending-blogs" class="trending-blogs">
        <div class="container">
            <h2>Trending Blog Posts</h2>
            <div class="trending-slider">
                <div class="trending-card">
                    <img src="images/Blog/hidden gems.jpg" alt="Trending 1">
                    <h3>Hidden Gems Around the World</h3>
                    <a href="#" class="read-more">Read More</a>
                </div>
                <div class="trending-card">
                    <img src="images/Blog/Luxury Travel on a Budget.jpeg" alt="Trending 2">
                    <h3>Luxury Travel on a Budget</h3>
                    <a href="#" class="read-more">Read More</a>
                </div>
                <div class="trending-card">
                    <img src="images/Blog/Adventurous Road Trips.jpg" alt="Trending 3">
                    <h3>Adventurous Road Trips</h3>
                    <a href="#" class="read-more">Read More</a>
                </div>
                <div class="trending-card">
                    <img src="images/Blog/Top Hiking Trails in 2025.webp" alt="Trending 4">
                    <h3>Top Hiking Trails in 2025</h3>
                    <a href="#" class="read-more">Read More</a>
                </div>
                
            </div>
        </div>
    </section>

    <!-- Footer -->
  <footer class="footer">
    <div class="footer-container">
        <div class="footer-column">
            <h3>About Us</h3>
            <p>
                Welcome to our tourism website! Explore the world's most beautiful destinations, experience unique activities, and plan your dream trip today.
            </p>
        </div>
        <div class="footer-column">
            <h3>Quick Links</h3>
            <ul>
                <li><a href="#home">Home</a></li>
                <li><a href="#destination">Destination</a></li>
                <li><a href="#activities">Activities</a></li>
                <li><a href="#foods">Foods</a></li>
                <li><a href="#festival">Festival</a></li>
                <li><a href="#hotel">Hotel</a></li>
                <li><a href="#plan-trip">Plan Your Trip</a></li>
                <li><a href="#blog">Blog</a></li>
            </ul>
        </div>
        <div class="footer-column">
            <h3>Latest Posts</h3>
            <ul>
                <li><a href="#post1">10 Best Destinations for 2025</a></li>
                <li><a href="#post2">Why Travel is Good for the Soul</a></li>
                <li><a href="#post3">Top 5 Activities in Paris</a></li>
                <li><a href="#post4">Must-Try Foods in Asia</a></li>
            </ul>
        </div>
        <div class="footer-column">
            <h3>Get in Touch</h3>
            <p><strong>Email:</strong> info@tourismwebsite.com</p>
            <p><strong>Phone:</strong> +1 (123) 456-7890</p>
            <p><strong>Location:</strong> 123 Tourism Street, Adventure City</p>
            <div class="social-links">
                <a href="#">Facebook</a>
                <a href="#">Twitter</a>
                <a href="#">Instagram</a>
            </div>
        </div>
    </div>
    <div class="footer-bottom">
        <p>&copy; 2025 Tourism Website. All rights reserved.</p>
    </div>
</footer>
</body>
</html>
