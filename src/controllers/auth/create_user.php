<?php

session_start();

$userCredentials = "";

if (isset($_POST["submit"])) {
    // Checks if username already exists
    $baseDir = __DIR__ . "/../../../database/user_data/";
    if (!empty($_POST["username"])) {

        $verifyUsername = $_POST["username"];
        if (file_exists($baseDir . $verifyUsername)) {
            $_SESSION['authresponse'] = 'duplicate';
            header('location: ./register.php');
            exit;
        };
    };

    $inputFields = [
        "username" => empty($_POST["username"]),
        "password" => empty($_POST["password"]),
        "email" => empty($_POST["email"]),
        "gender" => empty($_POST["gender"]),
        "status" => empty($_POST["status"]),
    ];

    foreach ($inputFields as $key => $value) {

        // Verifies if input field is set
        if ($inputFields[$key]) {
            $_SESSION['authresponse'] = 'missing';
            header('location: ./register.php');
            exit;
        }

        $userCredentials = 
            $userCredentials . $_POST[$key] . "\n";
    };

    $newUserDir = $baseDir . $_POST["username"];

    mkdir($newUserDir);

    file_put_contents($newUserDir . "/profile.txt", $userCredentials, FILE_APPEND);

    file_put_contents($newUserDir . "/uploads.txt", "", FILE_APPEND);

    $_SESSION["username"] = $_POST["username"];

    setcookie("archive-insession", true, time() + 9999, "/");
    setcookie("archive-username", $_POST['username'], time() + 9999, "/");

    if (isset($_COOKIE['archive-inview'])) {
        $currentPage = $_COOKIE['archive-inview'];

        header('location: ./view_archive.php?view=' . $currentPage);
    } else {
        header("location: ./");
    };

    unset($_SESSION['authresponse']);
};
