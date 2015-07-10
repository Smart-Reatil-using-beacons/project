<?php
include "db.inc.php";
/**
 * Created by IntelliJ IDEA.
 * User: PARMINDER
 * Date: 7/10/2015
 * Time: 17:11
 */
 $counter=0;
 $userId=$_REQUEST["userid"];
 $uuid=$_REQUEST["beacon"];

 //finding catg id from beacon uuid
 $query="select categoryId from beacons where uuid='".$uuid."'";
 $query=mysql_query($query)or die(mysql_error());
 $result=mysql_fetch_assoc($query)or die(mysql_error());
 $categoryId=$result['categoryId'];

//finding list of products comes under the above categoryId
 $query="select id from inventory where category =".$categoryId;
 $query=mysql_query($query);
 while($result=mysql_fetch_assoc($query)){
     $a[$counter]=$result['id'];
     $counter++;
 }
 //$a array have the product list availble under that $categoryId

 //now checking which all product user has in his/her past history
 $query="select pastSale from user where email='".$userId."'";
 $query=mysql_query($query);
 $result=mysql_fetch_assoc($query);
 $sales=explode(",",$result['pastSale']);
 $counter=0;
 $array=array();
 $posts=array();
 for($i=0;$i<count($sales);$i++){
     $product=explode("-",$sales[$i]);
     if(in_array($product[1],$a)){
         //fetching the offer value from table
         $query="select offer from inventory where id =".$product[1];
         $query=mysql_query($query);
         $result=mysql_fetch_assoc($query);
         $offer[$counter]=$result['offer'];
//         $array[$counter]=$offer[$counter];
         $posts[] = array('offer'=> $offer[$counter]);
         $counter++;
     }
 }

echo json_encode($posts);

?>