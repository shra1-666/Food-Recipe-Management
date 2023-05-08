<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <div class="login-content-div">
            <?php if (isset($_GET['error'])) { ?>
          <p class="error login-error"><?php echo $_GET['error']; ?></p>
        <?php } ?>
            <div class="login-head">
                <h1 class="login-head-text">Welcome Chef!</h1>
            </div>
            <form class="login-credentials-div" action="login-chef-back.php" method="post">
                <div class="cred-container">
                    <label for="userid">User id</label>
                    <input type="text" placeholder="Enter User id" name="user_name" required>
                </div>

                <div class="cred-container">
                    <label for="password">Password</label>
                    <input type="password" placeholder="Enter Password" name="password" required>
                </div>
                <div class="submit-container">
                    <input type="submit" value="Log in">
                </div>
                <a class="existing-user-btn" href="register-chef.php">New User ?</a>
            </form>
        </div>
    </div>
</body>
</html>
