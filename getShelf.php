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

    <title>Shelf Details</title>
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

        <div class="row">

            <div class="col s2 m2 l2">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</div>
            <div class="col s8 m8 l8">

                <div class="card-panel teal">
                    <?php
                        $query = "select name,health,id from category where name='".$_REQUEST['cat']."'";
                        $query=mysql_query($query)or die(mysql_error());
                        while($result=mysql_fetch_assoc($query)){
                        $name=$result['name'];
                        $health=$result['health'];
                        $id=$result['id'];
                    ?>
                    <!--header-->
                  <div class="white-text">
                      <h5>Beacon Health: <?php echo $name; ?> </h5>

                  </div>
                    <!--end of header-->

                    <!--Beacon online and offline-->
                  <div class="white-text">

                      Beacons Online: 1
                      <div class="progress">
                          <div class="determinate green" style="width: 70%"></div>
                      </div>
                      <br>
                      Total Inventory Left: <?php echo $health;?>%
                      <div class="progress">
                          <div class="determinate yellow" style="width: 40%"></div>
                      </div>

                      <br>


                      <div class="row">
                          <?php
                          $query = "select uuid,health from beacons where categoryId=".$id;
                          $query=mysql_query($query)or die(mysql_error());
                          while($result2=mysql_fetch_assoc($query)){
                          $uuid=$result2['uuid'];
                          $health2=$result2['health']
                          ?>
                          <div class="col s4 m4 l4">
                              <div class="card-panel white">
                              <span class="black-text" style="font-size:12px;">
                                  <b>Beacon UUID:</b><br><?php echo $uuid; ?>
                                  <b>Beacon Life left:</b> <?php echo $health2?>%
                                  <div class="progress">
                                      <div class="determinate green" style="width: <?php echo $health2; ?> %"></div>
                                  </div>


                              </span>
                              </div>
                          </div>

                          <?php } ?>
                      </div>


                  </div>
                    <?php } ?>
                    <!--end of main content-->

                </div>

            </div>
            <div class="col s2 m2 l2">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</div>

        </div>

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