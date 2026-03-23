<?php 
$host = 'localhost';        // changed from InfinityFree
$user = 'root';             // default XAMPP/WAMP user
$password = '';             // default is empty
$database = 'recipi';       // your local database name






$conn = mysqli_connect($host, $user, $password, $database);

// Check if connection failed
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Start session
session_start();

// Session timeout (60 seconds = 1 minute)
$timeout_duration = 600;

// Check if session has expired
if (isset($_SESSION['LAST_ACTIVITY'])) {
    $elapsed_time = time() - $_SESSION['LAST_ACTIVITY'];
    
    if ($elapsed_time > $timeout_duration) {
        // Session expired - destroy it
        session_unset();
        session_destroy();
        
        // Redirect to login with message
       
        exit();
    }
}

?>