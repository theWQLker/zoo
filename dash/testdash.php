<?php
include 'config2.php';
include 'head.php';

// Handle Add, Update, Delete operations
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['add_service'])) {
        $category_id = $_POST['category_id'];
        $name = $_POST['name'];
        $description = $_POST['description'];
        $price = $_POST['price'];
        $availability_schedule = $_POST['availability_schedule'];

        $query = "INSERT INTO services (category_id, name, description, price, availability_schedule) VALUES (?, ?, ?, ?, ?)";
        $stmt = $pdo->prepare($query);
        $stmt->execute([$category_id, $name, $description, $price, $availability_schedule]);
    } elseif (isset($_POST['edit_service'])) {
        $id = $_POST['id'];
        $category_id = $_POST['category_id'];
        $name = $_POST['name'];
        $description = $_POST['description'];
        $price = $_POST['price'];
        $availability_schedule = $_POST['availability_schedule'];

        $query = "UPDATE services SET category_id = ?, name = ?, description = ?, price = ?, availability_schedule = ? WHERE id = ?";
        $stmt = $pdo->prepare($query);
        $stmt->execute([$category_id, $name, $description, $price, $availability_schedule, $id]);
    } elseif (isset($_POST['delete_service'])) {
        $id = $_POST['id'];

        $query = "DELETE FROM services WHERE id = ?";
        $stmt = $pdo->prepare($query);
        $stmt->execute([$id]);
    }
}

// Fetch Services and Categories
$query = "SELECT s.id, c.name AS category_name, s.name, s.description, s.price, s.availability_schedule
          FROM services s
          JOIN service_categories c ON s.category_id = c.id";
$stmt = $pdo->query($query);
$services = $stmt->fetchAll(PDO::FETCH_ASSOC);

$query = "SELECT id, name FROM service_categories";
$stmt = $pdo->query($query);
$categories = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html>

<head>
    <title>Admin Dashboard</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>
    <div class="container">
        <h1>Admin Dashboard</h1>

        <h2>Services</h2>
        <table class="services-table">
            <tr>
                <th>ID</th>
                <th>Category</th>
                <th>Name</th>
                <th>Description</th>
                <th>Price</th>
                <th>Availability Schedule</th>
                <th>Actions</th>
            </tr>
            <?php foreach ($services as $service) : ?>
                <tr>
                    <td><?php echo htmlspecialchars($service['id']); ?></td>
                    <td><?php echo htmlspecialchars($service['category_name']); ?></td>
                    <td><?php echo htmlspecialchars($service['name']); ?></td>
                    <td><?php echo htmlspecialchars($service['description']); ?></td>
                    <td><?php echo htmlspecialchars($service['price']); ?></td>
                    <td><?php echo htmlspecialchars($service['availability_schedule']); ?></td>
                    <td>
                        <form method="post">
                            <input type="hidden" name="id" value="<?php echo htmlspecialchars($service['id']); ?>">
                            <input type="hidden" name="category_id" value="<?php echo htmlspecialchars($service['name']); ?>">
                            <input type="hidden" name="name" value="<?php echo htmlspecialchars($service['name']); ?>">
                            <input type="hidden" name="description" value="<?php echo htmlspecialchars($service['description']); ?>">
                            <input type="hidden" name="price" value="<?php echo htmlspecialchars($service['price']); ?>">
                            <input type="hidden" name="availability_schedule" value="<?php echo htmlspecialchars($service['availability_schedule']); ?>">
                            <button type="submit" name="edit_service_form" class="edit-button">Edit</button>
                            <button type="submit" name="delete_service" class="delete-button">Delete</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>

        <h2><?php echo isset($_POST['edit_service_form']) ? 'Edit Service' : 'Add Service'; ?></h2>
        <form method="post" class="service-form">
            <?php if (isset($_POST['edit_service_form'])) : ?>
                <input type="hidden" name="id" value="<?php echo htmlspecialchars($_POST['id']); ?>">
            <?php endif; ?>

            <label for="category_id">Category:</label>
            <select id="category_id" name="category_id" required>
                <?php foreach ($categories as $category) : ?>
                    <option value="<?php echo htmlspecialchars($category['id']); ?>" <?php echo (isset($_POST['category_id']) && $_POST['category_id'] == $category['id']) ? 'selected' : ''; ?>>
                        <?php echo htmlspecialchars($category['name']); ?>
                    </option>
                <?php endforeach; ?>
            </select><br><br>

            <label for="name">Name:</label>
            <input type="text" id="name" name="name" value="<?php echo isset($_POST['name']) ? htmlspecialchars($_POST['name']) : ''; ?>" required><br><br>

            <label for="description">Description:</label>
            <textarea id="description" name="description" required><?php echo isset($_POST['description']) ? htmlspecialchars($_POST['description']) : ''; ?></textarea><br><br>

            <label for="price">Price:</label>
            <input type="text" id="price" name="price" value="<?php echo isset($_POST['price']) ? htmlspecialchars($_POST['price']) : ''; ?>" required><br><br>

            <label for="availability_schedule">Availability Schedule:</label>
            <input type="text" id="availability_schedule" name="availability_schedule" value="<?php echo isset($_POST['availability_schedule']) ? htmlspecialchars($_POST['availability_schedule']) : ''; ?>" required><br><br>

            <button type="submit" name="<?php echo isset($_POST['edit_service_form']) ? 'edit_service' : 'add_service'; ?>" class="submit-button">
                <?php echo isset($_POST['edit_service_form']) ? 'Update Service' : 'Add Service'; ?>
            </button>
        </form>
    </div>
</body>

</html>
