<?php
include "sql_request.php"; // DB connection

$id = intval($_GET['id']); // get ID

$sql = "DELETE FROM recipes WHERE recipi_id = $id";

if ($conn->query($sql)) {
    echo json_encode(["success" => true]);
} else {
    echo json_encode(["success" => false, "error" => $conn->error]);
}
?>
