<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Website Title</title>
    <link rel="stylesheet" href="ric.css">
    <style>
        /* Additional styles specific to this header.php can go here */
    </style>
</head>
<body>

<header class="header">
    <div class="logo">
        <a href="head.php" class="logo">
            <img src="images\ide-verte.png" alt="Zoo Logo">
            <span class="logo-text">Zoo Arcadia</span>
        </a>
    </div>

    <nav class="nav-bar">
        <a href="#" class="nav-link">Services</a>
        <a href="#" class="nav-link">Habitats</a>
        <a href="#" class="nav-link">Infos et Réservations</a>
        <div class="separator"></div>
        <a href="#" class="nav-link special-button">Employés</a>
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
