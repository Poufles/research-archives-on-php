<?php 
session_start();

if (isset($_POST["login"])) {

    
    $isFieldsComplete = true;
    if (empty($_POST["username"]) || empty($_POST["password"])) $isFieldsComplete = false;

    if ($isFieldsComplete) {

        $username = $_POST["username"];
        $password = $_POST["password"];

        $profilePath = "../../../database/user_data/" . $username . "/profile.json";

        $isAccountExist = true;
        if (!file_exists($profilePath)) {
            $isAccountExist = false;
        };

        if ($isAccountExist) {

            // AI was used here
            $profileData = json_decode(file_get_contents($profilePath), true);
            // AI was used here

            if ($password == $profileData["password"]) {
                $_SESSION["username"] = $username;

                setcookie("inSession", true, time() + 9999, "/");
                var_dump($_COOKIE["inSession"]);
                header("location:../../../public/");
            };
        };
    };
};
?>