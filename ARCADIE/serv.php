<?php
include 'config2.php';  // Include database connection
include 'head.php';     // Include header if needed

$query = "
SELECT s.id, c.name AS category_name, s.name, s.description, s.price, s.availability_schedule, s.image
FROM services s
JOIN service_categories c ON s.category_id = c.id
WHERE c.name != 'Gift Shop'  -- Exclude Gift Shop from display
ORDER BY c.id, s.id
";

$stmt = $pdo->query($query);
$services = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Zoo Services</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        .container {
            width: 100%;
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
        }

        .service-block {
            display: flex;
            flex-direction: column;
            align-items: center;
            margin: 20px 0;
            text-align: center;
        }

        .service-block img {
            width: 100%;
            max-width: 600px;
            height: auto;
            margin-bottom: 20px;
        }

        .service-block h2 {
            margin: 10px 0;
        }

        .service-block p {
            margin: 10px 0;
        }

        @media (min-width: 768px) {
            .service-block {
                flex-direction: row;
                text-align: left;
            }

            .service-block img {
                margin-right: 20px;
                margin-bottom: 0;
            }
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Zoo Services</h1>
        
        <div class="service-block">
            <img src="./wild.png" alt="Wildlife Experience">
            
                <h2>Explore Our Wide Range of Services</h2>
            
        </div>
        <?php if (!empty($services)): ?>
            <?php foreach ($services as $service): ?>
                <div class="service-block">
                    <?php if ($service['image']): ?>
                        <?php
                        $img = 'data:image/jpeg;base64,' . base64_encode($service['image']);
                        ?>
                        <img src="<?php echo $img; ?>" alt="<?php echo htmlspecialchars($service['name']); ?>">
                    <?php endif; ?>
                    <div>
                        <h2><?php echo htmlspecialchars($service['name']); ?></h2>
                        <p><?php echo htmlspecialchars($service['description']); ?></p>
                        <p>Price: $<?php echo number_format($service['price'], 2); ?></p>
                        <p>Available: <?php echo htmlspecialchars($service['availability_schedule']); ?></p>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <p>No services available.</p>
        <?php endif; ?>

    </div>
</body>

</html>