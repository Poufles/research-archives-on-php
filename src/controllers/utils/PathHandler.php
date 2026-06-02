<?php

/**
 * @param string $currentPage 
 */
function SetPage($currentPage)
{
    $_SESSION['currentpage'] = $currentPage;
};

/**
 * 
 */
function GetPage() {
    if (isset($_SESSION['currentpage'])) return $_SESSION['currentpage'];
};