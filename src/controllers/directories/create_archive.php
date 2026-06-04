<?php

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

    foreach ($inputFields as $key => $value) {
        if ($inputFields[$key]) {
            $_SESSION['authresponse'] = 'missing';
            header('location: ./upload_archive.php');
            exit;
        };

        if ($key == "file" && empty($inputFields['file'])) {
            $_SESSION['authresponse'] = 'missing';
            header('location: ./upload_archive.php');
            exit;
        };

        $newArchiveInfo[$key] = $_POST[$key];
    };

    $newArchiveInfo["username"] = $_SESSION["username"];

    include __DIR__ . "/upload_archive.php";

    SaveToDirectory($newArchiveInfo);
    // SaveToUser($newArchiveInfo);

    header("location: ./view_archive.php?view=" . $newArchiveInfo['title']);
};
