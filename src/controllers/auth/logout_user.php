<?php

if (!empty($_POST["logout"])) {

    header("location: " . ToDestination('index'));
    session_destroy();
    setcookie("inSession", false, 1, "/");
};