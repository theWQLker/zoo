<?php
include 'config.php';

if (!isset($_GET['user_id'])) {
    header('Location: admin_dashboard.php');
    exit;
}

$user_id = $_GET['user_id'];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $age = $_POST['age'];
    $name = $_POST['name'];
    $lastname = $_POST['lastname'];
    $role_type = $_POST['role_type'];

    $query = "UPDATE users SET username = ?, age = ?, name = ?, lastname = ?, role_type = ? WHERE user_id = ?";
    $stmt = $pdo->prepare($query);
    $stmt->execute([$username, $age, $name, $lastname, $role_type, $user_id]);

    header('Location: admin_dashboard.php');
    exit;
}

$query = "SELECT * FROM users WHERE user_id = ?";
$stmt = $pdo->prepare($query);
$stmt->execute([$user_id]);
$user = $stmt->fetch(PDO::FETCH_ASSOC);

$query = "SELECT type FROM user_roles";
$stmt = $pdo->query($query);
$roles = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit User</title>
</head>
<body>
    <h1>Edit User</h1>
    <form method="post">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" value="<?php echo htmlspecialchars($user['username']); ?>" required><br><br>
        
        <label for="age">Age:</label>
        <input type="number" id="age" name="age" value="<?php echo htmlspecialchars($user['age']); ?>" required><br><br>
        
        <label for="name">First Name:</label>
        <input type="text" id="name" name="name" value="<?php echo htmlspecialchars($user['name']); ?>" required><br><br>
        
        <label for="lastname">Last Name:</label>
        <input type="text" id="lastname" name="lastname" value="<?php echo htmlspecialchars($user['lastname']); ?>" required><br><br>
        
        <label for="role_type">Role:</label>
        <select id="role_type" name="role_type" required>
            <?php foreach ($roles as $role): ?>
                <option value="<?php echo htmlspecialchars($role['type']); ?>" <?php if ($role['type'] == $user['role_type']) echo 'selected'; ?>>
                    <?php echo htmlspecialchars($role['type']); ?>
                </option>
            <?php endforeach; ?>
        </select><br><br>
        
        <button type="submit">Update User</button>
    </form>
    <a href="admin_dashboard.php">Back to Admin Dashboard</a>
</body>
</html>
