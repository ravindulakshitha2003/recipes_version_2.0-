<?php 
include "sql_request.php";
header('Content-Type: application/json');
$id = intval($_GET['id']);
 $sql=" select step_description from recipeSteps

WHERE recipi_id =$id;";
 $result = $conn->query($sql); 

 $users = [];
if ($result->num_rows > 0) {
  while($row = $result->fetch_assoc()) {
    $users[] = $row;
  }
}
echo json_encode($users);
 ?>
