<?php
   include('db.inc.php');
?>
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

    <title>View Inventory</title>
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

    <main class="container">

        <!--Example for Buiscuits-->
        <!--Images are in ProductLogos/Buiscuits/*.png-->
        <div class="row">

            <?php
               if($_REQUEST['cat']) {
                   $cat = $_REQUEST['cat'];
                   $query = "select * from inventory where category= '" . $cat . "'";
               }
               else
                   $query="select * from inventory";

                $query=mysql_query($query)or die(mysql_error());
                while($result=mysql_fetch_assoc($query)){
                    $image="images/product/".$result['link'];
                    $name=$result['name'];
                    $left=$result['left'];
                    $salesRate=$result['salesRate'];

            ?>
            <div class="col s4 m3 l3">
                <div class="card">
                    <div class="card-image">
                        <img src=<?php echo $image; ?>>
                    </div>
                    <div class="card-content">
                        <p>
                        <p class="flow-text"><b><?php echo $name;?></b></p>
                        <br>
                        <b>Inventory Left:</b> <?php echo $left;?>pieces
                        <div class="progress">
                            <div class="determinate red" style="width: 40%"></div>
                        </div>
                        <br>
                        <b>Current Sale Rate:</b> <?php $salesRate;?> pieces/hr
                        <div class="progress">
                            <div class="determinate yellow accent-4" style="width: 40%"></div>
                        </div>
                        </p>
                    </div>
                </div>
            </div>
            <?php }
            ?>
      </div>

        <!--End of Example for Buiscuits-->

    </main>

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
</html>