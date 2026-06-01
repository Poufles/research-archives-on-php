<?php

function BrowseDropdown()
{
    $browseObj = [
        "allStudies" => "All Studies",
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

    foreach($browseObj as $key => $value) {
?>
    <div class="dropdown-options">
        <a href="<?php echo "../src/pages/directories/research_archives.php?category=" . urlencode($key)  ?>"><?php echo $value ?></a>
    </div>
<?php
    };
};