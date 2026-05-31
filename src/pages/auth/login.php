<?php include "../../controllers/auth/login_user.php";?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Arc Hive - Login</title>
</head>

<body>
    <form action="<?php htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="post" enctype="multipart/form-data">
        <div class="input-field-container">
            <label>
                <span class="input-text">Username:</span>
                <input type="text" name="username" class="input-field">
            </label class="input-field-container">
        </div>
        <div class="input-field-container">
            <label>
                <span class="input-text">Password:</span>
                <input type="password" name="password" class="input-field">
            </label>
        </div>
        <div class="actions">
            <input type="reset" name="reset" value="Reset">
            <input type="submit" name="login" value="Log in!">
        </div>
        <div id="actions-alt">
            <span>No account? Click </span><a href="./register.php">here</a><span>.</span>            
        </div>
    </form>
</body>

</html>