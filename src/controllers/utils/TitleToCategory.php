<?php

/**
 * @param string $title
 */
function TitleToCategory($title) {

    $titlesJSON = "../../../database/titles/titles.json";


    $contents = file_get_contents($titlesJSON);
    $json = json_decode($contents, true);

    return $json[$title];
};