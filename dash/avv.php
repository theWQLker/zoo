<?php
session_start();
require 'config.php';
require 'head.php';

// Handle admin login
if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Query to fetch user details based on username and password
    $stmt = $pdo->prepare("SELECT * FROM users WHERE username = ? AND password = ?");
    $stmt->execute([$username, $password]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user && ($user['role_type'] === 'admin' || $user['role_type'] === 'employee')) {
        $_SESSION['user_id'] = $user['user_id']; // Store user ID in session for identification
        $_SESSION['role_type'] = $user['role_type']; // Store role type in session
        $_SESSION['username'] = $user['username']; // Store username in session
        $_SESSION['logged_in'] = true; // Mark user as logged in
    } else {
        $login_error = "Invalid credentials or insufficient privileges.";
    }
}

// Handle admin disconnect
if (isset($_POST['disconnect'])) {
    session_unset(); // Unset all session variables
    session_destroy(); // Destroy the session
    header("Location: avv.php"); // Redirect to the same page after logout
    exit;
}

// Handle review publication
if (isset($_POST['publish']) && isset($_SESSION['logged_in']) && ($_SESSION['role_type'] === 'admin' || $_SESSION['role_type'] === 'employee')) {
    $review_id = $_POST['review_id'];
    $stmt = $pdo->prepare("UPDATE avis SET viewable = 1 WHERE id = ?");
    $stmt->execute([$review_id]);
}

// Fetch viewable reviews for all users
$stmt = $pdo->prepare("SELECT pseudo, comment, created_at FROM avis WHERE viewable = 1 ORDER BY created_at DESC");
$stmt->execute();
$viewable_reviews = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Fetch pending reviews for admins and employees
if (isset($_SESSION['logged_in']) && ($_SESSION['role_type'] === 'admin' || $_SESSION['role_type'] === 'employee')) {
    $stmt = $pdo->prepare("SELECT id, pseudo, comment, created_at FROM avis WHERE viewable = 0 ORDER BY created_at DESC");
    $stmt->execute();
    $pending_reviews = $stmt->fetchAll(PDO::FETCH_ASSOC);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Zoo Reviews</title>
    <link rel="stylesheet" href="styles.css">

</head>
<body>
    <div class="container">
        <div class="header">
            <h1>Zoo Reviews</h1>
            <?php if (isset($_SESSION['logged_in'])): ?>
                <form method="post" action="">
                    <button type="submit" name="disconnect" class="disconnect-button">Disconnect</button>
                </form>
            <?php endif; ?>

            <?php if (!isset($_SESSION['logged_in'])): ?>
                <form method="post" action="">
                    <button type="submit" name="connect" class="connect-button">connect</button>
                </form>
            <?php endif; ?>

        </div>
                     <!-- Normal user reviews section -->
        <h2>Viewable Reviews</h2>
        <?php foreach ($viewable_reviews as $review): ?>
            <div class="review">
                <strong><?php echo htmlspecialchars($review['pseudo']); ?></strong>
                <p><?php echo htmlspecialchars($review['comment']); ?></p>
                <small><?php echo htmlspecialchars($review['created_at']); ?></small>
            </div>
        <?php endforeach; ?>

        <?php if (!isset($_SESSION['logged_in'])): ?>
            <form class="service-form1" method="post" action="">
                <h2>Admin Login</h2>
                <label for="username">Username: </label>
                <input type="text" name="username" id="username" required>
                <br>
                <label for="password">Password: </label>
                <input type="password" name="password" id="password" required>
                <br>
                <button type="submit" name="login">Login</button>
            </form>
        <?php else: ?>
            <div class="admin-section">
                <h2>Pending Reviews</h2>
                <?php foreach ($pending_reviews as $review): ?>
                    <div class="review">
                        <strong><?php echo htmlspecialchars($review['pseudo']); ?></strong>
                        <p><?php echo htmlspecialchars($review['comment']); ?></p>
                        <small><?php echo htmlspecialchars($review['created_at']); ?></small>
                        <form class="service-form" method="post" action="">
                            <input type="hidden" name="review_id" value="<?php echo $review['id']; ?>">
                            <button type="submit" name="publish" class="edit-button">Publish</button>
                        </form>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </div>

    <div class="footer">
        <p>&copy; <?php echo date('Y'); ?> Zoo Reviews</p>
    </div>

    <script>
        // JavaScript to show disconnect button after login
        document.addEventListener('DOMContentLoaded', function() {
            var disconnectButton = document.querySelector('.disconnect-button');
            if (disconnectButton) {
                disconnectButton.style.display = 'block';
            }
        });

        document.addEventListener('onclick', function(event) {
            event.preventDefault()
            var connectButton = document.querySelector('.service-form1');
            if (connectButton) {
                connectButton.style.display = 'none';
            }
        });
    </script>
</body>
</html>
