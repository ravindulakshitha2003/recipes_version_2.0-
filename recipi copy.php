<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FlavorVerse | Recipe Sharing</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="recipi.css">
    <style>
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
    <nav class="navbar">
        <div class="logo">
            <i class="fas fa-utensils"></i>
            <span>FlavorVerse</span>
        </div>
        
    
            <div class="search-wrapper">
                            <input 
                                type="text" 
                                class="search-bar" 
                                id="searchInput" 
                                placeholder="Search for recipes..."
                                autocomplete="off"
                            >
                            <div class="suggestions" id="suggestionsBox"></div>
                            </div>

        
        <div class="nav-buttons">
            <button class="nav-btn"><a href="index.php">Home</a></button>
            <button class="nav-btn">Categories</button>
           
            <button class="nav-btn" ><a href="p.php">Create</a></button>
        </div>
        
        <div class="user-section">
            <!-- Switch between login button and profile pic -->
            <!-- <button class="login-btn">Login</button> -->
            <div class="profile-pic">JS</div>
        </div>
    </nav>
        <div class="main-container">
            <div class="input-text">
                    <p> <h2 class="montserrat gradient-text" >Every flavor has a story , find yours</h2></p>
            </div>
        </div>
    <!-- Content Sections -->
    <div class="container">
        <!-- Desserts Section -->
        <section class="category-section" id="s1">
            <h2 class="section-title">
                Main Dishes
                <a href="#" class="see-more-btn2" id="main_see_more" >See More  <i class="fas fa-arrow-right"></i></a>
            </h2>
            <div class="recipe-row" id='main_meal'>

            </div>
            
            
        </section>
        <section class="category-section"  id="test">

        </section>
        <!-- Main Dishes Section -->
        <section class="category-section" id="s2">
            <h2 class="section-title">
                Sweet Desserts
                <a href="#" class="see-more-btn2" id="dessert_see_more">See More <i class="fas fa-arrow-right"></i></a>
            </h2>
            
            <div class="recipe-row" id='recipi_cont'>

            </div>
        </section>
        

        <!-- Drinks Section -->
        <section class="category-section" id="s3">
            <h2 class="section-title" >
                Refreshing Drinks
                <a href="#" class="see-more-btn2" id="drink_see_more">See More <i class="fas fa-arrow-right"></i></a>
            </h2>
            
            <div class="recipe-row" id="drink">
                
            </div>
        </section>
    </div>

    <!-- Footer -->
    <footer>
        <div class="footer-content">
            <div class="social-icons">
                <a href="#"><i class="fab fa-facebook"></i></a>
                <a href="#"><i class="fab fa-instagram"></i></a>
                <a href="#"><i class="fab fa-pinterest"></i></a>
                <a href="#"><i class="fab fa-twitter"></i></a>
                <a href="#"><i class="fab fa-youtube"></i></a>
            </div>
            
            <div class="footer-links">
                <a href="#">About Us</a>
                <a href="#">Contact</a>
                <a href="#">Privacy Policy</a>
                <a href="#">Terms of Service</a>
                <a href="#">Submit Recipe</a>
            </div>
            
            <p class="copyright">© 2023 FlavorVerse. All rights reserved.</p>
        </div>
    </footer>

    <script>
        // Simple interactivity for demonstration
        document.addEventListener('DOMContentLoaded', function() {
            const recipeCards = document.querySelectorAll('.recipe-card');
            
            recipeCards.forEach(card => {
                card.addEventListener('mouseenter', function() {
                    this.style.transition = 'transform 0.3s, box-shadow 0.3s';
                });
                
                card.addEventListener('mouseleave', function() {
                    this.style.transition = 'transform 0.3s, box-shadow 0.3s';
                });
            });
            
            // Toggle between login and profile (for demonstration)
            const userSection = document.querySelector('.user-section');
            const loginBtn = document.createElement('button');
            loginBtn.className = 'login-btn';
            loginBtn.textContent = 'Login';
            
            const profilePic = document.querySelector('.profile-pic');
            
            // Uncomment the next line to show login button instead of profile
            // userSection.innerHTML = ''; userSection.appendChild(loginBtn);
        });
    </script>
    <script>
        const main_see_more=document.getElementById('main_see_more');
        const drink_see_more=document.getElementById('drink_see_more');
         const dessert_see_more=document.getElementById('dessert_see_more');
       const recipesGrid=document.getElementById('recipi_cont');
       const main1=document.getElementById('main_meal');
       const drink=document.getElementById('drink');
       const s1=document.getElementById('s1');
       const s2=document.getElementById('s2');
       const s3=document.getElementById('s3');
        let recipes = [];
function displayRecipes(){
        fetch("get_all_recipi.php")
    .then(response => response.json())  // Convert JSON to JS array/object
    .then(data => {
      recipes = data;                 // Store data in JS array
       
      disp_r();         // Check in console
    })
    .catch(error => console.error("Error fetching data:", error));
}   let limit=4;
     function disp_r(){
            let count=0;
            let count1=0;
            let count2=0;
            recipesGrid.innerHTML = '';
            recipes.forEach(recipe => {
                if(recipe.category=='dessert' && count < limit){
                          count++;
                        const recipeCard = document.createElement('div');
                        recipeCard.className = 'recipe-card';
                        recipeCard.innerHTML=`
                        <div class="card-img">
                            <img src="${recipe.r_picture}" alt="${recipe.r_name}">
                        </div>
                        <div class="card-content">
                            <h3 class="card-title">${recipe.r_name}</h3>
                            <p class="card-desc">${recipe.description}</p>
                            <a href="viwe_recipi.php?id=${recipe.recipi_id}" class="see-more-btn">View Recipe</a>



                            
                        </div>`;
                        recipesGrid.appendChild(recipeCard);
                        
                    }
                    else if(recipe.category.toLowerCase()=='main'  && count1 < limit){
                           count1++;
                        const recipeCard = document.createElement('div');
                        recipeCard.className = 'recipe-card';
                        recipeCard.innerHTML=`
                        <div class="card-img">
                            <img src="${recipe.r_picture}" alt="${recipe.r_name}">
                        </div>
                        <div class="card-content">
                            <h3 class="card-title">${recipe.r_name}</h3>
                            <p class="card-desc">${recipe.description}</p>
                              <a href="viwe_recipi.php?id=${recipe.recipi_id}" class="see-more-btn">View Recipe</a>
                        </div>`;
                        main1.appendChild(recipeCard);
                       
                    }
                   
                    else if(recipe.category=='drink'  && count2 < limit){
                           count2++;
                        const recipeCard = document.createElement('div');
                        recipeCard.className = 'recipe-card';
                        recipeCard.innerHTML=`
                        <div class="card-img">
                            <img src="${recipe.r_picture}" alt="${recipe.r_name}">
                        </div>
                        <div class="card-content">
                            <h3 class="card-title">${recipe.r_name}</h3>
                            <p class="card-desc">${recipe.description}</p>
                              <a href="viwe_recipi.php?id=${recipe.recipi_id}" class="see-more-btn">View Recipe</a>
                        </div>`;
                        drink.appendChild(recipeCard);
                       
                    }
                
            });
        


    }
    document.addEventListener('DOMContentLoaded', displayRecipes);
    main_see_more.addEventListener('click', function(e){
    e.preventDefault(); // Prevent page jump
    s2.style.display='none';
    s3.style.display='none';
    main_see_more.style.display='none';
    // Add expanded class to the recipe row, not the section
    main1.classList.add('expanded');
    main1.innerHTML = ''; // Clear existing cards
    
    limit=100;
    disp_r();
})

    dessert_see_more.addEventListener('click', function(e){
    e.preventDefault(); // Prevent page jump
    s1.style.display='none';
    s3.style.display='none';
    dessert_see_more.style.display='none';
    // Add expanded class to the recipe row, not the section
    recipesGrid.classList.add('expanded');
    recipesGrid.innerHTML = ''; // Clear existing cards
    
    limit=100;
    disp_r();
})
//  this hghjgjhj
    drink_see_more.addEventListener('click', function(e){
    e.preventDefault(); // Prevent page jump
    s2.style.display='none';
    s1.style.display='none';
    drink_see_more.style.display='none';
    // Add expanded class to the recipe row, not the section
    drink.classList.add('expanded');
    main1.innerHTML = ''; // Clear existing cards
    
    limit=100;
    disp_r();
})
    </script>
     <script>
    // Array of recipe names
    let recipes5 = [];
function displayRecipes(){
        fetch("get_all_recipi.php")
    .then(response => response.json())  // Convert JSON to JS array/object
    .then(data => {
      recipes5 = data;                 // Store data in JS array
     
      suggestion()       // Check in console
    })
    .catch(error => console.error("Error fetching data:", error));
}

    function suggestion(){
        const searchInput = document.getElementById('searchInput');
    const suggestionsBox = document.getElementById('suggestionsBox');


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
   
  </script>
  
  <script>
    const searchBar=document.getElementById("searchInput");
    const Testcontainer=document.getElementById("test");
    searchBar.addEventListener('input',(e)=>{
                
                Testcontainer.innerHTML=`<div class="loader">  
  <div class="inner one"></div>
  <div class="inner two"></div>
  <div class="inner three"></div>
</div>`;
                if(recipes.length < 1){
                  Testcontainer.innerHTML="NO RESULT HAS BEEN FOUNED"  
                }
                else{
           
                        setTimeout(()=>{
                    const filterdata=recipes.filter((card)=>card.r_name.toLowerCase().includes((e.target.value.toLowerCase())));
              
               const displaycontent=filterdata.map((recipe)=>{
                return(
                    `<div class="recipe-card" >
                       <div class="card-img">
                            <img src="${recipe.r_picture}" alt="${recipe.r_name}">
                        </div>
                        <div class="card-content">
                            <h3 class="card-title">${recipe.r_name}</h3>
                            <p class="card-desc">${recipe.description}</p>
                            <a href="viwe_recipi.php?id=${recipe.recipi_id}" class="see-more-btn">View Recipe</a>



                            
                        </div>
                    <div>`
                )

               });
               Testcontainer.innerHTML=" "
                for(var i=0;i<displaycontent.length;i++){
                Testcontainer.innerHTML+=displaycontent[i];
               }
                },2000);
                }
                
                
            
              
          
                s1.style.display='none';
                s2.style.display='none';
                s3.style.display='none';
    })
  </script>
  <script>
    var allcontainer=false;
    var page=1;
    window.addEventListener("scroll", () => {
    if (window.innerHeight + window.scrollY >= document.body.offsetHeight - 200) {
        console.log("new data");
        appendData(newarry);
    }
});
  </script>
    <!-- Chef AI Button -->
    <a href="AiBot.php" class="chef-ai-btn" title="Ask AI Chef">👨‍🍳</a>
</body>
</html>