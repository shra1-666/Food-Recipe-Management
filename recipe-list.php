<?php 
session_start();

$mysqli = require "dbConnect.php";
    
$sql = sprintf("SELECT * FROM recipe");
$result = $mysqli->query($sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recipe List</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="recipe-list-container">
        <div class="recipe-list-head">
            <h1 class="recipe-head">Nestle Into Your Favorite Dishes</h1>
        </div>
        <div class="recipe-list-body">
            <?php
                        while ($row = mysqli_fetch_assoc($result))
                        {
                        
                    ?>
            <div class="recipe-list-content">
                <div class="dishname-div">
                    <h2><?php echo $row["recipe_title"]; ?></h2>
                </div>
                <div class="dish-short-desc-div">
                    <p><?php echo $row["recipe_desc"]; ?></p>
                </div>
                <div class="save-icon-div">
                    <a href="<?php echo isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true ? 'user-dashboard.php' : 'login-form.php'; ?>"><img class="recipe-save-btn-new" src="save-icon.svg" alt=""></a>
                </div>
            </div> 
            <?php
                        }
                    ?>
        </div>
    </div>
</body>
</html>