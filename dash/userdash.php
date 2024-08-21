<?php
include 'config.php';
include 'head.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['delete'])) {
        $user_id = $_POST['user_id'];
        $query = "DELETE FROM users WHERE user_id = ?";
        $stmt = $pdo->prepare($query);
        $stmt->execute([$user_id]);
    } elseif (isset($_POST['edit'])) {
        $user_id = $_POST['user_id'];
        header("Location: urs_edit.php?user_id=$user_id");
        exit;
    }
}

$query = "
SELECT u.user_id, u.username, u.age, u.name, u.lastname, r.role
FROM users u
JOIN user_roles r ON u.role_type = r.type
";

$stmt = $pdo->query($query);
$users = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin Dashboard</title>
</head>
<body>
    <h1>Admin Dashboard</h1>
    <a href="create_user.php">Create New User</a>
    <table border="1">
        <tr>
            <th>User ID</th>
            <th>Username</th>
            <th>Age</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Role</th>
            <th>Actions</th>
        </tr>
        <?php foreach ($users as $user): ?>
        <tr>
            <td><?php echo htmlspecialchars($user['user_id']); ?></td>
            <td><?php echo htmlspecialchars($user['username']); ?></td>
            <td><?php echo htmlspecialchars($user['age']); ?></td>
            <td><?php echo htmlspecialchars($user['name']); ?></td>
            <td><?php echo htmlspecialchars($user['lastname']); ?></td>
            <td><?php echo htmlspecialchars($user['role']); ?></td>
            <td>
                <form method="post" style="display:inline;">
                    <input type="hidden" name="user_id" value="<?php echo $user['user_id']; ?>">
                    <button type="submit" name="edit">Edit</button>
                    <button type="submit" name="delete" onclick="return confirm('Are you sure you want to delete this user?');">Delete</button>
                </form>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>
