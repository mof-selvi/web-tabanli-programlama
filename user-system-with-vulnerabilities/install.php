<?php
// install.php - Database initialization script

$db_file = __DIR__ . '/database.sqlite';

$message = "";
$status = "info";

if (isset($_GET['install'])) {
    try {
        // If file exists, delete it to clean reinstall
        if (file_exists($db_file)) {
            unlink($db_file);
        }

        $db = new PDO("sqlite:" . $db_file);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Create Users Table
        $db->exec("CREATE TABLE IF NOT EXISTS users (
            id INTEGER PRIMARY KEY AUTOINCREMENT,
            username TEXT UNIQUE NOT NULL,
            password TEXT NOT NULL
        )");

        // Create Notes Table
        $db->exec("CREATE TABLE IF NOT EXISTS notes (
            id INTEGER PRIMARY KEY AUTOINCREMENT,
            user_id INTEGER NOT NULL,
            title TEXT NOT NULL,
            content TEXT NOT NULL,
            created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
            FOREIGN KEY (user_id) REFERENCES users(id)
        )");

        // Helper function for vulnerable password hashing (Vulnerability 1: Truncate to first 5 chars and SHA-256 hash without salt)
        function hashPassword($password) {
            $truncated = substr($password, 0, 5);
            return hash('sha256', $truncated);
        }

        // Seed Users
        $stmt = $db->prepare("INSERT INTO users (username, password) VALUES (?, ?)");
        
        // admin: password admin123 -> truncates to 'admin'
        $stmt->execute(['admin', hashPassword('admin123')]);
        $admin_id = $db->lastInsertId();

        // alice: password alicepwd -> truncates to 'alice'
        $stmt->execute(['alice', hashPassword('alicepwd')]);
        $alice_id = $db->lastInsertId();

        // Seed Notes
        $stmtNote = $db->prepare("INSERT INTO notes (user_id, title, content) VALUES (?, ?, ?)");
        
        $stmtNote->execute([$admin_id, 'System Status', 'Welcome to the system. All systems are operational. Remember to keep secrets safe!']);
        $stmtNote->execute([$admin_id, 'Private Credentials', 'Note to self: The admin API key is API_KEY_9988776655. Do not share.']);
        
        $stmtNote->execute([$alice_id, 'Alice\'s Shopping List', '1. Bread\n2. Milk\n3. Eggs\n4. PHP vulnerable lab guide.']);
        $stmtNote->execute([$alice_id, 'Top Secret Idea', 'I should create a note-taking application that has zero security bugs. Unlike this one...']);

        $message = "Database installed and seeded successfully! You can now log in using the credentials:<br>
                    <strong>admin / admin123</strong> or <strong>alice / alicepwd</strong>.";
        $status = "success";
    } catch (Exception $e) {
        $message = "Installation failed: " . $e->getMessage();
        $status = "danger";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Database Setup - NoteApp Lab</title>
    <link rel="stylesheet" href="css/bulma.min.css">
    <style>
        body {
            background-color: #f5f5f5;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .install-card {
            max-width: 500px;
            width: 100%;
            padding: 2rem;
        }
    </style>
</head>
<body>
    <div class="card install-card">
        <div class="card-content">
            <div class="has-text-centered mb-5">
                <h1 class="title is-3 has-text-primary">NoteApp installer</h1>
                <p class="subtitle is-6">Web Programming Lab Setup</p>
            </div>

            <?php if ($message): ?>
                <div class="notification is-<?php echo $status; ?>">
                    <p><?php echo $message; ?></p>
                </div>
            <?php endif; ?>

            <div class="content">
                <p>This script will initialize the SQLite database <code>database.sqlite</code> in the project directory. Any existing database will be overwritten.</p>
            </div>

            <form method="GET" action="install.php">
                <input type="hidden" name="install" value="true">
                <button type="submit" class="button is-primary is-fullwidth is-large">Install Database</button>
            </form>

            <div class="has-text-centered mt-4">
                <a href="index.php" class="is-link">Go to Application</a>
            </div>
        </div>
    </div>
</body>
</html>
