<?php
include 'config2.php';
include 'head.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $visitor_id = $_POST['visitor_id'];
    $service_id = $_POST['service_id'];
    $booking_date = $_POST['booking_date'];
    $status = 'Pending';

    $query = "INSERT INTO bookings (visitor_id, service_id, booking_date, status) VALUES (?, ?, ?, ?)";
    $stmt = $pdo->prepare($query);
    $stmt->execute([$visitor_id, $service_id, $booking_date, $status]);

    echo "Booking successfully created!";
}

$query = "SELECT id, name, lastname FROM visitors";
$stmt = $pdo->query($query);
$visitors = $stmt->fetchAll(PDO::FETCH_ASSOC);

$query = "SELECT id, name FROM services WHERE category_id = 5"; // Adjust category_id based on Guided Tour category ID
$stmt = $pdo->query($query);
$tours = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Book a Guided Tour</title>
</head>
<body>
    <div class="container">
    <h1>Book a Guided Tour</h1>
    <form method="post">
        <label for="visitor_id">Visitor:</label>
        <select id="visitor_id" name="visitor_id" required>
            <?php foreach ($visitors as $visitor): ?>
                <option value="<?php echo htmlspecialchars($visitor['id']); ?>"><?php echo htmlspecialchars($visitor['name'] . ' ' . $visitor['lastname']); ?></option>
            <?php endforeach; ?>
        </select><br><br>
        
        <label for="service_id">Guided Tour:</label>
        <select id="service_id" name="service_id" required>
            <?php foreach ($tours as $tour): ?>
                <option value="<?php echo htmlspecialchars($tour['id']); ?>"><?php echo htmlspecialchars($tour['name']); ?></option>
            <?php endforeach; ?>
        </select><br><br>
        
        <label for="booking_date">Booking Date:</label>
        <input type="date" id="booking_date" name="booking_date" required><br><br>
        
        <button type="submit">Book Guided Tour</button>
    </form>
    <a href="services.php">Back to Services</a>
    </div>
</body>
</html>
