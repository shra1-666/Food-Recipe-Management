<?php
session_start();
include "dbConnect.php";
if(isset($_POST['user_name']) && isset($_POST['password'])) {
    function validate($data){
       $data = trim($data);
       $data = stripslashes($data);
       $data = htmlspecialchars($data);
       return $data;
    }
    $user_name = validate($_POST['user_name']);
    $password = validate($_POST['password']);
    if (empty($user_name)) {
        echo "User Name is required";
        exit();
    }else if(empty($password)){
        echo "Password is required";
        exit();
    }else{
        $sql = "SELECT * FROM user WHERE user_name='$user_name' AND password='$password'";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) === 1) {
            $row = mysqli_fetch_assoc($result);
            if ($row['user_name'] === $user_name && $row['password'] === $password) {
                echo "Logged in!";
                $_SESSION['userName'] = $row['user_name'];
                $_SESSION['userId'] = $row['user_id'];
                header("Location: user-dashboard.php");
                exit();
            }else{
                //echo "Incorect User name or password";
                header("Location: login-form.php?error=Incorect User name or password");
                //echo '<script>alert("Incorrect username or password")</script>';
                exit();
            }
        }else{
            //echo "Incorect User name or password";
            header("Location: login-form.php?error=Incorect User name or password");
            //header("Location: ../../HTML/sign-in.php?error=Incorect User name or password");
            //echo '<script>alert("Incorrect username or password")</script>';
            exit();
        }
    }
}else{
    //header("Location: ../../HTML/sign-up.html");    
    exit();
}
