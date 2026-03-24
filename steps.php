<?php 
include "sql_request.php";

header('Content-Type: application/json');

if (!isset($_GET['id'])) {
    echo json_encode(["error" => "No ID"]);
    exit();
}

$id = intval($_GET['id']);

$sql = "SELECT step_description FROM recipesteps WHERE recipi_id = $id";
$result = $conn->query($sql);

$steps = [];

if ($result && $result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $steps[] = $row;
    }
}

echo json_encode($steps);
?>