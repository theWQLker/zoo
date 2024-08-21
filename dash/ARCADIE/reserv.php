<?php
include 'config2.php';
include "head.php";

$query = "
SELECT s.id, c.name AS category_name, s.name, s.description, s.price, s.availability_schedule
FROM services s
JOIN service_categories c ON s.category_id = c.id
WHERE c.name != 'Gift Shop'  -- Exclude Gift Shop from display
ORDER BY c.id, s.id
";

$stmt = $pdo->query($query);
$services = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html>

<head>
    <title>Zoo Services</title>
</head>

<body>
    
    <div class="container">
        <h1>Zoo Services</h1>
        
        <table class="services-table">
            <tr>
                <th></th>
                <th>Name</th>
                <th>Description</th>
                <th>Availability Schedule</th>
                <th>Price</th>
            </tr>
            <?php foreach ($services as $service): ?>
                <tr>
                    <td><?php echo htmlspecialchars($service['id']); ?></td>
                    <td><?php echo htmlspecialchars($service['name']); ?></td>
                    <td><?php echo htmlspecialchars($service['description']); ?></td>
                    <td><?php echo htmlspecialchars($service['availability_schedule']); ?></td>
                    <td><?php echo htmlspecialchars($service['price']); ?></td>
                </tr>
            <?php endforeach; ?>
        </table>

    </div>
</body>

</html>