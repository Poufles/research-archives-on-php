<?php

include __DIR__ . "/../utils/CategoryToDirectory.php";

$category = $_GET["category"] ?? "";
$file = $_GET["file"] ?? "";

$path = 
    "../../../database/directories/" . CategoryToDirectory($category) . "/" . $file;

// AI was used here
header("Content-Type: application/pdf");
header("Content-Disposition: inline");

readfile($path);
// AI was used here
exit;