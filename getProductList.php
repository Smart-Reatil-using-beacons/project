<?php
include "db.inc.php";
/**
 * Created by IntelliJ IDEA.
 * User: PARMINDER
 * Date: 7/10/2015
 * Time: 19:55
 */
$sql="select name,barcode from inventory ";
$posts = array();
$result=mysql_query($sql)or die(mysql_error());
while($row=mysql_fetch_array($result))
{
    $name=$row['name'];
    $barcode=$row['barcode'];
    $posts[] = array('pname'=> $name,'barcode'=>$barcode);


}

//$response['products'] = $posts;

$fp = fopen('results.json', 'w');
fwrite($fp, json_encode($posts));
fclose($fp);


?>