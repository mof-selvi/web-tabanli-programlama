<?php
// editnote.php - Edit or delete a note
require_once 'db.php';

$user = null;
// Authenticating user (Vulnerability 2)
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
$note = null;

// Get the note ID from the GET parameters
$note_id = $_GET['noteid'] ?? null;

if (!$note_id) {
    die("Note ID parameter is required.");
}

// Fetch the note details
try {
    // Vulnerability 4: Fetching the note solely by its ID without checking if it belongs to the logged-in user (IDOR)
    $stmt = $db->prepare("SELECT * FROM notes WHERE id = ?");
    $stmt->execute([$note_id]);
    $note = $stmt->fetch();

    if (!$note) {
        die("Note not found.");
    }
} catch (PDOException $e) {
    die("Database error: " . $e->getMessage());
}

// Process Edit / Delete actions
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['delete'])) {
        try {
            // Vulnerability 4: Deleting the note without validating ownership
            $stmt = $db->prepare("DELETE FROM notes WHERE id = ?");
            $stmt->execute([$note_id]);
            header("Location: index.php");
            exit;
        } catch (PDOException $e) {
            $error = "Failed to delete note: " . $e->getMessage();
        }
    } else {
        $title = trim($_POST['title'] ?? '');
        $content = trim($_POST['content'] ?? '');

        if (empty($title) || empty($content)) {
            $error = "Please fill in all fields.";
        } else {
            try {
                // Vulnerability 4: Updating the note without validating ownership
                $stmt = $db->prepare("UPDATE notes SET title = ?, content = ? WHERE id = ?");
                $stmt->execute([$title, $content, $note_id]);
                
                // Refresh note details for display
                $note['title'] = $title;
                $note['content'] = $content;
                $success = "Note updated successfully!";
            } catch (PDOException $e) {
                $error = "Failed to update note: " . $e->getMessage();
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
    <title>Edit Note - NoteApp Lab</title>
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
                <h1 class="title is-3 has-text-centered mb-5">Edit Note</h1>

                <?php if ($error): ?>
                    <div class="notification is-danger">
                        <?php echo htmlspecialchars($error); ?>
                    </div>
                <?php endif; ?>

                <?php if ($success): ?>
                    <div class="notification is-success">
                        <?php echo htmlspecialchars($success); ?>
                    </div>
                <?php endif; ?>

                <form method="POST" action="editnote.php?noteid=<?php echo htmlspecialchars($note_id); ?>">
                    <div class="field">
                        <label class="label">Title</label>
                        <div class="control">
                            <input class="input" type="text" name="title" value="<?php echo htmlspecialchars($note['title']); ?>" required>
                        </div>
                    </div>

                    <div class="field">
                        <label class="label">Content</label>
                        <div class="control">
                            <textarea class="textarea" name="content" rows="6" required><?php echo htmlspecialchars($note['content']); ?></textarea>
                        </div>
                    </div>

                    <div class="field is-grouped mt-5">
                        <div class="control is-expanded">
                            <button type="submit" class="button is-primary is-fullwidth">Save Changes</button>
                        </div>
                        <div class="control">
                            <button type="submit" name="delete" class="button is-danger" onclick="return confirm('Are you sure you want to delete this note?');">Delete Note</button>
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
