<?php
include __DIR__ . "/../src/controllers/utils/CheckInSession.php";
include __DIR__ . "/../src/controllers/auth/logout_user.php";
include __DIR__ . "/../src/components/Searchbar/Searchbar.php";
include __DIR__ . "/../src/controllers/utils/SearchQuery.php";

if (isset($_COOKIE['archive-username'])) $_SESSION['username'] = $_COOKIE['archive-username'];
$response = SearchQuery();
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
    <title>Arc Hive - Homepage</title>
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
            if (!empty($_SESSION['hasSearchItem'])) {
                Searchbar();
            }
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
                <a href="./register.php" id="register">Register</a>
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
        <?php
        if (empty($_SESSION['hasSearchItem'])) {
        ?>
            <div class="starting-block">
                <div class="text">Learn something new from the Hive!</div>
                <?php
                Searchbar();
                ?>
            </div>
        <?php
        } else {
        ?>
            <div class="view-contents">
                <div id="category-box">
                    <p id="category">
                        <?php echo $response['category'] ?>
                    </p>
                    <div id="tag">
                        <p>
                            by <?php echo ucwords(strtolower($_GET['filterBy'])) ?>
                        </p>
                    </div>
                </div>
                <?php
                if (count($response['request']) == 0) {
                ?>
                    <div class="archive-list-box empty">
                        <svg xmlns="http://www.w3.org/2000/svg" height="88px" viewBox="0 -960 960 960" width="88px" fill="var(--primary-color)">
                            <path d="M446-446Zm106-95Zm-106 95Zm106-95Zm-106 95Zm106-95ZM791-56 56-791l56-57 736 736-57 56Zm-311-64q-151 0-255.5-46.5T120-280v-400q0-26 17.5-49.5T187-773l252 252q-72-3-133-18t-106-40v120q51 29 123 44t157 15q20 0 39-.5t38-2.5l70 70q-34 7-71 10t-76 3q-85 0-157-15t-123-44v99q9 29 97.5 54.5T480-200q64 0 128.5-13T715-245l58 58q-49 31-125.5 49T480-120Zm350-123-70-70v-66q-11 6-22 11t-23 10l-61-61q30-8 56.5-17.5T760-459v-120q-41 23-94 37t-116 19l-76-76q44 0 92-7t89.5-18.5q41.5-11.5 70-26T760-679q-11-29-100.5-55T480-760q-37 0-75.5 5T331-742l-66-66q45-15 100-23.5t115-8.5q149 0 254.5 47T840-680v400q0 10-2.5 19t-7.5 18Z" />
                        </svg>
                        <p>There are no archives...</p>
                    </div>
                <?php
                } else {
                ?>
                    <div class="archive-list-box">
                        <?php
                        foreach ($response['request'] as $request) {
                        ?>
                            <a href="./view_archive.php?view=<?php echo urlencode($request['title']) ?>" class="component card article">
                                <div class="archive-info-box">
                                    <p class="title">
                                        <?php echo $request['title'] ?>
                                    </p>
                                    <p class="author">
                                        Authored by: <?php echo $request['author'] ?>
                                    </p>
                                    <p class="year">
                                        Publishing year: <?php echo $request['year'] ?>
                                    </p>
                                </div>
                                <div class="category-box">
                                    <p class="category">
                                        <span><?php echo $request['category'] ?></span>
                                    </p>
                                </div>
                            </a>
                        <?php
                        }
                        ?>
                    </div>
                <?php
                };
                ?>
            </div>
        <?php
        };
        ?>
    </main>
</body>

</html>