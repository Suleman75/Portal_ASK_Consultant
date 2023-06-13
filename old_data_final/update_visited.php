<?php
$file = fopen("test3.csv","r");
require("config.php");
$i=0;
$remove="-!@#$%^&*()=+][{};':/.,<>";
while (($line = fgetcsv($file)) !== FALSE) {
    //$line is an array of the csv elements
    // print_r($line);
    //Skipping Titles
    if($i==0)
    {
        $i++;
        continue;
    }
    $followupdata["visited"]=$line[8];
    $follow_up_id = updateData('user_info', $followupdata,"id=".$line[0]);
}