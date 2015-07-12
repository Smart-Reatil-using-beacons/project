<?php
 include('db.inc.php');
error_reporting(0);
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

    <title>Store Manager</title>
    <script>
        function showCoords(event) {
            var x = event.clientX;
            var y = event.clientY;
            var coords = "X coords: " + x + ", Y coords: " + y;
            document.getElementById("demo").innerHTML = coords;
        }
    </script>

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
            <li class="active"><a href="analyze.php">Analyzed Data</a></li>
            <li><a href="inventory.php">Inventory Status</a></li>
        </ul>
    </div>
</nav>

<main class="container">

    <div class="row" >
</br></br></br>
  <center>
   <img src="images/map2.png" usemap="#planetmap" >
      <?php
      function getInfo($id)
      {
          $sales=0;
          $query = "select offers from category where id=".$id;
          $query = mysql_query($query);
          while ($result = mysql_fetch_assoc($query)) {
              $offer = explode(",", $result['offers']);
              for ($i = 0; $i < count($offer); $i++) {
                  $array = explode("-", $offer[$i]);
                  // $array[0] means userid
                  // $array[1] means productname
                  // $array[2] means Y/N

                  if($array[2] && $array[2]=='y'){
                     $sales++;
                  }
              }

          }
          echo "Offers Send : ".($i-1);
          echo "\nConverted to Sales : ".$sales;
      }
      ?>
      <map name="planetmap">
          <area shape="rect" coords="0,0,255,85" alt="Mobiles"  title="<?php getInfo(3); ?>">
          <area shape="rect" coords="306,0,415,367" alt="Grocery" title="<?php getInfo(5); ?>">
          <area shape="rect" coords="0,200,78,367" alt="Juice" title="<?php getInfo(2); ?>">
          <area shape="rect" coords="0,110,175,172" alt="Laptop" title="<?php getInfo(4); ?>">
          <area shape="rect" coords="118,232,258,364" alt="Deo" title="<?php getInfo(1); ?>">
      </map>
  </center>


    </div>
    <p id="demo"></p>
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
