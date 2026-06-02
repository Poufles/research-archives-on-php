<?php

if (!empty($_POST["logout"])) {

    session_destroy();
    setcookie("archive-insession", false, 1, "/");
    header("location: ./");
};