<?php
include 'config.php';
include 'head.php';

$query = "
SELECT a.name as animal_name, a.species, a.diet, a.lifespan, a.description as animal_description, 
       h.name as habitat_name, h.climate, h.vegetation, h.description as habitat_description,
       z.name as zoo_location_name, z.area, z.description as zoo_location_description
FROM animal_habitat_relations r
JOIN animals a ON r.animal_id = a.id
JOIN habitats h ON r.habitat_id = h.id
JOIN zoo_locations z ON r.zoo_location_id = z.id
";

$stmt = $pdo->query($query);
$animals = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Zoo Animals</title>
</head>
<body>
    <h1>Zoo Animals</h1>
    <table border="1">
        <tr>
            <th>Animal Name</th>
            <th>Species</th>
            <th>Diet</th>
            <th>Lifespan</th>
            <th>Animal Description</th>
            <th>Habitat Name</th>
            <th>Climate</th>
            <th>Vegetation</th>
            <th>Habitat Description</th>
            <th>Zoo Location Name</th>
            <th>Area</th>
            <th>Zoo Location Description</th>
        </tr>
        <?php foreach ($animals as $animal): ?>
        <tr>
            <td><?php echo htmlspecialchars($animal['animal_name']); ?></td>
            <td><?php echo htmlspecialchars($animal['species']); ?></td>
            <td><?php echo htmlspecialchars($animal['diet']); ?></td>
            <td><?php echo htmlspecialchars($animal['lifespan']); ?></td>
            <td><?php echo htmlspecialchars($animal['animal_description']); ?></td>
            <td><?php echo htmlspecialchars($animal['habitat_name']); ?></td>
            <td><?php echo htmlspecialchars($animal['climate']); ?></td>
            <td><?php echo htmlspecialchars($animal['vegetation']); ?></td>
            <td><?php echo htmlspecialchars($animal['habitat_description']); ?></td>
            <td><?php echo htmlspecialchars($animal['zoo_location_name']); ?></td>
            <td><?php echo htmlspecialchars($animal['area']); ?></td>
            <td><?php echo htmlspecialchars($animal['zoo_location_description']); ?></td>
        </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>
