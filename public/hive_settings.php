<?php
include __DIR__ . "/../src/controllers/utils/CheckInSession.php";
include __DIR__ . "/../src/controllers/auth/logout_user.php";
include __DIR__ . "/../src/components/Searchbar/Searchbar.php";

if (isset($_COOKIE['archive-username'])) $_SESSION['username'] = $_COOKIE['archive-username'];
if (!isset($_COOKIE["archive-insession"])) header("location: ./login.php");

$username = $_SESSION["username"] ?? "";
$profile = [
    "username" => $username,
    "email" => "Not set",
    "gender" => "Not set",
    "status" => "Not set",
];
$uploads = [];

$userDir = __DIR__ . "/../database/user_data/" . $username;
$profilePath = __DIR__ . "/../database/user_data/" . $username . "/profile.txt";
$uploadsPath = __DIR__ . "/../database/user_data/" . $username . "/uploads.txt";
$settingsResponse = "";

function DeleteUserDirectory($dir)
{
    if (!is_dir($dir)) return;

    foreach (scandir($dir) as $item) {
        if ($item == "." || $item == "..") continue;

        $path = $dir . DIRECTORY_SEPARATOR . $item;
        if (is_dir($path)) DeleteUserDirectory($path);
        else unlink($path);
    }

    rmdir($dir);
}

if (isset($_POST["update_profile"])) {
    if (!is_dir($userDir)) mkdir($userDir, 0777, true);

    $profileData = [];
    if (is_file($profilePath)) $profileData = file($profilePath, FILE_IGNORE_NEW_LINES);

    $updatedProfile =
        ($profileData[0] ?? $username) . "\n" .
        ($profileData[1] ?? "") . "\n" .
        ($_POST["email"] ?? "") . "\n" .
        ($_POST["gender"] ?? "") . "\n" .
        ($_POST["status"] ?? "") . "\n";

    file_put_contents($profilePath, $updatedProfile);
    header("location: ./hive_settings.php?profile_updated=1#edit-user");
    exit;
}

if (isset($_POST["change_password"]) && is_file($profilePath)) {
    $profileData = file($profilePath, FILE_IGNORE_NEW_LINES);
    $currentPassword = trim($_POST["current_password"] ?? "");
    $newPassword = trim($_POST["new_password"] ?? "");
    $confirmPassword = trim($_POST["confirm_password"] ?? "");
    $savedPassword = trim($profileData[1] ?? "");

    if (!hash_equals($savedPassword, $currentPassword)) {
        $settingsResponse = "Current password is incorrect.";
    } else if ($newPassword == "" || $confirmPassword == "") {
        $settingsResponse = "Please fill up all password fields.";
    } else if ($newPassword != $confirmPassword) {
        $settingsResponse = "New password and confirmation do not match.";
    } else {
        $profileData[1] = $newPassword;
        file_put_contents($profilePath, implode("\n", $profileData) . "\n");
        header("location: ./hive_settings.php?password_updated=1#change-password");
        exit;
    }
}

if (isset($_POST["delete_account"])) {
    if ($username != "" && ($_POST["confirm_username"] ?? "") == $username) {
        DeleteUserDirectory($userDir);
        session_destroy();
        setcookie("archive-insession", false, 1, "/");
        setcookie("archive-username", "", 1, "/");
        header("location: ./");
        exit;
    } else {
        $settingsResponse = "Type your username to delete this account.";
    }
}

if (is_file($profilePath)) {
    $profileData = file($profilePath, FILE_IGNORE_NEW_LINES);
    $profile["username"] = !empty($profileData[0]) ? $profileData[0] : $profile["username"];
    $profile["email"] = !empty($profileData[2]) ? $profileData[2] : $profile["email"];
    $profile["gender"] = !empty($profileData[3]) ? $profileData[3] : $profile["gender"];
    $profile["status"] = !empty($profileData[4]) ? $profileData[4] : $profile["status"];
}

if (is_file($uploadsPath)) {
    $uploads = file($uploadsPath, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
}

if (isset($_GET["password_updated"])) $settingsResponse = "Password updated.";
if (isset($_GET["profile_updated"])) $settingsResponse = "Profile updated.";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./styles/index.css">
    <link rel="stylesheet" href="../src/components/Searchbar/Searchbar.css">
    <script type="module" src="../src/components/Searchbar/Searchbar.js" defer></script>
    <script src="../src/components/BrowseDropdown/BrowseDropdown.js" defer></script>
    <script src="../src/components/UserProfileDropdown/UserProfileDropdown.js" defer></script>
    <title>Arc Hive - Hive Settings</title>
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
        <div id="nav-searchbar"><?php Searchbar(true); ?></div>
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
            <div class="component user-setting">
                <div class="account-icon-container">
                    <span id="account-name"><?php echo htmlspecialchars($username); ?></span>
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
        </div>
    </nav>
    <main class="settings-main">
        <div class="settings-shell">
            <div class="settings-header">
                <div>
                    <p class="eyebrow">Hive Settings</p>
                    <h1><?php echo htmlspecialchars($profile["username"]); ?></h1>
                </div>
                
            </div>
            <div class="settings-grid">
                <section class="settings-panel profile-panel" id="profile-info">
                    <div class="panel-heading">
                        <p class="panel-title">Profile Information</p>
                        <div class="panel-actions">
                            <a class="settings-action small-action" href="#edit-user">Edit</a>
                            <form action="<?php htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" onsubmit="return confirm('Are you sure you want to delete this account?');">
                                <input type="hidden" name="confirm_username" value="<?php echo htmlspecialchars($profile["username"]); ?>">
                                <input class="settings-action small-action delete-action" type="submit" value="Delete" name="delete_account">
                            </form>
                        </div>
                    </div>
                    <div class="profile-avatar"><?php echo strtoupper(substr($profile["username"], 0, 1)); ?></div>
                    <?php if ($settingsResponse != "") { ?>
                        <p class="settings-response"><?php echo htmlspecialchars($settingsResponse); ?></p>
                    <?php } ?>
                    <div class="info-list">
                        <p><span>Username</span><?php echo htmlspecialchars($profile["username"]); ?></p>
                        <p><span>Email</span><?php echo htmlspecialchars($profile["email"]); ?></p>
                        <p><span>Gender</span><?php echo htmlspecialchars(ucfirst($profile["gender"])); ?></p>
                        <p><span>Status</span><?php echo htmlspecialchars($profile["status"]); ?></p>
                    </div>
                </section>
                <section class="settings-panel edit-user-panel" id="edit-user">
                    <div class="panel-heading">
                        <p class="panel-title">Edit User</p>
                        <a class="settings-action small-action" href="./hive_settings.php#profile-info">Close</a>
                    </div>
                    <form action="<?php htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                        <label>
                            <span>Email</span>
                            <input type="email" name="email" value="<?php if ($profile["email"] != "Not set") echo htmlspecialchars($profile["email"]); ?>">
                        </label>
                        <label>
                            <span>Gender</span>
                            <select name="gender">
                                <option value="Male" <?php if ($profile["gender"] == "Male") echo "selected"; ?>>Male</option>
                                <option value="Female" <?php if ($profile["gender"] == "Female") echo "selected"; ?>>Female</option>
                                <option value="Prefer not to say" <?php if ($profile["gender"] == "Prefer not to say") echo "selected"; ?>>Prefer not to say</option>
                            </select>
                        </label>
                        <label>
                            <span>Status</span>
                            <select name="status">
                                <option value="Student" <?php if ($profile["status"] == "Student") echo "selected"; ?>>Student</option>
                                <option value="Researcher" <?php if ($profile["status"] == "Researcher") echo "selected"; ?>>Researcher</option>
                                <option value="Teacher" <?php if ($profile["status"] == "Teacher") echo "selected"; ?>>Teacher</option>
                                <option value="Undergraduate" <?php if ($profile["status"] == "Undergraduate") echo "selected"; ?>>Undergraduate</option>

                            </select>
                        </label>
                        <input class="settings-action" type="submit" value="Save Profile" name="update_profile">
                    </form>
                </section>
                <section class="settings-panel uploads-panel">
                    <p class="panel-title">My Uploads</p>
                    <?php if (count($uploads) == 0) { ?>
                        <p class="empty-state">No uploaded archives yet.</p>
                    <?php } else { ?>
                        <div class="uploads-list">
                            <?php for($iter = 0; $iter < count($uploads); $iter += 2) { ?>
                                <p><?php echo htmlspecialchars($uploads[$iter]); ?></p>
                            <?php } ?>
                        </div>
                    <?php } ?>
                </section>
                <section class="settings-panel">
                    <p class="panel-title">Account Security</p>
                    <a class="settings-action" href="#change-password">Change Password</a>
                </section>
                <section class="settings-panel edit-user-panel" id="change-password">
                    <div class="panel-heading">
                        <p class="panel-title">Change Password</p>
                        <a class="settings-action small-action" href="./hive_settings.php#profile-info">Close</a>
                    </div>
                    <form action="<?php htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                        <label>
                            <span>Old Password</span>
                            <input type="password" name="current_password">
                        </label>
                        <label>
                            <span>New Password</span>
                            <input type="password" name="new_password">
                        </label>
                        <label>
                            <span>Confirm Password</span>
                            <input type="password" name="confirm_password">
                        </label>
                        <input class="settings-action" type="submit" value="Save Password" name="change_password">
                    </form>
                </section>
            </div>
        </div>
    </main>
</body>

</html>
