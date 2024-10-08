<?php
include("config2.php"); // Database configuration
?>

<!DOCTYPE html>
<html lang="en">
<?php include 'head.php'; // Include the head.php file for metadata and styles ?>
<body>
    <!-- Hero Banner -->
    <div class="hero-banner">
        <h1>Welcome to Our Zoo</h1>
    </div>

    <!-- Introduction Section -->
    <div class="zoo-intro container">
        <h2>Discover Our Amazing Wildlife</h2>
        <p>Explore the diversity of animals across various habitats, from the open savannahs to the icy tundra. Each habitat offers a unique glimpse into the lives of the species that call it home.</p>
    </div>

    <!-- Habitats Section -->
    <div class="container">
        <?php
        try {
            // Query to retrieve habitats and animals
            $sql = "SELECT h.name as habitat, h.image as habitat_image, a.prenom, a.race, a.diet, a.description, a.characteristics, a.image as animal_image
                    FROM animals a
                    JOIN habitats h ON a.habitat_id = h.id
                    ORDER BY h.name";
            
            $stmt = $pdo->query($sql);
            $current_habitat = '';
            $first_row = true;

            // Loop through and group by habitat
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                if ($current_habitat != $row['habitat']) {
                    if (!$first_row) {
                        echo '</div></div>'; // Close previous habitat row
                    }
                    $first_row = false;
                    $current_habitat = $row['habitat'];

                    // Habitat section header
                    echo '<div class="row habitat-title_hb">';
                    echo '<div class="col-12">';
                    echo '<h2 class="text-center">' . htmlspecialchars($row["habitat"]) . '</h2>';
                    if (!empty($row['habitat_image'])) {
                        echo '<div class="text-center"><img src="data:image/jpeg;base64,' . base64_encode($row['habitat_image']) . '" alt="' . htmlspecialchars($row["habitat"]) . ' Habitat" class="img-fluid mb-4" style="max-width: 400px; object-fit: contain;"/></div>';
                    }
                    echo '</div></div>';
                    echo '<div class="row card-deck_hb">'; // Start new row for animals
                }

                // Display each animal in a card
                echo '<div class="col-md-4 col-sm-6 mb-4">';
                echo '<div class="card_hb">';
                if (!empty($row['animal_image'])) {
                    echo '<img src="data:image/jpeg;base64,' . base64_encode($row['animal_image']) . '" class="card-img-top habitat-card" alt="' . htmlspecialchars($row["race"]) . '">';
                }
                echo '<div class="card-body_hb">';
                echo '<h5 class="card-title">' . htmlspecialchars($row["prenom"]) . '</h5>';
                echo '<p class="card-text"><strong>Species:</strong> ' . htmlspecialchars($row["race"]) . '</p>';
                echo '<p class="card-text"><strong>Diet:</strong> ' . htmlspecialchars($row["diet"]) . '</p>';
                echo '<p class="card-text"><strong>Description:</strong> ' . htmlspecialchars($row["description"]) . '</p>';
                echo '<p class="card-text"><strong>Characteristics:</strong> ' . htmlspecialchars($row["characteristics"]) . '</p>';
                echo '</div>';
                echo '</div>';
                echo '</div>';
            }
            echo '</div>'; // Close the last card deck
        } catch (PDOException $e) {
            echo 'Query failed: ' . $e->getMessage();
        }
        ?>
    </div>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>
</html>
