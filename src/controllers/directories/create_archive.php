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

// $_SESSION['authresponse'] = '';

if (isset($_POST["submit"])) {

    $inputFields = [
        "title" => empty($_POST["title"]),
        "abstract" => empty($_POST["abstract"]),
        "author" => empty($_POST["author"]),
        "year" => empty($_POST["year"]),
        "category" => empty($_POST["category"]),
        "file" => empty($_FILES["file"]["name"])
    ];

    foreach ($inputFields as $key => $value) {
        if ($inputFields[$key]) {
            $_SESSION['authresponse'] = 'missing';
            echo "First";
            header('location: ./upload_archive.php');
            exit;
        };

        if ($key == "file") {
            $newArchiveInfo[$key] = $_FILES["file"];
            break;
        }

        $newArchiveInfo[$key] = $_POST[$key];
    };

    $newArchiveInfo["username"] = $_SESSION["username"];

    include __DIR__ . "/upload_archive.php";

    SaveToDirectory($newArchiveInfo);
    SaveToUser($newArchiveInfo);

    header("location: ./view_archive.php?view=" . $newArchiveInfo['title']);
};
