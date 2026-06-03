<?php

session_start();

// Variables : User Credentials
$userCredentials = [
    "username" => null,
    "password" => null,
    "email" => null,
    "gender" => null,
    "status" => null
];

// Variables : Fields Status
$fieldStatus = [
    "username" => "unset",
    "password" => "unset",
    "email" => "unset",
    "gender" => "unset",
    "status" => "unset"
];

if (isset($_POST["submit"])) {
    // Checks if username already exists
    $baseDir = __DIR__ . "/../../../database/user_data/";
    if (!empty($_POST["username"])) {

        $verifyUsername = $_POST["username"];
        if (file_exists($baseDir . $verifyUsername)) {
            $userCredentials["username"] = $verifyUsername;
            $fieldStatus["username"] = "duplicate";
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

        if ($key == "username" && $fieldStatus["username"] == "duplicate") {
            $_SESSION['authresponse'] = 'duplicate';
            header('location: ./register.php');
            exit;
        };

        // Verifies if input field is set
        if (!$inputFields[$key]) {
            $userCredentials[$key] = $_POST[$key];
            $fieldStatus[$key] = "set";
        } else {
            $_SESSION['authresponse'] = 'missing';
            header('location: ./register.php');
            exit;
        };
    };

    $newUserDir = $baseDir . $userCredentials["username"];

    mkdir($newUserDir);

    // AI was used here
    file_put_contents($newUserDir . "/profile.json", json_encode($userCredentials));
    // AI was used here

    file_put_contents(
        "$newUserDir/uploads.json",
        json_encode([], JSON_PRETTY_PRINT)
    );

    $_SESSION["username"] = $userCredentials["username"];

    setcookie("archive-insession", true, time() + 9999, "/");
    setcookie("archive-username", $userCredentials['username'], time() + 9999, "/");

    if (isset($_COOKIE['archive-inview'])) {
        $currentPage = $_COOKIE['archive-inview'];

        header('location: ./view_archive.php?view=' . $currentPage);
    } else {
        header("location: ./");
    };

    unset($_SESSION['authresponse']);
};
