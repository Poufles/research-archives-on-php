<?php

// include __DIR__ . "/../utils/CategoryToDirectory.php";

/**
 * @param object $archive
 */
function SaveToDirectory($archive)
{

    print_r($archive);
    $baseDir = __DIR__ . "/../../../database/directories/";
    $path = $baseDir . "archives.txt";

    if (!is_file($path)) file_put_contents($path, '', FILE_APPEND);

    // Retrieve data
    $newArchive =
        $archive['title'] . "\n" .
        $archive['category'] . "\n" .
        $archive['author'] . "\n" .
        $archive['year'] . "\n" .
        $archive['abstract'] . "\n" .
        $archive['username'] . "\n" .
        $archive['file']['name'] . "\n";

    file_put_contents($path, $newArchive, FILE_APPEND);

    // Block for saving file //
    $destination = $baseDir . $archive["file"]["name"];

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

    $fileDir = __DIR__ . "/../../../database/user_data/" . $archive["username"] . "/uploads.txt";

    if (!is_file($fileDir)) file_put_contents($fileDir, '', FILE_APPEND);

    $newArchive = 
        $archive['title'] . "\n" .
        $archive['category'] . "\n";

    file_put_contents($fileDir, $newArchive, FILE_APPEND);
};
