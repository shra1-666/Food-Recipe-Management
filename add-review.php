<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reviews</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container review-container">
        <div class="login-head">
            <h1 class="login-head-text review-head-text">The Flavor Report</h1>
        </div>
        <form class="review-form" action="addReview.php" method="post">
            <textarea placeholder="Enter your feedback here" class="review-textarea" name="review_text" id="" cols="40" rows="6"></textarea>
            <input type="hidden" name="recipe_id" value="<?php echo $_GET["recipe_id"]; ?>">
            <input class="review-submit-btn" type="submit" value="Submit">
        </form>
    </div>
</body>
</html>