<?php
include_once "sql_request.php";

header('Content-Type: application/json');

// Check if session expired
$timeout_duration = 1440;
if (isset($_SESSION['LAST_ACTIVITY'])) {
    $elapsed_time = time() - $_SESSION['LAST_ACTIVITY'];
    
    if ($elapsed_time > $timeout_duration) {
        // Session expired
        session_unset();
        session_destroy();
        echo json_encode(['active' => false]);
        exit();
    }
}

// Check if user is logged in
if (isset($_SESSION['name'])) {
    echo json_encode(['active' => true]);
} else {
    echo json_encode(['active' => false]);
}
?>