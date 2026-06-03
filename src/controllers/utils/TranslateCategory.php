<?php

/**
 * @param string $category
 */
function TranslateCategory($category)
{
    $directories = [
        "businessAndMarketing" => "Business and Marketing",
        "computerStudies" => "Computer Studies",
        "economics" => "Economics",
        "englishAndLiterature" => "English and Literature",
        "history" => "History",
        "mathematicsAndPhysics" => "Mathematics and Physics",
        "medicine" => "Medicine",
        "psychologyAndPsiology" => "Psychology and Psiology",
        "generalScience" => "General Science",
        "socialScience" => "Social Science",
        "others" => "Others",
    ];

    return $directories[$category];
}