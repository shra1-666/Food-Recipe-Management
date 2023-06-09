<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Create account</title>
    <link rel="stylesheet" href="style.css" />
  </head>
  <body>
    <div class="container">
      <div class="login-content-div create-acc-div">
        <?php if (isset($_GET['error'])) { ?>
          <p class="error"><?php echo $_GET['error']; ?></p>
        <?php } ?>
        <div class="login-head">
          <h1 class="login-head-text">Get started</h1>
        </div>
        <form class="login-credentials-div" action="reg-user.php" method="post">
          <div class="cred-container">
            <label for="user_name">User Name</label>
            <input
              type="text"
              name="user_name"
              id="user_name"
              placeholder="Enter User Name"
              required
            />
          </div>

          <div class="cred-container">
            <label for="email">Email</label>
            <input
              type="email"
              name="email"
              id="email"
              placeholder="Enter Email"
              required
            />
          </div>

          <div class="cred-container">
            <label for="password">Password</label>
            <input
              type="password"
              name="password"
              id="password"
              placeholder="Enter Password"
              required
            />
          </div>
          <div class="submit-container">
            <input type="submit" value="Sign up" />
          </div>
          <a class="existing-user-btn" href="login-form.php">Existing User ?</a>
        </form>
      </div>
    </div>
  </body>
</html>
