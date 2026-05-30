<?php include "../../controllers/directories/create_archive.php" ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Arc Hive - Archive a hive!</title>
</head>

<body>
    <a href="./research_archives.php">back</a>
    <br>
    <br>
    <form action="<?php htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="post" enctype="multipart/form-data">
        <div class="input-field-container">
            <label>
                <span class="input-text">Research Title:</span>
                <input type="text" name="title" class="input-field">
            </label class="input-field-container">
        </div>
        <div class="input-field-container">
            <label>
                <span class="input-text">Abstract:</span>
                <textarea name="abstract" id="abstract"></textarea>
            </label class="input-field-container">
        </div>
        <div class="input-field-container">
            <label>
                <span class="input-text">Author(s):</span>
                <input type="text" name="author" class="input-field">
            </label class="input-field-container">
        </div>
        <div class="input-field-container">
            <label>
                <span class="input-text">Year Published:</span>
                <input type="date" name="year" class="input-field">
            </label class="input-field-container">
        </div>
        <div class="input-field-container">
            <label>
                <span class="input-text">Category:</span>
                <select name="category" id="category">
                    <option value="default" name="category">Select category</option>
                    <option value="businessAndMarketing" name="category">Business and Marketing</option>
                    <option value="computerStudies" name="category">Computer Studies</option>
                    <option value="economics" name="category">Economics</option>
                    <option value="englishAndLiterature" name="category">English and Literature</option>
                    <option value="history" name="category">History</option>
                    <option value="mathematicsAndPhysics" name="category">Mathematics and Physics</option>
                    <option value="medicine" name="category">Medicine</option>
                    <option value="psychologyAndPsiology" name="category">Psychology and Psiology</option>
                    <option value="generalScience" name="category">General Science</option>
                    <option value="socialScience" name="category">Social Science</option>
                    <option value="others" name="category">Others</option>
                </select>
            </label class="input-field-container">
        </div>
        <div class="input-field-container">
            <label>
                <span class="input-text">Research File (PDF File Only):</span>
                <input type="file" name="file" class="input-field">
            </label class="input-field-container">
        </div>
        <div class="actions">
            <input type="reset" value="Reset">
            <input type="submit" name="submit" value="Arc Hive!">
        </div>
    </form>
</body>

</html>