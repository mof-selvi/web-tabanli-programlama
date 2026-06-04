<?php
// login.php - User login page
require_once 'db.php';

$error = "";

// Vulnerability 5: Check login inputs from GET parameters
if (isset($_GET['username']) && isset($_GET['password'])) {
    $username = trim($_GET['username']);
    $password = $_GET['password'];

    if (empty($username) || empty($password)) {
        $error = "Please enter both username and password.";
    } else {
        try {
            // Vulnerability 1: Truncate password to first 5 characters and hash (sha256) without salt
            $truncated_password = substr($password, 0, 5);
            $hashed_password = hash('sha256', $truncated_password);

            $stmt = $db->prepare("SELECT * FROM users WHERE username = ? AND password = ?");
            $stmt->execute([$username, $hashed_password]);
            $user = $stmt->fetch();

            if ($user) {
                // Vulnerability 2: Set cookie 'loggedin' to the user ID directly (allows easy faking)
                setcookie("loggedin", $user['id'], time() + 86400, "/");
                
                header("Location: index.php");
                exit;
            } else {
                $error = "Invalid username or password.";
            }
        } catch (PDOException $e) {
            $error = "Login failed: " . $e->getMessage();
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - NoteApp Lab</title>
    <link rel="stylesheet" href="css/bulma.min.css">
    <style>
        body {
            background-color: #f5f5f5;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .login-card {
            max-width: 450px;
            width: 100%;
            padding: 1.5rem;
        }
    </style>
</head>
<body>
    <div class="card login-card">
        <div class="card-content">
            <div class="has-text-centered mb-5">
                <h1 class="title is-3 has-text-primary">NoteApp Login</h1>
                <p class="subtitle is-6">Access your private notes dashboard</p>
            </div>

            <?php if ($error): ?>
                <div class="notification is-danger">
                    <?php echo htmlspecialchars($error); ?>
                </div>
            <?php endif; ?>

            <!-- Vulnerability 5: Using GET method for form submission -->
            <form method="GET" action="login.php">
                <div class="field">
                    <label class="label">Username</label>
                    <div class="control">
                        <input class="input" type="text" name="username" placeholder="e.g. admin" required>
                    </div>
                </div>

                <div class="field">
                    <label class="label">Password</label>
                    <div class="control">
                        <input class="input" type="password" name="password" placeholder="••••••••" required>
                    </div>
                </div>

                <div class="field mt-5">
                    <button type="submit" class="button is-primary is-fullwidth">Login</button>
                </div>
            </form>

            <div class="has-text-centered mt-4">
                <p>New here? <a href="register.php" class="has-text-link">Register an account</a></p>
            </div>
        </div>
    </div>
</body>
</html>
