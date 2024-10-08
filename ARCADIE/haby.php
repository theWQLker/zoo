<!DOCTYPE html>
<html lang="en">
<?php
include("head.php"); // inclusion du header
?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Zoo Animals</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
        <link rel="stylesheet" href="ric2.css">


    <style>
        .back {
            background-image:url('./abstract-2684425_1920.jpg');
        }

        .card_hb {
            margin: 10px;
            display: flex;
            flex-direction: column;
            border: 1px solid #ddd;
            border-radius: 5px;
            background-color: #fff;
        }

        .card_hb img {
            width: 100%;
            height: auto;
            max-height: 220px;
            object-fit: cover;
        }

        .card-body_hb {
            text-align: center;
            flex-grow: 1;
            padding: 15px;
        }

        .habitat-title_hb {
            margin-top: 30px;
            color:#ddf;
            font-size: 40px;
            font-weight: bold;
        }

        .habitat-image {
            display: block;
            width: 100%;
            height: auto;
            object-fit: cover;
            max-height: 360px;
            margin-bottom: 20px;
        }

        .card-deck_hb {
            display: flex;
            flex-wrap: wrap;
            margin-left: -10px;
            margin-right: -10px;
        
        }

        .card-deck_hb .card_hb {
            flex: 1 1 calc(33.333% - 20px);
            margin: 10px;
            max-width: calc(33.333% - 20px);
        }

        @media (max-width: 768px) {
            .card-deck_hb .card_hb {
                flex: 1 1 calc(50% - 20px);
                max-width: calc(50% - 20px);
            }
        }

        @media (max-width: 576px) {
            .card-deck_hb .card_hb {
                flex: 1 1 calc(100% - 20px);
                max-width: calc(100% - 20px);
            }
        }

        .text-center {
            text-align: center;
        }

        h2 {
            margin-bottom: 20px;
        }

        h5 {
            font-size: 1.25rem;
            font-weight: bold;
            margin-bottom: 5px;
        }

        .animal-info {
            font-size: 1rem;
            font-weight: normal;
            color: #555;
        }
    </style>
</head>

<body>
    <div class="container back" style="padding-left: 25px;">
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
                        echo '</div>'; // Close the card deck for the previous habitat
                    }
                    $first_row = false;
                    $current_habitat = $row['habitat'];

                    // Start a new habitat section
                    echo '<div class="row habitat-title_hb">';
                    echo '<div class="col-12">';
                    echo '<p class="text-center">' . htmlspecialchars($row["habitat"]) . '</p>';
                    if (!empty($row['habitat_image'])) {
                        echo '<div class="text-center"><img src="data:image/jpeg;base64,' . base64_encode($row['habitat_image']) . '" alt="' . htmlspecialchars($row["habitat"]) . ' Habitat" class="habitat-image" /></div>';
                    }
                    echo '</div></div>'; // Close the row for the habitat title and image

                    // Start a new card deck for the cards
                    echo '<div class="card-deck_hb">';
                }

                // Card content (for animals)
                echo '<div class="card_hb">';
                echo '<img src="data:image/jpeg;base64,' . base64_encode($row['animal_image']) . '" alt="' . htmlspecialchars($row["prenom"]) . '" />';
                echo '<div class="card-body_hb">';
                // Display name in bold and large, with race and diet in normal weight
                echo '<h5>' . htmlspecialchars($row["prenom"]) . '</h5>';
                echo '<p class="animal-info">(' . htmlspecialchars($row["race"]) . ' - ' . htmlspecialchars($row["diet"]) . ')</p>';
                // Display description
                echo '<p>' . htmlspecialchars($row["description"]) . '</p>';
                // Display characteristics without label
                echo '<p>' . htmlspecialchars($row["characteristics"]) . '</p>';
                echo '</div>';
                echo '</div>';
            }

            echo '</div>'; // Close the last card deck
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
        ?>
    </div>
</body>

</html>
