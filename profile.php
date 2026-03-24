<?php
session_start(); // MUST be the first thing

require_once 'sql_request.php';

// Check if user is logged in
if (!isset($_SESSION['name'])) {
    // No session → redirect immediately
    header("Location: main.php");
    exit();
}

// Session exists → store name
$name = $_SESSION['name'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TastyShare | Profile</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="profile.css">
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
            --card-bg: #2d2d2d;
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

        /* Navigation Bar */
        nav {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 1.2rem 5%;
            background-color: var(--secondary-bg);
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.25);
            position: sticky;
            top: 0;
            z-index: 100;
        }

        .logo {
            display: flex;
            align-items: center;
            font-size: 1.8rem;
            font-weight: 700;
            color: var(--accent);
        }

        .logo i {
            margin-right: 10px;
        }

        .search-bar {
            flex: 0 1 500px;
            position: relative;
        }

        .search-bar input {
            width: 100%;
            padding: 0.8rem 1rem 0.8rem 3rem;
            border-radius: 50px;
            border: none;
            background-color: #2c2c2c;
            color: var(--text-primary);
            font-size: 1rem;
        }

        .search-bar i {
            position: absolute;
            left: 1rem;
            top: 50%;
            transform: translateY(-50%);
            color: var(--text-secondary);
        }

        .nav-links {
            display: flex;
            gap: 2rem;
        }

        .nav-links a {
            color: var(--text-primary);
            text-decoration: none;
            font-weight: 500;
            transition: var(--transition);
        }

        .nav-links a:hover {
            color: var(--accent);
        }

        .nav-links a.active {
            color: var(--accent);
        }

        .profile-icon {
            width: 45px;
            height: 45px;
            border-radius: 50%;
            overflow: hidden;
            cursor: pointer;
            transition: var(--transition);
        }

        .profile-icon:hover {
            transform: scale(1.05);
            box-shadow: 0 0 0 2px var(--accent);
        }

        .profile-icon img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        /* Main Content */
        .container {
            max-width: 1200px;
            margin: 2rem auto;
            padding: 0 1.5rem;
        }

        /* Profile Card */
        .profile-card {
            background-color: var(--card-bg);
            border-radius: var(--border-radius);
            padding: 2.5rem;
            text-align: center;
            margin-bottom: 2.5rem;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.2);
        }

        .profile-picture {
            width: 150px;
            height: 150px;
            border-radius: 50%;
            overflow: hidden;
            margin: 0 auto 1.5rem;
            border: 4px solid var(--accent);
            transition: var(--transition);
        }

        .profile-picture:hover {
            transform: scale(1.03);
        }

        .profile-picture img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .username {
            font-size: 2.2rem;
            margin-bottom: 0.5rem;
            color: var(--text-primary);
        }

        .bio {
            color: var(--text-secondary);
            max-width: 600px;
            margin: 0 auto 1.5rem;
            font-size: 1.1rem;
        }

        .edit-btn {
            background-color: var(--accent);
            color: white;
            border: none;
            padding: 0.8rem 2rem;
            border-radius: 50px;
            font-size: 1rem;
            font-weight: 600;
            cursor: pointer;
            transition: var(--transition);
        }

        .edit-btn:hover {
            background-color: #ff8b42;
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(255, 123, 44, 0.3);
        }

        /* Tabs Section */
        .tabs {
            display: flex;
            gap: 0.2rem;
            margin-bottom: 2rem;
            background-color: var(--secondary-bg);
            border-radius: var(--border-radius);
            padding: 0.3rem;
        }

        .tab {
            flex: 1;
            text-align: center;
            padding: 1rem;
            background-color: transparent;
            color: var(--text-secondary);
            border: none;
            border-radius: var(--border-radius);
            font-size: 1.1rem;
            font-weight: 600;
            cursor: pointer;
            transition: var(--transition);
        }

        .tab.active {
            background-color: var(--card-bg);
            color: var(--accent);
        }

        .tab:hover:not(.active) {
            background-color: #2c2c2c;
            color: var(--text-primary);
        }

        /* Analytics Cards Grid */
        .analytics-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
            gap: 2rem;
            margin-bottom: 3rem;
        }

        .analytics-card {
            background-color: var(--card-bg);
            border-radius: var(--border-radius);
            padding: 1.5rem;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }

        .card-header {
            display: flex;
            align-items: center;
            gap: 0.8rem;
            margin-bottom: 1.5rem;
        }

        .card-header i {
            color: var(--accent);
            font-size: 1.3rem;
        }

        .card-header h3 {
            font-size: 1.3rem;
            color: var(--text-primary);
        }

        /* Progress Chart */
        .chart-container {
            background-color: var(--secondary-bg);
            border-radius: var(--border-radius);
            padding: 1.5rem;
            margin-bottom: 1rem;
        }

        .chart-axis {
            display: flex;
            justify-content: space-between;
            margin-bottom: 0.5rem;
            color: var(--text-secondary);
            font-size: 0.9rem;
        }

        .chart-line {
            height: 6px;
            background: linear-gradient(90deg, var(--accent) 0%, #ff8b42 100%);
            border-radius: 10px;
            position: relative;
            margin: 1rem 0;
        }

        .chart-points {
            display: flex;
            justify-content: space-between;
            margin-top: 0.5rem;
        }

        .chart-point {
            text-align: center;
            font-size: 0.8rem;
            color: var(--text-secondary);
        }

        /* Progress Bars */
        .progress-item {
            margin-bottom: 1.2rem;
        }

        .progress-label {
            display: flex;
            justify-content: space-between;
            margin-bottom: 0.5rem;
            font-size: 0.95rem;
        }

        .progress-bar {
            height: 8px;
            background-color: var(--secondary-bg);
            border-radius: 10px;
            overflow: hidden;
        }

        .progress-fill {
            height: 100%;
            background: linear-gradient(90deg, var(--accent) 0%, #ff8b42 100%);
            border-radius: 10px;
            transition: width 1s ease-in-out;
        }

        /* Stats Grid */
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 1rem;
        }

        .stat-item {
            background-color: var(--secondary-bg);
            padding: 1rem;
            border-radius: var(--border-radius);
            text-align: center;
        }

        .stat-value {
            font-size: 1.5rem;
            font-weight: 700;
            color: var(--accent);
            margin-bottom: 0.3rem;
        }

        .stat-label {
            font-size: 0.85rem;
            color: var(--text-secondary);
        }

        /* Books Collection */
        .books-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
            gap: 1.5rem;
            margin-bottom: 3rem;
        }

        .book-card {
            background-color: var(--card-bg);
            border-radius: var(--border-radius);
            padding: 1.5rem;
            transition: var(--transition);
            border-left: 4px solid var(--accent);
        }

        .book-card:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2);
        }

        .book-icon {
            font-size: 2rem;
            margin-bottom: 1rem;
        }

        .book-title {
            font-size: 1.2rem;
            margin-bottom: 0.8rem;
            color: var(--text-primary);
        }

        .book-desc {
            color: var(--text-secondary);
            font-size: 0.9rem;
            line-height: 1.5;
        }

        /* Recipe Grid */
        .section-title {
            font-size: 1.8rem;
            margin-bottom: 1.5rem;
            color: var(--text-primary);
            display: flex;
            align-items: center;
            gap: 0.8rem;
        }

        .section-title i {
            color: var(--accent);
        }

        .recipes-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 2rem;
            margin-bottom: 3rem;
        }

        .recipe-card {
            background-color: var(--card-bg);
            border-radius: var(--border-radius);
            overflow: hidden;
            transition: var(--transition);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }

        .recipe-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 12px 20px rgba(0, 0, 0, 0.2);
        }

        .card_img {
            width: 100%;
            height: 200px;
            object-fit: cover;
        }
        
        .recipe-content {
            padding: 1.5rem;
        }

        .recipe-title {
            font-size: 1.3rem;
            margin-bottom: 0.8rem;
            color: var(--text-primary);
        }

        .recipe-desc {
            color: var(--text-secondary);
            margin-bottom: 1.5rem;
            font-size: 0.95rem;
        }

        .view-recipe {
            display: inline-block;
            color: var(--accent);
            text-decoration: none;
            font-weight: 600;
            font-size: 0.95rem;
            transition: var(--transition);
        }

        .view-recipe:hover {
            color: #ff8b42;
            text-decoration: underline;
        }

        /* Footer */
        footer {
            background-color: var(--secondary-bg);
            padding: 3rem 5%;
            margin-top: 3rem;
        }

        .footer-content {
            max-width: 1200px;
            margin: 0 auto;
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
        }

        .footer-logo {
            font-size: 1.8rem;
            font-weight: 700;
            color: var(--accent);
            margin-bottom: 1.5rem;
        }

        .footer-links {
            display: flex;
            gap: 2rem;
            flex-wrap: wrap;
        }

        .footer-links a {
            color: var(--text-secondary);
            text-decoration: none;
            transition: var(--transition);
        }

        .footer-links a:hover {
            color: var(--accent);
        }

        .copyright {
            width: 100%;
            margin-top: 2.5rem;
            color: var(--text-secondary);
            font-size: 0.9rem;
            text-align: center;
        }

        /* Responsive Design */
        @media (max-width: 900px) {
            .search-bar {
                flex: 0 1 300px;
            }
            
            .nav-links {
                gap: 1.2rem;
            }
        }

        @media (max-width: 768px) {
            nav {
                flex-wrap: wrap;
                gap: 1rem;
            }
            
            .logo {
                order: 1;
            }
            
            .search-bar {
                order: 3;
                flex: 1 1 100%;
            }
            
            .nav-links {
                order: 2;
            }
            
            .profile-icon {
                order: 4;
            }
            
            .analytics-grid {
                grid-template-columns: 1fr;
            }
            
            .recipes-grid {
                grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
            }
            
            .books-grid {
                grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
            }
        }

        @media (max-width: 480px) {
            .profile-card {
                padding: 1.5rem;
            }
            
            .profile-picture {
                width: 120px;
                height: 120px;
            }
            
            .username {
                font-size: 1.8rem;
            }
            
            .tabs {
                flex-direction: column;
            }
            
            .footer-links {
                flex-direction: column;
                gap: 1rem;
            }
            
            .stats-grid {
                grid-template-columns: 1fr;
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
    <!-- Navigation Bar -->
    <nav>
        <div class="logo">
            <i class="fas fa-utensils"></i>
            <span>TasteHub</span>
        </div>
        
        <div class="search-bar">
            <i class="fas fa-search"></i>
            <input type="text" placeholder="Search for recipes...">
        </div>
        
        <div class="nav-links">
            <a href="index.php" class="active">Home</a>
            <a href="recipi.php">Explore</a>
            <a href="https://t.me/testHubCommunity">Community</a>
        </div>
        
        <div class="profile-icon">
            <img src="https://images.unsplash.com/photo-1534528741775-53994a69daeb?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=400&q=80" alt="Profile">
        </div>

        <button id="theme-toggle-btn" title="Toggle Dark/Light Mode" style="background: none; border: 2px solid var(--accent); color: var(--accent); width: 40px; height: 40px; border-radius: 50%; cursor: pointer; display: flex; align-items: center; justify-content: center; transition: var(--transition); font-size: 1.2rem;">
            <i class="fas fa-moon"></i>
        </button>
    </nav>

    <!-- Main Content -->
    <div class="container">
        <!-- Profile Card -->
        <div class="profile-card">
            <div class="profile-picture">
                <img src="https://images.unsplash.com/photo-1534528741775-53994a69daeb?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=400&q=80" alt="Profile">
            </div>
            <h1 class="username" id="username">Chef <?php echo htmlspecialchars($name); ?></h1>
            <p class="bio">Passionate food lover and recipe creator. I believe cooking is an art that brings people together. Join me on my culinary journey!</p>
            <button class="edit-btn" onclick="window.open('edit_profile.php','_self')">Edit Profile</button>
        </div>

        <!-- Analytics Section -->
        <h2 class="section-title">
            <i class="fas fa-chart-line"></i>
            Cooking Analytics
        </h2>
        
        <div class="analytics-grid">
            <!-- Card 1: Recipe Preparation Progress -->
            <div class="analytics-card">
                <div class="card-header">
                    <i class="fas fa-chart-line"></i>
                    <h3>Recipe Preparation Progress</h3>
                </div>
                <div class="chart-container">
                    <div class="chart-axis">
                        <span>0%</span>
                        <span>50%</span>
                        <span>100%</span>
                    </div>
                    <div class="chart-line" style="width: 85%;"></div>
                    <div class="chart-points">
                        <div class="chart-point">Step 1</div>
                        <div class="chart-point">Step 2</div>
                        <div class="chart-point">Step 3</div>
                        <div class="chart-point">Step 4</div>
                        <div class="chart-point">Final</div>
                    </div>
                </div>
                <p style="color: var(--text-secondary); font-size: 0.9rem; text-align: center;">
                    This chart shows how the recipe moves from the first step to the final dish.
                </p>
            </div>

            <!-- Card 2: Recipe Breakdown Details -->
            <div class="analytics-card">
                <div class="card-header">
                    <i class="fas fa-list-alt"></i>
                    <h3>Recipe Breakdown Details</h3>
                </div>
                <div class="progress-item">
                    <div class="progress-label">
                        <span>Ingredients Prepared</span>
                        <span>90%</span>
                    </div>
                    <div class="progress-bar">
                        <div class="progress-fill" style="width: 90%;"></div>
                    </div>
                </div>
                <div class="progress-item">
                    <div class="progress-label">
                        <span>Cooking Difficulty</span>
                        <span>60%</span>
                    </div>
                    <div class="progress-bar">
                        <div class="progress-fill" style="width: 60%;"></div>
                    </div>
                </div>
                <div class="progress-item">
                    <div class="progress-label">
                        <span>Time Required</span>
                        <span>70%</span>
                    </div>
                    <div class="progress-bar">
                        <div class="progress-fill" style="width: 70%;"></div>
                    </div>
                </div>
                <div class="progress-item">
                    <div class="progress-label">
                        <span>Skill Level Needed</span>
                        <span>55%</span>
                    </div>
                    <div class="progress-bar">
                        <div class="progress-fill" style="width: 55%;"></div>
                    </div>
                </div>
                <div class="progress-item">
                    <div class="progress-label">
                        <span>Taste Rating</span>
                        <span>95%</span>
                    </div>
                    <div class="progress-bar">
                        <div class="progress-fill" style="width: 95%;"></div>
                    </div>
                </div>
            </div>

            <!-- Card 3: Recipe View Analytics -->
            <div class="analytics-card">
                <div class="card-header">
                    <i class="fas fa-eye"></i>
                    <h3>Recipe View Analytics</h3>
                </div>
                <div class="stats-grid">
                    <div class="stat-item">
                        <div class="stat-value">1.2K</div>
                        <div class="stat-label">Total Views</div>
                    </div>
                    <div class="stat-item">
                        <div class="stat-value">+24%</div>
                        <div class="stat-label">Monthly Growth</div>
                    </div>
                    <div class="stat-item">
                        <div class="stat-value">87%</div>
                        <div class="stat-label">Engagement</div>
                    </div>
                    <div class="stat-item">
                        <div class="stat-value">156</div>
                        <div class="stat-label">Most Viewed</div>
                    </div>
                </div>
                <p style="color: var(--text-secondary); font-size: 0.9rem; text-align: center; margin-top: 1rem;">
                    This card shows how popular your recipes are and how many people are engaging with them.
                </p>
            </div>
        </div>

        <!-- Books Collection Section -->
        <h2 class="section-title">
            <i class="fas fa-book-open"></i>
            Recipe Books Collection
        </h2>
        
        <div class="books-grid">
            <!-- Premium Cookbooks -->
            <div class="book-card">
                <div class="book-icon" style="color: #ffd700;">
                    <i class="fas fa-crown"></i>
                </div>
                <h3 class="book-title">Premium Cookbooks</h3>
                <p class="book-desc">Advanced cooking techniques, exclusive recipes, chef-level dishes with high-quality step-by-step visuals.</p>
            </div>

            <!-- Beginner-Friendly Books -->
            <div class="book-card">
                <div class="book-icon" style="color: #4CAF50;">
                    <i class="fas fa-seedling"></i>
                </div>
                <h3 class="book-title">Beginner-Friendly Books</h3>
                <p class="book-desc">Simple recipes, easy instructions, basic kitchen skills, and quick meals for everyday cooking.</p>
            </div>

            <!-- Specialty Books -->
            <div class="book-card">
                <div class="book-icon" style="color: #FF5722;">
                    <i class="fas fa-utensil-spoon"></i>
                </div>
                <h3 class="book-title">Specialty Books</h3>
                <p class="book-desc">Desserts & baking, Sri Lankan cuisine, street food, healthy & diet meals for specialized tastes.</p>
            </div>

            <!-- Seasonal Books -->
            <div class="book-card">
                <div class="book-icon" style="color: #9C27B0;">
                    <i class="fas fa-calendar-alt"></i>
                </div>
                <h3 class="book-title">Seasonal / Festival Books</h3>
                <p class="book-desc">New Year specials, holiday sweets, special celebration menus for festive occasions.</p>
            </div>
        </div>

        <!-- Tabs -->
        <div class="tabs">
            <button class="tab active">My Recipes</button>
            <button class="tab">Favorites</button>
            <button class="tab">Saved Recipes</button>
        </div>

        <!-- Recipes Section -->
        <h2 class="section-title">
            <i class="fas fa-book"></i>
            My Recipes
        </h2>
        
        <div class="recipes-grid" id="recipes-grid1">
            <!-- Recipes will be dynamically loaded here -->
        </div>
    </div>

    <!-- Footer -->
    <footer>
        <div class="footer-content">
            <div class="footer-logo">
                <i class="fas fa-utensils"></i>
                TastyShare
            </div>
            
            <div class="footer-links">
                <a href="#">About Us</a>
                <a href="#">Contact</a>
                <a href="#">Community Guidelines</a>
                <a href="#">Privacy Policy</a>
                <a href="#">Terms of Service</a>
            </div>
            
            <p class="copyright">© 2023 TastyShare. All rights reserved.</p>
        </div>
    </footer>

    <script>
        // Simple tab functionality
        document.querySelectorAll('.tab').forEach(tab => {
            tab.addEventListener('click', () => {
                document.querySelectorAll('.tab').forEach(t => t.classList.remove('active'));
                tab.classList.add('active');
                
                // In a real application, this would load different content
                const sectionTitle = document.querySelector('.section-title');
                if (tab.textContent === 'Favorites') {
                    sectionTitle.innerHTML = '<i class="fas fa-heart"></i> Favorites';
                } else if (tab.textContent === 'Saved Recipes') {
                    sectionTitle.innerHTML = '<i class="fas fa-bookmark"></i> Saved Recipes';
                } else {
                    sectionTitle.innerHTML = '<i class="fas fa-book"></i> My Recipes';
                }
            });
        });

        // Display Recipes
        const recipesGrid = document.getElementById('recipes-grid1');
        let recipes = [];
        
        function displayRecipes(){
            fetch("get_recipi.php")
                .then(response => response.json())
                .then(data => {
                    recipes = data;
                   
                    disp_r();
                })
                .catch(error => console.error("Error fetching data:", error));
        }
        
        function disp_r(){
            recipesGrid.innerHTML = '';
            recipes.forEach(recipe => {
                const recipeCard = document.createElement('div');
                recipeCard.className = 'recipe-card';
                recipeCard.innerHTML = `
                    <img class='card_img' src="${recipe.r_picture}">
                    <div class="recipe-content">
                        <h3 class="recipe-title">${recipe.r_name}</h3>
                        <p class="recipe-desc">${recipe.description}</p>
                        <a href="viwe_recipi.php?id=${recipe.recipi_id}" class="view-recipe">View Recipe →</a>
                    </div>
                `;
                recipesGrid.appendChild(recipeCard);
            });
        }

        // Initialize the page
        displayRecipes();
    </script>
    <!-- Chef AI Button -->
    <a href="AiBot.php" class="chef-ai-btn" title="Ask AI Chef">👨‍🍳</a>

    <!-- Theme Toggle Script -->
    <script src="theme-toggle.js"></script>
</body>
</html>