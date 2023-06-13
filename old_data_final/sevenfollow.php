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
    $followupdata["user_id"]=$line[0];
    $followupdata["follow_up_date"]=$line[48];
    $followupdata["follow_up_number"]=7;
    $follow_up_id = insertData('follow_up_info', $followupdata);
}