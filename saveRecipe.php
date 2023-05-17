<?php
session_start();
$mysqli = require "dbConnect.php";
$sql = "INSERT INTO saved_recipe (user_id,recipe_id)
        VALUES (?, ?)";
        
$stmt = $mysqli->stmt_init();

if ( ! $stmt->prepare($sql)) {
    die("SQL error: " . $mysqli->error);
}

$stmt->bind_param("ii",
                  $_SESSION["userId"],
                  $_GET["recipe_id"]);

try{
if ($stmt->execute()) {

    header("Location: user-dashboard.php");
    exit;
    
} else {
    
    if ($mysqli->errno === 1062) {
        die("email already taken");
    } else {
        die($mysqli->error . " " . $mysqli->errno);
    }
}
}

catch (Exception $e) {
    echo "Error: " . $e->getMessage();
    echo "already taken";
}


?>