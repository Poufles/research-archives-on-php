<?php
session_start();

if (isset($_POST["login"])) {

    $username = $_POST["username"] ?? '';
    $password = $_POST["password"] ?? '';

    if ($username == '' || $password == '') {
        $_SESSION['authresponse'] = 'missing';
        
        header('location: ./login.php');
        exit;
    }

    $profilePath = __DIR__ . "/../../../database/user_data/" . $username . "/";

    // Checks if user doesn't exist
    if (!file_exists($profilePath)) {
        $_SESSION['authresponse'] = 'notexist';
        header('location: ./login.php');
        exit;
    };

    $file = file($profilePath . 'profile.txt', FILE_IGNORE_NEW_LINES);
    $profilePassword = $file[1]; // Password

    // Checks if password doesn't match
    if ($password != $profilePassword) {
        $_SESSION['authresponse'] = 'wrong';
        header('location: ./login.php');
        exit;
    };

    $_SESSION["username"] = $username;

    setcookie("archive-insession", true, time() + 9999, "/");
    setcookie("archive-username", $username, time() + 9999, "/");

    // Verifies if user is accessing a pdf without registering
    if (isset($_COOKIE['archive-inview'])) {
        $currentPage = $_COOKIE['archive-inview'];

        header('location: ./view_archive.php?view=' . $currentPage);
    } else {
        // Login
        header("location: ./");
    };

    unset($_SESSION['authresponse']);
};
