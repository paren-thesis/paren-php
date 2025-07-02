<?php
require_once("db.php");

$usernamec = "root";
$password = "";
$db_name = "student_record";
$hostname = "localhost";

$db = new Database($hostname, $usernamec, $password, $db_name);

$students = $db->getStudentData();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <table border="1">
        <thead>
            <tr>
                <th>id</th>
                <th>username</th>
                <th>age</th>
                <th>email</th>
                <th>gender</th>
                <th>program</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($students)): ?>
                <?php foreach ($students as $student): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($student["id"] ?? "") ?></td>
                        <td><?php echo htmlspecialchars($student["username"] ?? "") ?></td>
                        <td><?php echo htmlspecialchars($student["age"] ?? "") ?></td>
                        <td><?php echo htmlspecialchars($student["email"] ?? "") ?></td>
                        <td><?php echo htmlspecialchars($student["gender"] ?? "") ?></td>
                        <td><?php echo htmlspecialchars($student["program"] ?? "") ?></td>
                        <td><a href="details.php?id=<?php echo urlencode($student['id'] ?? '') ?>" class="details-btn">View</a></td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr><td colspan="6">No students found.</td></tr>
            <?php endif; ?>
        </tbody>
    </table>
</body>

</html>