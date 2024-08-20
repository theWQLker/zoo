<?php
include 'config.php';
include'head.php';
// Handle image upload
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $type = $_POST['type'];
    $description = $_POST['description'];
    $image = file_get_contents($_FILES['image']['tmp_name']);

    try {
        $stmt = $pdo->prepare("INSERT INTO images (type, description, image) VALUES (:type, :description, :image)");
        $stmt->bindParam(':type', $type);
        $stmt->bindParam(':description', $description);
        $stmt->bindParam(':image', $image, PDO::PARAM_LOB);
        $stmt->execute();
        echo "New image added successfully";
    } catch(PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}

// Fetch all images
try {
    $stmt = $pdo->query("SELECT * FROM images");
    $images = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Manage Images</title>
    <link rel="stylesheet" type="text/css" href="stylesimg.css">
</head>
<body>
<h1 style="font-family: 'Cinzel Decorative', cursive;">Welcome to the Enchanted Realm</h1>

    <h1>Manage Images</h1>

    <!-- Image Preview Section -->
    <div class="image-gallery">
        <h2>Image Gallery</h2>
        <table>
            <tr>
                <th>ID</th>
                <th>Type</th>
                <th>Description</th>
                <th>Image</th>
            </tr>
            <?php
            if (count($images) > 0) {
                foreach ($images as $row) {
                    echo "<tr>";
                    echo "<td>" . htmlspecialchars($row['id']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['type']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['description']) . "</td>";
                    echo "<td><img src='data:image/jpeg;base64," . base64_encode($row['image']) . "' alt='" . htmlspecialchars($row['description']) . "' class='thumbnail'></td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='4'>No images found.</td></tr>";
            }
            ?>
        </table>
    </div>

    <!-- Upload Form Section -->
    <div class="upload-form">
        <h2>Upload New Image</h2>
        <form action="manage_images.php" method="POST" enctype="multipart/form-data">
            <label for="type">Type:</label>
            <select name="type" id="type" required>
                <option value="Animal">Animal</option>
                <option value="Habitat">Habitat</option>
                <option value="Services">Services</option>
            </select>
            <br>
            <label for="description">Description:</label>
            <input type="text" name="description" id="description" required>
            <br>
            <label for="image">Image:</label>
            <input type="file" name="image" id="image" accept="image/*" required>
            <br>
            <input type="submit" value="Upload Image">
        </form>
    </div>
</body>
</html>

<?php
$conn = null;
?>


</body>
</html>

<?php
$pdo = null;
?>
