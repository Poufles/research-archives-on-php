<?php

session_start();

// Variables : User Credentials
$userCredentials = [
    "username" => null,
    "password" => null,
    "email" => null,
    "gender" => null,
    "telephone" => null,
    "status" => null
];

// Variables : Fields Status
$fieldStatus = [
    "username" => "unset",
    "password" => "unset",
    "email" => "unset",
    "gender" => "unset",
    "telephone" => "unset",
    "status" => "unset"
];

if (isset($_POST["submit"])) {

    // Checks if username already exists
    $baseDir = "../../../database/user_data/";
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
        "telephone" => empty($_POST["telephone"]),
        "status" => empty($_POST["status"]),
    ];

    $isComplete = true; // To check if can proceed to be registered
    foreach ($inputFields as $key => $value) {

        if ($key == "username" && $fieldStatus["username"] == "duplicate") {
            $isComplete = false;
            continue;
        };

        // Verifies if input field is set
        if (!$inputFields[$key]) {
            $userCredentials[$key] = $_POST[$key];
            $fieldStatus[$key] = "set";
        } else {
            $isComplete = false;
        };
    };

    if ($isComplete) {
        $newUserDir = $baseDir . $userCredentials["username"];

        mkdir($newUserDir);
        mkdir($newUserDir . "/uploads");

        // AI was used here
        file_put_contents($newUserDir . "/profile.json", json_encode($userCredentials));
        // AI was used here

        $_SESSION["username"] = $userCredentials["username"];

        header("location: ../../pages/directories/research_archives.php");
    };
};

/**
 * To show that the input field is empty
 * @param string $inputField
 */
function MessageInputFieldEmpty($inputField)
{
?>
    <span class="input-empty-error">Please enter a <?php echo $inputField ?>!</span>
<?php
}

/**
 * To show that the input is a duplicate
 * @param string $inputField
 */
function MessageInputFieldDuplicate($inputField)
{
?>
    <span class="input-empty-error"><?php echo $inputField ?> already exists!</span>
<?php
}
?>