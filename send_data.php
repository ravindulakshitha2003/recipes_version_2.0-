<?php
include_once "sql_request.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    try {
        // Your validation code here...
        
       $name_safe = trim($_POST['name']);
    $password = trim($_POST['password']);
    $sex = trim($_POST['sex']);
    $type='user';
    $type = trim($_POST['role']);
    $status = 1;
    $email = trim($_POST['email']);
    $age = intval($_POST['age']);

    if (empty($name_safe) || empty($password)) {
        throw new Exception("empty_fields");
    }

    // Hash password
    $hashed_password = password_hash($password, PASSWORD_BCRYPT);

    // Prepare query
    $stmt = $conn->prepare("
        INSERT INTO person (name, age, status, type, password, email, sex) 
        VALUES (?, ?, ?, ?, ?, ?, ?)
    ");

    // Bind parameters
    $stmt->bind_param("siissss", 
        $name_safe, 
        $age, 
        $status, 
        $type, 
        $hashed_password, 
        $email, 
        $sex
    );

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