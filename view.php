<?php 
include "sql_request.php";
header('Content-Type: application/json');
$id = intval($_GET['id']);
 $sql="SELECT 
    r.recipi_id,
    r.r_name,
    r.category,
    r.description,
    r.r_picture,
    r.rating,
    r.user_no,
    r.created_at,

    i.ingredient_id,
    i.ingredient_name,
    i.quantity,
    i.unit,
    i.calories,
    i.carbohydrates,
    i.protein,
    i.fat,
    i.clarity

FROM recipes r
JOIN ingredients i 
    ON r.recipi_id = i.recipe_id

WHERE r.recipi_id =$id;";
 $result = $conn->query($sql); 

 $users = [];
if ($result->num_rows > 0) {
  while($row = $result->fetch_assoc()) {
    $users[] = $row;
  }
}
echo json_encode($users);
 ?>
