<?php

include __DIR__ .  '/../utils/TitleToCategory.php';
include __DIR__ .  '/../utils/CategoryToDirectory.php';

$titleFromURL = $_SESSION["research"];
$category = TitleToCategory($titleFromURL);

$categoryDir =
    "../../../database/directories/" . CategoryToDirectoryV2($category) . "/";

$archivesJSON = file_get_contents($categoryDir . "archives.json");
$contents = json_decode($archivesJSON, true);

$archiveInfo = $contents[$titleFromURL];