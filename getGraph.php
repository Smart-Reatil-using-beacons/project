<?php
include "db.inc.php";
/**
 * Created by IntelliJ IDEA.
 * User: PARMINDER
 * Date: 7/10/2015
 * Time: 18:36
 */
  $array=array();
  $query="select offers from category" ;
  $query=mysql_query($query);
  while($result=mysql_fetch_assoc($query)){
      $offer=explode(",",$result['offers']);
      for($i=0;$i<count($offer);$i++){
          $array=explode("-",$offer[$i]);
        // $array[0] means userid
        // $array[1] means productid
        // $array[2] means Y/N
          $string=$array[0].",".$array[1].",".$array[2];
          $file = fopen("cat.csv","a");
          fputcsv($file,explode(',',$string));
        }

      fclose($file);
 }



?>