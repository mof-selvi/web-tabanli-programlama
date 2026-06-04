<?php
// register.php - User registration page
require_once 'db.php';

$error = "";
$success = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username'] ?? '');
    $password = $_POST['password'] ?? '';

    if (empty($username) || empty($password)) {
        $error = "Please fill in all fields.";
    } else {
        try {
            // Vulnerability 1: Truncate password to first 5 characters and hash (sha256) without salt
            $truncated_password = substr($password, 0, 5);
            $hashed_password = hash('sha256', $truncated_password);

            $stmt = $db->prepare("INSERT INTO users (username, password) VALUES (?, ?)");
            $stmt->execute([$username, $hashed_password]);

            $success = "Registration successful! You can now log in.";
        } catch (PDOException $e) {
            if ($e->getCode() == 23000) {
                $error = "Username already exists.";
            } else {
                $error = "Registration failed: " . $e->getMessage();
            }
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - NoteApp Lab</title>
    <link rel="stylesheet" href="css/bulma.min.css">
    <style>
        body {
            background-color: #f5f5f5;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .register-card {
            max-width: 450px;
            width: 100%;
            padding: 1.5rem;
        }
    </style>
</head>
<body>
    <div class="card register-card">
        <div class="card-content">
            <div class="has-text-centered mb-5">
                <h1 class="title is-3 has-text-link">Register Account</h1>
                <p class="subtitle is-6">Create your NoteApp profile</p>
            </div>

            <?php if ($error): ?>
                <div class="notification is-danger">
                    <?php echo htmlspecialchars($error); ?>
                </div>
            <?php endif; ?>

            <?php if ($success): ?>
                <div class="notification is-success">
                    <?php echo $success; ?>
                </div>
            <?php endif; ?>

            <form method="POST" action="register.php">
                <div class="field">
                    <label class="label">Username</label>
                    <div class="control">
                        <input class="input" type="text" name="username" placeholder="Choose a username" required>
                    </div>
                </div>

                <div class="field">
                    <label class="label">Password</label>
                    <div class="control">
                        <input class="input" type="password" name="password" placeholder="Choose a password" required>
                    </div>
                </div>

                <div class="field mt-5">
                    <button type="submit" class="button is-link is-fullwidth">Register</button>
                </div>
            </form>

            <div class="has-text-centered mt-4">
                <p>Already have an account? <a href="login.php" class="has-text-link">Login here</a></p>
            </div>
        </div>
    </div>
</body>
</html>
