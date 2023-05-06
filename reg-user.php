<?php

if (empty($_POST["user_name"])) {
    die("Name is required");
}

$mysqli = require "dbConnect.php";

$sql = "INSERT INTO user (user_name, password, email)
        VALUES (?, ?, ?)";
        
$stmt = $mysqli->stmt_init();

if ( ! $stmt->prepare($sql)) {
    die("SQL error: " . $mysqli->error);
}

$stmt->bind_param("sss",
                  $_POST["user_name"],
                  $_POST["password"],
                  $_POST["email"]
                  );
                 
                
try{
if ($stmt->execute()) {

    header("Location: login.html");
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
    header("Location: register-user.php?error=Already taken");
}
?>


