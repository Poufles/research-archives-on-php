<?php

/**
 * @param object $archive
 */
function UploadArchive($archive)
{
    $username = $archive["username"];
    $tmpFile = $archive["file"]["tmp_name"];
    $fileName = $archive["file"]["name"];

    $userDestination =
        "../../../database/user_data/$username/uploads/$fileName";

    $archiveDestination =
        "../../../database/directories/" .
        CategoryToDirectory($archive["category"]) .
        "/$fileName";

    if (move_uploaded_file($tmpFile, $userDestination)) {

        copy($userDestination, $archiveDestination);
    };
};

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
