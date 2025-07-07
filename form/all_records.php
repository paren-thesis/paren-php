<?php
require_once 'db.php';

$db = new Database();
$conn = $db->getConnection();

$sql = "SELECT id, username, email, age, gender, programme FROM student ORDER BY id";
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All User Records</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2 class="mb-4">All User Records</h2>
        <a href="index.php" class="btn btn-primary mb-3">Back to Registration</a>
        <div class="table-responsive">
            <table class="table table-bordered table-striped">
                <thead class="table-dark">
                    <tr>
                        <th>ID</th>
                        <th>Username</th>
                        <th>Email</th>
                        <th>Age</th>
                        <th>Gender</th>
                        <th>Programme</th>
                        <th>Registered At</th>
                    </tr>
                </thead>
                <tbody>
                <?php if ($result && $result->num_rows > 0): ?>
                    <?php while($row = $result->fetch_assoc()): ?>
                        <tr>
                            <td><?php echo $row['id']; ?></td>
                            <td><?php echo htmlspecialchars($row['username']); ?></td>
                            <td><?php echo htmlspecialchars($row['email']); ?></td>
                            <td><?php echo $row['age']; ?></td>
                            <td><?php echo ucfirst(htmlspecialchars($row['gender'])); ?></td>
                            <td><?php echo ucwords(str_replace('_', ' ', htmlspecialchars($row['programme']))); ?></td>
                            <td>
                                <form action="success.php" method="post" style="margin:0;">
                                    <input type="hidden" name="username" value="<?php echo htmlspecialchars($row['username']); ?>">
                                    <input type="hidden" name="email" value="<?php echo htmlspecialchars($row['email']); ?>">
                                    <input type="hidden" name="age" value="<?php echo $row['age']; ?>">
                                    <input type="hidden" name="gender" value="<?php echo htmlspecialchars($row['gender']); ?>">
                                    <input type="hidden" name="programme" value="<?php echo htmlspecialchars($row['programme']); ?>">
                                    <button type="submit" class="btn btn-success btn-sm">Select</button>
                                </form>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                <?php else: ?>
                    <tr><td colspan="7" class="text-center">No records found.</td></tr>
                <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
<?php
$conn->close();
?> 