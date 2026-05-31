<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./styles/index.css">
    <script src="../src/components/BrowseDropdown/BrowseDropdown.js" defer></script>
    <title>Arc Hive - Homepage</title>
</head>

<body>
    <nav>
        <div id="nav-logo">
            <a href="./">
                <span class="text">Arc Hive</span>
                <svg xmlns="http://www.w3.org/2000/svg" height="22px" viewBox="0 -960 960 960" width="22px" fill="var(--primary-color)"><path d="m720-600-32 28q-14 13-33 13t-33-11q-14-11-19-28t1-36l16-50-34-20q-16-9-22.5-26t-1.5-34q5-17 20-26.5t34-9.5h40l12-38q6-19 20.5-30.5T720-880q17 0 31.5 11.5T772-838l12 38h40q19 0 33.5 9.5T878-764q7 18 0 35t-22 25l-36 20 16 50q6 19 1 36.5T818-570q-15 11-33.5 11T752-572l-32-28Zm28.5-91.5Q760-703 760-720t-11.5-28.5Q737-760 720-760t-28.5 11.5Q680-737 680-720t11.5 28.5Q703-680 720-680t28.5-11.5ZM552-244q23 60-15 112T430-80q-33 0-62.5-17T324-142q-83 12-137.5-42.5T142-324q-30-17-46-46.5T80-438q0-61 55.5-98.5T244-552l62 26q20-31 53-50.5t71-21.5v-82h60v90q37 11 61 34.5t41 65.5h88v60h-82q-2 38-20.5 71T528-306l24 62Zm-248 24q0-27 4.5-52.5T322-322q-23 11-49.5 15.5T220-304q0 39 22.5 61.5T304-220Zm-74-164q32 0 56.5-8t63.5-32l-120-50q-29-12-49.5.5T160-434q0 26 17 38t53 12Zm200 224q25 0 40.5-17.5T478-214l-54-136q-19 32-29.5 64T384-228q0 33 11.5 50.5T430-160Zm66-222q10-10 16-26.5t6-34.5q0-32-21-54t-52-22q-18 0-34 6t-27 17l78 36 34 78Zm-174 60Z"/></svg>
            </a>
        </div>
        <div id="nav-searchbar">
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
            <a href="../src/pages/auth/register.php" id="register">Register</a>
        </div>
    </nav>
    <main>
        <div class="starting-block">
            <div class="text">Learn something new from the Hive!</div>
            <div class="component searchbar">
                <div class="filter">
                    <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="var(--primary-color)"><path d="M520-600v-80h120v-160h80v160h120v80H520Zm120 480v-400h80v400h-80Zm-400 0v-160H120v-80h320v80H320v160h-80Zm0-320v-400h80v400h-80Z"/></svg>
                </div>
                <form action="" method="get" id="search-form">
                    <input type="text" name="searcheditem" id="" placeholder="Search any academic studies...">
                    <button type="button" name="search">
                        <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="var(--primary-color)"><path d="M784-120 532-372q-30 24-69 38t-83 14q-109 0-184.5-75.5T120-580q0-109 75.5-184.5T380-840q109 0 184.5 75.5T640-580q0 44-14 83t-38 69l252 252-56 56ZM380-400q75 0 127.5-52.5T560-580q0-75-52.5-127.5T380-760q-75 0-127.5 52.5T200-580q0 75 52.5 127.5T380-400Z"/></svg>
                    </button>
                </form>
            </div>
        </div>
    </main>
</body>

</html>