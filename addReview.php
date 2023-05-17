<?php
session_start();
$mysqli = require "dbConnect.php";

$user_id=$_SESSION['userId'];

$sql = "INSERT INTO review(user_id,recipe_id,review_text)
        VALUES (?, ?, ?)";
        
$stmt = $mysqli->stmt_init();

if ( ! $stmt->prepare($sql)) {
    die("SQL error: " . $mysqli->error);
}

$stmt->bind_param("iis",
                  $user_id,
                  $_POST["recipe_id"],
                  $_POST["review_text"]);

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