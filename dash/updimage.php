<?php
include 'config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $type = $_POST['type'];
    $description = $_POST['description'];
    $image = $_FILES['image']['tmp_name'];

    if ($image) {
        $imgData = file_get_contents($image);

        $query = "INSERT INTO images (id, type, description, data) VALUES (?, ?, ?, ?)";
        $stmt = $pdo->prepare($query);
        $stmt->execute([$id, $type, $description, $imgData]);
        echo "Image uploaded successfully!";
    } else {
        echo "Failed to upload image.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Upload Image</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
    <div class="container">
        <h1>Upload Image</h1>
        <form method="post" enctype="multipart/form-data">
            <label for="id">ID:</label>
            <input type="text" id="id" name="id" maxlength="4" required><br><br>
            
            <label for="type">Type:</label>
            <select id="type" name="type" required>
                <option value="Animal">Animal</option>
                <option value="Biozone">Biozone</option>
            </select><br><br>
            
            <label for="description">Description:</label>
            <input type="text" id="description" name="description" required><br><br>
            
            <label for="image">Image:</label>
            <input type="file" id="image" name="image" required><br><br>
            
            <button type="submit">Upload Image</button>
        </form>
    </div>
</body>
</html>
