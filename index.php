
<?php
require_once 'sql_request.php';

// Check if user is logged in
if (!isset($_SESSION['name'])) {
   

    $name=null;
}else{
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
    .search1{
    width: 100%;
    height: 70px;
    justify-self: center;
    align-content: center;
    align-items: center;
   
   
}
.search1 button{
    display: flex;
    justify-self: center;
    align-content: center;
    align-items: center;
    width:fit-content;
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
.search1 button:hover{
    color: black;
}
.btn-primary {
    background: transparent;
   
    color: var(--primary-bg);
    border: none;
    text-decoration: none;
}
.btn-primary a{
    text-decoration: none;
    color:white;
}
.btn{
 border: 2px solid #ff6a1a;
}
.recipes-grid {
  display: grid;

  gap: 1.5rem;
  width: 100%;
  background-color: transparent;
  padding: 20px 30px;
 margin:0px 10px;
}
html {
    scroll-behavior: smooth;
}
.recipe-card{
    max-width: 280px;
    min-width: 270px;
}
.header{
    display: flex;
    justify-content: space-between;
    width: 100vw;
    padding: 0px;

}
#head1{
    width: 100%;
    display: flex;
     width: 100vw;
    justify-content: flex-start;
    justify-content: space-between;
 

}
.logo{


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
            <div  id='head1' class="container2 header-content" style="width: 1000VW;">
                <div class="logo">
                    <i class="fas fa-utensils"></i>
                    <span>TastyShare</span>
                </div>
                <button class="mobile-menu-btn">
                    <i class="fas fa-bars"></i>
                </button>
                <nav class="navi">
                    <ul id="mobile-menu">
                        <li><a href="#" class="nav-link active" data-page="home">Home</a></li>
                        <li><a href="recipi.php" class="nav-link" data-page="recipes">Recipes</a></li>
                        <li><a  href="p.php" class="nav-link" data-page="add-recipe">Add Recipe</a></li>
                        <li><a  href="about.php" class="nav-link" data-page="add-recipe">About us</a></li>
                        <li id="logout"><a href="logout.php"  class="nav-link" data-page="login">Log out </a></li>
                        <li><button class="btn btn-outline" id="login-btn">Login</button></li>
                       <li><button class="btn btn-primary" id="register-btn" style="color: white;">Register</button></li>
                       <li ><div class="auth-buttons">
                            <div id="log_info">Welcome,</div>
                            <div class="profile-icon" id="profile-icon">
                        <img src="https://images.unsplash.com/photo-1534528741775-53994a69daeb?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=400&q=80" alt="Profile">
                    </div>
                </div></li>
                    </ul>
                </nav>
                
            </div>
        </header>
    </div>
    <!-- hgfefhesh -->
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
                <div class="desc"  >
                    <p>
                        Welcome to our recipe sharing community, a place where food lovers from 
                        around the world connect, create, and inspire. Whether you're a beginner
                         learning to cook or an experienced chef exploring new flavors, you'll find endless ideas here.
                          Discover delicious recipes, learn step-by-step cooking techniques, and share your own creations
                           with friends and family. Our platform is designed to celebrate culture, creativity, and the joy 
                           of food. Join us today to explore diverse cuisines, exchange tips, and make cooking more fun, 
                           meaningful, 
                        and easy for everyone. Delicious inspiration is just a login away.
                    </p>
                </div>
            </div>
            <div class="search_container" id="search">

                    <div class="picture-1">
                        <img src="https://images.unsplash.com/photo-1512058454905-6b841e7ad132?q=80&w=1095&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="Profile">
                        
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
                                <button  id="search_btn"><h5> Find it.. </h5></button>
                            </div>
                            </div>
                        <div class="input-text">
                            <p> <h2 class="montserrat gradient-text" >Every flavor has a story , find yours</h2></p>
                        </div>
                    </div>
                     
                      
            </div>
            <h2 class="plin-text" >Few from TasteHub</h2>
            <div class="recipes-grid">
                <!-- Recipe cards will be generated here -->
            </div>
            <div class="button-cell">
                        <button class="btn1 btn1-30" onclick="window.open('recipi.php','_self')">Find more</button>
            </div>
        </section>

        <!-- Recipe Detail Page -->
        <section id="recipe-detail" class="page">
            <div id="recipe-detail-content">
                <!-- Recipe details will be inserted here -->
            </div>
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
        <div class="feedback_form" >
        <form class="feedback-form">
            <h2>Give Us Your Feedback</h2>
            <label for="name">Name</label>
            <input type="text" id="name" name="name" placeholder="Your Name" required>
            <label for="email">Email</label>
            <input type="email" id="email" name="email" placeholder="Your Email" required>
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
                    <h3>Modern Interior</h3>
                    <p>Creating beautiful spaces for over 24 years</p>
                </div>
                
                <div class="footer-section">
                    <h3>Contact Us</h3>
                    <p>123 Design Street, New York</p>
                    <p>info@moderninterior.com</p>
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
                <p>&copy; 2023 Modern Interior Design. All rights reserved.</p>
            </div>
        </div>
    </footer>

    <script>
       
     get_fewrecipes();
        // Sample recipe data
        

        // DOM Elements
        const pages = document.querySelectorAll('.page');
        const navLinks = document.querySelectorAll('.nav-link');
        const recipesGrid = document.querySelector('.recipes-grid');
        const recipeDetailContent = document.getElementById('recipe-detail-content');
        const mobileMenuBtn = document.querySelector('.mobile-menu-btn');
        const searchValue=document.getElementById("searchInput");

        // Initialize the application
        function init() {
           
           // setupEventListeners();
        }

        // Display recipes on the home page
        
let  limitedRecipes;

 async function get_fewrecipes() {
            try {
                const fetch_data = await fetch('get_all_recipi.php');
               const recipes5 = await fetch_data.json();
              
              
                const randomNum = Math.floor(Math.random() * (recipes5.length-4));

                limitedRecipes = recipes5.slice(randomNum, randomNum+4);
                 displayRecipes1();
                 displayRecipes();
                
            } catch (error) {
                console.error("Error fetching recipes:", error);
            }
        }

 function displayRecipes1() {
            recipesGrid.innerHTML = '';

            // Limit to first 6 recipes for "Few from TasteHub"
        

            limitedRecipes.forEach(recipe => {
                
                const recipeCard = document.createElement('div');
                recipeCard.className = 'recipe-card';
                recipeCard.innerHTML = `
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
                        <button class="btn btn-primary view-recipe""><a href="viwe_recipi.php?id=${recipe.recipi_id}" class="see-more-btn">View Recipe</a></button>
                    </div>
                `;
                recipesGrid.appendChild(recipeCard);
            });
        }// Setup event listeners
        
       
        
        // Show specific page
        function showPage(pageId) {
            pages.forEach(page => {
                page.classList.remove('active');
            });
            document.getElementById(pageId).classList.add('active');
        }

        // Show recipe detail
        function showRecipeDetail(recipeId) {
            const recipe = recipes.find(r => r.id == recipeId);
            if (recipe) {
                recipeDetailContent.innerHTML = `
                    <h2>${recipe.title}</h2>
                    <p>${recipe.description}</p>
                    <!-- Add more recipe details here -->
                    <button class="btn btn-primary" onclick="showPage('home')">Back to Recipes</button>
                `;
                showPage('recipe-detail');
            }
        }

        // Initialize the app when the DOM is loaded
        document.addEventListener('DOMContentLoaded', init);
    </script>
      <script>
        // Create floating particles for Animation 28
        document.addEventListener('DOMContentLoaded', function() {
            const particlesContainer = document.getElementById('particles-container');
            const particleCount = 30;
            
            for (let i = 0; i < particleCount; i++) {
                const particle = document.createElement('div');
                particle.classList.add('particle');
                
                // Random size between 5 and 15px
                const size = Math.floor(Math.random() * 11) + 5;
                particle.style.width = `${size}px`;
                particle.style.height = `${size}px`;
                
                // Random position
                particle.style.left = `${Math.random() * 100}%`;
                particle.style.top = `${Math.random() * 100}%`;
                
                // Random animation delay
                particle.style.animationDelay = `${Math.random() * 5}s`;
                
                particlesContainer.appendChild(particle);
            }
        });

        var loging = document.getElementById('login-btn');
        loging.addEventListener('click',log);
        function log(){
            window.open('main.php','_self');
        }
        var loging = document.getElementById('register-btn');
        loging.addEventListener('click',register);
        function register(){
            window.open('register.php','_self');
        }
    </script>
    <script>
      login_de=document.getElementById('log_info');
      login_btn=document.getElementById('login-btn');
      register_btn=document.getElementById('register-btn');
      login_out=document.getElementById('logout');
      profile=document.getElementById('profile-icon');
      profile.addEventListener('click', f2)
      function f2(){
            window.open('profile.php','_self');
      }
        // Check session every 30 seconds
      const intervelcontrle = setInterval(function() {
            fetch('check_session.php')
                .then(response => response.json())
                .then(data => {
                    if (!data.active) {
                        login_de.style.display='none';
                        login_btn.style.display = 'block';
                        register_btn.style.display = 'block';
                        login_out.style.display='none';
                        profile.style.display='none';
                    }
                    else{

                            login_de.style.display='block';
                            login_btn.style.display = 'none';
                        register_btn.style.display = 'none';
                        login_out.style.display='block';
                        profile.style.display='block';
                    }
                }).catch(clearInterval(intervelcontrle));
        }, 30);
        </script>
        <script>
    var recipe6;
    // Array of recipe names
function displayRecipes(){
        fetch("get_all_recipi.php")
    .then(response => response.json())  // Convert JSON to JS array/object
    .then(data => {
      recipes5 = data; 
      recipe6=data; 
       const search_btn = document.getElementById("search_btn");
search_btn.addEventListener('click',() =>{
    
    const searchData=recipe6.filter((item)=>{
    return(item.r_name === searchInput.value);

    });
    var searchID=searchData[0].recipi_id;
    
    if(searchID===undefined){
        console.log("no Event")
    }else{
             window.open(`viwe_recipi.php?id=${searchID}`,'_self');
    }
    
});             // Store data in JS array
      suggestion()       // Check in console
    })
    .catch(error => console.error("Error fetching data:", error));
}

    function suggestion(){
        const searchInput = document.getElementById('searchInput');
    const suggestionsBox = document.getElementById('suggestionsBox');

    // Function to highlight matching text
    

    // Function to search and display suggestions
    function searchRecipes(query) {
      // Clear previous suggestions
      suggestionsBox.innerHTML = '';

      // If query is empty, hide suggestions
      if (query.trim() === '') {
        return;
      }

      // Search for matches (case-insensitive)
      const matches = recipes5.filter(recipe => 
        recipe.r_name.toLowerCase().includes(query.toLowerCase())
      );

      // Display matches
      if (matches.length > 0) {
        matches.forEach(match => {
          const item = document.createElement('div');
          item.className = 'suggestion-item';
          item.innerHTML = match.r_name
          
          // Click handler to fill search bar
          item.addEventListener('click', function() {
            searchInput.value = match.r_name;
            suggestionsBox.innerHTML = '';
          });

          suggestionsBox.appendChild(item);
        });
      } else {
        // Show "no results" message
        const noResults = document.createElement('div');
        noResults.className = 'no-results';
        noResults.textContent = 'No recipes found';
        suggestionsBox.appendChild(noResults);
      }
    }

    // Event listener for input
    searchInput.addEventListener('input', function(e) {
      searchRecipes(e.target.value);
    });

    // Close suggestions when clicking outside
    document.addEventListener('click', function(e) {
      if (!searchInput.contains(e.target) && !suggestionsBox.contains(e.target)) {
        suggestionsBox.innerHTML = '';
      }
    });

    // Handle keyboard navigation (optional enhancement)
    searchInput.addEventListener('keydown', function(e) {
      const items = suggestionsBox.querySelectorAll('.suggestion-item');
      
      if (e.key === 'Escape') {
        suggestionsBox.innerHTML = '';
      }
    });
    }

   mobileMenuBtn.addEventListener('click', () => {
    const nav = document.querySelector('nav');
    nav.classList.toggle('show');
    mobileMenuBtn.classList.toggle('active');
});






  </script>
    <!-- Chef AI Button -->
    <a href="AiBot.php" class="chef-ai-btn" title="Ask AI Chef">👨‍🍳</a>
</body>
</html>