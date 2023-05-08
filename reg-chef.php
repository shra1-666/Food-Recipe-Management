<?php

if (empty($_POST["chef_name"])) {
    die("Name is required");
}

$mysqli = require "dbConnect.php";

$sql = "INSERT INTO chef (chef_name,qualification,experience,user_id,email, password)
        VALUES (?, ?, ?, ?, ?, ?)";
        
$stmt = $mysqli->stmt_init();

if ( ! $stmt->prepare($sql)) {
    die("SQL error: " . $mysqli->error);
}

$stmt->bind_param("ssisss",
                  $_POST["chef_name"],
                  $_POST["qualification"],
                  $_POST["experience"],
                  $_POST["user_id"],
                  $_POST["email"],
                  $_POST["password"]
                  );
                 
                
try{
if ($stmt->execute()) {

    header("Location: login-form-chef.php");
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
    header("Location: register-chef.php?error=Already taken");
}
?>


