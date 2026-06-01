<?php

include __DIR__ . "/../utils/CategoryToDirectory.php";

$category = "others"; // Change this later with $_SESSION

$archivesDir =
    "../../../database/directories/" . CategoryToDirectory($category) . "/";

$archivesJSON = file_get_contents($archivesDir . "archives.json");
$archives = json_decode($archivesJSON, true);