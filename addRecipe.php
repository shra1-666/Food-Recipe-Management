<?php
session_start();
$mysqli = require "dbConnect.php";

$sql = "INSERT INTO recipe (chef_id,recipe_title,recipe_desc)
        VALUES (?, ?, ?)";
        
$stmt = $mysqli->stmt_init();

if ( ! $stmt->prepare($sql)) {
    die("SQL error: " . $mysqli->error);
}

$stmt->bind_param("iss",
                  $_POST["chef_id"],
                  $_POST["recipe_title"],
                  $_POST["recipe_desc"]);

try{
if ($stmt->execute()) {

    header("Location: chef-dashboard.php");
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