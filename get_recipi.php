<?php
// Connect to Database
 include_once "sql_request.php" ;

// Check Connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$id =  $_SESSION['chefno'];
// Query all recipes (for simplicity, assume each recipe has a 'category' column)
$sql = " select * from recipes where user_no =$id;";
$result = $conn->query($sql);

$recipes = array();
while ($row = $result->fetch_assoc()) {
    $recipes[] = $row;
}

// Output JSON
header('Content-Type: application/json');
echo json_encode($recipes);

$conn->close();
?>
