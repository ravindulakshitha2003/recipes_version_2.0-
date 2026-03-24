<?php
include_once "sql_request.php";
session_start();

// Get chef ID
$chef_id = $_SESSION['chefno'] ?? null;

// Get form values
$title    = mysqli_real_escape_string($conn, $_POST['title']);
$descr    = mysqli_real_escape_string($conn, $_POST['decs']);
$category = mysqli_real_escape_string($conn, $_POST['category']);
$link     = mysqli_real_escape_string($conn, $_POST['imagelink']);

// Ingredient parallel arrays
$ingredients   = $_POST['ingredients']   ?? [];
$quantities    = $_POST['quantity']      ?? [];
$units         = $_POST['unit']          ?? [];
$clarities     = $_POST['clarity']       ?? [];
$calories      = $_POST['calories']      ?? [];
$carbohydrates = $_POST['carbohydrates'] ?? [];
$proteins      = $_POST['protein']       ?? [];
$fats          = $_POST['fat']           ?? [];

// Steps array
$steps = $_POST['steps'] ?? [];

$chef_value = $chef_id !== null ? $chef_id : "NULL";

// ── 1. Insert Recipe ──
$sql = "INSERT INTO recipes (r_name, category, description, r_picture, user_no) 
        VALUES ('$title', '$category', '$descr', '$link', $chef_value)";

if (mysqli_query($conn, $sql)) {
    $recipe_id = $conn->insert_id;

    // ── 2. Insert Ingredients ──
    $stmt_ing = $conn->prepare("
        INSERT INTO ingredients 
            (recipe_id, ingredient_name, quantity, unit, clarity, calories, carbohydrates, protein, fat)
        VALUES 
            (?, ?, ?, ?, ?, ?, ?, ?, ?)
    ");
    $stmt_ing->bind_param(
        "issssdddd",
        $recipe_id,
        $ing_name,
        $ing_qty,
        $ing_unit,
        $ing_clarity,
        $ing_calories,
        $ing_carbs,
        $ing_protein,
        $ing_fat
    );

    foreach ($ingredients as $index => $name) {
        $ing_name    = trim($name);
        if (empty($ing_name)) continue; // skip blank rows

        // Use null if field was left empty
        $ing_qty      = !empty($quantities[$index])    ? trim($quantities[$index])    : null;
        $ing_unit     = !empty($units[$index])         ? trim($units[$index])         : null;
        $ing_clarity  = !empty($clarities[$index])     ? trim($clarities[$index])     : null;
        $ing_calories = is_numeric($calories[$index])      ? (float)$calories[$index]      : null;
        $ing_carbs    = is_numeric($carbohydrates[$index]) ? (float)$carbohydrates[$index] : null;
        $ing_protein  = is_numeric($proteins[$index])      ? (float)$proteins[$index]      : null;
        $ing_fat      = is_numeric($fats[$index])          ? (float)$fats[$index]          : null;

        $stmt_ing->execute();
    }
    $stmt_ing->close();

    // ── 3. Insert Steps ──
    $stmt_step = $conn->prepare("
        INSERT INTO recipesteps (recipi_id, step_number, step_description) 
        VALUES (?, ?, ?)
    ");
    $stmt_step->bind_param("iis", $recipe_id, $step_number, $step_desc);

    $step_number = 1;
    foreach ($steps as $step_desc) {
        $step_desc = trim($step_desc);
        if (!empty($step_desc)) {
            $stmt_step->execute();
            $step_number++;
        }
    }
    $stmt_step->close();

    header("Location: index.php?status=success");
    exit();

} else {
    echo "Error: " . mysqli_error($conn);
}

mysqli_close($conn);
?>