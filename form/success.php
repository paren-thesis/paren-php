<?php
session_start();

// Check if form data exists in session or POST
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['username'], $_POST['email'], $_POST['age'], $_POST['gender'], $_POST['programme'])) {
    $formData = [
        'username' => $_POST['username'],
        'email' => $_POST['email'],
        'age' => $_POST['age'],
        'gender' => $_POST['gender'],
        'programme' => $_POST['programme'],
    ];
} elseif (isset($_SESSION['form_data'])) {
    $formData = $_SESSION['form_data'];
} else {
    header("Location: newform.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Success</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <div class="row justify-content-center mt-5">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header bg-success text-white">
                        <h3 class="text-center mb-0">Registration Successful!</h3>
                    </div>
                    <div class="card-body">
                        <div class="alert alert-success">
                            Thank you for your registration! Here are your details:
                        </div>
                        
                        <table class="table table-bordered">
                            <tbody>
                                <tr>
                                    <th>Username:</th>
                                    <td><?php echo htmlspecialchars($formData['username']); ?></td>
                                </tr>
                                <tr>
                                    <th>Email:</th>
                                    <td><?php echo htmlspecialchars($formData['email']); ?></td>
                                </tr>
                                <tr>
                                    <th>Age:</th>
                                    <td><?php echo htmlspecialchars($formData['age']); ?></td>
                                </tr>
                                <tr>
                                    <th>Gender:</th>
                                    <td><?php echo ucfirst(htmlspecialchars($formData['gender'])); ?></td>
                                </tr>
                                <tr>
                                    <th>Programme:</th>
                                    <td><?php echo ucwords(str_replace('_', ' ', htmlspecialchars($formData['programme']))); ?></td>
                                </tr>
                            </tbody>
                        </table>

                        <div class="d-grid gap-2">
                            <a href="index.php" class="btn btn-primary">Register Another User</a>
                            <a href="all_records.php" class="btn btn-secondary">View All Records</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
<?php
// Clear the session data after displaying, only if not coming from POST
if (!isset($_POST['username'])) {
    unset($_SESSION['form_data']);
}
?>
