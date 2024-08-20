<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Zoo Website</title>
    <link rel="stylesheet" href="ric2.css">
</head>

<body>
    <header class="header">
        <a href="home.php" class="logo">
            <img src="ide-verte.png" alt="Zoo Logo">
            <span class="logo-text">Zoo Arcadia</span>
        </a>
        <nav class="nav-bar">
            <a href="services.php"><u>Services</u></a>
            <a href="haby.php"><u>Habitats</u></a>
            <a href="reservations.php"><u>Infos et Réservations</u></a>
            <a href="#"><u>Contactez Nous</u></a>
            <div class="separator"></div>
            <a href="employees.php" class="nav-link special-button">Employés</a>
        </nav>

        <!-- Burger icon for mobile -->
        <div class="burger-container">
            <div class="burger-icon" onclick="toggleMenu()">
                <div class="bar"></div>
                <div class="bar"></div>
                <div class="bar"></div>
            </div>
        </div>

    </header>
    <script>
        function toggleMenu() {
            var navBar = document.querySelector('.nav-bar');
            navBar.classList.toggle('open');
        }
    </script>
</body>

</html>