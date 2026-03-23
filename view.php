<?php 
include "sql_request.php";
header('Content-Type: application/json');
$id = intval($_GET['id']);
 $sql="select i.recipe_id,i.ingredient,i.calories,r.r_name,r.r_picture,r.description,r.category,r.cooking_step from ingredients as i ,recipes as r where r.recipi_id=i.recipe_id AND r.recipi_id=$id;";
 $result = $conn->query($sql); 

 $users = [];
if ($result->num_rows > 0) {
  while($row = $result->fetch_assoc()) {
    $users[] = $row;
  }
}
echo json_encode($users);
 ?>
