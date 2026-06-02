<?php

include __DIR__ . "/../utils/CategoryToDirectory.php";

$file = $_GET["file"] ?? "";

$path = __DIR__ . "/../../../database/directories/" . $file;

// AI was used here
header("Content-Type: application/pdf");
header("Content-Disposition: inline");

readfile($path);
// AI was used here
exit;