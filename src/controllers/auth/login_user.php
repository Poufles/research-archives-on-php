<?php
session_start();

if (isset($_POST["login"])) {

    $isFieldsComplete = true;
    if (empty($_POST["username"]) || empty($_POST["password"])) $isFieldsComplete = false;

    if (!$isFieldsComplete) {
        header('location: ./login.php');
        exit;
    }

    $username = $_POST["username"];
    $password = $_POST["password"];

    $profilePath = __DIR__ . "/../../../database/user_data/" . $username . "/profile.json";

    $isAccountExist = true;
    if (!file_exists($profilePath)) {
        $isAccountExist = false;
    };

    if (!$isAccountExist) {
        $_SESSION['authresponse'] = 'notexist';
        header('location: ./login.php');
        exit;
    }

    $profileData = json_decode(file_get_contents($profilePath), true);

    if ($password != $profileData["password"]) {
        $_SESSION['authresponse'] = 'wrong';
        header('location: ./login.php');
        exit;
    };

    $_SESSION["username"] = $username;

    setcookie("archive-insession", true, time() + 9999, "/");
    setcookie("archive-username", $username, time() + 9999, "/");

    if (isset($_COOKIE['archive-inview'])) {
        $currentPage = $_COOKIE['archive-inview'];

        header('location: ./view_archive.php?view=' . $currentPage);
    } else {
        header("location: ./");
    };

    unset($_SESSION['authresponse']);
};
