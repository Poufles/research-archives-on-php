<?php

session_start();

$newArchiveInfo = [
    "username" => null,
    "category" => null,
    "title" => null,
    "abstract" => null,
    "author" => null,
    "year" => null,
    "file" => null
];

if (isset($_POST["submit"])) {

    $inputFields = [
        "title" => empty($_POST["title"]),
        "abstract" => empty($_POST["abstract"]),
        "author" => empty($_POST["author"]),
        "year" => empty($_POST["year"]),
        "category" => empty($_POST["category"]),
        "file" => empty($_FILES["file"])
    ];

    $isFieldsComplete = true;
    foreach ($inputFields as $key => $value) {
        if ($inputFields[$key]) {
            $isFieldsComplete = false;
            
            break;
        };
            
        if ($key == "file") {
            $newArchiveInfo[$key] = $_FILES["file"];
            break;
        };

        $newArchiveInfo[$key] = $_POST[$key];
    };

    if ($isFieldsComplete) {
        $newArchiveInfo["username"] = $_SESSION["username"];

        include "upload_archive.php";
        UploadArchive($newArchiveInfo);
    };
};
?>