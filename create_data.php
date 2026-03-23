<?php

 include_once "sql_request.php" ;

if (!isset( $_SESSION['chefno'])) {
   

    $id=null;
}else{
        $id =  $_SESSION['chefno'];
}




    // Get form values safely
$title       = $_POST['title'];
$descr = $_POST['decs'];
$ingredients = $_POST['ingredients'];
$step        = $_POST['step'];
$category    = $_POST['category'];
$link=$_POST['imagelink'];





// Insert into table
$sql = "INSERT INTO recipes (user_no,r_name, description, cooking_step, category,r_picture) 
        VALUES ('$id','$title', '$descr', '$step', '$category','$link')";
    if (mysqli_query($conn, $sql)) {
    // success redirect
    $recipi_id = $conn->insert_id;
            foreach ($ingredients as $x) {
            $sql2="insert into ingredients values($recipi_id,'$x',0)";
            mysqli_query($conn, $sql2);
                      
        }
        header("Location: index.php?status=success");
         exit();
     } 
     else {
    echo "Error: " . mysqli_error($conn);
 }






mysqli_close($conn);
?>