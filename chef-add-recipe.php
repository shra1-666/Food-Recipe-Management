<?php
session_start();
$uname=$_SESSION['chef_id'];
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
                    <a href="chef-dashboard.php"><h1>Dashboard</h1></a>
                </div>

                <div class="chef-dash-entry dsah-nav-active">
                    <a href="chef-add-recipe.php"><h1>Add recipie</h1></a>
                </div>

                <div class="chef-dash-entry">
                    <a href="chef-view-review.php"><h1>Reviews</h1>
                </div>

                <a class="chef-dash-nav-signout" href="logout.php">Logout</a>
            </div>
            <div class="chef-dash-content-div">
                <div class="chef-dash-title-div">
                    <h2>Add recipe</h2>
                    <!-- <a href="#">Add Recipe</a> -->
                </div>
                

                <div class="recipe-list-body chef-recipe-list-body">
                    
                    <div class="chef-add-recipie-form-container">
                        <form action="addRecipe.php" method="post">
                            <div class="chef-add-recipe-entry-div">
                                <label for="recipe-title">Title</label>
                                <input type="text" name="recipe_title">
                            </div>
                            <div class="chef-add-recipe-entry-div">
                                <label for="recipe-title">Description</label>
                                <textarea name="recipe_desc" cols="18" rows="8"></textarea>
                            </div>
                            <input type="hidden" name="chef_id" value="<?php echo $uname; ?>">
                            <input class="add-recipe-submit-btn" type="submit" value="Submit">
                        </form>
                    </div>
                    
                </div>
            </div>
    </div>
</body>
</html>