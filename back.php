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

if(empty($name)) {
    echo "<p style='color:red;'> Name field is empty </p>";
} else {
    if(!preg_match('/[a-zA-z]/', $name)){
        echo "<p style='color:blue;'>Name is not valid</p>";
    } else {
        echo "Hello {$name}, nice to meet you";
    }
}

echo '<br>';
if(empty($email)) {
    echo "<p style='color:red;'> Email field is empty </p>";
} else {
    if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "<p style='color:blue;'>Name is not valid</p>";
    } else { 
        echo "Your email is {$email}";
    }
    
}


echo '<br>';
if(empty($age)) {
    echo "<p style='color:red;'> Age field is empty </p>";
} else {
    if(!preg_match('/[0-9]/', $name)){
        echo "<p style='color:blue;'>Age is not valid</p>";
    } else {
        echo "You are {$age} years old, Here you grow ohh";
    }
}
?>