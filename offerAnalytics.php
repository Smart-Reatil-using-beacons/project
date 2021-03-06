<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">

    <!--Jquery-->
    <script src="js/jquery-2.1.4.min.js"></script>
    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="css/materialize.min.css">
    <!-- Compiled and minified JavaScript -->
    <script src="js/materialize.min.js"></script>
    <!--Icon Files-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <title>Smart Store Management</title>

    <style>
        body {
            display: flex;
            min-height: 100vh;
            flex-direction: column;
        }

        main {
            flex: 1 0 auto;
        }
    </style>
</head>

<body>

<nav>
    <div class="nav-wrapper light-blue darken-1">
        <a href="#" class="brand-logo"><img src="logo/logo.png" class="" style="margin-top: 8px; margin-left:8px;" height="50px"/></a>


        <ul id="nav-mobile" class="right hide-on-med-and-down">
            <li><a href="beacons.php">Check Beacons</a></li>
            <li><a href="analyze.php">Analyzed Data</a></li>
            <li><a href="inventory.php">Inventory Status</a></li>
        </ul>
    </div>
</nav>

<main>
    <?php
   // exec('"C:\Program Files\R\R-3.2.1\bin\Rscript.exe" C:\xampp\htdocs\Wipro-Hackathon\R_scripts\sales.R"', $output, $return);
    //Showing Output Images
    echo "<center>";
    echo "Graphs </br>";
    echo "<img src='R_scripts/graphs/cat.png' class='plot'><br>";
    echo "</center>";
    ?>
</main>

<footer class="page-footer light-blue darken-1">
    <div class="container">
        <div class="row">
            <div class="col l6 s12">
                <h5 class="white-text">Smart Retail Managment</h5>
                <p class="grey-text text-lighten-4">Single Control Point for Managing the Beacons on Shelf and Getting the data</p>
            </div>

        </div>
    </div>
    <div class="footer-copyright">
        <div class="container">
            � 2014 Copyright for Wipro Hackathon
            <a class="grey-text text-lighten-4 right" href="#!">Contact Us</a>
        </div>
    </div>
</footer>


</body>

</html>