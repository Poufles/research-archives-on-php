<?php

include __DIR__ . "/../utils/CategoryToDirectory.php";

/**
 * @param object $archive
 */
function SaveByCategory($archive)
{

    $categoryDir = "../../../database/directories/" .
        CategoryToDirectory($archive["category"]) . "/";

    $jsonFile = $categoryDir . "archives.json";

    // Block for saving archive contents
    if (!is_file($jsonFile)) file_put_contents($jsonFile, json_encode([], JSON_PRETTY_PRINT));


    $data = json_decode(file_get_contents($jsonFile), true);

    $data[$archive["title"]] = $archive;

    file_put_contents(
        $jsonFile,
        json_encode($data, JSON_PRETTY_PRINT)
    );
    // Block for saving archive contents

    // Block for saving file
    $destination = $categoryDir . $archive["file"]["name"];

    move_uploaded_file(
        $archive["file"]["tmp_name"],
        $destination
    );
    // Block for saving file
};

/**
 * @param object $archive
 */
function SaveByAuthors($archive)
{

    $jsonFile =
        "../../../database/authors/authors.json";

    $data = json_decode(file_get_contents($jsonFile), true);

    $author = $archive["author"];

    if (!empty($data[$author])) {
        array_push(
            $data[$author],
            [
                "title" => $archive["title"],
                "category" => $archive["category"]
            ]
        );
    } else {
        $data[$author] = [[
            "title" => $archive["title"],
            "category" => $archive["category"]
        ]];
    };

    file_put_contents(
        $jsonFile,
        json_encode($data, JSON_PRETTY_PRINT)
    );
};

/**
 * @param object $archive
 */
function SaveByTitle($archive)
{

    $jsonFile =
        "../../../database/titles/titles.json";

    $data = json_decode(file_get_contents($jsonFile), true);

    $data[$archive["title"]] = $archive["category"];

    file_put_contents(
        $jsonFile,
        json_encode($data, JSON_PRETTY_PRINT)
    );
};

/**
 * @param object $archive
 */
function SaveToUser($archive)
{

    $jsonFile =
        "../../../database/user_data/" . $archive['username'] . "/uploads.json";

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
