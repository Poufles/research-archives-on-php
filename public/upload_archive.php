<?php
include __DIR__ . "/../src/controllers/utils/CheckInSession.php";
include __DIR__ . "/../src/controllers/auth/logout_user.php";
include __DIR__ . "/../src/controllers/directories/create_archive.php";

include __DIR__ . "/../src/components/Searchbar/Searchbar.php";
include __DIR__ . "/../src/components/InputFields/InputFields.php";
include __DIR__ . "/../src/components/Buttons/FormButton/GenericButton.php";

if (!isset($_COOKIE["archive-insession"])) header("location: ./login.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./styles/index.css">
    <link rel="stylesheet" href="../src/components/Searchbar/Searchbar.css">
    <link rel="stylesheet" href="../src/components/Buttons/FormButton/GenericButton.css">
    <link rel="stylesheet" href="../src/components/InputFields/InputFields.css">
    <script src="../src/components/BrowseDropdown/BrowseDropdown.js" defer></script>
    <script src="../src/components/InputFields/InputFields.js" defer></script>
    <script src="../src/components/UserProfileDropdown/UserProfileDropdown.js" defer></script>
    <title>Arc Hive - Browse in the Hive!</title>
</head>

<body>
    <nav>
        <div id="nav-logo">
            <a href="./">
                <span class="text">Arc Hive</span>
                <svg xmlns="http://www.w3.org/2000/svg" height="22px" viewBox="0 -960 960 960" width="22px" fill="var(--primary-color)">
                    <path d="m720-600-32 28q-14 13-33 13t-33-11q-14-11-19-28t1-36l16-50-34-20q-16-9-22.5-26t-1.5-34q5-17 20-26.5t34-9.5h40l12-38q6-19 20.5-30.5T720-880q17 0 31.5 11.5T772-838l12 38h40q19 0 33.5 9.5T878-764q7 18 0 35t-22 25l-36 20 16 50q6 19 1 36.5T818-570q-15 11-33.5 11T752-572l-32-28Zm28.5-91.5Q760-703 760-720t-11.5-28.5Q737-760 720-760t-28.5 11.5Q680-737 680-720t11.5 28.5Q703-680 720-680t28.5-11.5ZM552-244q23 60-15 112T430-80q-33 0-62.5-17T324-142q-83 12-137.5-42.5T142-324q-30-17-46-46.5T80-438q0-61 55.5-98.5T244-552l62 26q20-31 53-50.5t71-21.5v-82h60v90q37 11 61 34.5t41 65.5h88v60h-82q-2 38-20.5 71T528-306l24 62Zm-248 24q0-27 4.5-52.5T322-322q-23 11-49.5 15.5T220-304q0 39 22.5 61.5T304-220Zm-74-164q32 0 56.5-8t63.5-32l-120-50q-29-12-49.5.5T160-434q0 26 17 38t53 12Zm200 224q25 0 40.5-17.5T478-214l-54-136q-19 32-29.5 64T384-228q0 33 11.5 50.5T430-160Zm66-222q10-10 16-26.5t6-34.5q0-32-21-54t-52-22q-18 0-34 6t-27 17l78 36 34 78Zm-174 60Z" />
                </svg>
            </a>
        </div>
        <div id="nav-searchbar">
            <?php
            Searchbar(true);
            ?>
        </div>
        <div id="nav-actions">
            <div class="browse-dropdown">
                <div class="dropdown-head">
                    <span id="text">Browse</span>
                    <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="var(--primary-color)">
                        <path d="M480-344 240-584l56-56 184 184 184-184 56 56-240 240Z" />
                    </svg>
                </div>
                <div class="dropdown-body disabled">
                    <?php
                    include __DIR__ . "/../src/components/BrowseDropdown/BrowseDropdown.php";

                    BrowseDropdown();
                    ?>
                </div>
            </div>
            <?php
            if (!$hasUsername) {
            ?>
                <a href="../src/pages/auth/register.php" id="register">Register</a>
            <?php
            } else {
            ?>

                <div class="component user-setting">
                    <div class="account-icon-container">
                        <span id="account-name"><?php echo $_SESSION["username"]; ?></span>
                        <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="var(--accent-color)">
                            <path d="M324.5-404.5Q310-419 310-440t14.5-35.5Q339-490 360-490t35.5 14.5Q410-461 410-440t-14.5 35.5Q381-390 360-390t-35.5-14.5Zm240 0Q550-419 550-440t14.5-35.5Q579-490 600-490t35.5 14.5Q650-461 650-440t-14.5 35.5Q621-390 600-390t-35.5-14.5ZM480-160q134 0 227-93t93-227q0-24-3-46.5T786-570q-21 5-42 7.5t-44 2.5q-91 0-172-39T390-708q-32 78-91.5 135.5T160-486v6q0 134 93 227t227 93Zm0 80q-83 0-156-31.5T197-197q-54-54-85.5-127T80-480q0-83 31.5-156T197-763q54-54 127-85.5T480-880q83 0 156 31.5T763-763q54 54 85.5 127T880-480q0 83-31.5 156T763-197q-54 54-127 85.5T480-80Zm-54-715q42 70 114 112.5T700-640q14 0 27-1.5t27-3.5q-42-70-114-112.5T480-800q-14 0-27 1.5t-27 3.5ZM177-581q51-29 89-75t57-103q-51 29-89 75t-57 103Zm249-214Zm-103 36Z" />
                        </svg>
                    </div>
                    <div class="user-actions disabled">
                        <a href="./hive_settings.php">Hive Settings</a>
                        <a href="./upload_archive.php">Create an Archive</a>
                        <form action="<?php htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                            <input type="submit" value="Hive out" name="logout">
                        </form>
                    </div>
                </div>
            <?php
            }
            ?>
        </div>
    </nav>
    <main>
        <div class="auth-card">
            <div class="header">
                <p class="title">Upload in Hive</p>
                <p class="sub-title">
                    Archive a new research document.
                </p>
            </div>
            <form action="<?php htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="post" enctype="multipart/form-data">
                <?php
                InputFieldText(
                    "title",
                    "Research Title",
                    "<svg xmlns='http://www.w3.org/2000/svg' height='24px' viewBox='0 -960 960 960' width='24px' fill='var(--primary-color)'><path d='M560-564v-68q33-14 67.5-21t72.5-7q26 0 51 4t49 10v64q-24-9-48.5-13.5T700-600q-38 0-73 9.5T560-564Zm0 220v-68q33-14 67.5-21t72.5-7q26 0 51 4t49 10v64q-24-9-48.5-13.5T700-380q-38 0-73 9t-67 27Zm0-110v-68q33-14 67.5-21t72.5-7q26 0 51 4t49 10v64q-24-9-48.5-13.5T700-490q-38 0-73 9.5T560-454ZM260-320q47 0 91.5 10.5T440-278v-394q-41-24-87-36t-93-12q-36 0-71.5 7T120-692v396q35-12 69.5-18t70.5-6Zm260 42q44-21 88.5-31.5T700-320q36 0 70.5 6t69.5 18v-396q-33-14-68.5-21t-71.5-7q-47 0-93 12t-87 36v394Zm-40 118q-48-38-104-59t-116-21q-42 0-82.5 11T100-198q-21 11-40.5-1T40-234v-482q0-11 5.5-21T62-752q46-24 96-36t102-12q58 0 113.5 15T480-740q51-30 106.5-45T700-800q52 0 102 12t96 36q11 5 16.5 15t5.5 21v482q0 23-19.5 35t-40.5 1q-37-20-77.5-31T700-240q-60 0-116 21t-104 59ZM280-494Z'/></svg>"
                );
                InputFieldText(
                    "author",
                    "Author(s)",
                    "<svg xmlns='http://www.w3.org/2000/svg' height='24px' viewBox='0 -960 960 960' width='24px' fill='var(--primary-color)'><path d='M240-80q-33 0-56.5-23.5T160-160v-400q0-33 23.5-56.5T240-640h40v-80q0-83 58.5-141.5T480-920q83 0 141.5 58.5T680-720v80h40q33 0 56.5 23.5T800-560v400q0 33-23.5 56.5T720-80H240Zm0-80h480v-400H240v400Zm296.5-143.5Q560-327 560-360t-23.5-56.5Q513-440 480-440t-56.5 23.5Q400-393 400-360t23.5 56.5Q447-280 480-280t56.5-23.5ZM360-640h240v-80q0-50-35-85t-85-35q-50 0-85 35t-35 85v80ZM240-160v-400 400Z'/></svg>"
                );
                InputFieldDropdown(
                    "category",
                    "Category",
                    "<svg xmlns='http://www.w3.org/2000/svg' height='24px' viewBox='0 -960 960 960' width='24px' fill='var(--primary-color)'><path d='m260-520 220-360 220 360H260ZM700-80q-75 0-127.5-52.5T520-260q0-75 52.5-127.5T700-440q75 0 127.5 52.5T880-260q0 75-52.5 127.5T700-80Zm-580-20v-320h320v320H120Zm580-60q42 0 71-29t29-71q0-42-29-71t-71-29q-42 0-71 29t-29 71q0 42 29 71t71 29Zm-500-20h160v-160H200v160Zm202-420h156l-78-126-78 126Zm78 0ZM360-340Zm340 80Z'/></svg>",
                    [
                        "Business and Marketing" => "businessAndMarketing",
                        "Computer Studies" => "computerStudies",
                        "Economics" => "economics",
                        "English and Literature" => "englishAndLiterature",
                        "History" => "history",
                        "Mathematics and Physics" => "mathematicsAndPhysics",
                        "Medicine" => "medicine",
                        "Psychology and Psiology" => "psychologyAndPsiology",
                        "General Science" => "generalScience",
                        "Social Science" => "socialScience",
                        "Others" => "others"
                    ]
                );
                InputFieldDate(
                    "year",
                    "Year Published",
                    "<svg xmlns='http://www.w3.org/2000/svg' height='24px' viewBox='0 -960 960 960' width='24px' fill='var(--primary-color)'><path d='M200-80q-33 0-56.5-23.5T120-160v-560q0-33 23.5-56.5T200-800h40v-80h80v80h320v-80h80v80h40q33 0 56.5 23.5T840-720v560q0 33-23.5 56.5T760-80H200Zm0-80h560v-400H200v400Zm0-480h560v-80H200v80Zm0 0v-80 80Zm280 240q-17 0-28.5-11.5T440-440q0-17 11.5-28.5T480-480q17 0 28.5 11.5T520-440q0 17-11.5 28.5T480-400Zm-188.5-11.5Q280-423 280-440t11.5-28.5Q303-480 320-480t28.5 11.5Q360-457 360-440t-11.5 28.5Q337-400 320-400t-28.5-11.5ZM640-400q-17 0-28.5-11.5T600-440q0-17 11.5-28.5T640-480q17 0 28.5 11.5T680-440q0 17-11.5 28.5T640-400ZM480-240q-17 0-28.5-11.5T440-280q0-17 11.5-28.5T480-320q17 0 28.5 11.5T520-280q0 17-11.5 28.5T480-240Zm-188.5-11.5Q280-263 280-280t11.5-28.5Q303-320 320-320t28.5 11.5Q360-297 360-280t-11.5 28.5Q337-240 320-240t-28.5-11.5ZM640-240q-17 0-28.5-11.5T600-280q0-17 11.5-28.5T640-320q17 0 28.5 11.5T680-280q0 17-11.5 28.5T640-240Z'/></svg>"
                );

                InputFieldTextArea(
                    "abstract",
                    "This research shows...",
                    "<svg xmlns='http://www.w3.org/2000/svg' height='24px' viewBox='0 -960 960 960' width='24px' fill='var(--primary-color)'><path d='M160-80v-560q0-33 23.5-56.5T240-720h320q33 0 56.5 23.5T640-640v560L400-200 160-80Zm80-121 160-86 160 86v-439H240v439Zm480-39v-560H280v-80h440q33 0 56.5 23.5T800-800v560h-80ZM240-640h320-320Z'/></svg>"
                )
                ?>
                <label class="component input-field file-upload">
                    <span class="text">
                        Choose file (PDF)
                    </span>
                    <input type="file" name="file" accept="application/pdf" id="">
                </label>
                <div class="form-actions">
                    <div class="error-message">
                        <?php
                        if (isset($_SESSION['authresponse'])) {
                            if ($_SESSION['authresponse'] == 'missing') echo 'Please fill up all...';
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
                            "Arc Hive!",
                            "submit",
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