<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create account</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <div class="login-content-div create-chef-acc-div">
            <?php if (isset($_GET['error'])) { ?>
          <p class="error"><?php echo $_GET['error']; ?></p>
        <?php } ?>
            <div class="login-head">
                <h1 class="login-head-text create-chef-text">Get started</h1>
            </div>
            <form class="login-credentials-div" action="reg-chef.php" method="post">
                <div class="cred-container cred-container-chef">
                    <label for="userid">Name</label>
                    <input name="chef_name" type="text" placeholder="Enter your name" required>
                </div>

                <div class="cred-container cred-container-chef">
                    <label for="userid">Qualification</label>
                    <input name="qualification" type="text" placeholder="Enter qualification" required>
                </div>

                <div class="cred-container cred-container-chef">
                    <label for="userid">Experience</label>
                    <input name="experience" type="text" placeholder="Enter experience" required>
                </div>

                <div class="cred-container cred-container-chef">
                    <label for="userid">User id</label>
                    <input name="user_id" type="text" placeholder="Enter User id" required>
                </div>

                <div class="cred-container cred-container-chef">
                    <label for="email">Email</label>
                    <input name="email" type="email" placeholder="Enter Email" required>
                </div>

                <div class="cred-container cred-container-chef">
                    <label for="password">Password</label>
                    <input name="password" type="password" placeholder="Enter Password" required>
                </div>
                <div class="submit-container cred-container-chef">
                    <input type="submit" value="Sign up">
                </div>
                <a class="existing-user-btn" href="login-form-chef.php">Existing User ?</a>
            </form>
        </div>
    </div>
</body>
</html>