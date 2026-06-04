<?php

$titleFromURL = $_GET['view'];
$_SESSION["titleFromUrl"] = $titleFromURL;

$baseDir = __DIR__ . "/../../../database/directories/";
$filePath = $baseDir . "archives.txt";

$file = file($filePath, FILE_IGNORE_NEW_LINES);

for ($iter = 0; $iter < count($file); $iter+=7) {
    if ($file[$iter] != $titleFromURL) continue;

    $researchInfo = [
        "title" => $file[$iter],
        "category" => $file[$iter + 1],
        "author" => $file[$iter + 2],
        "year" => $file[$iter + 3],
        "abstract" => $file[$iter + 4],
        "username" => $file[$iter + 5],
        "filename" => $file[$iter + 6],
    ];

    break;
};