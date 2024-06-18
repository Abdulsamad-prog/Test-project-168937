<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Service Reviews</title>
    <link rel="stylesheet" href="style.css"> <!-- Link to your CSS file -->
</head>
<body>
    <header>
        <h1>Service Reviews</h1>
    </header>

    <nav>
        <ul>
            <li><a href="index.php">Home</a></li>
            <li><a href="about.php">About Us</a></li>
            <li><a href="services.php">Services</a></li>
            <li><a href="contact us.php">Contact Us</a></li>
            <li><a href="reviews.php">Reviews</a></li>
        </ul>
    </nav>

    <section id="submit-review">
        <h2>Share Your Experience</h2>
        <p>We value your feedback. Share your experience with us to help us improve our services.</p>
        <form action="submit_review.php" method="POST">
            <label for="name">Your Name:</label><br>
            <input type="text" id="name" name="name" required><br>

            <label for="email">Your Email:</label><br>
            <input type="email" id="email" name="email" required><br>

            <label for="rating">Rating:</label><br>
            <select id="rating" name="rating" required>
                <option value="">Select Rating</option>
                <option value="5">5 Stars - Excellent</option>
                <option value="4">4 Stars - Very Good</option>
                <option value="3">3 Stars - Good</option>
                <option value="2">2 Stars - Fair</option>
                <option value="1">1 Star - Poor</option>
            </select><br>

            <label for="review">Your Review:</label><br>
            <textarea id="review" name="review" rows="6" cols="50" required></textarea><br>

            <button type="submit">Submit Review</button>
        </form>
    </section>

    <section id="latest-reviews">
        <h2>Latest Reviews</h2>
        <div class="review">
            <h3>John Doe</h3>
            <p><strong>Rating:</strong> 4 Stars</p>
            <p><strong>Review:</strong> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.</p>
        </div>
        <div class="review">
            <h3>Jane Smith</h3>
            <p><strong>Rating:</strong> 5 Stars</p>
            <p><strong>Review:</strong> Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
        </div>
        <!-- Add more reviews dynamically -->
    </section>

    <footer>
        <p>&copy; 2024 Service Reviews. All rights reserved.</p>
    </footer>
</body>
</html>
