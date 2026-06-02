<?php

$titleFromURL = $_SESSION["research"];

$database = __DIR__ . "/../../../database/directories/";
$jsonFile = $database . "archives.json";

$json = file_get_contents($jsonFile);
$contents = json_decode($json, true);

for ($iter = 0; $iter < count($contents); $iter++) {
    $titleFromJSON = $contents[$iter]['title'];

    if ($titleFromURL == $titleFromJSON) {
        $researchInfo = $contents[$iter];
        break;
    };
};
