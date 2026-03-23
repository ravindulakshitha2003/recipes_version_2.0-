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
    <style>
* {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  font-family: "Segoe UI", Tahoma, Geneva, Verdana, sans-serif;
}
:root {
  --accent: #ff7b2c;
}
body {
  background-color: #121212;
  color: #e0e0e0;
  line-height: 1.6;
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
    </style>
  </head>
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
            <button class="nav-btn"><a href="#home">Home</a></button>
          </li>
          <li><button class="nav-btn">Categories</button></li>
          <li>
            <button class="nav-btn"><a href="#create">Create</a></button>
          </li>
          <li>
            <div class="user-section">
              <div class="profile-pic"><a  style="text-decoration: none;color:#ffffff;" href="https://t.me/testHubCommunity">CM</a></div>
            </div>
          </li>
        </ol>
        <div id="more-option">
          <h1 class="mobile-menu-btn">☰</h1>
        </div>
      </div>
    </nav>

    <!-- Main Container -->
    <div class="main-container">
      <div class="input-text">
        <h2 class="montserrat gradient-text">
          Every flavor has a story, find yours
        </h2>
      </div>
    </div>

    

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
  </body>
</html>