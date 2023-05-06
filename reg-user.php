<?php

if (empty($_POST["user_name"])) {
    die("Name is required");
}

//if ( ! filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
   // die("Valid email is required");
//}

//if (strlen($_POST["password"]) < 5) {
   // die("Password must be at least 5 characters");
//}

//if ( ! preg_match("/[a-z]/i", $_POST["password"])) {
    //die("Password must contain at least one letter");
//}

//if ( ! preg_match("/[0-9]/", $_POST["password"])) {
   // die("Password must contain at least one number");
//}


//$password_hash = password_hash($_POST["pass"], PASSWORD_DEFAULT);
//$timestamp = date('Y-m-d H:i:s');

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
                 
                
if ($stmt->execute()) {
    
    echo "successfully";
  //  header("Location: login.html");
    //exit;
    
}// else {
    
   // if ($mysqli->errno === 1062) {
       // die("email already taken");
    //} else {
      //  die($mysqli->error . " " . $mysqli->errno);
   // }
//}
?>


