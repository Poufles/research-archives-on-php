<?php

if (!empty($_POST["logout"])) {

    session_destroy();
    setcookie("archive-insession", false, 1, "/");
    setcookie("archive-username", '', 1, "/");
    header("location: ./");
};