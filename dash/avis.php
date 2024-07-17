<?php
session_start();
 require 'config.php';
 include 'header.php';

// Handle admin login
if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Simple admin authentication (in real scenarios, use hashed passwords and more secure methods)
    if ($username == 'admin' && $password == 'password') {
        $_SESSION['admin'] = true;
    } else {
        $login_error = "Invalid credentials.";
    }
}

// Handle review publication
if (isset($_POST['publish']) && isset($_SESSION['admin'])) {
    $review_id = $_POST['review_id'];
    $stmt = $pdo->prepare("UPDATE avis SET viewable = 1 WHERE id = ?");
    $stmt->execute([$review_id]);
}

// Fetch viewable reviews for normal users
$stmt = $pdo->prepare("SELECT pseudo, comment, created_at FROM avis WHERE viewable = 1 ORDER BY created_at DESC");
$stmt->execute();
$viewable_reviews = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Fetch pending reviews for admin
if (isset($_SESSION['admin'])) {
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
    <style>
        .review { border: 1px solid #ccc; margin: 10px; padding: 10px; }
        .admin-section { margin-top: 20px; padding: 20px; border-top: 2px solid #000; }
    </style>
</head>
<body>
    <h1>Zoo Reviews</h1>

    <?php if (isset($login_error)): ?>
        <p style="color: red;"><?php echo $login_error; ?></p>
    <?php endif; ?>

    <!-- Normal user reviews section -->
    <h2>Viewable Reviews</h2>
    <?php foreach ($viewable_reviews as $review): ?>
        <div class="review">
            <strong><?php echo htmlspecialchars($review['pseudo']); ?></strong>
            <p><?php echo htmlspecialchars($review['comment']); ?></p>
            <small><?php echo htmlspecialchars($review['created_at']); ?></small>
        </div>
    <?php endforeach; ?>

    <!-- Admin login and reviews section -->
    <?php if (!isset($_SESSION['admin'])): ?>
        <form method="post" action="">
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
                    <form method="post" action="">
                        <input type="hidden" name="review_id" value="<?php echo $review['id']; ?>">
                        <button type="submit" name="publish">Publish</button>
                    </form>
                </div>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>
</body>
</html>
