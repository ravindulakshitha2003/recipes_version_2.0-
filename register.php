<!DOCTYPE html>
<html lang="en">
<head>
    <!-- <script src="https://accounts.google.com/gsi/client" async defer></script> -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Account - FlavorVerse</title>
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
            --card-bg: #252525;
            --accent: #ff7b2c;
            --text-primary: #f5f5f5;
            --text-secondary: #b0b0b0;
            --border-radius: 12px;
            --transition: all 0.3s ease;
        }
        
        body {
            background-color: var(--primary-bg);
            color: var(--text-primary);
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            margin: 0;
            padding: 20px;
        }
        
        .container {
            width: 100%;
            max-width: 1200px;
            background-color: var(--secondary-bg);
            border-radius: var(--border-radius);
            height: max-content;
            box-shadow: 0 0 30px rgba(0, 0, 0, 0.5);
            overflow: hidden;
        }
        
        .register-wrapper {
            display: flex;
            flex-direction: row;
            min-height: 600px;
            height: 100%;
        }
        
        .register-form {
            flex: 1;
            padding: 40px;
            display: flex;
            height: 100%;
            flex-direction: column;
            justify-content: center;
            overflow-y: auto;
            background-color: var(--secondary-bg);
        }
        
        .register-image {
            flex: 1;
            background: linear-gradient(45deg, var(--primary-bg), var(--card-bg));
            display: flex;
            justify-content: center;
            align-items: center;
            overflow: hidden;
            height: 100%;
        }
        
        .register-image img {
            width: 100%;
            height: 140vh;
            object-fit: cover;
            opacity: 0.9;
        }
        
        h2 {
            font-size: 32px;
            margin-bottom: 30px;
            text-align: center;
            color: var(--accent);
            text-shadow: 0 0 20px rgba(255, 123, 44, 0.3);
        }
        
        .input-group {
            margin-bottom: 20px;
        }
        
        .input-group label {
            display: block;
            margin-bottom: 8px;
            font-weight: 500;
            color: var(--text-primary);
        }
        
        .input-group input, .input-group select {
            width: 100%;
            padding: 1.25rem 1.5rem;
            border: 1px solid var(--card-bg);
            border-radius: var(--border-radius);
            font-size: 1rem;
            background-color: var(--card-bg);
            color: var(--text-primary);
            transition: var(--transition);
        }
        
        .input-group input:focus, .input-group select:focus {
            outline: none;
            border-color: var(--accent);
            box-shadow: 0 0 10px rgba(255, 123, 44, 0.2);
        }
        
        .input-group select option {
            background-color: var(--card-bg);
            color: var(--text-primary);
        }
        
        .form-row {
            display: flex;
            gap: 20px;
        }
        
        .form-row .input-group {
            flex: 1;
        }
        
        .terms {
            display: flex;
            align-items: center;
            margin-bottom: 25px;
        }
        
        .terms input {
            margin-right: 10px;
            width: 18px;
            height: 18px;
            cursor: pointer;
            accent-color: var(--accent);
        }
        
        .terms label {
            color: var(--text-secondary);
            cursor: pointer;
        }
        
        .btn {
            background: linear-gradient(45deg, var(--accent), #ff5722);
            color: white;
            width: 180px;
            padding: 12px 28px;
            border: none;
            border-radius: var(--border-radius);
            cursor: pointer;
            transition: var(--transition);
            font-size: 16px;
            font-weight: 600;
            display: flex;
            justify-content: center;
            text-align: center;
            margin: 10px auto;
        }
        
        .btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 20px rgba(255, 123, 44, 0.4);
        }
        
        .google-btn {
            background: white;
            color: #757575;
            width: 180px;
            padding: 12px 28px;
            border: 1px solid var(--card-bg);
            border-radius: var(--border-radius);
            cursor: pointer;
            transition: var(--transition);
            font-size: 16px;
            font-weight: 500;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 10px auto;
            box-shadow: 0 2px 4px 0 rgba(0, 0, 0, 0.25);
        }
        
        .google-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.3);
        }
        
        .google-icon {
            width: 18px;
            height: 18px;
            margin-right: 10px;
        }
        
        .divider {
            display: flex;
            align-items: center;
            text-align: center;
            margin: 20px 0;
            color: var(--text-secondary);
        }
        
        .divider::before,
        .divider::after {
            content: '';
            flex: 1;
            border-bottom: 1px solid var(--card-bg);
        }
        
        .divider::before {
            margin-right: .5em;
        }
        
        .divider::after {
            margin-left: .5em;
        }
        
        .additional-options {
            margin-top: 20px;
            text-align: center;
            color: var(--text-secondary);
        }
        
        .additional-options a {
            color: var(--accent);
            text-decoration: none;
            margin: 0 10px;
            transition: var(--transition);
            font-weight: 600;
        }
        
        .additional-options a:hover {
            text-decoration: underline;
        }
        
        .password-strength {
            margin-top: 8px;
            height: 4px;
            border-radius: 2px;
            background: var(--card-bg);
            overflow: hidden;
        }
        
        .strength-meter {
            height: 100%;
            width: 0%;
            border-radius: 2px;
            transition: width 0.3s, background 0.3s;
        }

        .g_id_signin {
            width: 200px;
            display: flex;
            justify-content: center;
        }
        
        .g_btn {
            display: flex;
            justify-content: center;
            align-items: center;
        }
        
        .image-container {
            position: relative;
            width: 600px;
            height: 150vh;
            border-radius: var(--border-radius);
            overflow: hidden;
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.7);
            transition: var(--transition);
        }
        
        .image-container:hover {
            transform: scale(1.02);
        }
        
        .image-container img {
            position: absolute;
            width: 100%;
            height: 100%;
            object-fit: cover;
            opacity: 0;
            transition: opacity 1.5s ease-in-out;
        }
        
        .image-title {
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            background: linear-gradient(transparent, rgba(0, 0, 0, 0.9));
            color: white;
            padding: 15px;
            text-align: center;
            font-size: 1.5rem;
            z-index: 10;
        }

        /* Responsive Design */
        @media (max-width: 600px) {
            .register-wrapper {
                flex-direction: column;
                height: auto;
            }
            
            .register-image {
                order: -1;
                height: 200px;
            }
            
            .register-form {
                padding: 30px;
            }
            
            h2 {
                font-size: 28px;
                margin-bottom: 20px;
            }
            
            .form-row {
                flex-direction: column;
                gap: 0;
            }
            
            .register-image img {
                height: 250px;
            }
            
            .image-container img {
                height: 250px;
            }
            
            .register-image {
                height: 250px;
            }
            
            .image-container {
                height: 250px;
            }
        }
        
        @media (min-width: 601px) {
            .register-image {
                order: 2;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="register-wrapper">
            <div class="register-image">
                <div class="image-container" id="imageContainer">
                    
                    <img src="chad-montano-eeqbbemH9-c-unsplash.jpg" alt="Gourmet Dish">
                    <img src="joseph-gonzalez-fdlZBWIP0aM-unsplash.jpg" alt="Fresh Ingredients">
                    <img src="chad-montano-eeqbbemH9-c-unsplash.jpg" alt="Restaurant Cuisine">
                    <img src="odiseo-castrejon-1SPu0KT-Ejg-unsplash.jpg" alt="Delicious Meal">
                </div>
            </div>
            
            <form class="register-form" method="POST" action="send_data.php">
                <h2>Create Account</h2>
                
                <div class="form-row">
                    <div class="input-group">
                        <label for="firstName">First Name</label>
                        <input type="text" id="firstName" name="name" placeholder="John" required>
                    </div>
                    <div class="input-group">
                        <label for="lastName">Last Name</label>
                        <input type="text" id="lastName" name="lname" placeholder="Doe" required>
                    </div>
                </div>
                
                <div class="form-row">
                    <div class="input-group">
                        <label for="age">Age</label>
                        <input type="number" id="age" name="age" placeholder="Your age" min="13" max="120" required>
                    </div>
                    <div class="input-group">
                        <label for="sex">Sex</label>
                        <select id="sex" name="sex" required>
                            <option value="">Select your sex</option>
                            <option value="male">Male</option>
                            <option value="female">Female</option>
                            <option value="other">Other</option>
                            <option value="prefer-not-to-say">Prefer not to say</option>
                        </select>
                    </div>
                </div>
                
                <div class="input-group">
                    <label for="role">Role</label>
                    <select id="role" name="role" required>
                        <option value="">Select your role</option>
                        <option value="student">Visiter</option>
                        <option value="professional">Professional chef</option>
                        <option value="educator">chef</option>
                        <option value="entrepreneur">Employee</option>
                        
                    </select>
                </div>
                
                <div class="input-group">
                    <label for="email">Email Address</label>
                    <input name="email" type="email" id="email" placeholder="john.doe@example.com" required>
                </div>
                
                <div class="input-group">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" placeholder="Create a strong password" required>
                    <div class="password-strength">
                        <div class="strength-meter" id="strengthMeter"></div>
                    </div>
                </div>
                
                <!-- <div class="input-group">
                    <label for="confirmPassword">Confirm Password</label>
                    <input type="password" id="confirmPassword" placeholder="Confirm your password" required>
                </div> -->
                
                <div class="terms">
                    <input type="checkbox" id="terms" required>
                    <label for="terms">I agree to the Terms & Conditions and Privacy Policy</label>
                </div>
                
                <button class="btn" id="registerBtn" type="submit">Create Account</button>
                
                <div class="divider">OR</div>
                
                <!-- <div id="g_id_onload"
                    data-client_id="YOUR_CLIENT_ID.apps.googleusercontent.com"
                    data-context="signup"
                    data-callback="handleCredentialResponse"
                    data-auto_prompt="false">
                </div> -->

                <!-- <div class="g_btn">
                    <div class="g_id_signin"
                        data-type="standard"
                        data-shape="rectangular"
                        data-theme="outline"
                        data-text="signup_with"
                        data-size="large"
                        data-logo_alignment="left">
                    </div>
                </div> -->
                
                <div class="additional-options">
                    <p>Already have an account? <a href="main.php">Sign In</a></p>
                </div>
            </form>
        </div>
    </div>
<!-- 
    <script>
        function handleCredentialResponse(response) {
            console.log("Encoded JWT ID token: " + response.credential);
        }
    </script> -->

    <script>
        const passwordInput = document.getElementById('password');
        const strengthMeter = document.getElementById('strengthMeter');
        const confirmPasswordInput = document.getElementById('confirmPassword');
        
        passwordInput.addEventListener('input', checkPasswordStrength);
        
        function checkPasswordStrength() {
            const password = passwordInput.value;
            let strength = 0;
            
            if (password.length >= 8) strength += 25;
            if (/[A-Z]/.test(password)) strength += 25;
            if (/[0-9]/.test(password)) strength += 25;
            if (/[^A-Za-z0-9]/.test(password)) strength += 25;
            
            strengthMeter.style.width = strength + '%';
            
            if (strength < 50) {
                strengthMeter.style.background = '#ff4d4d';
            } else if (strength < 75) {
                strengthMeter.style.background = '#ffa64d';
            } else {
                strengthMeter.style.background = '#2ecc71';
            }
        }
        
        document.addEventListener('DOMContentLoaded', function() {
            const container = document.getElementById('imageContainer');
            const images = container.querySelectorAll('img');
            let currentIndex = 0;
            let interval;
            
            function showNextImage() {
                images[currentIndex].style.opacity = 0;
                currentIndex = (currentIndex + 1) % images.length;
                images[currentIndex].style.opacity = 1;
            }
            
            function startAnimation() {
                interval = setInterval(showNextImage, 3000);
            }
            
            images[currentIndex].style.opacity = 1;
            startAnimation();
        });
    </script>
</body>
</html>