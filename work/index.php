<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="cont">
        <!-- <img src=.//> -->
        <form method="post" action="back.php">
            <label>Name</label>
            <input type="text" name="name" value="<?= $_SESSION["old"]["name"] ?? "" ?>" /><br>
            <span style="color:red;"><?= $_SESSION["errors"]["name"] ?? "" ?></span><br><br>

            <label>Email</label>
            <input type="email" name="email" value="<?= $_SESSION["old"]["email"] ?? "" ?>" /><br>
            <span style="color:red;"><?= $_SESSION["errors"]["email"] ?? "" ?></span><br><br>

            <label>Age</label>
            <input type="text" name="age" value="<?= $_SESSION["old"]["age"] ?? "" ?>" /><br>
            <span style="color:red;"><?= $_SESSION["errors"]["age"] ?? "" ?></span><br><br>

            <label>Gender</label><br>
            <input type="radio" name="gender" id="male" value="Male" <?= (($_SESSION["old"]["gender"] ?? "") == "Male") ? "selected" : "" ?> />male
            <input type="radio" name="gender" id="female" value="Female" <?= (($_SESSION["old"]["gender"] ?? "") == "Female") ? "selected" : "" ?> />Female<br>
            <span style="color:red;"><?= $_SESSION["errors"]["gender"] ?? "" ?></span><br><br>

            <label>Program</label>
            <select name="programs">
                <option name="programs" value="BICT" <?= (($_SESSION["old"]["programs"] ?? "") == "BICT") ? "selected" : "" ?>>BICT</option>
                <option name="programs" value="BCS" <?= (($_SESSION["old"]["programs"] ?? "") == "BCS") ? "selected" : "" ?>>BCS</option>
                <option name="programs" value="BSMS" <?= (($_SESSION["old"]["programs"] ?? "") == "BSMS") ? "selected" : "" ?>>BSMS</option>
            </select><br>
            <span style="color:red;"><?= $_SESSION["errors"]["programs"] ?? "" ?></span><br><br>
            <input type="submit" value="Register" />
        </form>

        <?php
        // Clear errors and old input after displaying
        unset($_SESSION["errors"]);
        unset($_SESSION["old"]);
        ?>
    </div>
</body>

</html>