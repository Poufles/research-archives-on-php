<?php
/**
 * @param string $category
 */
function CategoryToDirectory($category)
{
    $directories = [
        "businessAndMarketing" => "business_and_marketing",
        "computerStudies" => "computer_studies",
        "economics" => "economics",
        "englishAndLiterature" => "english_and_literature",
        "history" => "history",
        "mathematicsAndPhysics" => "mathematics_and_physics",
        "medicine" => "medicine",
        "psychologyAndPsiology" => "psychology_and_psiology",
        "generalScience" => "general_science",
        "socialScience" => "social_science",
        "others" => "others",
    ];

    return $directories[$category];
}

/**
 * @param string $category
 */
function CategoryToDirectoryV2($category)
{
    $directories = [
        "Business and Marketing" => "business_and_marketing",
        "Computer Studies" => "computer_studies",
        "Economics" => "economics",
        "English and Literature" => "english_and_literature",
        "History" => "history",
        "Mathematics and Physics" => "mathematics_and_physics",
        "Medicine" => "medicine",
        "Psychology and Psiology" => "psychology_and_psiology",
        "General Science" => "general_science",
        "Social Science" => "social_science",
        "Others" => "others",
    ];

    return $directories[$category];
}

