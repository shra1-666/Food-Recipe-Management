<?php
session_start();
$uname=$_SESSION['user_id'];
$chef_id=$_SESSION['chef_id'];
$mysqli = require "dbConnect.php";
$count=0;
    
$sql = sprintf("SELECT * FROM recipe,chef
                    WHERE chef.chef_id='$chef_id' and recipe.chef_id='$chef_id'");
$result = $mysqli->query($sql);

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chef | Dashboard</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="chef-dash-container">
            <div class="chef-dash-nav">
                <div class="chef-dash-entry dsah-nav-active">
                    <a href="chef-dashboard.php"><h1>Dashboard</h1></a>
                </div>

                <div class="chef-dash-entry">
                    <a href="chef-add-recipe.php"><h1>Add recipie</h1></a>
                </div>

                <div class="chef-dash-entry">
                    <a href="chef-view-review.php"><h1>Reviews</h1>
                </div>

                <a class="chef-dash-nav-signout" href="logout.php">Logout</a>
            </div>
            <div class="chef-dash-content-div">
                <div class="chef-greet-div">
                    <h2>Hello!    
                    <span></span>
                    </h2>
                </div>
                <div class="chef-dash-title-div">
                    <h2>Your recipies</h2>
                    <a href="chef-add-recipe.php">Add Recipe</a>
                </div>
                

                <div class="recipe-list-body chef-recipe-list-body">
                    <?php
                        while ($row = mysqli_fetch_assoc($result))
                        {
                    ?>
            
                    <div class="recipe-list-content">
                        <div class="recipe-photo-div">
                            <img src="/img-1.png" alt="">
                        </div>
                        <div class="dishname-div">
                            <h2><?php echo $row["recipe_title"]; ?></h2>
                        </div>
                        <div class="dish-short-desc-div">
                            <p><?php echo $row["recipe_desc"]; ?></p>
                        </div>
                    </div>
                    <?php
                        }
                    ?>
                    
                </div>
            </div>
    </div>
</body>
</html>