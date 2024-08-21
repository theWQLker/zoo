<?php
include 'db_connection.php';

$service_id = $_GET['service_id'] ?? null;

if ($_SERVER['REQUEST_METHOD'] === 'POST' && $service_id) {
    $visitor_name = $_POST['visitor_name'];
    $visit_date = $_POST['visit_date'];
    $num_people = $_POST['num_people'];

    try {
        $stmt = $conn->prepare("INSERT INTO reservations (service_id, visitor_name, visit_date, num_people) VALUES (:service_id, :visitor_name, :visit_date, :num_people)");
        $stmt->bindParam(':service_id', $service_id);
        $stmt->bindParam(':visitor_name', $visitor_name);
        $stmt->bindParam(':visit_date', $visit_date);
        $stmt->bindParam(':num_people', $num_people);
        $stmt->execute();
        echo "Reservation made successfully!";
    } catch(PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}

if ($service_id) {
    try {
        $stmt = $conn->prepare("SELECT * FROM services WHERE id = :service_id");
        $stmt->bindParam(':service_id', $service_id);
        $stmt->execute();
        $service = $stmt->fetch(PDO::FETCH_ASSOC);
    } catch(PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Reserve Service</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
    <div class="container_srv">
        <h1>Reserve <?= htmlspecialchars($service['title']) ?></h1>
        <form action="reservation.php?service_id=<?= htmlspecialchars($service_id) ?>" method="POST">
            <label for="visitor_name">Name:</label>
            <input type="text" id="visitor_name" name="visitor_name" required>
            <br>
            <label for="visit_date">Visit Date:</label>
            <input type="date" id="visit_date" name="visit_date" required>
            <br>
            <label for="num_people">Number of People:</label>
            <input type="number" id="num_people" name="num_people" required>
            <br>
            <input type="submit" value="Submit Reservation">
        </form>
    </div>
</body>
</html>

<?php
$conn = null;
?>
