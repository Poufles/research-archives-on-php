<?php
include __DIR__ . "/../../controllers/utils/CheckInSession.php";
include __DIR__ . "/../../controllers/utils/PathHandler.php";
include __DIR__ . "/../../controllers/directories/summarize_archive.php";
include __DIR__ . "/../../controllers/auth/logout_user.php";
include __DIR__ . "/../../components/Searchbar/Searchbar.php";
include __DIR__ . "/../../components/BrowseDropdown/BrowseDropdown.php";

SetPage('view');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../../public/styles/index.css">
    <link rel="stylesheet" href="../../components/Searchbar/Searchbar.css">
    <script type="module" src="../../components/BrowseDropdown/BrowseDropdown.js" defer></script>
    <script type="module" src="../../components/UserProfileDropdown/UserProfileDropdown.js" defer></script>
    <title>Arc Hive - Viewing <?php echo $archiveInfo["title"] ?></title>
</head>

<body>
    <nav>
        <div id="nav-logo">
            <a href="../../../public/">
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
                    BrowseDropdown();
                    ?>
                </div>
            </div>
            <div class="component user-setting">
                <div class="account-icon-container">
                    <span id="account-name"><?php echo $_SESSION["username"]; ?></span>
                    <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="var(--accent-color)">
                        <path d="M324.5-404.5Q310-419 310-440t14.5-35.5Q339-490 360-490t35.5 14.5Q410-461 410-440t-14.5 35.5Q381-390 360-390t-35.5-14.5Zm240 0Q550-419 550-440t14.5-35.5Q579-490 600-490t35.5 14.5Q650-461 650-440t-14.5 35.5Q621-390 600-390t-35.5-14.5ZM480-160q134 0 227-93t93-227q0-24-3-46.5T786-570q-21 5-42 7.5t-44 2.5q-91 0-172-39T390-708q-32 78-91.5 135.5T160-486v6q0 134 93 227t227 93Zm0 80q-83 0-156-31.5T197-197q-54-54-85.5-127T80-480q0-83 31.5-156T197-763q54-54 127-85.5T480-880q83 0 156 31.5T763-763q54 54 85.5 127T880-480q0 83-31.5 156T763-197q-54 54-127 85.5T480-80Zm-54-715q42 70 114 112.5T700-640q14 0 27-1.5t27-3.5q-42-70-114-112.5T480-800q-14 0-27 1.5t-27 3.5ZM177-581q51-29 89-75t57-103q-51 29-89 75t-57 103Zm249-214Zm-103 36Z" />
                    </svg>
                </div>
                <div class="user-actions disabled">
                    <a href="./">Hive Settings</a>
                    <a href="./research_register.php">Create an Archive</a>
                    <form action="<?php htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                        <input type="submit" value="Hive out" name="logout">
                    </form>
                </div>
            </div>
        </div>
    </nav>
    <main>
        <div class="view-contents">
            <div id="category-box">
                <p id="category">
                    <?php echo $archiveInfo["category"] ?>
                </p>
            </div>
            <div id="archiver-box">
                <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="var(--primary-color)">
                    <path d="M324.5-404.5Q310-419 310-440t14.5-35.5Q339-490 360-490t35.5 14.5Q410-461 410-440t-14.5 35.5Q381-390 360-390t-35.5-14.5Zm240 0Q550-419 550-440t14.5-35.5Q579-490 600-490t35.5 14.5Q650-461 650-440t-14.5 35.5Q621-390 600-390t-35.5-14.5ZM480-160q134 0 227-93t93-227q0-24-3-46.5T786-570q-21 5-42 7.5t-44 2.5q-91 0-172-39T390-708q-32 78-91.5 135.5T160-486v6q0 134 93 227t227 93Zm0 80q-83 0-156-31.5T197-197q-54-54-85.5-127T80-480q0-83 31.5-156T197-763q54-54 127-85.5T480-880q83 0 156 31.5T763-763q54 54 85.5 127T880-480q0 83-31.5 156T763-197q-54 54-127 85.5T480-80Zm-54-715q42 70 114 112.5T700-640q14 0 27-1.5t27-3.5q-42-70-114-112.5T480-800q-14 0-27 1.5t-27 3.5ZM177-581q51-29 89-75t57-103q-51 29-89 75t-57 103Zm249-214Zm-103 36Z" />
                </svg>
                <p id="archiver">
                    <?php echo $archiveInfo["username"] ?>
                </p>
            </div>
            <div id="summary-contents">
                <div id="title-box">
                    <p id="title">
                        <?php echo $archiveInfo["title"] ?>
                    </p>
                </div>
                <div id="author-year-box">
                    <p id="author">
                        Author(s): <?php echo $archiveInfo["author"] ?>
                    </p>
                    <p id="year">
                        Published Year: <?php echo $archiveInfo["year"] ?>
                    </p>
                </div>
                <div id="abstract-box">
                    <p>Abstract</p>
                    <p id="abstract">
                        <?php echo $archiveInfo["abstract"] ?>
                    </p>
                </div>
                <div id="action-box">
                    <a id="view-link" href="../../controllers/directories/read_archive.php?category=<?php echo urlencode($archiveInfo["category"]); ?>&file=<?php echo urlencode($archiveInfo["file"]["name"]); ?>" target="_blank" rel="noopener noreferrer">
                        <svg xmlns="http://www.w3.org/2000/svg" height="20px" viewBox="0 -960 960 960" width="20px" fill="#FFF">
                            <path d="M360-460h40v-80h40q17 0 28.5-11.5T480-580v-40q0-17-11.5-28.5T440-660h-80v200Zm40-120v-40h40v40h-40Zm120 120h80q17 0 28.5-11.5T640-500v-120q0-17-11.5-28.5T600-660h-80v200Zm40-40v-120h40v120h-40Zm120 40h40v-80h40v-40h-40v-40h40v-40h-80v200ZM320-240q-33 0-56.5-23.5T240-320v-480q0-33 23.5-56.5T320-880h480q33 0 56.5 23.5T880-800v480q0 33-23.5 56.5T800-240H320Zm0-80h480v-480H320v480ZM160-80q-33 0-56.5-23.5T80-160v-560h80v560h560v80H160Zm160-720v480-480Z" />
                        </svg>
                        <p>View PDF</p>
                    </a>
                </div>
            </div>
        </div>
    </main>
</body>

</html>