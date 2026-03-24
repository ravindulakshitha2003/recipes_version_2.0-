<?php
include "sql_request.php";
// make sure session is started

$id = intval($_GET['id']); // recipe id
$chefid = $_SESSION['user_id'] ?? null;

if ($chefid === null) {
    header("Location: loginerror.php?status=not_logged_in");
    exit();
}

// Safe delete using prepared statement
$stmt = $conn->prepare("DELETE FROM recipes WHERE recipi_id = ? AND user_no = ?");
$stmt->bind_param("ii", $id, $chefid);
$stmt->execute();

if ($stmt->affected_rows > 0) {
    echo json_encode(["success" => true]);
} else {
    echo json_encode([
        "success" => false, 
        "error" => "No recipe found or you do not have permission"
    ]);
}

$stmt->close();
$conn->close();
?>