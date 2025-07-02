<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>form handling</title>
</head>

<body>
   <?php if (isset($_SESSION["success"])) {
      echo  $_SESSION["success"];
      unset($_SESSION["success"]);
      session_destroy();
   } ?>

   <form method="post" action="back.php">
      <input name="name" placeholder="your name" type="text" value="<?php echo isset($_POST['name']) ? htmlspecialchars($_POST['name']) : '' ?>">
      <p style="color:red;"><?php if (!empty($_SESSION["nameErr"])) {
                                 echo $_SESSION["nameErr"];
                                 unset($_SESSION["nameErr"]);
                              } ?></p>
      <br>
      <input name="email" placeholder="your email" value="<?php echo isset($_POST['email']) ? htmlspecialchars($_POST['email']) : '' ?>">
      <p style="color:red;"> <?php if (!empty($_SESSION["emailErr"])) {
                                 echo $_SESSION["emailErr"];
                                 unset($_SESSION["emailErr"]);
                              } ?></p>
      <br>
      <input name="age" placeholder="your age" type="text" value="<?php echo isset($_POST['age']) ? htmlspecialchars($_POST['age']) : '' ?>">
      <p style="color:red;"> <?php if (!empty($_SESSION["ageErr"])) {
                                 echo $_SESSION["ageErr"];
                                 unset($_SESSION["ageErr"]);
                              } ?></p>
      <br>
      <input name="program" placeholder="program" type="text" value="<?php echo isset($_POST['program']) ? htmlspecialchars($_POST['program']) : '' ?>">
      <p style="color:red;"> <?php if (!empty($_SESSION["programErr"])) {
                                 echo $_SESSION["programErr"];
                                 unset($_SESSION["programErr"]);
                              } ?></p>
      <br>
      <input name="gender" placeholder="gender" type="text" value="<?php echo isset($_POST['gender']) ? htmlspecialchars($_POST['gender']) : '' ?>">
      <p style="color:red;"> <?php if (!empty($_SESSION["genderErr"])) {
                                 echo $_SESSION["genderErr"];
                                 unset($_SESSION["genderErr"]);
                              } ?></p>
      <br>
      <input type="submit" value="submit">
      <a href="view.php">get all student</a>
   </form>
</body>

</html>