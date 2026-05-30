<?php

include __DIR__ . "/../utils/CategoryToDirectory.php";

$category = "businessAndMarketing"; // Change this later with $_SESSION

$archivesDir =
    "../../../database/directories/" . CategoryToDirectory($category) . "/";

// AI was used here
// $archives = array_diff(scandir($archivesDir), [".", ".."]);
$archives = scandir($archivesDir);
// AI was used here
