<!doctype html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>FlavorVerse | Recipe Sharing</title>
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
    />
    <link rel="stylesheet" href="recipi.css" />
  </head>
  <style>
    .main-container{
    height: 25vh;
  }
  @media (max-width: 320px){
    .main-container{
        height: 5vh;
  }
  }

  .more{
    flex-direction: column;
   }
   .mobile-menu-btn:hover{
     background-color: white;
   }
   /* Navigation Bar */
.navbar {
  display: flex;
  justify-content: space-between;
  align-items: center;
  padding: 1rem 5%;
  background-color: #1e1e1e;
  box-shadow: 0 2px 10px rgba(0, 0, 0, 0.3);
  position: sticky;
  top: 0;
  z-index: 100;
  height: fit-content;
  width: 100%;
  margin: 0%;
}
#nav-list {
  list-style: none;
  display: flex;
}
#more-option {
  display: none;
}
.logo {
  display: flex;
  align-items: center;
  font-size: 1.8rem;
  font-weight: 700;
  color: var(--accent);
  justify-content: center;
}

.logo i {
  margin-right: 0.5rem;
}

.search-bar {
  flex: 0 1 500px;
}

.search-bar {
  width: 100%;
  padding: 0.8rem 1.5rem;
  border-radius: 50px;
  border: none;
  background-color: #2c2c2c;
  color: #e0e0e0;
  font-size: 1rem;
  outline: none;
}

.search-bar::placeholder {
  color: #a0a0a0;
}

.nav-buttons {
  display: flex;
  gap: 1.5rem;
  margin: 0px 10px;
  width: fit-content;
}

.nav-btn {
  background: none;
  border: none;
  color: #e0e0e0;
  font-size: 1rem;
  cursor: pointer;
  transition: color 0.3s;
  padding: 0.5rem 1rem;
  border-radius: 4px;
}
.nav-btn a {
  background: none;
  border: none;
  color: #e0e0e0;
  font-size: 1rem;
  cursor: pointer;
  transition: color 0.3s;
  padding: 0.5rem 1rem;
  border-radius: 4px;
  text-decoration: none;
}

.nav-btn:hover {
  color: var(--accent);
  background-color: rgba(255, 107, 107, 0.1);
}

.user-section {
  display: flex;
  align-items: center;
}

.profile-pic {
  width: 40px;
  height: 40px;
  border-radius: 50%;
  background-color: var(--accent);
  display: flex;
  align-items: center;
  justify-content: center;
  color: white;
  font-weight: bold;
  cursor: pointer;
  font-size: 0.7rem;
}
.main-nav {
  display: flex;
  width: 70%;
  gap: 2rem;
}
.search-wrapper {
  position: relative;
  width: 100%;
}

.input-text {
  color: #f5f5f5;
  height: fit-content;
  background-color: #121212;
  width: 100%;
}

.montserrat {
  font-family: "Montserrat", sans-serif;
  font-size: 1.25rem;
}
.gradient-text {
  background: linear-gradient(45deg, #ff7b2c, #f5f5f5, #eeff02, #f5f5f5);
  background-size: 300%;
  -webkit-background-clip: text;
  -webkit-text-fill-color: transparent;
  background-clip: text;
  animation: gradientShift 4s ease infinite;
  font-size: 3rem;
  font-weight: 700;
}
.main-container {
  margin: auto;
  text-align: center;
  display: flex;
  flex-wrap: nowrap;
  flex-direction: column;
  height: 25vh;
  width: 100%;
  align-self: center;
  align-items: center;
}

.mobile-menu-btn {
  cursor: pointer;
  font-size: 2rem;
  transition: all 0.3s ease;
  user-select: none;
}

.mobile-menu-btn:hover {
  transform: scale(1.1);
}

.recipe-row {
  display: flex;
  gap: 1.5rem;
  overflow-x: auto;
  padding: 0.5rem 0.5rem 2rem;
  flex-direction: row;
  flex-wrap: wrap;
  gap: 3rem;
  margin: 0 4rem;
}

/* Recipe Card Styles */
.recipe-card {
  flex: 1 1 300px;
  max-width: 350px;
  min-width: 150px; 
  background-color: #1e1e1e;
  border-radius: 12px;
  overflow: hidden;
  transition: transform 0.3s, box-shadow 0.3s;
  box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
  width: 100%;
  aspect-ratio: 15 / 18;
}

.recipe-card:hover {
  transform: translateY(-5px);
  box-shadow: 0 8px 25px rgba(0, 0, 0, 0.3);
}

.card-img {
  width: 100%;
  height: 200px;
  object-fit: cover;
}

.card-img img {
  width: 100%;
  height: 100%;
  object-fit: cover;
  transition: transform 0.5s;
}

.card-content {
  padding: 1.2rem;
}

.card-title {
  font-size: 1.2rem;
  margin-bottom: 0.5rem;
  color: #ffffff;
}

.card-desc {
  font-size: 0.9rem;
  color: #a0a0a0;
  margin-bottom: 1rem;
}

@keyframes gradientShift {
  0%, 100% {
    background-position: 0% 50%;
  }
  50% {
    background-position: 100% 50%;
  }
}

/* Mobile Responsive Styles */
@media (max-width: 1048px) {
  #nav-list {
    display: none;
    position: absolute;
    top: 100%;
    right: 0;
    background-color: #1e1e1e;
    flex-direction: column;
    width: 200px;
    padding: 1rem;
    border-radius: 0 0 0 12px;
    box-shadow: -2px 4px 10px rgba(0, 0, 0, 0.3);
    gap: 0.5rem;
  }
  
  #nav-list.show {
    display: flex;
  }
  
  #nav-list li {
    width: 100%;
  }
  
  #nav-list .nav-btn {
    width: 100%;
    text-align: left;
  }
  
  #more-option {
    display: block;
  }
  
  .navbar {
    flex-wrap: wrap;
    position: relative;
  }
  
  .main-nav {
    flex-direction: column;
    width: 80%;
    gap: 0.5rem;
  }
  
  .nav-buttons {
    text-align: end;
    flex-direction: column-reverse;
    width: auto;
    height: 100%;
    min-width: 50px;
  }
  
  .gradient-text {
    font-size: 5vw;
  }
  
  .main-container {
    height: 15vh;
  }
}

@media (max-width: 320px) {
  .main-container {
    height: 10vh;
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

.chef-ai-btn i {
  color: #1e1e1e;
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
  <body>
    <!-- Navigation Bar -->
    <nav class="navbar">
      <div class="main-nav">
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
          />
        </div>
      </div>

      <div class="nav-buttons">
        <ol id="nav-list">
          <li>
            <button class="nav-btn"><a href="index.php">Home</a></button>
          </li>
          <li><button class="nav-btn">Categories</button></li>
          <li>
            <button class="nav-btn"><a href="p.php">Create</a></button>
          </li>
          <li>
        
            <div class="user-section"><div class="profile-pic"><a  style="text-decoration: none;color:#ffffff;" href="https://t.me/testHubCommunity">community</a></div></div>
          </li>
        </ol>
        <div id="more-option" ><h1 class="mobile-menu-btn">☰</h1></div>
      </div>
    </nav>
    <!-- aimation test bar  -->
    <div class="main-container">
      <div class="input-text">
        <h2 class="montserrat gradient-text">
          Every flavor has a story , find yours
        </h2>
      </div>
      <div class="loader" id="loader">
                    <div class="inner one"></div>
                    <div class="inner two"></div>
                    <div class="inner three"></div>
            </div>
    </div>
    <div id="card-container" class="recipe-row">
    
    </div>
   
<script>
let recipesData = [];
var recipes;
let start = 0;
const perPage = 8;
let loadingInProgress = false;

const container = document.getElementById("card-container");

async function displayRecipes() {
    try {
        const response = await fetch("get_all_recipi.php");
        recipesData = await response.json();
        recipes = [...recipesData];
        loadAndDisplay(); 
    } catch (err) {
        console.error("Error loading recipes:", err);
    }
}

// ----------------------------------------
// IMAGE RESIZER (NEW)
// ----------------------------------------
function resizeImage(url, maxWidth, maxHeight, callback) {
    const img = new Image();
    img.crossOrigin = "anonymous";
    img.src = url;

    img.onload = () => {
        const canvas = document.createElement("canvas");
        let width = img.width;
        let height = img.height;

        // scale down
        if (width > maxWidth) {
            height *= maxWidth / width;
            width = maxWidth;
        }
        if (height > maxHeight) {
            width *= maxHeight / height;
            height = maxHeight;
        }

        canvas.width = width;
        canvas.height = height;

        const ctx = canvas.getContext("2d");
        ctx.drawImage(img, 0, 0, width, height);

        // compress to 60%
        const compressed = canvas.toDataURL("image/jpeg", 0.75);
        callback(compressed);
    };
}

// ----------------------------------------
// LAZY LOADING OBSERVER (NEW)
// ----------------------------------------
const observer = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
        if (entry.isIntersecting) {

            const img = entry.target;
            const url = img.dataset.src;

            // compress to card size
            resizeImage(url, 500, 350, (compressedUrl) => {
                img.src = compressedUrl;
                img.classList.add("loaded");
            });

            observer.unobserve(img);
        }
    });
});

// ----------------------------------------
function appendData(items) {
    const cards = items.map((recipe) => {
        return `
            <div class="recipe-card" onclick="openRecipe('${recipe.recipi_id}')">
                <div class="card-img">
                    <img data-src="${recipe.r_picture}" alt="${recipe.r_name}" class="lazy-img">
                </div>
                <div class="card-content">
                    <h3 class="card-title">${recipe.r_name}</h3>
                    <p class="card-desc">${recipe.description}</p>
                    <a href="viwe_recipi.php?id=${recipe.recipi_id}" class="see-more-btn">View Recipe</a>  
                </div>
            </div>
        `;
    });

    container.innerHTML += cards.join('');

    // Observe new images
    document.querySelectorAll(".lazy-img").forEach(img => {
        if (!img.src) observer.observe(img);
    });
}
// ----------------------------------------

function openRecipe(id) {
    window.location.href = `viwe_recipi.php?id=${id}`;
}

function showLoader() {
    return new Promise((resolve) => {
        const loader = document.getElementById("loader");
        loader.style.display = "block";

        setTimeout(() => {
            loader.style.display = "none";
            resolve();
        }, 1500);
    });
}

async function loadAndDisplay() {
    if (loadingInProgress) return;
    if (start >= recipesData.length) return;

    loadingInProgress = true;

    await showLoader();

    appendData(recipesData.slice(start, start + perPage));
    start += perPage;

    loadingInProgress = false;
}

displayRecipes();

// Infinite scroll
window.addEventListener("scroll", () => {
    if (window.innerHeight + window.scrollY >= document.body.offsetHeight - 10) {
        loadAndDisplay();
    }
});
</script>

<script>
const searchBar = document.getElementById("searchInput");
const Testcontainer = document.getElementById("card-container");

searchBar.addEventListener('input', (e) => {

    const text = e.target.value.toLowerCase();

    if (text === "") {
        return;
    }

    // show loader
    Testcontainer.innerHTML = `
        <div class="loader">  
            <div class="inner one"></div>
            <div class="inner two"></div>
            <div class="inner three"></div>
        </div>
    `;

    if (recipes.length < 1) {
        Testcontainer.innerHTML = "NO RESULT FOUND";
        return;
    }

    setTimeout(() => {

        // filter data
        const filterdata = recipes.filter((card) =>
            card.r_name.toLowerCase().includes(text)
        );

        // start building results
        if (filterdata.length < 1) {
            Testcontainer.innerHTML = "<h1 style='text-align:center; color:#ff7b2c;'>NO RESULT FOUND</h1>";
            return;
        }

        Testcontainer.innerHTML = "";

        const htmlCards = filterdata.map((recipe) => {
            return `
                <div class="recipe-card"  onclick="openRecipe('${recipe.recipi_id}')">
                    <div class="card-img">
                        <img data-src="${recipe.r_picture}" 
                             alt="${recipe.r_name}" 
                             class="lazy-img">
                    </div>

                    <div class="card-content">
                        <h3 class="card-title">${recipe.r_name}</h3>
                        <p class="card-desc">${recipe.description}</p>
                        <a href="viwe_recipi.php?id=${recipe.recipi_id}" 
                           class="see-more-btn">View Recipe</a>
                    </div>
                </div>
            `;
        });

        Testcontainer.innerHTML = htmlCards.join("");

        // observe new images for lazy loading
        document.querySelectorAll(".lazy-img").forEach(img => {
            if (!img.src) observer.observe(img);
        });

    }, 500);
});
</script>


  </script>
  <script>
      // Mobile Menu Toggle
      const mobileMenu = document.getElementById('nav-list');
      const mobileMenuBtn = document.querySelector('.mobile-menu-btn');
      
      mobileMenuBtn.addEventListener('click', () => {
        mobileMenu.classList.toggle('show');
        
        // Change icon when menu is open/closed
        if (mobileMenu.classList.contains('show')) {
          mobileMenuBtn.textContent = '✕';
        } else {
          mobileMenuBtn.textContent = '☰';
        }
      });
      
      // Close menu when clicking outside
      document.addEventListener('click', (e) => {
        if (!e.target.closest('.nav-buttons') && mobileMenu.classList.contains('show')) {
          mobileMenu.classList.remove('show');
          mobileMenuBtn.textContent = '☰';
        }
      });
      
      // Close menu when a nav item is clicked
      const navButtons = document.querySelectorAll('#nav-list .nav-btn');
      navButtons.forEach(btn => {
        btn.addEventListener('click', () => {
          if (window.innerWidth <= 1048) {
            mobileMenu.classList.remove('show');
            mobileMenuBtn.textContent = '☰';
          }
        });
      });
    </script>

    <!-- Chef AI Button -->
    <a href="AiBot.php" class="chef-ai-btn" title="Ask AI Chef">
      <i class="fas fa-chef-hat"></i>
    </a>
  </body>
</html>
