<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Culinary Essentials</title>
    <link rel="stylesheet" href="./food_page.css">
    <link rel="stylesheet" href="./nav_fotter.css">
</head>
<body>
    <!-- Navigation Bar -->
    <?php require 'navigation.html'; ?>

    <!-- Hero Section -->
    <header class="hero-section">
        <img src="./images/food_hero.png" alt="Delicious Food" class="hero-image">
    </header>

    <!-- Food Categories Section -->
    <section class="food-categories">
        <div class="category">
            <img src="./images/food1.png" alt="Sea Food">
            <div class="overlay">
                <h3>Sea Food</h3>
                <a href="#" class="button">Seamore</a>
            </div>
        </div>
        <div class="category">
            <img src="./images/food2.png" alt="Street Food">
            <div class="overlay">
                <h3>Street Food</h3>
                <a href="#" class="button">Seamore</a>
            </div>
        </div>
        <div class="category">
            <img src="./images/food3.png" alt="Traditional Food">
            <div class="overlay">
                <h3>Traditional Food</h3>
                <a href="#" class="button">Seamore</a>
            </div>
        </div>
        <div class="category">
            <img src="./images/food4.png" alt="Barba">
            <div class="overlay">
                <h3>Barba</h3>
                <a href="#" class="button">Seamore</a>
            </div>
        </div>
    </section>

    <!-- Description Section -->
    <section class="description">
        <h2>“Savor the Best with These Culinary Essentials”</h2>
        <p>
            "Discover the essentials of Sri Lankan cuisine, where fresh ingredients, bold spices, 
            and traditional cooking <br> techniques come together to create unforgettable flavors. 
            From serving meals hot and clean to embracing <br> the island’s vibrant food culture, 
            every bite is a celebration of quality and care."
        </p>
    </section>

    <!-- Features Section -->
    <section class="features">
        <div class="feature-box">
            <h3>Quality Food</h3>
            <p>
                "Savor the taste of perfection with fresh, flavorful ingredients crafted into delightful dishes. 
                Our quality food ensures exceptional taste, wholesome nutrition, and a memorable culinary experience, every time."
            </p>
        </div>
        <div class="feature-box">
            <h3>Hot & Clean</h3>
            <p>
                "Enjoy food prepared with utmost care and cleanliness. From spotless kitchens to hygienic serving practices, 
                every dish is crafted to ensure freshness, safety, and a premium dining experience you can trust."
            </p>
        </div>
        <div class="feature-box">
            <h3>Easy Recipes</h3>
            <p>
                "Whip up delicious meals in no time with our easy-to-follow recipes. 
                Simple steps, minimal ingredients, and maximum flavor make cooking a breeze for everyone, from beginners to seasoned chefs."
            </p>
        </div>
    </section>
    <section class="admission">
        <h2>Various Admissions</h2>
        <div class="food-admission">
            <div class="fd-admission-card">
                <h3>"Floating Flavors"</h3>
                <img src="./images/food-ad-1.png" alt="">
                <p>Enjoy a floating feast as you glide along serene rivers or tranquil lagoons. Relish freshly caught seafood or traditional dishes served aboard, surrounded by nature’s beauty.</p>
                <h4>Madu River Boat Safari. <br>
                    Koggala Lake.</h4>
            </div>
            <div class="fd-admission-card">
                <h3>"Riverbank Retreats"</h3>
                <img src="./images/food-ad-2.png" alt="">
                <p>Experience riverside dining with the soothing sound of flowing water. Whether it’s a picnic by the Kelani River or a gourmet meal at a riverside lodge, the ambiance is unmatched.</p>
                <h4>Kithulgala <br>
                    Mahaweli River banks.</h4>
            </div>
            <div class="fd-admission-card">
                <h3>"Feast on Waves"</h3>
                <img src="./images/food-ad-3.png" alt="">
                <p>Savor the freshest seafood or a barbecue under the stars while the waves lap at your feet. Coastal dining combines flavor with stunning ocean views.</p>
                <h4>Mirissa & Unawatuna beaches. <br>
                    Arugam Bay.</h4>
            </div>
            <div class="fd-admission-card">
                <h3>"Summit Savors"</h3>
                <img src="./images/food-ad-4.png" alt="">
                <p>Relish your meal with panoramic views from Sri Lanka’s hilltops. Whether at a luxurious resort or a rustic camping setup, mountain dining offers a tranquil and refreshing experience.</p>
                <h4>Ella Rock & Little Adam’s Peak <br>
                    Nuwara Eliya tea estates.</h4>
            </div>
        </div>
    </section>
    <<?php require 'footer.php'; ?>
</body>
</html>
