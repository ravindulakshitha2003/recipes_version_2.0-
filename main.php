<?php
include_once "sql_request.php";

$error = '';

// Session timeout message
if (isset($_GET['timeout']) && $_GET['timeout'] == 1) {
    $error = "Session expired. Please login again.";
}

// Handle login
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = trim($_POST['name']);
    $password = trim($_POST['password']);

    if (empty($name) || empty($password)) {
        $error = "Please enter both username and password";
    } else {

        // ✅ FIXED query
        $stmt = $conn->prepare("SELECT id, name, password FROM person WHERE name = ?");
        $stmt->bind_param("s", $name);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();

            // ✅ Verify password
            if (password_verify($password, $row['password'])) {

                // ✅ Correct session values
                $_SESSION['user_id'] = $row['id'];
                $_SESSION['name'] = $row['name'];
                $_SESSION['LAST_ACTIVITY'] = time();

                header("Location: index.php");
                exit();

            } else {
                $error = "Invalid username or password";
            }

        } else {
            $error = "Invalid username or password";
        }

        $stmt->close();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chef Login - Dark Theme</title>
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
            --border-color: #333;
        }

        /* Light Mode */
        [data-theme="light"] {
            --primary-bg: #ffffff;
            --secondary-bg: #f5f5f5;
            --card-bg: #ffffff;
            --text-primary: #1a1a1a;
            --text-secondary: #666666;
            --border-color: #e0e0e0;
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
            max-width: 120vh;
            background-color: var(--secondary-bg);
            border-radius: var(--border-radius);
            overflow: hidden;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.3);
        }
        
        .login-wrapper {
            display: flex;
            flex-direction: row;
            min-height: 600px;
        }
        
        .login-form {
            flex: 1;
            padding: 40px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            background-color: var(--card-bg);
        }
        
        .login-image {
            flex: 1;
            background: linear-gradient(45deg, var(--primary-bg), var(--secondary-bg));
            display: flex;
            justify-content: center;
            align-items: center;
            overflow: hidden;
            position: relative;
        }
        
        .login-image::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(to bottom, rgba(18, 18, 18, 0.7), rgba(30, 30, 30, 0.9));
            z-index: 1;
        }
        
        .login-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            border-radius: 0 var(--border-radius) var(--border-radius) 0;
        }
        
        h2 {
            font-size: 32px;
            margin-bottom: 30px;
            text-align: center;
            color: var(--accent);
            text-shadow: 0 0 10px rgba(255, 123, 44, 0.3);
        }
        
        .input-group {
            margin-bottom: 25px;
        }
        
        .input-group label {
            display: block;
            margin-bottom: 8px;
            font-weight: 500;
            color: var(--text-primary);
        }
        
        .input-group input {
            width: 100%;
            padding: 1.25rem 1.5rem;
            border: 1px solid #333;
            border-radius: var(--border-radius);
            font-size: 1rem;
            background-color: var(--secondary-bg);
            color: var(--text-primary);
            transition: var(--transition);
        }
        
        .input-group input:focus {
            outline: none;
            border-color: var(--accent);
            box-shadow: 0 0 0 2px rgba(255, 123, 44, 0.2);
        }
        
        .input-group input::placeholder {
            color: var(--text-secondary);
        }
        
        .remember {
            display: flex;
            align-items: center;
            margin-bottom: 25px;
            color: var(--text-secondary);
        }
        
        .remember input {
            margin-right: 10px;
            width: 18px;
            height: 18px;
            accent-color: var(--accent);
        }
        
        .btn {
            background: var(--accent);
            color: white;
            width: 150px;
            padding: 12px 28px;
            border: none;
            border-radius: var(--border-radius);
            cursor: pointer;
            transition: var(--transition);
            font-size: 16px;
            font-weight: 500;
            display: flex;
            justify-content: center;
            text-align: center;
            margin: 10px auto;
        }
        
        .btn:hover {
            background: #ff6a1a;
            box-shadow: 0 5px 15px rgba(255, 123, 44, 0.4);
            transform: translateY(-2px);
        }
        
        .error-message {
            background-color: rgba(255, 68, 68, 0.1);
            color: #ff6b6b;
            padding: 12px;
            border-radius: var(--border-radius);
            margin-bottom: 20px;
            border-left: 4px solid #ff6b6b;
        }
        
        /* For screens 600px and below */
        @media (max-width: 600px) {
            .login-wrapper {
                flex-direction: column;
            }
            
            .login-image {
                order: -1;
                height: 250px;
            }
            
            .login-image img {
                border-radius: var(--border-radius) var(--border-radius) 0 0;
            }
            
            .login-form {
                padding: 30px;
            }
            
            h2 {
                font-size: 28px;
                margin-bottom: 20px;
            }
        }
        
        /* For screens above 600px */
        @media (min-width: 601px) {
            .login-image {
                order: 2;
            }
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
        }
        
        .additional-options a:hover {
            color: #ff9d64;
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <!-- Header with Theme Toggle -->
    

    <div class="container">
        <div class="login-wrapper">
            <div class="login-image">
                <img src="https://images.unsplash.com/photo-1565299624946-b28f40a0ae38?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1080&q=80" alt="Delicious food">
            </div>

            <div class="login-form">
                <?php if ($error): ?>
                <div class="error-message"><?php echo htmlspecialchars($error); ?></div>
                <?php endif; ?>
                <form method="post" action="">
                    <h2>Welcome Back, Chef</h2>
                    <div class="input-group">
                        <label for="name">User Name</label>
                        <input type="text" id="email" name="name" placeholder="chef1234">
                    </div>
                    <div class="input-group">
                        <label for="password">Password</label>
                        <input type="password" id="password" name="password" placeholder="Enter your password">
                    </div>
                    <div class="remember">
                        <input type="checkbox" id="remember">
                        <label for="remember">Remember me</label>
                    </div>
                    <button class="btn" type="submit">Sign In</button>
                    <div class="additional-options">
                        <a href="#">Forgot Password?</a>
                        <a href="register.php">Create Account</a>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Theme Toggle Script -->
    <script src="theme-toggle.js"></script>
</body>
</html>