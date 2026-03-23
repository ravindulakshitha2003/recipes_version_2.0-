<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profile</title>
    <style>
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

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        body {
            background-color: var(--primary-bg);
            color: var(--text-primary);
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 20px;
        }

        .container {
            width: 100%;
            max-width: 800px;
            display: grid;
            grid-template-columns: 1fr 2fr;
            gap: 30px;
        }

        .profile-card {
            background-color: var(--card-bg);
            border-radius: var(--border-radius);
            padding: 30px;
            display: flex;
            flex-direction: column;
            align-items: center;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.3);
        }

        .profile-picture {
            width: 150px;
            height: 150px;
            border-radius: 50%;
            overflow: hidden;
            margin-bottom: 20px;
            border: 3px solid var(--accent);
            position: relative;
        }

        .profile-picture img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .profile-picture .change-overlay {
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            background-color: rgba(0, 0, 0, 0.7);
            color: white;
            text-align: center;
            padding: 8px;
            font-size: 0.8rem;
            opacity: 0;
            transition: var(--transition);
        }

        .profile-picture:hover .change-overlay {
            opacity: 1;
        }

        .profile-name {
            font-size: 1.5rem;
            font-weight: 600;
            margin-bottom: 5px;
        }

        .profile-email {
            color: var(--text-secondary);
            margin-bottom: 20px;
        }

        .edit-form {
            background-color: var(--card-bg);
            border-radius: var(--border-radius);
            padding: 30px;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.3);
        }

        .form-title {
            font-size: 1.5rem;
            margin-bottom: 25px;
            color: var(--text-primary);
            border-bottom: 1px solid var(--secondary-bg);
            padding-bottom: 10px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-bottom: 8px;
            color: var(--text-secondary);
            font-weight: 500;
        }

        input, select, textarea {
            width: 100%;
            padding: 12px 15px;
            background-color: var(--secondary-bg);
            border: 1px solid #333;
            border-radius: var(--border-radius);
            color: var(--text-primary);
            font-size: 1rem;
            transition: var(--transition);
        }

        input:focus, select:focus, textarea:focus {
            outline: none;
            border-color: var(--accent);
            box-shadow: 0 0 0 2px rgba(255, 123, 44, 0.2);
        }

        .subscription-section {
            background-color: var(--secondary-bg);
            border-radius: var(--border-radius);
            padding: 20px;
            margin-top: 10px;
        }

        .subscription-options {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
            gap: 15px;
            margin-top: 15px;
        }

        .subscription-option {
            background-color: var(--card-bg);
            border: 2px solid #333;
            border-radius: var(--border-radius);
            padding: 15px;
            cursor: pointer;
            transition: var(--transition);
            position: relative;
        }

        .subscription-option:hover {
            border-color: var(--accent);
        }

        .subscription-option.selected {
            border-color: var(--accent);
            background-color: rgba(255, 123, 44, 0.1);
        }

        .subscription-option h4 {
            margin-bottom: 5px;
            color: var(--text-primary);
        }

        .subscription-option p {
            color: var(--text-secondary);
            font-size: 0.9rem;
            margin-bottom: 10px;
        }

        .subscription-option .price {
            font-weight: 600;
            color: var(--accent);
        }

        .radio-indicator {
            position: absolute;
            top: 10px;
            right: 10px;
            width: 18px;
            height: 18px;
            border: 2px solid #555;
            border-radius: 50%;
            transition: var(--transition);
        }

        .subscription-option.selected .radio-indicator {
            border-color: var(--accent);
            background-color: var(--accent);
        }

        .subscription-option.selected .radio-indicator::after {
            content: '';
            position: absolute;
            top: 4px;
            left: 4px;
            width: 6px;
            height: 6px;
            background-color: white;
            border-radius: 50%;
        }

        .btn-group {
            display: flex;
            justify-content: flex-end;
            gap: 15px;
            margin-top: 30px;
        }

        .btn {
            padding: 12px 25px;
            border-radius: var(--border-radius);
            font-weight: 600;
            cursor: pointer;
            transition: var(--transition);
            border: none;
            font-size: 1rem;
        }

        .btn-cancel {
            background-color: transparent;
            color: var(--text-secondary);
            border: 1px solid #444;
        }

        .btn-cancel:hover {
            background-color: #333;
        }

        .btn-save {
            background-color: var(--accent);
            color: white;
        }

        .btn-save:hover {
            background-color: #e56a20;
            transform: translateY(-2px);
        }

        @media (max-width: 768px) {
            .container {
                grid-template-columns: 1fr;
            }
            
            .profile-card {
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
    <div class="container">
        <div class="profile-card">
            <div class="profile-picture">
                <img id="profile-img" src="https://via.placeholder.com/150" alt="Profile Picture">
                <div class="change-overlay">Change Photo</div>
            </div>
            <h2 class="profile-name">John Doe</h2>
            <p class="profile-email">johndoe@example.com</p>
        </div>

        <div class="edit-form">
            <h2 class="form-title">Edit Profile</h2>
            
            <div class="form-group">
                <label for="profile-picture-url">Profile Picture URL</label>
                <input type="url" id="profile-picture-url" placeholder="https://example.com/your-image.jpg">
                <small style="color: var(--text-secondary); margin-top: 5px; display: block;">
                    Enter a URL to update your profile picture
                </small>
            </div>

            <div class="form-group">
                <label for="display-name">Display Name</label>
                <input type="text" id="display-name" value="John Doe">
            </div>

            <div class="form-group">
                <label for="bio">Bio</label>
                <textarea id="bio" rows="4" placeholder="Tell us about yourself...">Digital creator and technology enthusiast with a passion for design and innovation.</textarea>
            </div>

            <div class="form-group">
                <label>Subscription Plan</label>
                <div class="subscription-section">
                    <div class="subscription-options">
                        <div class="subscription-option" data-plan="free">
                            <div class="radio-indicator"></div>
                            <h4>Free</h4>
                            <p>Basic features with limited access</p>
                            <div class="price">$0/month</div>
                        </div>
                        <div class="subscription-option selected" data-plan="pro">
                            <div class="radio-indicator"></div>
                            <h4>Pro</h4>
                            <p>Advanced features and priority support</p>
                            <div class="price">$9.99/month</div>
                        </div>
                        <div class="subscription-option" data-plan="premium">
                            <div class="radio-indicator"></div>
                            <h4>Premium</h4>
                            <p>All features with exclusive content</p>
                            <div class="price">$19.99/month</div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="btn-group">
                <button class="btn btn-cancel">Cancel</button>
                <button class="btn btn-save" onclick="window.open('profile.php','_self')">Save Changes</button>
            </div>
        </div>
    </div>

    <script>
        // Update profile picture when URL changes
        document.getElementById('profile-picture-url').addEventListener('input', function() {
            const url = this.value.trim();
            if (url) {
                document.getElementById('profile-img').src = url;
            }
        });

        // Subscription selection
        const subscriptionOptions = document.querySelectorAll('.subscription-option');
        subscriptionOptions.forEach(option => {
            option.addEventListener('click', function() {
                subscriptionOptions.forEach(opt => opt.classList.remove('selected'));
                this.classList.add('selected');
            });
        });

        // Save changes button
        document.querySelector('.btn-save').addEventListener('click', function() {
            const profilePicUrl = document.getElementById('profile-picture-url').value;
            const displayName = document.getElementById('display-name').value;
            const bio = document.getElementById('bio').value;
            const selectedPlan = document.querySelector('.subscription-option.selected').getAttribute('data-plan');
            
            // In a real application, you would send this data to a server
            alert(`Profile updated!\n\nName: ${displayName}\nPlan: ${selectedPlan}\n\nChanges saved successfully.`);
        });

        // Cancel button
        document.querySelector('.btn-cancel').addEventListener('click', function() {
            if (confirm('Are you sure you want to cancel? Any unsaved changes will be lost.')) {
                // Reset form or navigate away
                window.location.href = '#'; // In a real app, this would navigate back
            }
        });
    </script>
    <!-- Chef AI Button -->
    <a href="AiBot.php" class="chef-ai-btn" title="Ask AI Chef">👨‍🍳</a>
</body>
</html>