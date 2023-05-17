<?php
session_start();
$chef_id=$_SESSION['chef_id'];
$count=0;
$mysqli = require "dbConnect.php";
    
$sql = sprintf("SELECT r.recipe_title,rv.review_text FROM recipe r JOIN review rv ON r.recipe_id=rv.recipe_id
                WHERE r.chef_id='$chef_id'");
$result = $mysqli->query($sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chef | View Review</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="chef-dash-container">
            <div class="chef-dash-nav">
                <div class="chef-dash-entry">
                    <a href="chef-dashboard.php"><h1>Dashboard</h1></a>
                </div>

                <div class="chef-dash-entry">
                    <a href="chef-add-recipe.php"><h1>Add recipie</h1></a>
                </div>

                <div class="chef-dash-entry dsah-nav-active">
                    <a href="chef-view-review.php"><h1>Reviews</h1>
                </div>

                <a class="chef-dash-nav-signout" href="logout.php">Logout</a>
            </div>
            <div class="chef-dash-content-div">
                <div class="chef-greet-div">
                    <h2>Hello! <span></span></h2>
                </div>
                <div class="chef-dash-title-div">
                    <h2>User Reviews</h2>
                </div>
                
                <div class="user-reviews-headings-div">
                    <div class="user-head-slno">
                        <h2>Sl. No</h2>
                    </div>
                    <div class="user-head-title">
                        <h2>Recipe Title</h2>
                    </div>
                    <div class="user-head-review">
                        <h2>Review</h2>
                    </div>
                </div>

                <?php
                    while ($row = mysqli_fetch_assoc($result))
                    {
                        $count=$count+1;
                ?>
                <div class="user-reviews-headings-div user-reviews-contents-div">
                    <div class="user-head-slno">
                        <h2><?php echo $count; ?></h2>
                    </div>
                    <div class="user-head-title">
                        <h2><?php echo $row["recipe_title"]; ?></h2>
                    </div>
                    <div class="user-head-review">
                        <h2><?php echo $row["review_text"]; ?></h2>
                    </div>
                </div>
                <?php
                    }
                ?>

            </div>
    </div>
</body>
</html>