<?php
require("config.php");
$file = fopen("inquiry1.csv","r");
$i=0;
$userData=array();
while (($line = fgetcsv($file)) !== FALSE) {
    //$line is an array of the csv elements
    // print_r($line);
    if($i==0)
    {
        $i++;
        continue;
    }
    // $userData["id"]=$line[6];
    array_push($userData,$line[9]);
    // $user_id = insertData('user_info', $userData);
    // echo $line[3]."<br>";
  }
  
  $unique=array_unique($userData);
  $data["consultant_name"]="";
  var_dump($unique);
  foreach($unique as $uni)
  {
    $data["consultant_name"]=$uni;
    insertData('consultant', $data);
  }
fclose($file);
?>
