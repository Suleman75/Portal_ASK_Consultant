<?php
require("config.php");
$file = fopen("inprocess.csv","r");
$i=0;
while (($line = fgetcsv($file)) !== FALSE) 
{
    if($i==0)
    {
        $i++;
        continue;
    }
    $userData["id"]=$line[0];
    $userData["case_assign_date"]=$line[1];
    $userData["name"]=$line[2];
    $userData["phone"]=$line[3];
    $userData["email"]=$line[4];
    $userData["destination_1"]=$line[5];
    $userData["counselor"]=$line[6];
    $userData["comments"]=$line[7];
    $userData["fee_status"]=$line[8];
    $userData["admin"]=$line[9];
    $userData["university_1"]=$line[10];
    $userData["outcome_destination_1"]=$line[11];
    $userData["case_status_1"]=$line[12];
    $userData["destination_2"]=$line[13];
    $userData["case_handler_2"]=$line[14];
    $userData["university_2"]=$line[15];
    $userData["outcome_destination_2"]=$line[16];
    $userData["case_status_2"]=$line[17];
    $userData["course"]=$line[18];
    $userData["intake"]=$line[19];
    $userData["missing_docs"]=$line[20];
    $userData["final_comments"]=$line[21];
    $user_id = insertData('in_process', $userData);
    
}
fclose($file);
?>
