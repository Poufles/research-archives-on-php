<?php
include __DIR__ . "/../src/controllers/auth/login_user.php";
include __DIR__ . "/../src/components/InputFields/InputFields.php";
include __DIR__ . "/../src/components/Buttons/FormButton/GenericButton.php";

if (isset($_COOKIE["archive-insession"])) header("location: ./");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./styles/index.css">
    <link rel="stylesheet" href="../src/components/Buttons/FormButton/GenericButton.css">
    <link rel="stylesheet" href="../src/components/InputFields/InputFields.css">
    <script type="module" src="../src/components/InputFields/InputFields.js" defer></script>
    <script type="module" src="../src/components/Buttons/FormButton/GenericButton.js"></script>
    <title>Arc Hive - Login</title>
</head>

<body>
    <main>
        <div class="auth-card">
            <a href="./" class="logo">
                <span>Arc Hive</span>
                <svg xmlns="http://www.w3.org/2000/svg" height="32px" viewBox="0 -960 960 960" width="32px" fill="var(--primary-color">
                    <path d="m720-600-32 28q-14 13-33 13t-33-11q-14-11-19-28t1-36l16-50-34-20q-16-9-22.5-26t-1.5-34q5-17 20-26.5t34-9.5h40l12-38q6-19 20.5-30.5T720-880q17 0 31.5 11.5T772-838l12 38h40q19 0 33.5 9.5T878-764q7 18 0 35t-22 25l-36 20 16 50q6 19 1 36.5T818-570q-15 11-33.5 11T752-572l-32-28Zm28.5-91.5Q760-703 760-720t-11.5-28.5Q737-760 720-760t-28.5 11.5Q680-737 680-720t11.5 28.5Q703-680 720-680t28.5-11.5ZM552-244q23 60-15 112T430-80q-33 0-62.5-17T324-142q-83 12-137.5-42.5T142-324q-30-17-46-46.5T80-438q0-61 55.5-98.5T244-552l62 26q20-31 53-50.5t71-21.5v-82h60v90q37 11 61 34.5t41 65.5h88v60h-82q-2 38-20.5 71T528-306l24 62Zm-248 24q0-27 4.5-52.5T322-322q-23 11-49.5 15.5T220-304q0 39 22.5 61.5T304-220Zm-74-164q32 0 56.5-8t63.5-32l-120-50q-29-12-49.5.5T160-434q0 26 17 38t53 12Zm200 224q25 0 40.5-17.5T478-214l-54-136q-19 32-29.5 64T384-228q0 33 11.5 50.5T430-160Zm66-222q10-10 16-26.5t6-34.5q0-32-21-54t-52-22q-18 0-34 6t-27 17l78 36 34 78Zm-174 60Z" />
                </svg>
            </a>
            <div class="header">
                <p class="title">Login to the Hive</p>
                <p class="sub-title">
                    New here? <a href="./register.php">Create a hive account!</a>
                </p>
            </div>
            <form action="<?php htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="post" enctype="multipart/form-data">
                <?php
                InputFieldText(
                    "username",
                    "Username",
                    "<svg xmlns='http://www.w3.org/2000/svg' height='24px' viewBox='0 -960 960 960' width='24px' fill='var(--primary-color)'><path d='M324.5-404.5Q310-419 310-440t14.5-35.5Q339-490 360-490t35.5 14.5Q410-461 410-440t-14.5 35.5Q381-390 360-390t-35.5-14.5Zm240 0Q550-419 550-440t14.5-35.5Q579-490 600-490t35.5 14.5Q650-461 650-440t-14.5 35.5Q621-390 600-390t-35.5-14.5ZM480-160q134 0 227-93t93-227q0-24-3-46.5T786-570q-21 5-42 7.5t-44 2.5q-91 0-172-39T390-708q-32 78-91.5 135.5T160-486v6q0 134 93 227t227 93Zm0 80q-83 0-156-31.5T197-197q-54-54-85.5-127T80-480q0-83 31.5-156T197-763q54-54 127-85.5T480-880q83 0 156 31.5T763-763q54 54 85.5 127T880-480q0 83-31.5 156T763-197q-54 54-127 85.5T480-80Zm-54-715q42 70 114 112.5T700-640q14 0 27-1.5t27-3.5q-42-70-114-112.5T480-800q-14 0-27 1.5t-27 3.5ZM177-581q51-29 89-75t57-103q-51 29-89 75t-57 103Zm249-214Zm-103 36Z'/></svg>"
                );
                InputFieldPassword(
                    "password",
                    "Password",
                    "<svg xmlns='http://www.w3.org/2000/svg' height='24px' viewBox='0 -960 960 960' width='24px' fill='var(--primary-color)'><path d='M240-80q-33 0-56.5-23.5T160-160v-400q0-33 23.5-56.5T240-640h40v-80q0-83 58.5-141.5T480-920q83 0 141.5 58.5T680-720v80h40q33 0 56.5 23.5T800-560v400q0 33-23.5 56.5T720-80H240Zm0-80h480v-400H240v400Zm296.5-143.5Q560-327 560-360t-23.5-56.5Q513-440 480-440t-56.5 23.5Q400-393 400-360t23.5 56.5Q447-280 480-280t56.5-23.5ZM360-640h240v-80q0-50-35-85t-85-35q-50 0-85 35t-35 85v80ZM240-160v-400 400Z'/></svg>"
                );
                ?>
                <div class="form-actions">
                    <div class="error-message">
                        <?php
                        if (isset($_SESSION['authresponse'])) {
                            if ($_SESSION['authresponse'] == 'missing') echo 'Please fill up all...';
                            if ($_SESSION['authresponse'] == 'notexist') echo 'You are not from the Hive...';
                            if ($_SESSION['authresponse'] == 'wrong') echo 'Your credentials are incorrect...';
                        }
                        ?>
                    </div>
                    <div class="actions">
                        <?php
                        GenericFormButton(
                            "Reset",
                            "reset",
                            false,
                            [
                                "type" => "reset"
                            ]
                        );

                        GenericFormButton(
                            "Hive in!",
                            "login",
                            true,
                        )
                        ?>
                    </div>
                </div>
            </form>
        </div>
    </main>
</body>

</html>