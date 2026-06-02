<?php

include __DIR__ . "/../utils/CategoryToDirectory.php";

/**
 * @param object $archive
 */
function SaveToDirectory($archive)
{

    $categoryDir = __DIR__ . "/../../../database/directories/";
    $jsonFile = $categoryDir . "archives.json";

    // Block for saving archive contents
    if (!is_file($jsonFile)) file_put_contents($jsonFile, json_encode([], JSON_PRETTY_PRINT));

    echo $categoryDir;
    // Retrieve data
    $data = json_decode(file_get_contents($jsonFile), true);

    array_push($data, $archive);
    // Archive the data
    file_put_contents(
        $jsonFile,
        json_encode($data, JSON_PRETTY_PRINT)
    );

    // Block for saving file //
    $destination = $categoryDir . $archive["file"]["name"];

    move_uploaded_file(
        $archive["file"]["tmp_name"],
        $destination
    );
    // Block for saving file //
};

/**
 * @param object $archive
 */
function SaveToUser($archive)
{

    $jsonFile = __DIR__ . "/../../../database/user_data/" .$archive["username"] . "/uploads.json";

    $data = json_decode(file_get_contents($jsonFile), true);

    array_push($data, [
        "title" => $archive["title"],
        "category" => $archive["category"]
    ]);

    file_put_contents(
        $jsonFile,
        json_encode($data, JSON_PRETTY_PRINT)
    );
};
