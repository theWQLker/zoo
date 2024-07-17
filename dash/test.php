<?php

// $stringOne = 'my email is ';
// $stringTwo = 'lomabril93@gmail.com';
// $name = ' Bril ';
// echo $stringOne .''. $stringTwo .'';


// echo "the boy sayed \"i'm done\"";

// echo $name[0];
// echo strlen($name);
// echo strtoupper($name);
// echo strtolower($name);
// echo str_replace("b","i", $name);
$radius = 63;
$pi = 3.14;
// basic = *, /, +, -, **
// echo $pi * $radius **2
// order of operations (B I D M A S)




// include("templates/header.php");
// include "templates/footer.php";
// echo 'end of php inclusion';

// require("content.php");
// echo 'end of php inclusion';


// $conn = mysqli_connect("localhost", "john", "toto-php", "pizza") or die(mysqli_error($conn));

// if (!$conn) {
//    echo "connection error";
// }

$host = "locashost";
$port = "3307";
$dbname ="pizza";
$username = 'john';
$password = 'toto-php';


$dsn = 'mysql:host=$host;dbname=$dbname';


// write query for all pizzas
$sql = 'SELECT title, ingredients, id FROM pizza ORDER BY created_at';

// get the result set (set of rows)
$result = mysqli_query($conn, $sql);

// fetch the resulting rows as an array
$pizzas = mysqli_fetch_all($result, MYSQLI_ASSOC);

// free the $result from memory (good practise)
mysqli_free_result($result);

// close connection
mysqli_close($conn);










?>










<!DOCTYPE html>
<html>

<head>

   <?php include("templates/header.php"); ?>
   <h4 class="center black-text">Pizzas!</h4>


   <?php include("templates/footer.php"); ?>

   <div class="container">
        <table>
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Ingredients</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($pizzas as $pizza) : ?>
                    <tr>
                        <td><?php echo htmlspecialchars($pizza['title']); ?></td>
                        <td>
                            <ul>
                                <?php foreach (explode(',', $pizza['ingredients']) as $ing) : ?>
                                    <li><?php echo htmlspecialchars($ing); ?></li>
                                <?php endforeach; ?>
                            </ul>
                        </td>
                        <td><a class="brand-text" href="#">more info</a></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

        <?php if (count($pizzas) >= 3) : ?>
            <p class="center">There are more than 3 pizzas</p>
        <?php else : ?>
            <p class="center">There are fewer than 3 pizzas</p>
        <?php endif; ?>
    </div>


</head>

<body>

</body>

</html>