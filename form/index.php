<?php
session_start();
require_once 'db.php';

// Initialize individual error variables
$username_error = "";
$email_error = "";
$age_error = "";
$gender_error = "";
$programme_error = "";

// Process form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = trim($_POST['username']);
    $email = $_POST['email'];
    $age = $_POST['age'];
    $gender = $_POST['gender'];
    $programme = $_POST['programme'];
    
    // Validate username
    if (empty($username)) {
        $username_error = "Username is required";
    } elseif (!preg_match('/^[a-zA-Z]{3,}$/', $username)) {
        $username_error = "Username must be at least 3 letters long and contain only letters";
    }

    // Validate email
    if (empty($email)) {
        $email_error = "Email is required";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $email_error = "Invalid email format";
    }

    // Validate age
    if (empty($age)) {
        $age_error = "Age is required";
    } elseif (!preg_match('/^[1-9][0-9]?$|^1[0-1][0-9]$|^120$/', $age)) {
        $age_error = "Age must be between 1 and 120";
    }

    // Validate gender
    if (empty($gender)) {
        $gender_error = "Gender is required";
    }

    // Validate programme
    if (empty($programme)) {
        $programme_error = "Programme is required";
    }

    // If no errors, insert into database and redirect to success.php
    if (empty($username_error) && empty($email_error) && empty($age_error) && 
        empty($gender_error) && empty($programme_error)) {
        $db = new Database();
        $conn = $db->getConnection();
        
        $stmt = $conn->prepare("INSERT INTO student (username, email, age, gender, programme) VALUES (?, ?, ?, ?, ?)");
        if ($stmt) {
            $stmt->bind_param("ssiss", $username, $email, $age, $gender, $programme);
            if ($stmt->execute()) {
                $_SESSION['form_data'] = $_POST;
                $stmt->close();
                $conn->close();
                header("Location: success.php");
                exit();
            } else {
                $username_error = "Database error: " . $stmt->error;
            }
            $stmt->close();
        } else {
            $username_error = "Database error: " . $conn->error;
        }
        $conn->close();
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
</head>

<body>
    <div class="container">
        <div class="row justify-content-center mt-5">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h3 class="text-center">
                            <i class="bi bi-person-circle" style="font-size: 2rem;"></i>
                        </h3>
                    </div>
                    <div class="card-body">

                        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
                            <!-- Username Field -->
                            <div class="mb-3">
                                <label for="username" class="form-label">Username</label>
                                <input type="text" class="form-control <?php echo !empty($username_error) ? 'is-invalid' : ''; ?>"
                                    id="username" name="username" value="<?php echo isset($_POST['username']) ? htmlspecialchars($_POST['username']) : ''; ?>" required>
                                <?php if (!empty($username_error)): ?>
                                    <div class="invalid-feedback d-block"><?php echo $username_error; ?></div>
                                <?php endif; ?>
                            </div>

                            <!-- Email Field -->
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control <?php echo !empty($email_error) ? 'is-invalid' : ''; ?>"
                                    id="email" name="email" value="<?php echo isset($_POST['email']) ? htmlspecialchars($_POST['email']) : ''; ?>" required>
                                <?php if (!empty($email_error)): ?>
                                    <div class="invalid-feedback d-block"><?php echo $email_error; ?></div>
                                <?php endif; ?>
                            </div>

                            <!-- Age Field -->
                            <div class="mb-3">
                                <label for="age" class="form-label">Age</label>
                                <input type="number" class="form-control <?php echo !empty($age_error) ? 'is-invalid' : ''; ?>"
                                    id="age" name="age" value="<?php echo isset($_POST['age']) ? htmlspecialchars($_POST['age']) : ''; ?>" required>
                                <?php if (!empty($age_error)): ?>
                                    <div class="invalid-feedback d-block"><?php echo $age_error; ?></div>
                                <?php endif; ?>
                            </div>

                            <!-- Gender Field -->
                            <div class="mb-3">
                                <label class="form-label">Gender</label>
                                <div class="form-check">
                                    <input class="form-check-input <?php echo !empty($gender_error) ? 'is-invalid' : ''; ?>"
                                        type="radio" name="gender" id="male" value="male"
                                        <?php echo (isset($_POST['gender']) && $_POST['gender'] == 'male') ? 'checked' : ''; ?> required>
                                    <label class="form-check-label" for="male">Male</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input <?php echo !empty($gender_error) ? 'is-invalid' : ''; ?>"
                                        type="radio" name="gender" id="female" value="female"
                                        <?php echo (isset($_POST['gender']) && $_POST['gender'] == 'female') ? 'checked' : ''; ?>>
                                    <label class="form-check-label" for="female">Female</label>
                                </div>
                                <?php if (!empty($gender_error)): ?>
                                    <div class="invalid-feedback d-block"><?php echo $gender_error; ?></div>
                                <?php endif; ?>
                            </div>

                            <!-- Programme Field -->
                            <div class="mb-3">
                                <label for="programme" class="form-label">Programme</label>
                                <select class="form-select <?php echo !empty($programme_error) ? 'is-invalid' : ''; ?>"
                                    id="programme" name="programme" required>
                                    <option value=""></option>
                                    <option value="computer_science" <?php echo (isset($_POST['programme']) && $_POST['programme'] == 'computer_science') ? 'selected' : ''; ?>>Computer Science</option>
                                    <option value="business" <?php echo (isset($_POST['programme']) && $_POST['programme'] == 'business') ? 'selected' : ''; ?>>Business Administration</option>
                                    <option value="engineering" <?php echo (isset($_POST['programme']) && $_POST['programme'] == 'engineering') ? 'selected' : ''; ?>>Engineering</option>
                                </select>
                                <?php if (!empty($programme_error)): ?>
                                    <div class="invalid-feedback d-block"><?php echo $programme_error; ?></div>
                                <?php endif; ?>
                            </div>

                            <!-- Submit Button -->
                            <div class="d-grid">
                                <button type="submit" class="btn btn-primary">Register</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>