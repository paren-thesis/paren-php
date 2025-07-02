<?php
require_once("db.php");

$username = "root";
$password = "";
$db_name = "student_record";
$hostname = "localhost";

$db = new Database($hostname, $username, $password, $db_name);

$student = null;
if (isset($_GET['id']) && ctype_digit($_GET['id'])) {
    $id = (int)$_GET['id'];
    $students = $db->getStudentData();
    foreach ($students as $s) {
        if ((int)$s['id'] === $id) {
            $student = $s;
            break;
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Details</title>
    <style>
        body { font-family: Arial, sans-serif; background: #f8f9fa; margin: 0; padding: 20px; }
        .container { background: #fff; max-width: 500px; margin: 40px auto; padding: 30px 40px; border-radius: 8px; box-shadow: 0 2px 8px rgba(0,0,0,0.08); }
        h1 { color: #007bff; margin-bottom: 24px; }
        .label { font-weight: bold; color: #333; }
        .value { margin-bottom: 16px; display: block; }
        .back-link { display: inline-block; margin-top: 20px; color: #007bff; text-decoration: none; }
        .back-link:hover { text-decoration: underline; }
        .not-found { color: #c00; font-size: 1.2em; }
    </style>
</head>
<body>
    <div class="container">
        <?php if ($student): ?>
            <h1>Student Details</h1>
            <div class="label">ID:</div>
            <div class="value"><?php echo htmlspecialchars($student['id'] ?? '') ?></div>
            <div class="label">Username:</div>
            <div class="value"><?php echo htmlspecialchars($student['username'] ?? '') ?></div>
            <div class="label">Age:</div>
            <div class="value"><?php echo htmlspecialchars($student['age'] ?? '') ?></div>
            <div class="label">Gender:</div>
            <div class="value"><?php echo htmlspecialchars($student['gender'] ?? '') ?></div>
            <div class="label">Email:</div>
            <div class="value"><?php echo htmlspecialchars($student['email'] ?? '') ?></div>
            <div class="label">Program:</div>
            <div class="value"><?php echo htmlspecialchars($student['program'] ?? '') ?></div>
        <?php else: ?>
            <div class="not-found">Student not found.</div>
        <?php endif; ?>
        <a class="back-link" href="view.php">&larr; Back to All Students</a>
    </div>
</body>
</html> 