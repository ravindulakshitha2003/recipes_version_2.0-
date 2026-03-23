<?php
header('Content-Type: application/json');

$host = 'sql109.infinityfree.com';
$user = 'if0_39209578';
$password = 'Su8cdE6KMVMN9aS';
$database = 'if0_39209578_school';

$conn = mysqli_connect($host, $user, $password, $database);

if (!$conn) {
    echo json_encode(['error' => 'Connection failed']);
    exit;
}

// Check if recipes table exists
$tables = mysqli_query($conn, "SHOW TABLES");
$table_list = [];
while ($row = mysqli_fetch_row($tables)) {
    $table_list[] = $row[0];
}

echo json_encode([
    'tables' => $table_list,
    'database' => $database
]);

mysqli_close($conn);
?>