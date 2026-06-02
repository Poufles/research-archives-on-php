<?php

if (!empty($_POST["logout"])) {

    session_destroy();
    setcookie("inSession", false, 1, "/");
    header("location: ./");
};