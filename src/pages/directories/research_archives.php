<?php include __DIR__ . "/../../controllers/directories/read_archives.php"; ?>

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
    <p>Read Business and Marketing</p>
    <?php
    print_r($archives);
    // foreach ($archives as $archive) {
    //     echo "<a href='download.php?file=$archive'>$archive</a><br>";
    // }
    ?>
</body>

</html>