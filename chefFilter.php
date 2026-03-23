<?php 
include "sql_request.php";
header('Content-Type: application/json');
$id = intval($_GET['id']);
 $sql="SELECT 
    r.recipi_id,
    r.r_name,
    r.category,
    r.description,
    r.cooking_step,
    r.r_picture,
    r.rating AS recipe_rating,

    p.id AS user_id,
    p.name AS chef_name,
    p.status,
    p.type

FROM recipes r
JOIN person p 
    ON r.user_no = p.id

WHERE r.recipi_id =1;";
 $result = $conn->query($sql); 

 $users = [];
if ($result->num_rows > 0) {
  while($row = $result->fetch_assoc()) {
    $users[] = $row;
  }
}
echo json_encode($users);
 ?>
