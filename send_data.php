<?php
include_once "sql_request.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    try {
        // Your validation code here...
        
        $name_safe = trim($_POST['name']);
        $password = trim($_POST['password']);
        
        if (empty($name_safe) || empty($password)) {
            throw new Exception("empty_fields");
        }
        
        // Hash password
        $hashed_password = password_hash($password, PASSWORD_BCRYPT);
        
        // Insert user
        $stmt = $conn->prepare("INSERT INTO users (user_name, password) VALUES (?, ?)");
        $stmt->bind_param("ss", $name_safe, $hashed_password);
        $stmt->execute();
        $stmt->close();
        
        header("Location: main.php?status=registered");
        exit();
        
    } catch (mysqli_sql_exception $e) {
        // Handle database-specific errors
        if ($e->getCode() == 1062) {
            header("Location: loginerror.php?error=username_exists");
        } else {
            error_log("Database error: " . $e->getMessage());
            header("Location: loginerror.php?error=db_failed");
        }
        exit();
    } catch (Exception $e) {
        header("Location: loginerror.php?error=" . $e->getMessage());
        exit();
    }
}

$conn->close();
?>