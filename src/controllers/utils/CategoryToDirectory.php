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