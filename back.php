<?php
// echo '<!DOCTYPE html>
// <html lang="en">
// <head>
//     <meta charset="UTF-8">
//     <meta name="viewport" content="width=device-width, initial-scale=1.0">
//     <title>Document</title>
// </head>
// <body>
//     <form action="back.php" method="post">
//         <input type="text" name="name" id="" placeholder="Enter Name"> <br>
//         <input type="email" name="email" id="" placeholder="Enter Email"> <br>
//         <input type="text" name="age" id="" placeholder="Enter age"><br>
//         <input type="submit" value="submit">
//     </form>
// </body>
// </html>';

// if ($_SERVER['REQUEST_METHOD'] == "POST") {
//     echo $_POST['name'];
//     echo "<br>";
//     echo $_POST['email'];
//     echo "<br>";
//     echo $_POST['age'];
// } else {
//     echo 'ERROR!';
// }

$name = trim($_POST["name"]);
$email = trim($_POST["email"]);
$age = trim($_POST["age"]);

if(!empty($name)) {
    echo "My name is {$name}";
} else {
    echo 'Name field is empty';
}
echo '<br>';
if(!empty($email)) {
    echo "My email is {$email}";
} else {
    echo 'Email field is empty';
}
echo '<br>';
if(!empty($age)) {
    echo "I am {$age} years old";
} else {
    echo 'Age field is empty';
}
?>