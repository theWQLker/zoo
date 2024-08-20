<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Zoo Animals</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <style>
        body, html {
            height: 100%;
            margin: 0;
            display: flex;
            flex-direction: column;
            color: grey;
        }
        .container-fluid_hb {
            flex: 1;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            color: green;
        }
        .card_hb {
            margin: 10px;
            display: flex;
            flex-direction: column;
            border: 1px solid #ddd;
            border-radius: 5px;
        }
        .card_hb img {
            width: 100%;
            height: auto;
            max-height: 200px;
            object-fit: cover;
        }
        .card-body_hb {
            text-align: center;
            flex-grow: 1;
            padding: 15px;
        }
        .habitat-title_hb {
            margin-top: 30px;
        }
        .card-deck_hb {
            display: flex;
            flex-wrap: wrap;
            margin-left: -10px;
            margin-right: -10px;
        }
        .card-deck_hb .card_hb {
            flex: 1 1 calc(33.333% - 20px); /* Adjust to ensure 3 cards per row with some margin */
            margin: 10px;
            max-width: calc(33.333% - 20px); /* Adjust to ensure 3 cards per row with some margin */
        }
        @media (max-width: 768px) {
            .card-deck_hb .card_hb {
                flex: 1 1 calc(50% - 20px); /* Adjust to ensure 2 cards per row with some margin */
                max-width: calc(50% - 20px); /* Adjust to ensure 2 cards per row with some margin */
            }
        }
        @media (max-width: 576px) {
            .card-deck_hb .card_hb {
                flex: 1 1 calc(100% - 20px); /* Full width for small screens */
                max-width: calc(100% - 20px); /* Full width for small screens */
            }
        }
    </style>
</head>
<body>
    <div class="container-fluid container-fluid_hb">
        <div class="container">
            <?php
            include 'config2.php'; // Include the database configuration file

            try {
                $sql = "SELECT h.name as habitat, h.image as habitat_image, a.prenom, a.race, a.diet, a.description, a.characteristics, a.image as animal_image
                        FROM animals a
                        JOIN habitats h ON a.habitat_id = h.id
                        ORDER BY h.name";

                $stmt = $pdo->query($sql);
                $current_habitat = '';
                $first_row = true;

                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    if ($current_habitat != $row['habitat']) {
                        if (!$first_row) {
                            echo '</div></div>'; // Close the row for the previous habitat
                        }
                        $first_row = false;
                        $current_habitat = $row['habitat'];
                        echo '<div class="row habitat-title_hb">';
                        echo '<div class="col-12">';
                        echo '<h2 class="text-center">' . htmlspecialchars($row["habitat"]) . '</h2>';
                        if (!empty($row['habitat_image'])) {
                            echo '<div class="text-center"><img src="data:image/jpeg;base64,' . base64_encode($row['habitat_image']) . '" alt="' . htmlspecialchars($row["habitat"]) . ' Habitat" class="img-fluid mb-4" style="max-width: 400px;"/></div>';
                        }
                        echo '</div></div>'; // Close the row for the habitat title and image
                        echo '<div class="card-deck_hb">'; // Start a new card deck for the cards
                    }

                    echo '<div class="card_hb">';
                    if (!empty($row['animal_image'])) {
                        echo '<img src="data:image/jpeg;base64,' . base64_encode($row['animal_image']) . '" class="card-img-top" alt="' . htmlspecialchars($row["race"]) . '">';
                    }
                    echo '<div class="card-body_hb">';
                    echo '<h5 class="card-title">' . htmlspecialchars($row["prenom"]) . '</h5>';
                    echo '<p class="card-text"><strong>Species:</strong> ' . htmlspecialchars($row["race"]) . '</p>';
                    echo '<p class="card-text"><strong>Diet:</strong> ' . htmlspecialchars($row["diet"]) . '</p>';
                    echo '<p class="card-text"><strong>Description:</strong> ' . htmlspecialchars($row["description"]) . '</p>';
                    echo '<p class="card-text"><strong>Characteristics:</strong> ' . htmlspecialchars($row["characteristics"]) . '</p>';
                    echo '</div>';
                    echo '</div>';
                }
                echo '</div>'; // Close the last card deck
            } catch (PDOException $e) {
                echo 'Query failed: ' . $e->getMessage();
            }
            ?>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>
</html>
