<?php include __DIR__ . "/../../controllers/auth/create_user.php";?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Arc Hive - Register new account</title>
</head>

<body>
    <form action="<?php htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="post" enctype="multipart/form-data">
        <div class="input-field-container">
            <label>
                <span class="input-text">Username:</span>
                <input type="text" name="username" class="input-field">
            </label class="input-field-container">
            <?php 
                if ($fieldStatus["username"] == "unset" && isset($_POST["submit"])) MessageInputFieldEmpty("username");

                if ($fieldStatus["username"] == "duplicate" && isset($_POST["submit"])) MessageInputFieldDuplicate($userCredentials["username"]);
            ?>
        </div>
        <div class="input-field-container">
            <label>
                <span class="input-text">Password:</span>
                <input type="password" name="password" class="input-field">
            </label>
            <?php 
                if ($fieldStatus["password"] == "unset" && isset($_POST["submit"])) MessageInputFieldEmpty("password");
            ?>
        </div>
        <label class="input-field-container">
            <span class="input-text">Email Address:</span>
            <input type="email" name="email" class="input-field">
        </label>
        <div class="input-field-container">
            <span class="input-text">Gender:</span>
            <div id="gender-options">
                <label for="male" class="gender-option">
                    <input type="radio" name="gender" value="male" id="male" class="input-radio">
                    <span class="gender-text">Male</span>
                </label>
                <label for="female" class="gender-option">
                    <input type="radio" name="gender" value="female" id="female" class="input-radio">
                    <span class="gender-text">Female</span>
                </label>
                <label for="gender-others" class="gender-option">
                    <input type="radio" name="gender" value="others" id="gender-others" class="input-radio">
                    <span class="gender-text">Others</span>
                </label>
            </div>
        </div>
        <label class="input-field-container">
            <span class="input-text">Telephone No.:</span>
            <input type="text" name="telephone" class="input-field">
        </label>
        <div class="input-field-container">
            <span class="input-text">Status:</span>
            <div id="status-options">
                <label for="student" class="status-option">
                    <input type="radio" name="status" value="student" id="student" class="input-radio">
                    <span class="status-text">Student</span>
                </label>
                <label for="researcher" class="status-option">
                    <input type="radio" name="status" value="researcher" id="researcher" class="input-radio">
                    <span class="status-text">Researcher</span>
                </label>
                <label for="status-others" class="status-option">
                    <input type="radio" name="status" value="others" id="status-others" class="input-radio">
                    <span class="status-text">Others</span>
                </label>
            </div>
        </div>
        <div class="actions">
            <input type="reset" name="reset" value="Reset">
            <input type="submit" name="submit" value="Create Hive!">
        </div>
    </form>
    <br>
    <a href="../../../public/">To clear $_POST</a>
</body>

</html>