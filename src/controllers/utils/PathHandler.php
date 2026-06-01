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

/**
 * @param string $destination
 */
function ToDestination($destination) {
    $from = GetPage();

    if ($from == 'index' && $destination == 'index') return './';

    if ($from == 'upload' && $destination == 'index') return '../../../public/';
   
    if ($from == 'view' && $destination == 'index') return '../../../public/';
}

function PathBuilder() {
    // Catchers
    $search = $_GET['search'] ?? '';
    $category = $_GET['category'] ?? '';
    $title = $_GET['title'] ?? '';
    $author = $_GET['author'] ?? '';

    $url = '?';

    if ($search != '') $url = $url . "search=" . $search; 
    if ($category != '') $url = $url . "&category=" . $category; 
    if ($title != '') $url = $url . "&title=" . $title; 
    if ($author != '') $url = $url . "&author=" . $author; 
};