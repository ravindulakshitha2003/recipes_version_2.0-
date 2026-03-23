

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FlavorVerse | Upload Recipe</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', 'Segoe UI', sans-serif;
        }

        :root {
            --dark-bg:#121212;
            --card-bg: #252525;
            --accent: #ff7b2c;;
            --accent-hover:  #ff7b2c;
            --text-primary:  #f5f5f5;
            --text-secondary: #b0b0b0;
            --success: #ff7b2c;
            --transition: all 0.3s ease;
        }
        body {
            background-color: var(--dark-bg);
            color: var(--text-primary);
            line-height: 1.6;
            min-height: 100vh;
            padding-bottom: 2rem;
        }

        /* Navigation Bar */
        .navbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 1rem 5%;
            background-color: transparent;
            position: sticky;
            top: 0;
            z-index: 1000;
            backdrop-filter: blur(10px);
            flex-wrap: wrap;
        }

        .logo {
            display: flex;
            align-items: center;
            font-size: 1.8rem;
            font-weight: 800;
            color: var(--accent);
            text-decoration: none;
            margin-bottom: 0.5rem;
        }

        .logo i {
            margin-right: 0.5rem;
        }

        .search-bar {
            flex: 1;
            min-width: 200px;
            margin: 0 1rem;
            position: relative;
            color: white;
            order: 3;
            width: 100%;
            margin-top: 0.5rem;
        }

        .search-bar input {
            width: 100%;
            padding: 0.9rem 1.5rem 0.9rem 3rem;
            border-radius: 50px;
            border: none;
            background-color: #2c2c2c;
            color: white;
            font-size: 1rem;
            outline: none;
            transition: all 0.3s;
        }

        .search-bar input:focus {
            box-shadow: 0 0 0 2px var(--accent);
        }

        .search-bar i {
            position: absolute;
            left: 1.2rem;
            top: 50%;
            transform: translateY(-50%);
            color: white;
        }

        .nav-buttons {
            display: flex;
            gap: 1.2rem;
            order: 2;
            margin: 0px 20px;
            transition:display  0.3s linear;
        }

        .nav-btn {
            background: none;
            border: none;
            color: var(--text-primary);
            font-size: 1rem;
            cursor: pointer;
            transition: color 0.3s;
            padding: 0.5rem 1rem;
            font-weight: 500;
        }

        .nav-btn:hover, .nav-btn.active {
            border-bottom:2px solid   #ff7b2c;
        }

        .user-section {
            display: flex;
            align-items: center;
            order: 3;
            padding-left: 20px;
        }

        .profile-pic {
            width: 42px;
            height: 42px;
            border-radius: 50%;
            background: linear-gradient(45deg, var(--accent), #ffaa64);
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-weight: bold;
            cursor: pointer;
            border: 2px solid rgba(255, 255, 255, 0.1);
            transition: transform 0.3s;
        }

        .profile-pic:hover {
            transform: scale(1.05);
        }

        /* Mobile menu button */
        .mobile-menu-btn {
            display: none;
            background: none;
            border: none;
            color: white;
            font-size: 1.5rem;
            cursor: pointer;
        }

        /* Main Content */
        .container {
            max-width: 1200px;
            margin: 2rem auto;
            padding: 0 2rem;
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 2.5rem;
        }

        @media (max-width: 900px) {
            .container {
                grid-template-columns: 1fr;
                gap: 1.5rem;
                padding: 0 1rem;
            }
        }

        .section-title {
            font-size: 1.8rem;
            margin-bottom: 1.5rem;
            padding-left: 1rem;
            border-left: 4px solid var(--accent);
            color: white;
        }

        /* Form Styling */
        .form-card {
            background-color: var(--card-bg);
            border-radius: 16px;
            padding: 2rem;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.3);
        }

        @media (max-width: 600px) {
            .form-card {
                padding: 1.5rem;
            }
        }

        .form-group {
            margin-bottom: 1.8rem;
        }

        .form-label {
            display: block;
            margin-bottom: 0.7rem;
            font-weight: 500;
            color: var(--text-primary);
        }

        .form-input, .form-textarea, .form-select {
            width: 100%;
            padding: 1rem;
            border-radius: 10px;
            border: 1px solid  #121212;
            background-color: #121212;
            color:white;
            font-size: 1rem;
            transition: all 0.3s;
        }

        .form-input:focus, .form-textarea:focus, .form-select:focus {
            outline: none;
          
            box-shadow: 0 0 0 2px  #ff7b2c;
        }

        .form-textarea {
            min-height: 120px;
            resize: vertical;
        }

        /* Ingredients List */
        .ingredients-list {
            margin-top: 0.5rem;
        }

        .ingredient-item {
            display: flex;
            align-items: center;
            margin-bottom: 0.8rem;
            background-color: #121212;
            padding: 0.8rem;
            border-radius: 8px;
        }

        .ingredient-item input {
            flex: 1;
            background: transparent;
            border: none;
            color: var(--text-primary);
            font-size: 1rem;
            padding: 0.5rem;
        }

        .ingredient-item input:focus {
            outline: none;
        }

        .remove-ingredient {
            background: none;
            border: none;
            color: #ff5252;
            cursor: pointer;
            font-size: 1.2rem;
            padding: 0.3rem;
            border-radius: 4px;
            transition: background-color 0.3s;
        }

        .remove-ingredient:hover {
            background-color: rgba(255, 82, 82, 0.1);
        }

        .add-ingredient {
            background:  #ff7b2c;
            border: none;
            color:#121212;
            cursor: pointer;
            display: inline-flex;
            align-items: center;
            font-size: 1rem;
            padding: 0.5rem 1rem;
            border-radius: 8px;
            transition: background-color 0.3s;
            margin-top: 0.5rem;
            font-weight: 500;
        }

        .add-ingredient:hover {
            box-shadow: 0px 0px 10px  #ff7b2c;;
        }

        .add-ingredient i {
            margin-right: 0.5rem;
        }

        /* Image Upload */
        .image-upload {
            border: 2px dashed   #ff7b2c;;
            border-radius: 10px;
            padding: 2rem;
            text-align: center;
            cursor: pointer;
            transition: all 0.3s;
            margin-bottom: 1.5rem;
        }

        @media (max-width: 600px) {
            .image-upload {
                padding: 1.5rem;
            }
        }

        .image-upload:hover {
            border-color: var(--accent);
            background-color: rgba(254, 254, 254, 0.05);
        }

        .upload-icon {
            font-size: 3rem;
            color: var(--accent);
            margin-bottom: 1rem;
        }

        .upload-text {
            color: var(--text-secondary);
            margin-bottom: 1rem;
        }

        .upload-button {
            background-color: black;
            color: white;
            border: none;
            padding: 0.8rem 1.5rem;
            border-radius: 50px;
            cursor: pointer;
            font-weight: 600;
            transition: background-color 0.3s;
        }

        .upload-button:hover {
            background-color: var(--accent-hover);
        }

        #file-name {
            margin-top: 1rem;
            color: var(--text-secondary);
            font-size: 0.9rem;
        }

        /* Submit Button */
        .submit-button {
            width: 100%;
            background-color: var(--accent);
            color: rgb(20, 20, 20);
            border: none;
            padding: 1.2rem;
            border-radius: 12px;
            cursor: pointer;
            font-weight: 600;
            font-size: 1.1rem;
            transition: all 0.3s;
            margin-top: 1rem;
            box-shadow: 0 4px 15px   white;;
        }

        .submit-button:hover {
            background-color: var(--accent-hover);
            transform: translateY(-2px);
            box-shadow: 0 6px 20px   #ff7b2c;;
        }

        .submit-button:active {
            transform: translateY(0);
        }

        /* Preview Section */
        .preview-card {
            background-color: var(--card-bg);
            border-radius: 16px;
            padding: 2rem;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.3);
            height: fit-content;
        }

        @media (min-width: 901px) {
            .preview-card {
                position: sticky;
                top: 100px;
            }
        }

        @media (max-width: 600px) {
            .preview-card {
                padding: 1.5rem;
            }
        }

        .preview-image {
            width: 100%;
            height: 250px;
            border-radius: 12px;
            object-fit: cover;
            margin-bottom: 1.5rem;
            background-color: #1e1e1e;
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--text-secondary);
            font-size: 0.9rem;
        }

        .preview-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            border-radius: 12px;
        }

        .preview-title {
            font-size: 1.6rem;
            margin-bottom: 0.8rem;
            color:   #ff7b2c;;
        }

        .preview-description {
            color: white;
            margin-bottom: 1.5rem;
            line-height: 1.6;
        }

        .preview-meta {
            display: flex;
            gap: 1.5rem;
            margin-bottom: 1.5rem;
            color:white;
            font-size: 0.9rem;
        }

        .preview-section {
            margin-bottom: 1.5rem;
        }

        .preview-section-title {
            font-size: 1.2rem;
            margin-bottom: 0.8rem;
            color: #ff7b2c;
            padding-bottom: 0.5rem;
            border-bottom: 1px solid #3a3a3a;
        }

        .preview-ingredients, .preview-steps {
            padding-left: 1.2rem;
        }

        .preview-ingredients li, .preview-steps li {
            margin-bottom: 0.5rem;
            line-height: 1.5;
        }

        .preview-ingredients li {
            list-style-type: none;
            position: relative;
            padding-left: 1.5rem;
        }

        .preview-ingredients li:before {
            content: "•";
            color: var(--accent);
            font-size: 1.5rem;
            position: absolute;
            left: 0;
            top: -0.4rem;
        }

        .preview-steps li {
            margin-bottom: 1rem;
        }

        /* Footer */
        footer {
            background-color: #1a1a1a;
            padding: 2rem 5%;
            margin-top: 4rem;
            text-align: center;
        }

        .footer-content {
            max-width: 1200px;
            margin: 0 auto;
        }

        .social-icons {
            display: flex;
            justify-content: center;
            gap: 1.5rem;
            margin: 1.5rem 0;
        }

        .social-icons a {
            color: white;
            font-size: 1.5rem;
            transition: color 0.3s;
        }

        .social-icons a:hover {
            color:white;
        }

        .footer-links {
            display: flex;
            justify-content: center;
            gap: 2rem;
            margin-bottom: 1.5rem;
            flex-wrap: wrap;
        }

        .footer-links a {
            color:white;
            text-decoration: none;
            transition: color 0.3s;
        }

        .footer-links a:hover {
            color: var(--accent);
        }

        .copyright {
            color: var(--text-secondary);
            font-size: 0.9rem;
        }
        .preview-section-title .preview-title{
            color: #ff7b2c;
        }
        .preview-description .preview-meta{
            color: white;
        }

        /* Mobile Responsive Styles */
        @media only screen and (max-width: 768px) {
            .navbar {
                flex-direction: row;
                flex-wrap: wrap;
                padding: 0.51rem;
            }
            
            .logo {
                font-size: 1.5rem;
                margin-bottom: 0;
            }
            
            .search-bar {
                order: 3;
                margin: 0.5rem 0 0 0;
                min-width: 100%;
            }
            
            .nav-buttons {
                display: none;
                flex-direction: column;
                position: absolute;
                top: 100%;
                left: 0;
                width: 100%;
                background-color: var(--dark-bg);
                padding: 1rem;
                box-shadow: 0 5px 10px rgba(0,0,0,0.1);
            }
            
            .nav-buttons.active {
                display: flex;
            }
            
            .nav-btn {
                padding: 0.8rem;
                text-align: center;
                width: 100%;
            }
            
            .mobile-menu-btn {
                display: block;
                order: 2;
            }
            
            .user-section {
                order: 1;
            }
            
            .profile-pic {
                width: 36px;
                height: 36px;
                font-size: 0.9rem;
            }
            
            .section-title {
                font-size: 1.5rem;
            }
            
            .preview-image {
                height: 200px;
            }
        }

        @media only screen and (max-width: 480px) {
            .container {
                margin: 1rem auto;
                padding: 0 0.5rem;
            }
            
            .form-card, .preview-card {
                padding: 1rem;
            }
            
            .form-input, .form-textarea, .form-select {
                padding: 0.8rem;
            }
            
            .preview-title {
                font-size: 1.4rem;
            }
            
            .preview-section-title {
                font-size: 1.1rem;
            }
            
            .image-upload {
                padding: 1rem;
            }
            
            .upload-icon {
                font-size: 2.5rem;
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
    <nav class="navbar">
        <a href="#" class="logo">
            <i class="fas fa-utensils"></i>
            <span>FlavorVerse</span>
        </a>
        
        <button class="mobile-menu-btn">
            <i class="fas fa-bars"></i>
        </button>
        
        <div class="nav-buttons" id="nav-buttons">
            <button class="nav-btn active">Home</button>
            <button class="nav-btn">Categories</button>
            
            <button class="nav-btn">Saved</button>
        </div>
        
        <div class="search-bar">
            <i class="fas fa-search"></i>
            <input type="text" placeholder="Search for recipes...">
        </div>
        
        <div class="user-section">
            <div class="profile-pic">JS</div>
        </div>
    </nav>

    <!-- Main Content -->
    <div class="container">
        <!-- Form Section -->
        <form method="post" action="create_data.php">
            <h2 class="section-title">Upload Your Recipe</h2>
            
            <div class="form-card">
                <div class="form-group">
                    <label for="recipe-title" class="form-label">Recipe Title</label>
                    <input type="text" name="title" id="recipe-title" class="form-input" placeholder="e.g., Creamy Garlic Pasta">
                </div>
                
                <div class="form-group">
                    <label for="recipe-description" class="form-label">Short Description</label>
                    <textarea id="recipe-description" name="decs" class="form-textarea" placeholder="Describe your recipe in a few sentences..."></textarea>
                </div>
                
                <div class="form-group">
                    <label class="form-label">Ingredients</label>
                    <div class="ingredients-list" id="ingredients-container">
                        <div class="ingredient-item">
                            <input type="text" name="ingredients[]" placeholder="Add ingredient (e.g., 2 cups flour)">
                            <button class="remove-ingredient">
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                    </div>
                    <button class="add-ingredient" type="button" id="add-ingredient">
                        <i class="fas fa-plus"></i> Add Ingredient
                    </button>
                    
                </div>
                
                <div class="form-group">
                    <label for="cooking-steps" class="form-label">Cooking Steps</label>
                    <textarea id="cooking-steps" name="step" class="form-textarea" placeholder="Describe each step in detail..."></textarea>
                </div>
                
                <div class="form-group">
                    <label for="recipe-category" class="form-label">Category</label>
                    <select id="recipe-category" name="category" class="form-select">
                        <option value="">Select a category</option>
                        <option value="dessert">dessert</option>
                        <option value="main">main Dish</option>
                        <option value="appetizer">appetizer</option>
                        <option value="salad">salad</option>
                        <option value="soup">soup</option>
                        <option value="drink">drink</option>
                    </select>
                </div>
                
                <div class="form-group">
                    <label class="form-label">Recipe Image</label>
                    <div class="image-upload" id="image-upload-area">
                        <div class="upload-icon">
                            <i class="fas fa-cloud-upload-alt"></i>
                        </div>
                        <p class="upload-text">Drag & drop your image here or click to browse</p>
                        <button type="button" class="upload-button">Select Image</button>
                        <input type="file" id="image-upload" accept="image/*" hidden>
                        <p id="file-name"></p>
                    </div>
                </div>
                <div class="form-group">
                    <label for="recipe-title" class="form-label">link image</label>
                    <input type="text" name="imagelink" id="image-link" class="form-input" placeholder="www.image.jpg">
                </div>
                
                <button class="submit-button" type="submit">Submit Recipe</button>
            </div>
        </form>
        
        <!-- Preview Section -->
        <section>
            <h2 class="section-title">Recipe Preview</h2>
            
            <div class="preview-card">
                <div class="preview-image" id="preview-image">
                    <span>Image preview will appear here</span>
                </div>
                
                <h3 class="preview-title" id="preview-title">Recipe Title</h3>
                <p class="preview-description" id="preview-description">Recipe description will appear here...</p>
                
                <div class="preview-meta">
                    <span id="preview-category">Category: Not selected</span>
                </div>
                
                <div class="preview-section">
                    <h4 class="preview-section-title">Ingredients</h4>
                    <ul class="preview-ingredients" id="preview-ingredients">
                        <li>Ingredients will appear here</li>
                    </ul>
                </div>
                
                <div class="preview-section">
                    <h4 class="preview-section-title">Cooking Steps</h4>
                    <ol class="preview-steps" id="preview-steps">
                        <li>Cooking steps will appear here</li>
                    </ol>
                </div>
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
            </div>
            
            <div class="footer-links">
                <a href="#">About Us</a>
                <a href="#">Contact</a>
                <a href="#">Privacy Policy</a>
                <a href="#">Terms of Service</a>
            </div>
            
            <p class="copyright">© 2023 FlavorVerse. All rights reserved.</p>
        </div>
    </footer>

    <script>
        // DOM Elements
        const recipeTitle = document.getElementById('recipe-title');
        const recipeDescription = document.getElementById('recipe-description');
        const cookingSteps = document.getElementById('cooking-steps');
        const recipeCategory = document.getElementById('recipe-category');
        const imageUploadArea = document.getElementById('image-upload-area');
        const imageUpload = document.getElementById('image-upload');
        const fileName = document.getElementById('file-name');
        const addIngredientBtn = document.getElementById('add-ingredient');
        const ingredientsContainer = document.getElementById('ingredients-container');
        const mobileMenuBtn = document.querySelector('.mobile-menu-btn');
        const navButtons = document.getElementById('nav-buttons');
        const imge_link = document.getElementById('image-link');
        // Preview Elements
        const previewTitle = document.getElementById('preview-title');
        const previewDescription = document.getElementById('preview-description');
        const previewCategory = document.getElementById('preview-category');
        const previewImage = document.getElementById('preview-image');
        const previewIngredients = document.getElementById('preview-ingredients');
        const previewSteps = document.getElementById('preview-steps');
        

    imge_link.addEventListener('change', function(e) {
    const url = e.target.value; // get the URL typed by user
    previewImage.style.backgroundImage = `url('${url}')`;
    previewImage.style.backgroundSize = 'cover';  // fit image inside div
    previewImage.style.backgroundRepeat = 'no-repeat';
    previewImage.style.backgroundPosition = 'center';
});



        // Mobile menu toggle
        mobileMenuBtn.addEventListener('click', () => {
            navButtons.classList.toggle('active');
        });
        
        // Close mobile menu when clicking outside
        document.addEventListener('click', (e) => {
            if (!e.target.closest('.navbar') && navButtons.classList.contains('active')) {
                navButtons.classList.remove('active');
            }
        });
        
        // Add ingredient functionality
        addIngredientBtn.addEventListener('click', () => {
            const ingredientItem = document.createElement('div');
            ingredientItem.className = 'ingredient-item';
            ingredientItem.innerHTML = `
                <input type="text" name="ingredients[]" placeholder="Add ingredient (e.g., 2 cups flour)">
                <button type="button" class="remove-ingredient" >
                    <i class="fas fa-times"></i>
                </button>
            `;
            
            ingredientsContainer.appendChild(ingredientItem);
            
            // Add event to remove button
            const removeBtn = ingredientItem.querySelector('.remove-ingredient');
            removeBtn.addEventListener('click', () => {
                ingredientItem.remove();
                updateIngredientsPreview();
            });
            
            // Add event to input for live update
            const input = ingredientItem.querySelector('input');
            input.addEventListener('input', updateIngredientsPreview);
        });
        
        // Remove ingredient buttons functionality
        document.querySelectorAll('.remove-ingredient').forEach(btn => {
            btn.addEventListener('click', function() {
                this.parentElement.remove();
                updateIngredientsPreview();
            });
        });
        
        // Image upload functionality
        imageUploadArea.addEventListener('click', () => {
            imageUpload.click();
        });
        




        // imageUpload.addEventListener('change', function() {
        //     if (this.files && this.files[0]) {
        //         fileName.textContent = this.files[0].name;
                
        //         const reader = new FileReader();
        //         reader.onload = function(e) {
        //             previewImage.innerHTML = `<img src="${e.target.result}" alt="Recipe preview">`;
        //         };
        //         reader.readAsDataURL(this.files[0]);
        //     }
        // });
        
        // Drag and drop for image upload
        imageUploadArea.addEventListener('dragover', function(e) {
            e.preventDefault();
            this.style.borderColor = 'var(--accent)';
            this.style.backgroundColor = 'rgba(255, 123, 54, 0.1)';
        });
        
        imageUploadArea.addEventListener('dragleave', function() {
            this.style.borderColor = '#3a3a3a';
            this.style.backgroundColor = 'transparent';
        });
        
        imageUploadArea.addEventListener('drop', function(e) {
            e.preventDefault();
            this.style.borderColor = '#3a3a3a';
            this.style.backgroundColor = 'transparent';
            
            if (e.dataTransfer.files && e.dataTransfer.files[0]) {
                imageUpload.files = e.dataTransfer.files;
                fileName.textContent = e.dataTransfer.files[0].name;
                
                const reader = new FileReader();
                reader.onload = function(e) {
                    previewImage.innerHTML = `<img src="${e.target.result}" alt="Recipe preview">`;
                };
                reader.readAsDataURL(e.dataTransfer.files[0]);
            }
        });
        
        // Live preview updates
        recipeTitle.addEventListener('input', function() {
            previewTitle.textContent = this.value || 'Recipe Title';
        });
        
        recipeDescription.addEventListener('input', function() {
            previewDescription.textContent = this.value || 'Recipe description will appear here...';
        });
        
        cookingSteps.addEventListener('input', function() {
            const steps = this.value.split('\n').filter(step => step.trim() !== '');
            
            if (steps.length > 0) {
                previewSteps.innerHTML = steps.map(step => `<li>${step}</li>`).join('');
            } else {
                previewSteps.innerHTML = '<li>Cooking steps will appear here</li>';
            }
        });
        
        recipeCategory.addEventListener('change', function() {
            if (this.value) {
                previewCategory.textContent = `Category: ${this.options[this.selectedIndex].text}`;
            } else {
                previewCategory.textContent = 'Category: Not selected';
            }
        });
        
        // Update ingredients preview
        function updateIngredientsPreview() {
            const ingredients = [];
            document.querySelectorAll('.ingredient-item input').forEach(input => {
                if (input.value.trim() !== '') {
                    ingredients.push(input.value);
                }
            });
            
            if (ingredients.length > 0) {
                previewIngredients.innerHTML = ingredients.map(ingredient => `<li>${ingredient}</li>`).join('');
            } else {
                previewIngredients.innerHTML = '<li>Ingredients will appear here</li>';
            }
        }
        
        // Initialize ingredients input events
        document.querySelectorAll('.ingredient-item input').forEach(input => {
            input.addEventListener('input', updateIngredientsPreview);
        });
        
        // Submit button functionality
       /* document.querySelector('.submit-button').addEventListener('click', function(e) {
            e.preventDefault();
            
            // Basic validation
            if (!recipeTitle.value.trim()) {
                alert('Please enter a recipe title');
                recipeTitle.focus();
                return;
            }
            
            if (!recipeDescription.value.trim()) {
                alert('Please enter a recipe description');
                recipeDescription.focus();
                return;
            }
            
            const ingredients = [];
            document.querySelectorAll('.ingredient-item input').forEach(input => {
                if (input.value.trim() !== '') {
                    ingredients.push(input.value);
                }
            });
            
            if (ingredients.length === 0) {
                alert('Please add at least one ingredient');
                return;
            }
            
            if (!cookingSteps.value.trim()) {
                alert('Please enter cooking steps');
                cookingSteps.focus();
                return;
            }
            
            if (!recipeCategory.value) {
                alert('Please select a category');
                recipeCategory.focus();
                return;
            }
            
            if (!imageUpload.files || !imageUpload.files[0]) {
                alert('Please upload an image for your recipe');
                return;
            }
            
            // If all validation passes
            alert('Recipe submitted successfully!');
            // Here you would typically send the data to a server
        });*/
        function loading() {
            fetch('check_session.php')
                .then(response => response.json())
                .then(data => {
                    if (!data.active) {
                        window.open('main.php','_self');
                    }
                    else{

                         
                    }
                });
        }
        window.addEventListener('load',loading)
    </script>
    <!-- Chef AI Button -->
    <a href="AiBot.php" class="chef-ai-btn" title="Ask AI Chef">👨‍🍳</a>
</body>
</html>