<?php include __DIR__ . "/../../controllers/directories/summarize_archive.php"; ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Arc Hive - Viewing <?php echo $archiveInfo["title"] ?></title>
</head>

<body>
    <a href="./research_archives.php">go back</a>
    <p>Title: <?php echo $archiveInfo["title"]; ?></p>
    <p>Year: <?php echo $archiveInfo["year"]; ?></p>
    <p>Author: <?php echo $archiveInfo["author"]; ?></p>
    <p>Category: <?php echo $archiveInfo["category"]; ?></p>
    <p>Abstract: <?php echo $archiveInfo["abstract"]; ?></p>
    <p>Archiver: <?php echo $archiveInfo["username"]; ?></p>
    <a href="../../controllers/directories/read_archive.php?category=<?php echo urlencode($archiveInfo["category"]); ?>&file=<?php echo urlencode($archiveInfo["file"]["name"]); ?>" target="_blank" rel="noopener noreferrer">View PDF</a>
</body>

</html>