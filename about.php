<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us - TasteHub</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        :root {
            --primary-bg: #121212;
            --secondary-bg: #1e1e1e;
            --accent: #ff7b2c;
            --text-primary: #f5f5f5;
            --text-secondary: #b0b0b0;
            --border-radius: 12px;
            --transition: all 0.3s ease;
        }

        body {
            background-color: var(--primary-bg);
            color: var(--text-primary);
            line-height: 1.6;
        }

        .container {
            width: 100%;
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
        }

        /* Header Styles */
        header {
            background-color: var(--secondary-bg);
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.3);
            position: sticky;
            top: 0;
            z-index: 100;
        }

        .navbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 20px 0;
        }

        .logo {
            display: flex;
            align-items: center;
            gap: 10px;
            font-size: 1.8rem;
            font-weight: 700;
            color: var(--accent);
            text-decoration: none;
        }

        .logo i {
            color: var(--text-primary);
        }

        .nav-links {
            display: flex;
            list-style: none;
            gap: 30px;
        }

        .nav-links a {
            text-decoration: none;
            color: var(--text-primary);
            font-weight: 500;
            transition: var(--transition);
        }

        .nav-links a:hover {
            color: var(--accent);
        }

        .nav-buttons {
            display: flex;
            gap: 15px;
        }

        .btn {
            padding: 10px 20px;
            border-radius: var(--border-radius);
            font-weight: 600;
            cursor: pointer;
            transition: var(--transition);
            border: none;
        }

        .btn-outline {
            background: transparent;
            border: 2px solid var(--accent);
            color: var(--accent);
        }

        .btn-primary {
            background: var(--accent);
            color: var(--primary-bg);
        }

        .btn:hover {
            transform: translateY(-3px);
            box-shadow: 0 5px 15px rgba(255, 123, 44, 0.3);
        }

        .mobile-menu {
            display: none;
            font-size: 1.5rem;
            cursor: pointer;
            color: var(--text-primary);
        }

        /* Hero Section */
        .hero {
            background: linear-gradient(rgba(18, 18, 18, 0.8), rgba(18, 18, 18, 0.8)), url('https://images.unsplash.com/photo-1556910103-1c02745aae4d?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1770&q=80');
            background-size: cover;
            background-position: center;
            color: var(--text-primary);
            text-align: center;
            padding: 100px 20px;
            margin-bottom: 60px;
        }

        .hero h1 {
            font-size: 3rem;
            margin-bottom: 20px;
        }

        .hero p {
            font-size: 1.2rem;
            max-width: 700px;
            margin: 0 auto 30px;
            color: var(--text-secondary);
        }

        /* Section Styles */
        section {
            padding: 80px 0;
        }

        .section-header {
            text-align: center;
            margin-bottom: 60px;
        }

        .section-header h2 {
            font-size: 2.5rem;
            color: var(--text-primary);
            margin-bottom: 15px;
            position: relative;
            display: inline-block;
        }

        .section-header h2::after {
            content: '';
            position: absolute;
            width: 80px;
            height: 4px;
            background: var(--accent);
            bottom: -10px;
            left: 50%;
            transform: translateX(-50%);
            border-radius: 2px;
        }

        .section-header p {
            color: var(--text-secondary);
            max-width: 700px;
            margin: 0 auto;
        }

        /* Purpose Section */
        .purpose-content {
            display: flex;
            align-items: center;
            gap: 50px;
        }

        .purpose-text {
            flex: 1;
        }

        .purpose-text p {
            margin-bottom: 20px;
            color: var(--text-secondary);
        }

        .purpose-image {
            flex: 1;
            border-radius: var(--border-radius);
            overflow: hidden;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.3);
        }

        .purpose-image img {
            width: 100%;
            height: auto;
            display: block;
        }

        /* Mission & Vision */
        .mission-vision {
            background-color: var(--secondary-bg);
        }

        .mv-container {
            display: flex;
            gap: 50px;
        }

        .mission, .vision {
            flex: 1;
            background: var(--primary-bg);
            padding: 40px;
            border-radius: var(--border-radius);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
            text-align: center;
            transition: var(--transition);
        }

        .mission:hover, .vision:hover {
            transform: translateY(-10px);
        }

        .mission i, .vision i {
            font-size: 3rem;
            color: var(--accent);
            margin-bottom: 20px;
        }

        .mission h3, .vision h3 {
            font-size: 1.8rem;
            margin-bottom: 20px;
            color: var(--text-primary);
        }

        .mission p, .vision p {
            color: var(--text-secondary);
        }

        /* Values Section */
        .values-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 30px;
        }

        .value-card {
            background: var(--secondary-bg);
            padding: 30px;
            border-radius: var(--border-radius);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
            transition: var(--transition);
        }

        .value-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.3);
        }

        .value-card h3 {
            display: flex;
            align-items: center;
            gap: 10px;
            font-size: 1.5rem;
            margin-bottom: 15px;
            color: var(--text-primary);
        }

        .value-card i {
            color: var(--accent);
        }

        .value-card p {
            color: var(--text-secondary);
        }

        /* Team Section */
        .team-section {
            background-color: var(--secondary-bg);
        }

        .team-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 30px;
        }

        .team-member {
            background: var(--primary-bg);
            border-radius: var(--border-radius);
            overflow: hidden;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
            text-align: center;
            transition: var(--transition);
        }

        .team-member:hover {
            transform: translateY(-10px);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.3);
        }

        .member-image {
            height: 250px;
            background-size: cover;
            background-position: center;
        }

        .member-info {
            padding: 25px;
        }

        .member-info h3 {
            font-size: 1.5rem;
            margin-bottom: 10px;
            color: var(--text-primary);
        }

        .member-info p {
            color: var(--text-secondary);
        }

        /* Benefits Section */
        .benefits-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 30px;
        }

        .benefit-card {
            display: flex;
            gap: 20px;
            background: var(--secondary-bg);
            padding: 30px;
            border-radius: var(--border-radius);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
            transition: var(--transition);
        }

        .benefit-card:hover {
            transform: translateY(-5px);
        }

        .benefit-icon {
            font-size: 2.5rem;
            color: var(--accent);
        }

        .benefit-content h3 {
            font-size: 1.5rem;
            margin-bottom: 15px;
            color: var(--text-primary);
        }

        .benefit-content p {
            color: var(--text-secondary);
        }

        /* CTA Section */
        .cta-section {
            background: linear-gradient(135deg, var(--accent), #ff9d5c);
            color: var(--primary-bg);
            text-align: center;
            padding: 100px 20px;
        }

        .cta-section h2 {
            font-size: 2.5rem;
            margin-bottom: 20px;
        }

        .cta-section p {
            font-size: 1.2rem;
            max-width: 700px;
            margin: 0 auto 40px;
        }

        .cta-buttons {
            display: flex;
            justify-content: center;
            gap: 20px;
        }

        .btn-light {
            background: var(--primary-bg);
            color: var(--accent);
        }

        /* Footer */
        footer {
            background: var(--secondary-bg);
            color: var(--text-primary);
            padding: 60px 0 30px;
        }

        .footer-content {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 40px;
            margin-bottom: 40px;
        }

        .footer-column h3 {
            font-size: 1.3rem;
            margin-bottom: 25px;
            position: relative;
            color: var(--text-primary);
        }

        .footer-column h3::after {
            content: '';
            position: absolute;
            width: 40px;
            height: 3px;
            background: var(--accent);
            bottom: -10px;
            left: 0;
        }

        .footer-links {
            list-style: none;
        }

        .footer-links li {
            margin-bottom: 15px;
        }

        .footer-links a {
            color: var(--text-secondary);
            text-decoration: none;
            transition: var(--transition);
        }

        .footer-links a:hover {
            color: var(--accent);
        }

        .social-links {
            display: flex;
            gap: 15px;
            margin-top: 20px;
        }

        .social-links a {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 40px;
            height: 40px;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 50%;
            color: var(--text-primary);
            transition: var(--transition);
        }

        .social-links a:hover {
            background: var(--accent);
            transform: translateY(-5px);
        }

        .copyright {
            text-align: center;
            padding-top: 30px;
            border-top: 1px solid rgba(255, 255, 255, 0.1);
            color: var(--text-secondary);
            font-size: 0.9rem;
        }

        /* Responsive Styles */
        @media (max-width: 992px) {
            .purpose-content, .mv-container {
                flex-direction: column;
            }
            
            .team-grid {
                grid-template-columns: repeat(2, 1fr);
            }
            
            .values-grid, .benefits-grid {
                grid-template-columns: 1fr;
            }
            
            .footer-content {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        @media (max-width: 768px) {
            .nav-links, .nav-buttons {
                display: none;
            }
            
            .mobile-menu {
                display: block;
            }
            
            .hero h1 {
                font-size: 2.5rem;
            }
            
            .section-header h2 {
                font-size: 2rem;
            }
            
            .cta-buttons {
                flex-direction: column;
                align-items: center;
            }
            
            .btn {
                width: 100%;
                max-width: 250px;
            }
        }

        @media (max-width: 576px) {
            .team-grid {
                grid-template-columns: 1fr;
            }
            
            .footer-content {
                grid-template-columns: 1fr;
            }
            
            .benefit-card {
                flex-direction: column;
                text-align: center;
            }
        }

        /* Chef AI Button */
        .chef-ai-btn {
          position: fixed;
          bottom: 20px;
          right: 20px;
          width: 60px;
          height: 60px;
          background: linear-gradient(45deg, #ff7b2c, #eeff02);
          border: none;
          border-radius: 50%;
          cursor: pointer;
          box-shadow: 0 4px 15px rgba(0, 0, 0, 0.3);
          transition: all 0.3s ease;
          z-index: 1000;
          display: flex;
          align-items: center;
          justify-content: center;
          font-size: 24px;
          color: #1e1e1e;
          text-decoration: none;
        }

        .chef-ai-btn:hover {
          transform: scale(1.1);
          box-shadow: 0 6px 20px rgba(0, 0, 0, 0.4);
        }

        @media (max-width: 768px) {
          .chef-ai-btn {
            width: 50px;
            height: 50px;
            font-size: 20px;
            bottom: 15px;
            right: 15px;
          }
        }
    </style>
</head>
<body>
    <!-- Header -->
    <header>
        <div class="container">
            <nav class="navbar">
                <a href="#" class="logo">
                    <i class="fas fa-utensils"></i>
                    TasteHub
                </a>
                
                <ul class="nav-links">
                    <li><a href="index.php">Home</a></li>
                    <li><a href="recipi.php">Recipes</a></li>
                   
                </ul>
                
              
                
                <div class="mobile-menu">
                    <i class="fas fa-bars"></i>
                </div>
            </nav>
        </div>
    </header>

    <!-- Hero Section -->
    <section class="hero">
        <div class="container">
            <h1>About TasteHub</h1>
            <p>Where Culinary Passion Meets Community</p>
            <button class="btn btn-primary"><a href="https://t.me/testHubCommunity" style="text-decoration:none;color:white">Join Our Community</a></button>
        </div>
    </section>

    <!-- Purpose Section -->
    <section class="purpose">
        <div class="container">
            <div class="section-header">
                <h2>Our Purpose</h2>
                <p>More Than Just Recipes</p>
            </div>
            
            <div class="purpose-content">
                <div class="purpose-text">
                    <p>At its heart, TasteHub is a modern platform built for food lovers, by food lovers. We recognized that while there are millions of recipes online, finding reliable, well-organized, and truly inspiring dishes can be a challenge. TasteHub was created to solve this.</p>
                    <p>Our purpose is to provide a centralized, user-friendly space where home cooks and professional chefs alike can share their creations, explore diverse cuisines, and build a personalized collection of go-to recipes. We're here to connect you with your next favorite meal and the people behind it.</p>
                </div>
                <div class="purpose-image">
                    <img src="https://images.unsplash.com/photo-1556909114-f6e7ad7d3136?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1770&q=80" alt="Cooking together">
                </div>
            </div>
        </div>
    </section>

    <!-- Mission & Vision Section -->
    <section class="mission-vision">
        <div class="container">
            <div class="section-header">
                <h2>Our Mission & Vision</h2>
                <p>What drives us forward</p>
            </div>
            
            <div class="mv-container">
                <div class="mission">
                    <i class="fas fa-bullseye"></i>
                    <h3>Our Mission</h3>
                    <p>To empower everyone to cook with confidence and creativity by providing a collaborative platform for sharing and discovering trusted recipes.</p>
                </div>
                
                <div class="vision">
                    <i class="fas fa-eye"></i>
                    <h3>Our Vision</h3>
                    <p>A world connected through the universal language of food, where anyone, anywhere, can find the perfect recipe and the inspiration to make it.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Values Section -->
    <section class="values">
        <div class="container">
            <div class="section-header">
                <h2>Our Core Values</h2>
                <p>The principles that guide everything we do</p>
            </div>
            
            <div class="values-grid">
                <div class="value-card">
                    <h3><i class="fas fa-users"></i> Community First</h3>
                    <p>TasteHub is built on the foundation of a supportive and passionate community. We celebrate every cook, from beginners to experts, and encourage constructive feedback and shared success.</p>
                </div>
                
                <div class="value-card">
                    <h3><i class="fas fa-globe-americas"></i> Culinary Discovery</h3>
                    <p>We are driven by a sense of adventure. We strive to be a window to global cuisines and hidden culinary gems, helping you expand your palate and cooking repertoire.</p>
                </div>
                
                <div class="value-card">
                    <h3><i class="fas fa-shield-alt"></i> Trust & Transparency</h3>
                    <p>We value honest reviews, clear instructions, and real photos from real people. You can trust that the recipes you find here have been tried, tested, and loved by fellow community members.</p>
                </div>
                
                <div class="value-card">
                    <h3><i class="fas fa-lightbulb"></i> Innovation & Ease</h3>
                    <p>We are committed to creating a seamless and enjoyable user experience. Our platform is designed to be intuitive, making it simple to save, organize, and share your culinary journey.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Team Section -->
    <section class="team-section">
        <div class="container">
            <div class="section-header">
                <h2>Meet Our Team</h2>
                <p>The passionate foodies behind TasteHub</p>
            </div>
            
            <div class="team-grid">
                <div class="team-member">
                    <div class="member-image" style="background-image: url('https://scontent.fcmb3-2.fna.fbcdn.net/v/t39.30808-6/474811551_1056479286249220_156293047826719515_n.jpg?_nc_cat=102&ccb=1-7&_nc_sid=833d8c&_nc_eui2=AeHBydm4RUU7bpca1Y4nh0Le1rvhVn2Fqu3Wu-FWfYWq7QLv_BlhU3u6JUsdbSEcDHRqq31Ct0nJu1b2aD5VjmZx&_nc_ohc=aqTmNqRusXcQ7kNvwEcqI4X&_nc_oc=AdkkYMp6JUTx0zz3XOygtPP1GB4SzBDTVYmQjAYoJEAPQZnc0UmOvcFt1ijQHXzW6ft6JeB4xzTvP9PmH967bZF4&_nc_zt=23&_nc_ht=scontent.fcmb3-2.fna&_nc_gid=k3u0y8u5-oFP2kcarS8xtA&oh=00_AfiOk3p6RQJ76iub6sPzEVYXUZ40VpRZ5fVOpZyiglLf5A&oe=691EAA28');"></div>
                    <div class="member-info">
                        <h3>Ravindu lakshitha</h3>
                        <p>Founder & CEO</p>
                    </div>
                </div>
                
                <div class="team-member">
                    <div class="member-image" style="background-image: url('https://images.unsplash.com/photo-1494790108755-2616b612b786?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=774&q=80');"></div>
                    <div class="member-info">
                        <h3>Maria Rodriguez</h3>
                        <p>Head of Product</p>
                    </div>
                </div>
                
                <div class="team-member">
                    <div class="member-image" style="background-image: url('https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1770&q=80');"></div>
                    <div class="member-info">
                        <h3>David Chen</h3>
                        <p>Lead Developer</p>
                    </div>
                </div>
            </div>
            
            <div class="section-header" style="margin-top: 60px;">
                <p style="color: var(--text-secondary);">TasteHub was founded by a small team of tech enthusiasts and foodies who spent more time swapping recipe links than talking about code. We saw an opportunity to blend our two passions—technology and food—into a single, beautiful platform. While our team is growing, our passion remains the same: to create the best possible experience for our community. We're the ones testing features, moderating discussions, and, of course, trying out your latest recipe posts!</p>
            </div>
        </div>
    </section>

    <!-- Benefits Section -->
    <section class="benefits">
        <div class="container">
            <div class="section-header">
                <h2>How You Can Benefit</h2>
                <p>TasteHub is more than just a website; it's your partner in the kitchen</p>
            </div>
            
            <div class="benefits-grid">
                <div class="benefit-card">
                    <div class="benefit-icon">
                        <i class="fas fa-search"></i>
                    </div>
                    <div class="benefit-content">
                        <h3>Discover Your Next Favorite Meal</h3>
                        <p>Use our powerful search and filtering tools to find recipes based on your dietary needs, ingredients on hand, or culinary cravings.</p>
                    </div>
                </div>
                
                <div class="benefit-card">
                    <div class="benefit-icon">
                        <i class="fas fa-book"></i>
                    </div>
                    <div class="benefit-content">
                        <h3>Build Your Digital Cookbook</h3>
                        <p>Save and organize recipes you love into personal collections for easy access anytime.</p>
                    </div>
                </div>
                
                <div class="benefit-card">
                    <div class="benefit-icon">
                        <i class="fas fa-share-alt"></i>
                    </div>
                    <div class="benefit-content">
                        <h3>Share Your Creations</h3>
                        <p>Contribute to the community by posting your own recipes, complete with step-by-step photos and tips. Inspire others with your family secrets and innovative dishes.</p>
                    </div>
                </div>
                
                <div class="benefit-card">
                    <div class="benefit-icon">
                        <i class="fas fa-comments"></i>
                    </div>
                    <div class="benefit-content">
                        <h3>Connect and Learn</h3>
                        <p>Engage with a global community of food lovers. Rate recipes, leave comments, and ask questions to learn from others and improve your skills.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="cta-section">
        <div class="container">
            <h2>Join Our Community Today</h2>
            <p>We are so glad you're here. Whether you're here to find a quick weeknight dinner or to master a complex baking project, TasteHub is your home for culinary inspiration.</p>
            
            <div class="cta-buttons">
                <button class="btn btn-light">Sign Up For Free</button>
                <button class="btn btn-outline" style="border-color: var(--primary-bg); color: var(--primary-bg);">Contact Us</button>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer>
        <div class="container">
            <div class="footer-content">
                <div class="footer-column">
                    <h3>TasteHub</h3>
                    <p>Your culinary community for sharing and discovering amazing recipes from around the world.</p>
                    <div class="social-links">
                        <a href="#"><i class="fab fa-facebook-f"></i></a>
                        <a href="#"><i class="fab fa-twitter"></i></a>
                        <a href="#"><i class="fab fa-instagram"></i></a>
                        <a href="#"><i class="fab fa-pinterest"></i></a>
                    </div>
                </div>
                
                <div class="footer-column">
                    <h3>Quick Links</h3>
                    <ul class="footer-links">
                        <li><a href="#">Home</a></li>
                        <li><a href="#">Recipes</a></li>
                        <li><a href="#">Categories</a></li>
                        <li><a href="#">About Us</a></li>
                        <li><a href="#">Contact</a></li>
                    </ul>
                </div>
                
                <div class="footer-column">
                    <h3>Categories</h3>
                    <ul class="footer-links">
                        <li><a href="#">Vegetarian</a></li>
                        <li><a href="#">Vegan</a></li>
                        <li><a href="#">Gluten-Free</a></li>
                        <li><a href="#">Desserts</a></li>
                        <li><a href="#">Quick & Easy</a></li>
                    </ul>
                </div>
                
                <div class="footer-column">
                    <h3>Contact Us</h3>
                    <ul class="footer-links">
                        <li><i class="fas fa-envelope"></i> hello@tastehub.com</li>
                        <li><i class="fas fa-phone"></i> +1 (555) 123-4567</li>
                        <li><i class="fas fa-map-marker-alt"></i> 123 Foodie Street, Culinary City</li>
                    </ul>
                </div>
            </div>
            
            <div class="copyright">
                <p>&copy; 2023 TasteHub. All rights reserved.</p>
            </div>
        </div>
    </footer>

    <script>
        // Mobile menu toggle
        document.querySelector('.mobile-menu').addEventListener('click', function() {
            const navLinks = document.querySelector('.nav-links');
            const navButtons = document.querySelector('.nav-buttons');
            
            navLinks.style.display = navLinks.style.display === 'flex' ? 'none' : 'flex';
            navButtons.style.display = navButtons.style.display === 'flex' ? 'none' : 'flex';
            
            if (window.innerWidth <= 768) {
                if (navLinks.style.display === 'flex') {
                    navLinks.style.flexDirection = 'column';
                    navLinks.style.position = 'absolute';
                    navLinks.style.top = '80px';
                    navLinks.style.left = '0';
                    navLinks.style.right = '0';
                    navLinks.style.background = 'var(--secondary-bg)';
                    navLinks.style.padding = '20px';
                    navLinks.style.boxShadow = '0 5px 10px rgba(0,0,0,0.3)';
                    
                    navButtons.style.flexDirection = 'column';
                    navButtons.style.position = 'absolute';
                    navButtons.style.top = '280px';
                    navButtons.style.left = '0';
                    navButtons.style.right = '0';
                    navButtons.style.background = 'var(--secondary-bg)';
                    navButtons.style.padding = '20px';
                    navButtons.style.boxShadow = '0 5px 10px rgba(0,0,0,0.3)';
                }
            }
        });
        
        // Adjust menu on window resize
        window.addEventListener('resize', function() {
            if (window.innerWidth > 768) {
                document.querySelector('.nav-links').style.display = 'flex';
                document.querySelector('.nav-buttons').style.display = 'flex';
                document.querySelector('.nav-links').style.flexDirection = 'row';
                document.querySelector('.nav-buttons').style.flexDirection = 'row';
                document.querySelector('.nav-links').style.position = 'static';
                document.querySelector('.nav-buttons').style.position = 'static';
                document.querySelector('.nav-links').style.background = 'transparent';
                document.querySelector('.nav-buttons').style.background = 'transparent';
                document.querySelector('.nav-links').style.boxShadow = 'none';
                document.querySelector('.nav-buttons').style.boxShadow = 'none';
            } else {
                document.querySelector('.nav-links').style.display = 'none';
                document.querySelector('.nav-buttons').style.display = 'none';
            }
        });
    </script>
    <!-- Chef AI Button -->
    <a href="AiBot.php" class="chef-ai-btn" title="Ask AI Chef">👨‍🍳</a>
</body>
</html>