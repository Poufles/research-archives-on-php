<?php

session_start();

$hasUsername = !empty($_SESSION["username"]);
$isSession = isset($_COOKIE["isSession"]);
