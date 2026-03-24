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
            --dark-bg: #121212;
            --card-bg: #252525;
            --accent: #ff7b2c;
            --accent-hover: #ff7b2c;
            --text-primary: #f5f5f5;
            --text-secondary: #b0b0b0;
            --success: #ff7b2c;
            --transition: all 0.3s ease;
        }

        /* Light Mode */
        [data-theme="light"] {
            --dark-bg: #ffffff;
            --card-bg: #ffffff;
            --text-primary: #1a1a1a;
            --text-secondary: #666666;
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
            transition: display 0.3s linear;
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
            border-bottom: 2px solid #ff7b2c;
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
            border: 1px solid #121212;
            background-color: #121212;
            color: white;
            font-size: 1rem;
            transition: all 0.3s;
        }

        .form-input:focus, .form-textarea:focus, .form-select:focus {
            outline: none;
            box-shadow: 0 0 0 2px #ff7b2c;
        }

        .form-textarea {
            min-height: 120px;
            resize: vertical;
        }

        /* ── INGREDIENTS ── */
        .ingredients-list {
            margin-top: 0.5rem;
        }

        .ingredient-item {
            margin-bottom: 1rem;
            background-color: #121212;
            border-radius: 10px;
            overflow: hidden;
            animation: slideIn 0.2s ease;
            border: 1px solid #2a2a2a;
        }

        /* Top row: name + remove */
        .ingredient-main-row {
            display: flex;
            align-items: center;
            padding: 0.7rem 0.8rem;
            gap: 0.5rem;
            cursor: pointer;
            border-bottom: 1px solid #1e1e1e;
        }

        .ingredient-main-row input[name="ingredients[]"] {
            flex: 1;
            background: transparent;
            border: none;
            color: var(--text-primary);
            font-size: 1rem;
            padding: 0.3rem 0.5rem;
        }

        .ingredient-main-row input[name="ingredients[]"]:focus {
            outline: none;
        }

        .ingredient-toggle {
            background: none;
            border: none;
            color: var(--accent);
            cursor: pointer;
            font-size: 0.75rem;
            padding: 0.3rem 0.5rem;
            border-radius: 4px;
            white-space: nowrap;
            transition: background 0.2s;
            display: flex;
            align-items: center;
            gap: 0.3rem;
        }

        .ingredient-toggle:hover {
            background: rgba(255, 123, 44, 0.1);
        }

        .ingredient-toggle i {
            transition: transform 0.25s;
        }

        .ingredient-toggle.open i {
            transform: rotate(180deg);
        }

        .remove-ingredient {
            background: none;
            border: none;
            color: #ff5252;
            cursor: pointer;
            font-size: 1.1rem;
            padding: 0.3rem;
            border-radius: 4px;
            transition: background-color 0.3s;
        }

        .remove-ingredient:hover {
            background-color: rgba(255, 82, 82, 0.1);
        }

        /* Expandable nutrition panel */
        .ingredient-details {
            display: none;
            padding: 0.9rem 0.8rem;
            background: #161616;
        }

        .ingredient-details.open {
            display: block;
        }

        .ingredient-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 0.6rem;
        }

        .ingredient-field {
            display: flex;
            flex-direction: column;
            gap: 0.25rem;
        }

        .ingredient-field label {
            font-size: 0.7rem;
            font-weight: 600;
            letter-spacing: 0.06em;
            text-transform: uppercase;
            color: #888;
        }

        .ingredient-field input,
        .ingredient-field select {
            background: #1e1e1e;
            border: 1px solid #2e2e2e;
            border-radius: 6px;
            color: var(--text-primary);
            font-size: 0.88rem;
            padding: 0.45rem 0.6rem;
            outline: none;
            transition: border-color 0.2s;
            width: 100%;
        }

        .ingredient-field input:focus,
        .ingredient-field select:focus {
            border-color: var(--accent);
        }

        .ingredient-field select option {
            background: #1e1e1e;
        }

        .ingredient-field.full-width {
            grid-column: 1 / -1;
        }

        /* nutrition macro chips row */
        .macro-label {
            font-size: 0.68rem;
            color: var(--accent);
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.08em;
            margin: 0.6rem 0 0.4rem;
            grid-column: 1 / -1;
            border-top: 1px solid #2a2a2a;
            padding-top: 0.6rem;
        }

        .add-ingredient {
            background: #ff7b2c;
            border: none;
            color: #121212;
            cursor: pointer;
            display: inline-flex;
            align-items: center;
            font-size: 1rem;
            padding: 0.5rem 1rem;
            border-radius: 8px;
            transition: box-shadow 0.3s;
            margin-top: 0.5rem;
            font-weight: 500;
        }

        .add-ingredient:hover {
            box-shadow: 0px 0px 10px #ff7b2c;
        }

        .add-ingredient i {
            margin-right: 0.5rem;
        }

        /* ── COOKING STEPS ── */
        .steps-list {
            margin-top: 0.5rem;
        }

        .step-item {
            display: flex;
            align-items: center;
            margin-bottom: 0.8rem;
            background-color: #121212;
            padding: 0.8rem;
            border-radius: 8px;
            gap: 0.6rem;
            animation: slideIn 0.2s ease;
        }

        @keyframes slideIn {
            from { opacity: 0; transform: translateY(-6px); }
            to   { opacity: 1; transform: translateY(0); }
        }

        .step-number {
            min-width: 28px;
            height: 28px;
            border-radius: 50%;
            background-color: var(--accent);
            color: #121212;
            font-size: 0.78rem;
            font-weight: 700;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
        }

        .step-item input {
            flex: 1;
            background: transparent;
            border: none;
            color: var(--text-primary);
            font-size: 1rem;
            padding: 0.5rem;
        }

        .step-item input:focus {
            outline: none;
        }

        .remove-step {
            background: none;
            border: none;
            color: #ff5252;
            cursor: pointer;
            font-size: 1.2rem;
            padding: 0.3rem;
            border-radius: 4px;
            transition: background-color 0.3s;
            flex-shrink: 0;
        }

        .remove-step:hover {
            background-color: rgba(255, 82, 82, 0.1);
        }

        .add-step {
            background: var(--accent);
            border: none;
            color: #121212;
            cursor: pointer;
            display: inline-flex;
            align-items: center;
            font-size: 1rem;
            padding: 0.5rem 1rem;
            border-radius: 8px;
            transition: box-shadow 0.3s;
            margin-top: 0.5rem;
            font-weight: 500;
        }

        .add-step:hover {
            box-shadow: 0px 0px 10px var(--accent);
        }

        .add-step i {
            margin-right: 0.5rem;
        }

        /* Image Upload */
        .image-upload {
            border: 2px dashed #ff7b2c;
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
            box-shadow: 0 4px 15px white;
        }

        .submit-button:hover {
            background-color: var(--accent-hover);
            transform: translateY(-2px);
            box-shadow: 0 6px 20px #ff7b2c;
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
            color: #ff7b2c;
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
            color: white;
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
            color: white;
        }

        .footer-links {
            display: flex;
            justify-content: center;
            gap: 2rem;
            margin-bottom: 1.5rem;
            flex-wrap: wrap;
        }

        .footer-links a {
            color: white;
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
            <button class="nav-btn active"><a href="index.php" style="text-decoration: none;color: white;">Home</a></button>
        
        </div>

        <button id="theme-toggle-btn" title="Toggle Dark/Light Mode" style="background: none; border: 2px solid var(--accent); color: var(--accent); width: 40px; height: 40px; border-radius: 50%; cursor: pointer; display: flex; align-items: center; justify-content: center; transition: var(--transition); font-size: 1.2rem; margin-left: 10px;">
            <i class="fas fa-moon"></i>
        </button>
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

                <!-- Ingredients -->
                <div class="form-group">
                    <label class="form-label">Ingredients</label>
                    <div class="ingredients-list" id="ingredients-container">
                        <div class="ingredient-item">
                            <div class="ingredient-main-row">
                                <input type="text" name="ingredients[]" placeholder="Ingredient name (e.g., Flour)">
                                <button type="button" class="ingredient-toggle" title="Nutrition details">
                                    Details <i class="fas fa-chevron-down"></i>
                                </button>
                                <button type="button" class="remove-ingredient">
                                    <i class="fas fa-times"></i>
                                </button>
                            </div>
                            <div class="ingredient-details">
                                <div class="ingredient-grid">
                                    <div class="ingredient-field">
                                        <label>Quantity</label>
                                        <input type="text" name="quantity[]" placeholder="e.g. 2">
                                    </div>
                                    <div class="ingredient-field">
                                        <label>Unit</label>
                                        <select name="unit[]">
                                            <option value="">Select unit</option>
                                            <option>cup</option>
                                            <option>tbsp</option>
                                            <option>tsp</option>
                                            <option>g</option>
                                            <option>kg</option>
                                            <option>ml</option>
                                            <option>l</option>
                                            <option>oz</option>
                                            <option>lb</option>
                                            <option>piece</option>
                                            <option>slice</option>
                                            <option>pinch</option>
                                        </select>
                                    </div>
                                    <div class="ingredient-field full-width">
                                        <label>Clarity / Notes</label>
                                        <input type="text" name="clarity[]" placeholder="e.g. finely chopped, room temp">
                                    </div>
                                    <div class="macro-label">Nutrition (per serving)</div>
                                    <div class="ingredient-field">
                                        <label>Calories</label>
                                        <input type="number" name="calories[]" placeholder="kcal" min="0" step="0.01">
                                    </div>
                                    <div class="ingredient-field">
                                        <label>Carbohydrates (g)</label>
                                        <input type="number" name="carbohydrates[]" placeholder="g" min="0" step="0.01">
                                    </div>
                                    <div class="ingredient-field">
                                        <label>Protein (g)</label>
                                        <input type="number" name="protein[]" placeholder="g" min="0" step="0.01">
                                    </div>
                                    <div class="ingredient-field">
                                        <label>Fat (g)</label>
                                        <input type="number" name="fat[]" placeholder="g" min="0" step="0.01">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <button class="add-ingredient" type="button" id="add-ingredient">
                        <i class="fas fa-plus"></i> Add Ingredient
                    </button>
                </div>

                <!-- Cooking Steps -->
                <div class="form-group">
                    <label class="form-label">Cooking Steps</label>
                    <div class="steps-list" id="steps-container">
                        <div class="step-item">
                            <span class="step-number">1</span>
                            <input type="text" name="steps[]" placeholder="Describe this step...">
                            <button type="button" class="remove-step">
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                    </div>
                    <button class="add-step" type="button" id="add-step">
                        <i class="fas fa-plus"></i> Add Step
                    </button>
                </div>

                <div class="form-group">
                    <label for="recipe-category" class="form-label">Category</label>
                    <select id="recipe-category" name="category" class="form-select">
                        <option value="">Select a category</option>
                        <option value="dessert">Dessert</option>
                        <option value="main">Main Dish</option>
                        <option value="appetizer">Appetizer</option>
                        <option value="salad">Salad</option>
                        <option value="soup">Soup</option>
                        <option value="drink">Drink</option>
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
                    <label for="image-link" class="form-label">Link Image</label>
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
        // ── DOM Elements ──
        const recipeTitle        = document.getElementById('recipe-title');
        const recipeDescription  = document.getElementById('recipe-description');
        const recipeCategory     = document.getElementById('recipe-category');
        const imageUploadArea    = document.getElementById('image-upload-area');
        const imageUpload        = document.getElementById('image-upload');
        const fileName           = document.getElementById('file-name');
        const addIngredientBtn   = document.getElementById('add-ingredient');
        const ingredientsContainer = document.getElementById('ingredients-container');
        const addStepBtn         = document.getElementById('add-step');
        const stepsContainer     = document.getElementById('steps-container');
        const mobileMenuBtn      = document.querySelector('.mobile-menu-btn');
        const navButtons         = document.getElementById('nav-buttons');
        const imageLink          = document.getElementById('image-link');

        // ── Preview Elements ──
        const previewTitle       = document.getElementById('preview-title');
        const previewDescription = document.getElementById('preview-description');
        const previewCategory    = document.getElementById('preview-category');
        const previewImage       = document.getElementById('preview-image');
        const previewIngredients = document.getElementById('preview-ingredients');
        const previewSteps       = document.getElementById('preview-steps');

        // ── Mobile Menu ──
        mobileMenuBtn.addEventListener('click', () => {
            navButtons.classList.toggle('active');
        });

        document.addEventListener('click', (e) => {
            if (!e.target.closest('.navbar') && navButtons.classList.contains('active')) {
                navButtons.classList.remove('active');
            }
        });

        // ── Ingredients ──
        function ingredientCardHTML() {
            return `
                <div class="ingredient-main-row">
                    <input type="text" name="ingredients[]" placeholder="Ingredient name (e.g., Flour)">
                    <button type="button" class="ingredient-toggle" title="Nutrition details">
                        Details <i class="fas fa-chevron-down"></i>
                    </button>
                    <button type="button" class="remove-ingredient">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
                <div class="ingredient-details">
                    <div class="ingredient-grid">
                        <div class="ingredient-field">
                            <label>Quantity</label>
                            <input type="text" name="quantity[]" placeholder="e.g. 2">
                        </div>
                        <div class="ingredient-field">
                            <label>Unit</label>
                            <select name="unit[]">
                                <option value="">Select unit</option>
                                <option>cup</option>
                                <option>tbsp</option>
                                <option>tsp</option>
                                <option>g</option>
                                <option>kg</option>
                                <option>ml</option>
                                <option>l</option>
                                <option>oz</option>
                                <option>lb</option>
                                <option>piece</option>
                                <option>slice</option>
                                <option>pinch</option>
                            </select>
                        </div>
                        <div class="ingredient-field full-width">
                            <label>Clarity / Notes</label>
                            <input type="text" name="clarity[]" placeholder="e.g. finely chopped, room temp">
                        </div>
                        <div class="macro-label">Nutrition (per serving)</div>
                        <div class="ingredient-field">
                            <label>Calories</label>
                            <input type="number" name="calories[]" placeholder="kcal" min="0" step="0.01">
                        </div>
                        <div class="ingredient-field">
                            <label>Carbohydrates (g)</label>
                            <input type="number" name="carbohydrates[]" placeholder="g" min="0" step="0.01">
                        </div>
                        <div class="ingredient-field">
                            <label>Protein (g)</label>
                            <input type="number" name="protein[]" placeholder="g" min="0" step="0.01">
                        </div>
                        <div class="ingredient-field">
                            <label>Fat (g)</label>
                            <input type="number" name="fat[]" placeholder="g" min="0" step="0.01">
                        </div>
                    </div>
                </div>
            `;
        }

        function bindIngredientEvents(item) {
            // Toggle details panel
            const toggleBtn = item.querySelector('.ingredient-toggle');
            const detailsPanel = item.querySelector('.ingredient-details');
            toggleBtn.addEventListener('click', () => {
                const isOpen = detailsPanel.classList.toggle('open');
                toggleBtn.classList.toggle('open', isOpen);
            });

            // Remove
            item.querySelector('.remove-ingredient').addEventListener('click', () => {
                item.remove();
                updateIngredientsPreview();
            });

            // Live preview on name input
            item.querySelector('input[name="ingredients[]"]').addEventListener('input', updateIngredientsPreview);
        }

        // Bind events to the first ingredient already in HTML
        bindIngredientEvents(document.querySelector('.ingredient-item'));

        addIngredientBtn.addEventListener('click', () => {
            const ingredientItem = document.createElement('div');
            ingredientItem.className = 'ingredient-item';
            ingredientItem.innerHTML = ingredientCardHTML();
            ingredientsContainer.appendChild(ingredientItem);
            bindIngredientEvents(ingredientItem);
            // Auto-open details on new card
            ingredientItem.querySelector('.ingredient-details').classList.add('open');
            ingredientItem.querySelector('.ingredient-toggle').classList.add('open');
        });

        function updateIngredientsPreview() {
            const ingredients = [];
            document.querySelectorAll('.ingredient-item input[name="ingredients[]"]').forEach(input => {
                if (input.value.trim() !== '') ingredients.push(input.value);
            });

            previewIngredients.innerHTML = ingredients.length > 0
                ? ingredients.map(i => `<li>${i}</li>`).join('')
                : '<li>Ingredients will appear here</li>';
        }

        // ── Cooking Steps ──
        function updateStepNumbers() {
            stepsContainer.querySelectorAll('.step-item').forEach((step, index) => {
                step.querySelector('.step-number').textContent = index + 1;
            });
        }

        function updateStepsPreview() {
            const steps = [];
            stepsContainer.querySelectorAll('.step-item input').forEach(input => {
                if (input.value.trim() !== '') steps.push(input.value);
            });

            previewSteps.innerHTML = steps.length > 0
                ? steps.map(s => `<li>${s}</li>`).join('')
                : '<li>Cooking steps will appear here</li>';
        }

        // Remove button for the first step (already in HTML)
        document.querySelector('.step-item .remove-step').addEventListener('click', function () {
            this.closest('.step-item').remove();
            updateStepNumbers();
            updateStepsPreview();
        });

        // First step input live preview
        document.querySelector('.step-item input').addEventListener('input', updateStepsPreview);

        addStepBtn.addEventListener('click', () => {
            const stepItem = document.createElement('div');
            stepItem.className = 'step-item';
            stepItem.innerHTML = `
                <span class="step-number"></span>
                <input type="text" name="steps[]" placeholder="Describe this step...">
                <button type="button" class="remove-step">
                    <i class="fas fa-times"></i>
                </button>
            `;
            stepsContainer.appendChild(stepItem);
            updateStepNumbers();

            stepItem.querySelector('.remove-step').addEventListener('click', () => {
                stepItem.remove();
                updateStepNumbers();
                updateStepsPreview();
            });

            stepItem.querySelector('input').addEventListener('input', updateStepsPreview);
        });

        // ── Image Link Preview ──
        imageLink.addEventListener('input', function () {
            const url = this.value.trim();
            if (url) {
                previewImage.style.backgroundImage = `url('${url}')`;
                previewImage.style.backgroundSize = 'cover';
                previewImage.style.backgroundRepeat = 'no-repeat';
                previewImage.style.backgroundPosition = 'center';
                previewImage.innerHTML = '';
            } else {
                previewImage.style.backgroundImage = '';
                previewImage.innerHTML = '<span>Image preview will appear here</span>';
            }
        });

        // ── Image File Upload ──
        imageUploadArea.addEventListener('click', () => imageUpload.click());

        imageUpload.addEventListener('change', function () {
            if (this.files && this.files[0]) {
                fileName.textContent = this.files[0].name;
                const reader = new FileReader();
                reader.onload = function (e) {
                    previewImage.innerHTML = `<img src="${e.target.result}" alt="Recipe preview">`;
                };
                reader.readAsDataURL(this.files[0]);
            }
        });

        imageUploadArea.addEventListener('dragover', function (e) {
            e.preventDefault();
            this.style.borderColor = 'var(--accent)';
            this.style.backgroundColor = 'rgba(255, 123, 54, 0.1)';
        });

        imageUploadArea.addEventListener('dragleave', function () {
            this.style.borderColor = '#ff7b2c';
            this.style.backgroundColor = 'transparent';
        });

        imageUploadArea.addEventListener('drop', function (e) {
            e.preventDefault();
            this.style.borderColor = '#ff7b2c';
            this.style.backgroundColor = 'transparent';

            if (e.dataTransfer.files && e.dataTransfer.files[0]) {
                imageUpload.files = e.dataTransfer.files;
                fileName.textContent = e.dataTransfer.files[0].name;
                const reader = new FileReader();
                reader.onload = function (e) {
                    previewImage.innerHTML = `<img src="${e.target.result}" alt="Recipe preview">`;
                };
                reader.readAsDataURL(e.dataTransfer.files[0]);
            }
        });

        // ── Live Preview Updates ──
        recipeTitle.addEventListener('input', function () {
            previewTitle.textContent = this.value || 'Recipe Title';
        });

        recipeDescription.addEventListener('input', function () {
            previewDescription.textContent = this.value || 'Recipe description will appear here...';
        });

        recipeCategory.addEventListener('change', function () {
            previewCategory.textContent = this.value
                ? `Category: ${this.options[this.selectedIndex].text}`
                : 'Category: Not selected';
        });

        // ── Session Check ──
        function loading() {
            fetch('check_session.php')
                .then(response => response.json())
                .then(data => {
                    if (!data.active) {
                        window.open('main.php', '_self');
                    }
                });
        }
        window.addEventListener('load', loading);
    </script>

    <!-- Chef AI Button -->
    <a href="AiBot.php" class="chef-ai-btn" title="Ask AI Chef">👨‍🍳</a>

    <!-- Theme Toggle Script -->
    <script src="theme-toggle.js"></script>
</body>
</html>