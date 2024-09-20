<?php
include 'config2.php';
include 'header.php';

// Handle Add operation
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['add_report'])) {
    $animal_id = $_POST['animal_id'];
    $vet_username = $_POST['vet_username'];
    $report_date = $_POST['report_date'];
    $health_status = $_POST['health_status'];
    $treatment = $_POST['treatment'];
    $follow_up_date = $_POST['follow_up_date'];

    $query = "INSERT INTO veterinary_reports (animal_id, vet_username, report_date, health_status, treatment, follow_up_date) 
              VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = $pdo->prepare($query);
    $stmt->execute([$animal_id, $vet_username, $report_date, $health_status, $treatment, $follow_up_date]);
}

// Fetch animals (including race) and vets for the form
$animal_query = "SELECT id, prenom, race FROM animals";
$animal_stmt = $pdo->query($animal_query);

$vet_query = "SELECT username, name FROM users 
              WHERE username IN (SELECT username FROM user_role_assignments WHERE role_type = 'vet')";
$vet_stmt = $pdo->query($vet_query);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Log Veterinary Report</title>
    <link rel="stylesheet" type="text/css" href="ric6.css">
</head>
<body>
    <div class="container">
        <h1>Log Veterinary Report</h1>
        
        <form method="post" class="form-container">
            <label for="animal_id">Animal:</label>
            <select id="animal_id" name="animal_id" required>
                <?php while ($animal = $animal_stmt->fetch(PDO::FETCH_ASSOC)) : ?>
                    <option value="<?php echo $animal['id']; ?>">
                        <?php echo htmlspecialchars($animal['prenom'] . ' (' . $animal['race'] . ')'); ?>
                    </option>
                <?php endwhile; ?>
            </select><br><br>

            <label for="vet_username">Veterinarian:</label>
            <select id="vet_username" name="vet_username" required>
                <?php while ($vet = $vet_stmt->fetch(PDO::FETCH_ASSOC)) : ?>
                    <option value="<?php echo $vet['username']; ?>"><?php echo htmlspecialchars($vet['name']); ?></option>
                <?php endwhile; ?>
            </select><br><br>

            <label for="report_date">Report Date:</label>
            <input type="date" id="report_date" name="report_date" required><br><br>

            <label for="health_status">Health Status:</label>
            <textarea id="health_status" name="health_status" required></textarea><br><br>

            <label for="treatment">Treatment:</label>
            <textarea id="treatment" name="treatment"></textarea><br><br>

            <label for="follow_up_date">Follow-Up Date:</label>
            <input type="date" id="follow_up_date" name="follow_up_date"><br><br>

            <button type="submit" name="add_report" class="submit-button">Add Report</button>
        </form>
    </div>
</body>
</html>