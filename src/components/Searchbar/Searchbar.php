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
        <div class="filter">
            <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="var(--primary-color)">
                <path d="M520-600v-80h120v-160h80v160h120v80H520Zm120 480v-400h80v400h-80Zm-400 0v-160H120v-80h320v80H320v160h-80Zm0-320v-400h80v400h-80Z" />
            </svg>
        </div>
        <form action="./" method="get" id="search-form">
            <input type="text" name="search" id="" placeholder="Search any academic studies...">
            <input
                type="hidden"
                name="category"
                value="<?php echo htmlspecialchars($currentCategory) ?>">
            <button type="submit">
                <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="var(--primary-color)">
                    <path d="M784-120 532-372q-30 24-69 38t-83 14q-109 0-184.5-75.5T120-580q0-109 75.5-184.5T380-840q109 0 184.5 75.5T640-580q0 44-14 83t-38 69l252 252-56 56ZM380-400q75 0 127.5-52.5T560-580q0-75-52.5-127.5T380-760q-75 0-127.5 52.5T200-580q0 75 52.5 127.5T380-400Z" />
                </svg>
            </button>
        </form>
    </div>
<?php
};
