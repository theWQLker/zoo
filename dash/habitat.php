<?php
include 'config2.php'; // Include the database configuration file
include'head.php';
$habitat = 'Savannah'; // Example habitat
$sql = "SELECT a.prenom, a.race, h.name as habitat, a.diet, a.description, a.characteristics, a.image as animal_image, h.image as habitat_image
        FROM animals a
        JOIN habitats h ON a.habitat_id = h.id
        WHERE h.name = :habitat";

try {
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':habitat', $habitat, PDO::PARAM_STR);
    $stmt->execute();

    if ($stmt->rowCount() > 0) {
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            echo "<h2>Habitat: " . htmlspecialchars($row["habitat"]) . "</h2>";
            if (!empty($row['habitat_image'])) {
                echo '<img src="data:image/jpeg;base64,' . base64_encode($row['habitat_image']) . '" alt="' . htmlspecialchars($row["habitat"]) . ' Habitat" style="width:200px;"/><br>';
            }
            echo "Name: " . htmlspecialchars($row["prenom"]) . "<br>Species: " . htmlspecialchars($row["race"]) . "<br>Diet: " . htmlspecialchars($row["diet"]) . "<br>Description: " . htmlspecialchars($row["description"]) . "<br>Characteristics: " . htmlspecialchars($row["characteristics"]) . "<br>";
            if (!empty($row['animal_image'])) {
                echo '<img src="data:image/jpeg;base64,' . base64_encode($row['animal_image']) . '" alt="' . htmlspecialchars($row["race"]) . '" style="width:200px;"/><br><br>';
            }
        }
    } else {
        echo "0 results";
    }
} catch (PDOException $e) {
    echo 'Query failed: ' . $e->getMessage();
}
?>
