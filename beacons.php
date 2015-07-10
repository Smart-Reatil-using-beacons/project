<?php
include('db.inc.php');
?><!DOCTYPE html>
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

    <title>Inventory</title>
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
            <li class="active"><a href="inventory.php">Inventory Status</a></li>
        </ul>
    </div>
</nav>

<main class="container">


    <div class="row"></div>
    <div class="row"></div>
    <div class="row"></div>

    <div class="row">
        <div class="col s12 m12 l12">
        </div>
    </div>
    <div class="row">
        <div class="col s12 m12 s12 center-align"><p class="flow-text">Select one of your Store Product Category</p></div>
    </div>
    <div class="row">
        <?php
        $query = "select name,health from category";
        $query=mysql_query($query)or die(mysql_error());
        while($result=mysql_fetch_assoc($query)){
            $name=$result['name'];
            $health=$result['health'];
            $link="getShelf.php?cat=".$result['name'];
            ?>
            <div class="col s3 m3 l3">
                <div class="card-panel teal">
                    <span class="white-text">
                        <p class="flow-text"><b><?php echo $name;?></b></p>
                        <b>Overall Health:</b> <?php echo $health; ?>%
                        <div class="progress">
                            <div class="determinate yellow" style="width: 40%"></div>
                        </div>
                        <div class="card-action">
                            <p><a class="yellow-text accent-4" href=<?php echo $link; ?>>View Detailed Status</a></p>
                        </div>
                    </span>
                </div>
            </div>
        <?php }?>
    </div>



</main>

<!--Dropdowns-->
<!-- Dropdown Structure -->
<ul id='dropdown1' class='dropdown-content'>
    <li><a href="viewInventory.php">Chips</a></li>
    <li><a href="viewInventory.php">Deodrants</a></li>
    <li><a href="viewInventory.php">Juices</a></li>
    <li><a href="viewInventory.php">Bathing Soaps</a></li>
</ul>

<footer class="page-footer light-blue darken-1">
    <div class="container">
        <div class="row">
            <div class="col l6 s12">
                <h5 class="white-text">My Smart Shelf Manager</h5>
                <p class="grey-text text-lighten-4">Single Control Point for Managing the Beacons on Shelf and Getting the data</p>
            </div>

        </div>
    </div>
    <div class="footer-copyright">
        <div class="container">
            © 2014 Copyright Text
            <a class="grey-text text-lighten-4 right" href="#!">More Links</a>
        </div>
    </div>
</footer>

</body>
<script>
    $('.dropdown-button').dropdown({
            inDuration: 300,
            outDuration: 225,
            constrain_width: true, // Does not change width of dropdown to that of the activator
            hover: true, // Activate on hover
            gutter: 0, // Spacing from edge
            belowOrigin: true // Displays dropdown below the button
        }
    );
</script>
</html>