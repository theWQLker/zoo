<?php
include 'config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $age = $_POST['age'];
    $name = $_POST['name'];
    $lastname = $_POST['lastname'];
    $role_type = $_POST['role_type'];

    $query = "SELECT COUNT(*) as count FROM users";
    $stmt = $pdo->query($query);
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    $count = $result['count'] + 1;

    $user_id = 'u_' . str_pad($count, 5, '0', STR_PAD_LEFT);

    $query = "INSERT INTO users (user_id, username, password, age, name, lastname, role_type) VALUES (?, ?, ?, ?, ?, ?, ?)";
    $stmt = $pdo->prepare($query);
    $stmt->execute([$user_id, $username, $password, $age, $name, $lastname, $role_type]);

    header('Location: userdash.php');
    exit;
}

$query = "SELECT type FROM user_roles";
$stmt = $pdo->query($query);
$roles = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Create New User</title>
</head>
<body>
    <h1>Create New User</h1>
    <form method="post">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required><br><br>
        
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required><br><br>
        
        <label for="age">Age:</label>
        <input type="number" id="age" name="age" required><br><br>
        
        <label for="name">First Name:</label>
        <input type="text" id="name" name="name" required><br><br>
        
        <label for="lastname">Last Name:</label>
        <input type="text" id="lastname" name="lastname" required><br><br>
        
        <label for="role_type">Role:</label>
        <select id="role_type" name="role_type" required>
            <?php foreach ($roles as $role): ?>
                <option value="<?php echo htmlspecialchars($role['type']); ?>"><?php echo htmlspecialchars($role['type']); ?></option>
            <?php endforeach; ?>
        </select><br><br>
        
        <button type="submit">Create User</button>
    </form>
    <a href="userdash.php">Back to Admin Dashboard</a>
</body>
</html>
