<?php

/**
 * @param string $currentPage 
 */
function SetPage($currentPage)
{
    $_SESSION['currentpage'] = $currentPage;
};

/**
 * @param string $GetPage
 */
function GetPage() {
    return $_SESSION['currentpage'];
};

/**
 * @param string $destination
 */
function ToDestination($destination) {
    $from = GetPage();

    if ($from == 'index' && $destination == 'index') return './';

    if ($from == 'upload' && $destination == 'index') return '../../../public/';
}