<?php
$file = fopen("inprocess.csv","r");
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
    $query5="SELECT COUNT(1) FROM case_status WHERE status_name = '$line[12]'";
    $result5=$db->query($query5);
    $row5=$result5->result_array();
    foreach($row5 as $rows5)
    {
      if($rows5["COUNT(1)"]==0)
      {
        $data["status_name"]=$line[12];
        $user_id = insertData('case_status', $data);
      }
    }
    $query6="SELECT COUNT(1) FROM case_status WHERE status_name = '$line[17]'";
    $result6=$db->query($query6);
    $row6=$result6->result_array();
    foreach($row6 as $rows6)
    {
      if($rows6["COUNT(1)"]==0)
      {
        $data1["status_name"]=$line[17];
        $user_id = insertData('case_status', $data1);
      }
    }
    $query="SELECT * FROM case_status";
    $result=$db->query($query);
    $row=$result->result_array();
    foreach($row as $rows)
    {
      // echo $line[1];
        if($line[12]==$rows["status_name"])
        {
            $userData["case_status_1"]=$rows["id"];
        }
    }
    foreach($row as $rows)
    {
      // echo $line[1];
        if($line[17]==$rows["status_name"])
        {
            $userData["case_status_2"]=$rows["id"];
        }
    }
    // $followupdata["case_status_1"]=$line[12];
    // $followupdata["case_status_2"]=$line[17];

    $follow_up_id = updateData('in_process', $userData,"id=".$line[0]);
}