<?php
require_once 'sql_request.php';

// Check if user is logged in
if (!isset($_SESSION['name'])) {
    $name = null;
} else {
    $name = $_SESSION['name'];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TastyShare - Recipe Community</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="index.css">
    <style>
        .search1 {
            width: 100%;
            height: 70px;
            justify-self: center;
            align-content: center;
            align-items: center;
        }
        .search1 button {
            display: flex;
            justify-self: center;
            align-content: center;
            align-items: center;
            width: fit-content;
            height: 50px;
            background-color: #ff7b2c;
            border: none;
            color: white;
            font-size: 2rem;
            border: 1px solid #ff7b2c;
            font-family: "Segoe UI", Tahoma, Geneva, Verdana, sans-serif;
            border-radius: 1rem;
            padding: 2rem;
            margin-top: 1rem;
        }
        .search1 button:hover {
            color: black;
        }
        .btn-primary {
            background: transparent;
            color: var(--primary-bg);
            border: none;
            text-decoration: none;
        }
        .btn-primary a {
            text-decoration: none;
            color: white;
        }
        .btn {
            border: 2px solid #ff6a1a;
        }
        .recipes-grid {
            display: flex;
            flex-direction: row;
            justify-content: center;
            gap: 1.5rem;
            width: 100%;
            background-color: transparent;
            margin: 0px 1vw;
        }
        html {
            scroll-behavior: smooth;
        }
        .recipe-card {
            max-width: 280px;
            min-width: 270px;
        }
        .header {
            display: flex;
            justify-content: space-between;
            width: 100vw;
            padding: 0px;
        }
        #head1 {
            width: 100%;
            display: flex;
            width: 100vw;
            justify-content: flex-start;
            justify-content: space-between;
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
    <div class="header">
        <header style="padding: 10px 0px; margin:0px;">
            <div id='head1' class="container2 header-content" style="width: 100vw;">
                <div class="logo">
                    <i class="fas fa-utensils"></i>
                    <span>TastyShare</span>
                </div>
                <button class="mobile-menu-btn">
                    <i class="fas fa-bars"></i>
                </button>
                <button id="theme-toggle-btn" title="Toggle Dark/Light Mode">
                    <i class="fas fa-moon"></i>
                </button>
                <nav class="navi">
                    <ul id="mobile-menu">
                        <li><a href="#" class="nav-link active" data-page="home">Home</a></li>
                        <li><a href="recipi.php" class="nav-link" data-page="recipes">Recipes</a></li>
                        <li><a href="p.php" class="nav-link" data-page="add-recipe">Add Recipe</a></li>
                        <li><a href="about.php" class="nav-link" data-page="about">About us</a></li>

                        <!-- Shown only when logged OUT -->
                        <li id="login-item"><button class="btn btn-outline" id="login-btn">Login</button></li>
                        <li id="register-item"><button class="btn btn-primary" id="register-btn" style="color: white;">Register</button></li>

                        <!-- Shown only when logged IN -->
                        <li id="logout-item"><a href="logout.php" class="nav-link" data-page="login">Log out</a></li>
                        <li id="user-info-item">
                            <div class="auth-buttons">
                                <div id="log_info">Welcome, <?php echo htmlspecialchars($name ?? ''); ?>!</div>
                                <div class="profile-icon" id="profile-icon">
                                    <img src="https://images.unsplash.com/photo-1534528741775-53994a69daeb?ixlib=rb-4.0.3&auto=format&fit=crop&w=400&q=80" alt="Profile">
                                </div>
                            </div>
                        </li>
                    </ul>
                </nav>
            </div>
        </header>
    </div>

    <!-- Main Content -->
    <main class="container">
        <!-- Home Page -->
        <section id="home" class="page active">
            <div class="hero">
                <h1>Share & Discover Amazing Recipes</h1>
                <p>Join our community of food enthusiasts to share your culinary creations and discover new favorites from around the world.</p>
                <button class="btn btn-primary"><a href="#search">Get Started</a></button>
            </div>

            <div class="details">
                <div class="picture-container">
                    <div class="picture1"></div>
                    <div class="picture2"></div>
                </div>
                <div class="desc">
                    <p>
                        Welcome to our recipe sharing community, a place where food lovers from
                        around the world connect, create, and inspire. Whether you're a beginner
                        learning to cook or an experienced chef exploring new flavors, you'll find endless ideas here.
                        Discover delicious recipes, learn step-by-step cooking techniques, and share your own creations
                        with friends and family. Our platform is designed to celebrate culture, creativity, and the joy
                        of food. Join us today to explore diverse cuisines, exchange tips, and make cooking more fun,
                        meaningful, and easy for everyone. Delicious inspiration is just a login away.
                    </p>
                </div>
            </div>

            <div class="search_container" id="search">
                <div class="picture-1">
                    <img src="https://images.unsplash.com/photo-1512058454905-6b841e7ad132?q=80&w=1095&auto=format&fit=crop&ixlib=rb-4.1.0" alt="Food">
                </div>
                <div class="sec-con">
                    <div class="search-wrapper">
                        <input
                            type="text"
                            class="search-bar"
                            id="searchInput"
                            placeholder="Search for recipes..."
                            autocomplete="off"
                        >
                        <div class="suggestions" id="suggestionsBox"></div>
                        <div class="search1">
                            <button id="search_btn"><h5>Find it..</h5></button>
                        </div>
                    </div>
                    <div class="input-text">
                        <p><h2 class="montserrat gradient-text">Every flavor has a story, find yours</h2></p>
                    </div>
                </div>
            </div>

            <h2 class="plin-text">Few from TasteHub</h2>
            <div class="recipes-grid"></div>
            <div class="button-cell">
                <button class="btn1 btn1-30" onclick="window.open('recipi.php','_self')">Find more</button>
            </div>
        </section>

        <!-- Recipe Detail Page -->
        <section id="recipe-detail" class="page">
            <div id="recipe-detail-content"></div>
        </section>
    </main>

    <section class="why-choose">
        <h2>Why choose TasteHub</h2>
        <div class="features">
            <div class="feature-box">
                <i class="fas fa-utensils"></i>
                <h3>Wide Variety</h3>
                <p>Discover thousands of recipes from around the world, shared by real food lovers.</p>
            </div>
            <div class="feature-box">
                <i class="fas fa-leaf"></i>
                <h3>Healthy Choices</h3>
                <p>Find recipes that suit your lifestyle, from quick snacks to healthy meal plans.</p>
            </div>
            <div class="feature-box">
                <i class="fas fa-bolt"></i>
                <h3>Quick & Easy</h3>
                <p>Step-by-step instructions make cooking simple, even for beginners.</p>
            </div>
            <div class="feature-box">
                <i class="fas fa-users"></i>
                <h3>Community Support</h3>
                <p>Connect with other food lovers, share tips, and get feedback on your recipes.</p>
            </div>
        </div>
    </section>

    <div class="form_container">
        <div class="feedback_form">
            <form class="feedback-form">
                <h2>Give Us Your Feedback</h2>
                <label for="fname">Name</label>
                <input type="text" id="fname" name="name" placeholder="Your Name" required>
                <label for="femail">Email</label>
                <input type="email" id="femail" name="email" placeholder="Your Email" required>
                <label for="rating">Rating</label>
                <select id="rating" name="rating" required>
                    <option value="">Select Rating</option>
                    <option value="5">⭐⭐⭐⭐⭐ Excellent</option>
                    <option value="4">⭐⭐⭐⭐ Good</option>
                    <option value="3">⭐⭐⭐ Average</option>
                    <option value="2">⭐⭐ Poor</option>
                    <option value="1">⭐ Very Poor</option>
                </select>
                <label for="comments">Comments</label>
                <textarea id="comments" name="comments" placeholder="Write your feedback here..." required></textarea>
                <button type="submit">Submit Feedback</button>
            </form>
        </div>
        <div class="animi">
            <div class="animation-card">
                <div class="animation-demo">
                    <div class="particles-container" id="particles-container"></div>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer>
        <div class="container">
            <div class="footer-content">
                <div class="footer-section">
                    <h3>TastyShare</h3>
                    <p>Creating delicious moments for food lovers everywhere.</p>
                </div>
                <div class="footer-section">
                    <h3><a href="community.php" style="text-decoration: none;"> Contact Admin</a></h3>
                    <p>123 Recipe Street, New York</p>
                    <p>info@tastyshare.com</p>
                    <p>+1 (234) 567-8901</p>
                </div>
                <div class="footer-section">
                    <h3>Follow Us</h3>
                    <div class="social-icons">
                        <a href="#"><i class="fab fa-facebook"></i></a>
                        <a href="#"><i class="fab fa-instagram"></i></a>
                        <a href="#"><i class="fab fa-pinterest"></i></a>
                        <a href="#"><i class="fab fa-twitter"></i></a>
                    </div>
                </div>
            </div>
            <div class="copyright">
                <p>&copy; 2024 TastyShare. All rights reserved.</p>
            </div>
        </div>
    </footer>

    <!-- Chef AI Button -->
    <a href="AiBot.php" class="chef-ai-btn" title="Ask AI Chef">👨‍🍳</a>

    <script>
        // ─── DOM References ───────────────────────────────────────────────────────
        const pages           = document.querySelectorAll('.page');
        const navLinks        = document.querySelectorAll('.nav-link');
        const recipesGrid     = document.querySelector('.recipes-grid');
        const mobileMenuBtn   = document.querySelector('.mobile-menu-btn');
        const searchInput     = document.getElementById('searchInput');
        const suggestionsBox  = document.getElementById('suggestionsBox');

        // Navbar auth elements
        const loginItem       = document.getElementById('login-item');
        const registerItem    = document.getElementById('register-item');
        const logoutItem      = document.getElementById('logout-item');
        const userInfoItem    = document.getElementById('user-info-item');
        const logInfo         = document.getElementById('log_info');
        const profileIcon     = document.getElementById('profile-icon');
        const loginBtn        = document.getElementById('login-btn');
        const registerBtn     = document.getElementById('register-btn');

        // ─── Set initial auth state from PHP session (no flicker) ─────────────────
        <?php if ($name): ?>
            showLoggedIn();
        <?php else: ?>
            showLoggedOut();
        <?php endif; ?>

        // ─── Auth state functions ─────────────────────────────────────────────────
        function showLoggedIn() {
            loginItem.style.display    = 'none';
            registerItem.style.display = 'none';
            logoutItem.style.display   = 'list-item';
            userInfoItem.style.display = 'list-item';
        }

        function showLoggedOut() {
            loginItem.style.display    = 'list-item';
            registerItem.style.display = 'list-item';
            logoutItem.style.display   = 'none';
            userInfoItem.style.display = 'none';
        }

        // ─── Profile click ────────────────────────────────────────────────────────
        profileIcon.addEventListener('click', function () {
            window.open('profile.php', '_self');
        });

        // ─── Login / Register buttons ─────────────────────────────────────────────
        loginBtn.addEventListener('click', function () {
            window.open('main.php', '_self');
        });
        registerBtn.addEventListener('click', function () {
            window.open('register.php', '_self');
        });

        // ─── Mobile menu toggle ───────────────────────────────────────────────────
        mobileMenuBtn.addEventListener('click', function () {
            document.querySelector('nav').classList.toggle('show');
            mobileMenuBtn.classList.toggle('active');
        });

        // ─── Session polling every 30 seconds ────────────────────────────────────
        const sessionInterval = setInterval(function () {
            fetch('check_session.php')
                .then(response => response.json())
                .then(data => {
                    if (data.active) {
                        showLoggedIn();
                    } else {
                        showLoggedOut();
                    }
                })
                .catch(function () {
                    clearInterval(sessionInterval);
                });
        }, 30000);

        // ─── Recipes ──────────────────────────────────────────────────────────────
        let limitedRecipes = [];
        let allRecipes     = [];

        async function get_fewrecipes() {
            try {
                const res     = await fetch('get_all_recipi.php');
                const recipes = await res.json();

                allRecipes = recipes;

                const randomNum   = Math.floor(Math.random() * Math.max(recipes.length - 4, 1));
                limitedRecipes    = recipes.slice(randomNum, randomNum + 5);

                displayRecipes();
                setupSearch();
            } catch (error) {
                console.error("Error fetching recipes:", error);
            }
        }

        function displayRecipes() {
            recipesGrid.innerHTML = '';
            limitedRecipes.forEach(recipe => {
                const card = document.createElement('div');
                card.className = 'recipe-card';
                card.innerHTML = `
                    <div class="recipe-image">
                        <img src="${recipe.r_picture}" alt="${recipe.r_name}">
                    </div>
                    <div class="recipe-content">
                        <h3 class="recipe-title">${recipe.r_name}</h3>
                        <div class="recipe-meta">
                            <span><i class="fas fa-user"></i> ${recipe.user_no}</span>
                            <span><i class="fas fa-star"></i> ${recipe.rating}</span>
                        </div>
                        <p class="recipe-description">${recipe.description}</p>
                        <div class="recipe-tags"></div>
                        <button class="btn btn-primary view-recipe">
                            <a href="viwe_recipi.php?id=${recipe.recipi_id}" class="see-more-btn">View Recipe</a>
                        </button>
                    </div>
                `;
                recipesGrid.appendChild(card);
            });
        }

        // ─── Search & Suggestions ─────────────────────────────────────────────────
        function setupSearch() {
            // Search button
            document.getElementById('search_btn').addEventListener('click', function () {
                const match = allRecipes.find(item =>
                    item.r_name.toLowerCase() === searchInput.value.toLowerCase()
                );
                if (match) {
                    window.open(`viwe_recipi.php?id=${match.recipi_id}`, '_self');
                } else {
                    alert('Recipe not found. Try a suggestion from the list.');
                }
            });

            // Live suggestions on input
            searchInput.addEventListener('input', function () {
                const query = this.value.trim();
                suggestionsBox.innerHTML = '';

                if (query === '') return;

                const matches = allRecipes.filter(recipe =>
                    recipe.r_name.toLowerCase().includes(query.toLowerCase())
                );

                if (matches.length > 0) {
                    matches.forEach(match => {
                        const item = document.createElement('div');
                        item.className = 'suggestion-item';
                        item.textContent = match.r_name;
                        item.addEventListener('click', function () {
                            searchInput.value = match.r_name;
                            suggestionsBox.innerHTML = '';
                        });
                        suggestionsBox.appendChild(item);
                    });
                } else {
                    const noResults = document.createElement('div');
                    noResults.className = 'no-results';
                    noResults.textContent = 'No recipes found';
                    suggestionsBox.appendChild(noResults);
                }
            });

            // Close suggestions on outside click
            document.addEventListener('click', function (e) {
                if (!searchInput.contains(e.target) && !suggestionsBox.contains(e.target)) {
                    suggestionsBox.innerHTML = '';
                }
            });

            // Close suggestions on Escape
            searchInput.addEventListener('keydown', function (e) {
                if (e.key === 'Escape') suggestionsBox.innerHTML = '';
            });
        }

        // ─── Floating Particles ───────────────────────────────────────────────────
        document.addEventListener('DOMContentLoaded', function () {
            const particlesContainer = document.getElementById('particles-container');
            for (let i = 0; i < 30; i++) {
                const particle = document.createElement('div');
                particle.classList.add('particle');
                const size = Math.floor(Math.random() * 11) + 5;
                particle.style.width           = `${size}px`;
                particle.style.height          = `${size}px`;
                particle.style.left            = `${Math.random() * 100}%`;
                particle.style.top             = `${Math.random() * 100}%`;
                particle.style.animationDelay  = `${Math.random() * 5}s`;
                particlesContainer.appendChild(particle);
            }

            // Kick off recipe fetch
            get_fewrecipes();
        });
    </script>

    <!-- Theme Toggle Script -->
    <script src="theme-toggle.js"></script>
</body>
</html>