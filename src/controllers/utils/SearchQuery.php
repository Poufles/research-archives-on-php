<?php

function SearchQuery()
{
    $requestedArchives = [];
    $search = $_GET['search'] ?? '';
    $category = $_GET['category'] ?? '';
    $filter = $_GET['filterBy'] ?? 'title';

    // Get archives.json
    $dir = __DIR__ . "/../../../database/directories/archives.json";
    $json = file_get_contents($dir);
    $archives = json_decode($json, true);

    // filters
    if ($search == '' && $category == 'allStudies') {
        foreach($archives as $archive) {
            array_push($requestedArchives, $archive);
        };

        return $requestedArchives;
    }

    if ($search != '' && $category == 'allStudies') {
        foreach($archives as $archive) {
            if (str_contains(
                strtolower($archive['title']),
                strtolower($search)
            ))
            array_push($requestedArchives, $archive);
        };

        return $requestedArchives;
    }

    include __DIR__ . "/TranslateCategory.php";
    $translatedCategory = TranslateCategory($category);

    if ($search == '') {
        for ($iter = 0; $iter < count($archives); $iter++) {
            if ($archives[$iter]['category'] == $translatedCategory) {
                array_push($requestedArchives, $archives[$iter]);
            }
        };

        return $requestedArchives;
    }

    for ($iter = 0; $iter < count($archives); $iter++) {
        if ($archives[$iter]['category'] == $translatedCategory && str_contains(
            strtolower($archives[$iter]['title']),
            strtolower($search)
        )) {
            array_push($requestedArchives, $archives[$iter]);
        }
    };

    return $requestedArchives;
};
