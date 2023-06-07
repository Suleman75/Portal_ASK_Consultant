<?php
require("config.php");
$file = fopen("completed.csv","r");
$i=0;
while (($line = fgetcsv($file)) !== FALSE) 
{
    if($i==0)
    {
        $i++;
        continue;
    }
    $userData["id"]=$line[0];
    $userData["date"]=$line[1];
    $userData["full_name"]=$line[2];
    $userData["phone"]=$line[3];
    $userData["country"]=$line[4];
    $userData["course"]=$line[5];
    $userData["university"]=$line[6];
    $userData["consultant"]=$line[7];
    $userData["brand"]=$line[8];
    $userData["intake"]=$line[9];
    $userData["notes"]=$line[10];
    $userData["visa_status"]=$line[11];
    $userData["comments"]=$line[12];
    $user_id = insertData('completed', $userData);
    
}
fclose($file);
?>
