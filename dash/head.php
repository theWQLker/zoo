<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Zoo Website</title>
    <link rel="stylesheet" href="style000.css">
</head>

<body>
    <header class="header">
        <a href="head.php" class="logo">
            <img src="images\ide-verte.png" alt="Zoo Logo">
            <span class="logo-text">Zoo Arcadia</span>
        </a>
        <nav class="nav-bar">
            <a href="services.php"><u>Services</u></a>
            <a href="habitats.php"><u>Habitats</u></a>
            <a href="reservations.php"><u>Infos et Réservations</u></a>
            <div class="separator"></div>
            <a href="employees.php" class="special-button">Employés</a>
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
    <!-- <script>
        function toggleMenu() {
            var navBar = document.querySelector('.nav-bar');
            navBar.classList.toggle('open');
        }
    </script> -->
</body>

</html>