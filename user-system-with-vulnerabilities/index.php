<?php
// index.php - Main Note Dashboard
require_once 'db.php';

$user = null;
// Vulnerability 2: Authenticating user solely based on the 'loggedin' cookie value (user ID)
if (isset($_COOKIE['loggedin'])) {
    $user_id = $_COOKIE['loggedin'];
    try {
        $stmt = $db->prepare("SELECT * FROM users WHERE id = ?");
        $stmt->execute([$user_id]);
        $user = $stmt->fetch();
    } catch (PDOException $e) {
        // Silent fail, user remains null
    }
}

// Fetch notes if user is logged in
$notes = [];
if ($user) {
    try {
        $stmt = $db->prepare("SELECT * FROM notes WHERE user_id = ? ORDER BY created_at DESC");
        $stmt->execute([$user['id']]);
        $notes = $stmt->fetchAll();
    } catch (PDOException $e) {
        // Silent fail
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NoteApp - Security Lab</title>
    <link rel="stylesheet" href="css/bulma.min.css">
    <style>
        body {
            background-color: #f7f9fa;
            min-height: 100vh;
        }
        .hero {
            background: linear-gradient(135deg, #1f2937, #111827);
        }
        .navbar-brand .title {
            color: #ffffff;
        }
        .note-card {
            transition: transform 0.2s, box-shadow 0.2s;
        }
        .note-card:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(0,0,0,0.05);
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
                        <div class="buttons">
                            <?php if ($user): ?>
                                <span class="has-text-light mr-4">Logged in as: <strong><?php echo htmlspecialchars($user['username']); ?></strong></span>
                                <!-- Vulnerability 3: Simple logout link with GET request and no token verification -->
                                <a href="logout.php" class="button is-danger is-light">Log out</a>
                            <?php else: ?>
                                <a href="login.php" class="button is-primary">Log in</a>
                                <a href="register.php" class="button is-light">Register</a>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <?php if (!$user): ?>
        <!-- Hero Section for Guest users -->
        <section class="hero is-medium is-bold">
            <div class="hero-body">
                <div class="container has-text-centered">
                    <h1 class="title is-1 has-text-white mb-6">
                        Securely Keep Your Personal Notes
                    </h1>
                    <p class="subtitle is-4 has-text-grey-light mb-6">
                        A modern, simple, and clean space to write down your thoughts.
                    </p>
                    <div class="buttons is-centered">
                        <a href="login.php" class="button is-primary is-large">Get Started</a>
                    </div>
                </div>
            </div>
        </section>
    <?php else: ?>
        <!-- Main dashboard content for authenticated users -->
        <section class="section">
            <div class="container">
                <div class="columns is-vcentered mb-5">
                    <div class="column">
                        <h2 class="title is-2">My Notes</h2>
                    </div>
                    <div class="column is-narrow">
                        <a href="addnote.php" class="button is-primary is-medium">+ New Note</a>
                    </div>
                </div>

                <?php if (empty($notes)): ?>
                    <div class="notification is-light has-text-centered py-6">
                        <p class="is-size-4 mb-4">No notes found.</p>
                        <p>Create your very first note by clicking the button above!</p>
                    </div>
                <?php else: ?>
                    <div class="columns is-multiline">
                        <?php foreach ($notes as $note): ?>
                            <div class="column is-4">
                                <div class="card note-card">
                                    <header class="card-header">
                                        <p class="card-header-title">
                                            <?php echo htmlspecialchars($note['title']); ?>
                                        </p>
                                    </header>
                                    <div class="card-content">
                                        <div class="content">
                                            <p><?php echo nl2br(htmlspecialchars($note['content'])); ?></p>
                                            <p class="is-size-7 has-text-grey mt-4">
                                                Created: <?php echo htmlspecialchars($note['created_at']); ?>
                                            </p>
                                        </div>
                                    </div>
                                    <footer class="card-footer">
                                        <!-- Vulnerability 4: Edit note links using simple GET parameter with no ownership validation -->
                                        <a href="editnote.php?noteid=<?php echo $note['id']; ?>" class="card-footer-item has-text-link">Edit / Delete</a>
                                    </footer>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>
            </div>
        </section>
    <?php endif; ?>
</body>
</html>
