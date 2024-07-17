<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Zoo Website</title>
    <link rel="stylesheet" href="style.css">
    <style>
        .header {
            background-color: #fff;
            padding: 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-bottom: 2px solid #006400;
        }

        .logo {
            display: flex;
            align-items: center;
        }

        .logo img {
            height: 50px;
            margin-right: 10px;
        }

        .logo-text {
            font-size: 24px;
            font-weight: bold;
            color: #006400;
            text-decoration: none;
        }

        .nav-bar {
            display: flex;
            align-items: center;
        }

        .nav-bar a {
            text-decoration: none;
            color: #333;
            padding: 10px 20px;
            font-size: 18px;
        }

        .nav-bar a:hover {
            background-color: #f0f5f5;
            border-radius: 5px;
        }

        .nav-bar .special-button {
            margin-left: 20px;
            background-color: #006400;
            color: white;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
        }

        .nav-bar .special-button:hover {
            background-color: #004d00;
        }
    </style>
</head>
<body>
    <header class="header">
        <a href="index.php" class="logo">
            <img src="path/to/logo.png" alt="Zoo Logo">
            <span class="logo-text">Zoo Website</span>
        </a>
        <nav class="nav-bar">
            <a href="services.php">Services</a>
            <a href="habitats.php">Habitats</a>
            <a href="reservations.php">Infos et Réservations</a>
            <a href="employees.php" class="special-button">Employés</a>
        </nav>
    </header>
</body>
</html>
