<?php include __DIR__ . "/../../controllers/directories/show_all_archives.php"; ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Arc Hive - Register new archive</title>
</head>

<body>
    <a href="../auth/login.php">go to login</a>
    <br>
    <br>
    <a href="../auth/register.php">go to register</a>
    <br>
    <br>
    <a href="./research_register.php">go to create archive</a>
    <br>
    <br>
    <hr>
    <p>Read Others</p>
    <?php
    foreach ($archives as $archive) {
        $title = $archive["title"];

        // AI was used here
        echo "<a href='view_archive.php?title=" . urlencode($title) . "'>";
        echo $title;
        echo "</a><br>";
        // AI was used here
    }
    ?>
</body>

</html>