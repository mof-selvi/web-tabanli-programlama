<?php
// addnote.php - Add a new note
require_once 'db.php';

$user = null;
// Authenticating user (Vulnerability 2: based solely on cookie)
if (isset($_COOKIE['loggedin'])) {
    $user_id = $_COOKIE['loggedin'];
    try {
        $stmt = $db->prepare("SELECT * FROM users WHERE id = ?");
        $stmt->execute([$user_id]);
        $user = $stmt->fetch();
    } catch (PDOException $e) {
        // Silent fail
    }
}

if (!$user) {
    header("Location: login.php");
    exit;
}

$error = "";
$success = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = trim($_POST['title'] ?? '');
    $content = trim($_POST['content'] ?? '');

    if (empty($title) || empty($content)) {
        $error = "Please fill in all fields.";
    } else {
        try {
            $stmt = $db->prepare("INSERT INTO notes (user_id, title, content) VALUES (?, ?, ?)");
            $stmt->execute([$user['id'], $title, $content]);
            header("Location: index.php");
            exit;
        } catch (PDOException $e) {
            $error = "Failed to add note: " . $e->getMessage();
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Note - NoteApp Lab</title>
    <link rel="stylesheet" href="css/bulma.min.css">
    <style>
        body {
            background-color: #f7f9fa;
            min-height: 100vh;
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar is-dark" role="navigation" aria-label="main navigation">
        <div class="container">
            <div class="navbar-brand">
                <a class="navbar-item" href="index.php">
                    <strong class="has-text-primary is-size-4">📝 NoteApp Lab</strong>
                </a>
            </div>
            <div class="navbar-menu">
                <div class="navbar-end">
                    <div class="navbar-item">
                        <span class="has-text-light">Logged in as: <strong><?php echo htmlspecialchars($user['username']); ?></strong></span>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <section class="section">
        <div class="container" style="max-width: 600px;">
            <div class="box">
                <h1 class="title is-3 has-text-centered mb-5">Create a New Note</h1>

                <?php if ($error): ?>
                    <div class="notification is-danger">
                        <?php echo htmlspecialchars($error); ?>
                    </div>
                <?php endif; ?>

                <form method="POST" action="addnote.php">
                    <div class="field">
                        <label class="label">Title</label>
                        <div class="control">
                            <input class="input" type="text" name="title" placeholder="Note Title" required>
                        </div>
                    </div>

                    <div class="field">
                        <label class="label">Content</label>
                        <div class="control">
                            <textarea class="textarea" name="content" rows="6" placeholder="Write your thoughts here..." required></textarea>
                        </div>
                    </div>

                    <div class="field is-grouped mt-5">
                        <div class="control is-expanded">
                            <button type="submit" class="button is-primary is-fullwidth">Save Note</button>
                        </div>
                        <div class="control">
                            <a href="index.php" class="button is-light">Cancel</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
</body>
</html>
