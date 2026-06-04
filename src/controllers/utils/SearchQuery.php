<?php

function SearchQuery()
{
    $requestedArchives = [];
    $search = $_GET['search'] ?? '';
    $category = $_GET['category'] ?? 'allStudies';
    $filter = $_GET['filterBy'] ?? 'title';

    include __DIR__ . "/TranslateCategory.php";


    if ($category != 'allStudies') $translatedCategory = TranslateCategory($category);

    $response = [
        "search" => $search,
        "category" => $translatedCategory ?? 'All Studies',
        "filter" => $filter,
        "request" => [],
    ];

    // Get archives.json
    $fileDir = __DIR__ . "/../../../database/directories/archives.txt";
    $file = file($fileDir, FILE_IGNORE_NEW_LINES);

    // filters
    // url = ?search=&category=allStudies
    if ($search == '' && $category == 'allStudies') {
        for ($iter = 0; $iter < count($file); $iter += 8) {
            array_push($requestedArchives, [
                "title" => $file[$iter],
                "category" => $file[$iter + 1],
                "author" => $file[$iter + 2],
                "year" => $file[$iter + 3],
            ]);
        };

        $response['request'] = $requestedArchives;

        return $response;
    }

    // DO TOMORROW TILL BELOW //
    // url = ?search=searchItem&category=allStudies
    if ($search != '' && $category == 'allStudies') {
        for ($iter = 0; $iter < count($file); $iter += 8) {
            if (!str_contains(
                strtolower($file[$iter]),
                strtolower($search)
            )) continue;

            array_push($requestedArchives, [
                "title" => $file[$iter],
                "category" => $file[$iter + 1],
                "author" => $file[$iter + 2],
                "year" => $file[$iter + 3],
            ]);
        };

        $response['request'] = $requestedArchives;

        return $response;
    }

    // url = ?search=&category=category
    if ($search == '') {
        for ($iter = 0; $iter < count($file); $iter += 8) {
            if ($file[$iter + 1] != $translatedCategory) continue;

            array_push($requestedArchives, [
                "title" => $file[$iter],
                "category" => $file[$iter + 1],
                "author" => $file[$iter + 2],
                "year" => $file[$iter + 3],
            ]);
        };

        $response['request'] = $requestedArchives;

        return $response;
    }

    // url = ?search=searchItem&category=category
    for ($iter = 0; $iter < count($file); $iter += 8) {
        if ($file[$iter + 1] != $translatedCategory || !str_contains(
            strtolower($file[$iter]),
            strtolower($search)
        )) continue;

        array_push($requestedArchives, [
            "title" => $file[$iter],
            "category" => $file[$iter + 1],
            "author" => $file[$iter + 2],
            "year" => $file[$iter + 3],
        ]);
    };

    $response['request'] = $requestedArchives;

    return $response;
};
