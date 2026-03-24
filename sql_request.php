<?php
$host = 'localhost';
$user = 'root';
$password = '';
$database = 'recipi';

$conn = mysqli_connect($host, $user, $password, $database);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Start session ONLY once
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Timeout (10 minutes)
$timeout_duration = 60000;

if (isset($_SESSION['LAST_ACTIVITY'])) {
    if ((time() - $_SESSION['LAST_ACTIVITY']) > $timeout_duration) {
        session_unset();
        session_destroy();
        header("Location: login.php?timeout=1");
        exit();
    }
}

$_SESSION['LAST_ACTIVITY'] = time();
?>