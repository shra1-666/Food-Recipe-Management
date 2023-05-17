<?php
session_start();
$uname=$_SESSION['userName'];
$user_id=$_SESSION['userId'];
$mysqli = require "dbConnect.php";
    
$sql = sprintf("SELECT * FROM recipe
                WHERE recipe_id NOT IN(SELECT recipe_id FROM saved_recipe WHERE user_id='$user_id')");
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
                <div class="chef-dash-entry">
                    <a href="user-dashboard.php"><h1>Dashboard</h1></a>
                </div>

                <div class="chef-dash-entry dsah-nav-active">
                    <a href="user-all-recipe.php"><h1>All recipies</h1></a>
                </div>

                <a class="chef-dash-nav-signout" href="logout.php">Logout</a>
            </div>
            <div class="chef-dash-content-div">
                <div class="chef-greet-div">
                    <h2>Hello! <span></span></h2>
                </div>
                <div class="chef-dash-title-div">
                    <h2>All recipies</h2>
                </div>
                

                <div class="recipe-list-body chef-recipe-list-body">
                    <?php
                        while ($row = mysqli_fetch_assoc($result))
                        {
                            $redir_url='saveRecipe.php?recipe_id=' . urlencode($row["recipe_id"]);
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
                        <div class="save-icon-div">
                            <a href="<?php echo $redir_url; ?>"><img src="save-icon.svg" alt=""></a>
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