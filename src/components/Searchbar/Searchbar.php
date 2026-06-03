<?php

$_SESSION['hasSearchItem'] = isset($_GET['search']);

/**
 * @param bool $isNav
 */
function Searchbar($isNav = false)
{
    $currentCategory = $_GET["category"] ?? "allStudies";
?>
    <div class="component searchbar <?php
                                    if (!empty($_SESSION['hasSearchItem']) || $isNav) echo 'is-navbar';
                                    ?>">
        <form action="./" method="get" id="search-form">
            <div class="filters">
                <div class="filter" id="title">
                    <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="var(--primary-color)"><path d="M420-160v-520H200v-120h560v120H540v520H420Z"/></svg>
                </div>
                <div class="filter hidden" id="author">
                    <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="var(--primary-color)"><path d="M200-200v-560 179-19 400Zm80-240h221q2-22 10-42t20-38H280v80Zm0 160h157q17-20 39-32.5t46-20.5q-4-6-7-13t-5-14H280v80Zm0-320h400v-80H280v80Zm-80 480q-33 0-56.5-23.5T120-200v-560q0-33 23.5-56.5T200-840h560q33 0 56.5 23.5T840-760v258q-14-26-34-46t-46-33v-179H200v560h202q-1 6-1.5 12t-.5 12v56H200Zm409-229q-29-29-29-71t29-71q29-29 71-29t71 29q29 29 29 71t-29 71q-29 29-71 29t-71-29ZM480-120v-56q0-24 12.5-44.5T528-250q36-15 74.5-22.5T680-280q39 0 77.5 7.5T832-250q23 9 35.5 29.5T880-176v56H480Z"/></svg>
                </div>
            </div>
            <input type="text" name="search" id="" placeholder="Search any academic studies...">
            <input
                type="hidden"
                name="category"
                value="<?php echo htmlspecialchars($currentCategory) ?>">
            <input
                type="hidden"
                name="filterBy"
                value="title">
            <button type="submit">
                <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="var(--primary-color)">
                    <path d="M784-120 532-372q-30 24-69 38t-83 14q-109 0-184.5-75.5T120-580q0-109 75.5-184.5T380-840q109 0 184.5 75.5T640-580q0 44-14 83t-38 69l252 252-56 56ZM380-400q75 0 127.5-52.5T560-580q0-75-52.5-127.5T380-760q-75 0-127.5 52.5T200-580q0 75 52.5 127.5T380-400Z" />
                </svg>
            </button>
        </form>
    </div>
<?php
};