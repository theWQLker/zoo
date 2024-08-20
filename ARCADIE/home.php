<?php
include("head.php"); // Database configuration
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to Our Zoo</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="ric2.css">
</head>

<body>
    <!-- Navbar

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">Our Zoo</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="#">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Animals</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Habitats</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Contact Us</a>
                </li>
            </ul>
        </div>
    </nav> -->

    <!-- Hero Section -->
    <section class="hero text-center text-light d-flex align-items-center justify-content-center">
        <div class="hero-content">
            <h1 class="display-4">Welcome to Our Zoo</h1>
            <p class="lead">Discover a world of animals, nature, and adventure!</p>
            <a href="haby.php" class="btn btn-primary btn-lg mt-3">Explore Our Animals</a>
        </div>
    </section>

    <!-- About the Zoo Section -->
    <section class="about py-5">
        <div class="container text-center">
            <h2 class="display-4 mb-4">About Our Zoo</h2>
            <p class="lead">Our zoo is home to a wide variety of animals from all around the globe. We strive to create a safe, enriching environment for both our animals and visitors. Visit us and experience the magic of wildlife up close.</p>
        </div>
    </section>

    <!-- Featured Animals Section -->
    <section id="animals" class="featured-animals py-5 bg-light">
        <div class="container">
            <h2 class="text-center display-4 mb-4">Meet Our Featured Animals</h2>
            <div class="row">
                <?php
                // Connect to the database
                include 'config2.php';

                // Query to select 3 random animals
                $sql = "SELECT prenom, race, description, image FROM animals ORDER BY RAND() LIMIT 3";
                $stmt = $pdo->query($sql);

                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    echo '<div class="col-md-4 mb-4">';
                    echo '<div class="card">';
                    echo '<img src="data:image/jpeg;base64,' . base64_encode($row['image']) . '" class="card-img-top" alt="' . htmlspecialchars($row['race']) . '" style="object-fit: contain; height: 200px;">';
                    echo '<div class="card-body">';
                    echo '<h5 class="card-title">' . htmlspecialchars($row['prenom']) . '</h5>';
                    echo '<p class="card-text">' . htmlspecialchars($row['description']) . '</p>';
                    echo '</div>';
                    echo '</div>';
                    echo '</div>';
                }
                ?>
            </div>
        </div>
    </section>

    <!-- Visit Us Section -->
    <section class="visit-us py-5">
        <div class="container text-center">
            <h2 class="display-4 mb-4">Plan Your Visit</h2>
            <p class="lead">Our zoo is open every day from 9 AM to 6 PM. Come and explore the wild! Get your tickets online or at the gate.</p>
            <a href="#" class="btn btn-success btn-lg mt-3">Buy Tickets Now</a>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-dark text-light py-3">
        <div class="container text-center">
            <p>&copy; 2024 Our Zoo. All Rights Reserved.</p>
        </div>
    </footer>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>

</html>
