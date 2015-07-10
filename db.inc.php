<?php
/**
 * Created by IntelliJ IDEA.
 * User: PARMINDER
 * Date: 7/10/2015
 * Time: 15:54
 */

define("HOST", "localhost");
// Database user
define("DBUSER", "root");
// Database password
define("PASS", "");
// Database name
define("DB", "smartretail");
$conn = mysql_connect(HOST, DBUSER, PASS) or  die('Could not connect !<br />Please contact the site\'s administrator.');
$db = mysql_select_db(DB) or  die('Could not connect to database !<br />Please contact the site\'s administrator.');

?>
