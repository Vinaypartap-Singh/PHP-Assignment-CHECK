<!DOCTYPE HTML>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>PHP Assignment - Home</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <?php include 'templates/header.php'; ?>
    
    <div class="main-content">
        <h2>Welcome to Info Blogs</h2>
        <p>Our website is designed to help users manage their information easily with the power of PHP and MySQL. Explore the features and become a part of our community.</p>
        
        <section class="intro">
            <h3>What We Offer</h3>
            <p>Our platform provides a range of features to make your experience seamless and engaging. Here’s a quick overview of what you can do:</p>
            <ul>
                <li><strong>Easy Registration:</strong> Sign up quickly and easily to start using our services.</li>
                <li><strong>Member Access:</strong> Gain access to exclusive content and features as a registered member.</li>
                <li><strong>Contact Us:</strong> Get in touch for more information or support whenever you need it.</li>
            </ul>
        </section>

        <section class="features">
            <h3>Features of Our Website</h3>
            <div class="card-container">
                <div class="card">
                    <h2 class="card__title">Feature 1</h2>
                    <div class="card__content">Register and Become a Member</div>
                </div>
                <div class="card">
                    <h2 class="card__title">Feature 2</h2>
                    <div class="card__content">Access exclusive member content</div>
                </div>
                <div class="card">
                    <h2 class="card__title">Feature 3</h2>
                    <div class="card__content">Upload and Read Latest Blogs</div>
                </div>
                <div class="card">
                    <h2 class="card__title">Feature 4</h2>
                    <div class="card__content">Contact us for more information</div>
                </div>
            </div>
        </section>
        
        <section class="testimonials">
            <h3>What Our Users Say</h3>
            <div class="testimonial">
                <p>"This website has made managing my information so much easier. The features are intuitive and user-friendly!" - <strong>Jane Doe</strong></p>
            </div>
            <div class="testimonial">
                <p>"I love the exclusive content available to members. It's worth the sign-up!" - <strong>John Smith</strong></p>
            </div>
        </section>
    </div>
    
    <?php include 'templates/footer.php'; ?>
</body>
</html>
