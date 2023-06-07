<?php
$file = fopen("inprocess.csv","r");
$i=0;
require("config.php");
while (($line = fgetcsv($file)) !== FALSE) {
    //$line is an array of the csv elements
    //print_r($line);
    //Skipping Titles
    if($i==0)
    {
        $i++;
        continue;
    }
    //Insert User Data
    //
    //
    // 
    // 
    // 
    // 


    $query5="SELECT id,status_name,COUNT(1) FROM fee_status WHERE status_name = '$line[8]'";
    $result5=$db->query($query5);
    $row5=$result5->result_array();
    foreach($row5 as $rows5)
    {
      if($rows5["COUNT(1)"]==0)
      {
        $data["status_name"]=$line[8];
        $user_id = insertData('fee_status', $data);
      }
    }
// echo '$line[5]';
    $query6="SELECT id,destination_name,COUNT(1) FROM destination WHERE destination_name = '$line[5]'";
    $result6=$db->query($query6);
    $row6=$result6->result_array();
    foreach($row6 as $rows6)
    {
      if($rows6["COUNT(1)"]==0)
      {
        $data1["destination_name"]=$line[5];
        $user_id = insertData('destination', $data1);
      }
    }

    // for destionation 2
    $query8="SELECT id,destination_name,COUNT(1) FROM destination WHERE destination_name = '$line[13]'";
    $result8=$db->query($query8);
    $row8=$result8->result_array();
    foreach($row8 as $rows8)
    {
      if($rows8["COUNT(1)"]==0)
      {
        $data6["destination_name"]=$line[13];
        $user_id = insertData('destination', $data6);
      }
    }




    $query9="SELECT id,consultant_name,COUNT(1) FROM consultant WHERE consultant_name = '$line[6]'";
    $result9=$db->query($query9);
    $row9=$result9->result_array();
    foreach($row9 as $rows9)
    {
      if($rows9["COUNT(1)"]==0)
      {
        $data4["consultant_name"]=$line[6];
        $user_id = insertData('consultant', $data4);
      }
    }

    $query4="SELECT * FROM in_process";
    $result4=$db->query($query4);
    $row4=$result4->result_array();

    foreach($row5 as $rows5)
    {
      // echo $line[1];
        if($line[8]==$rows5["status_name"])
        {
            $userData["fee_status"]=$rows5["id"];
        }
    }
    
    foreach($row6 as $rows6)
    {
        if($line[5]==$rows6["destination_name"])
        {
            $userData["destination_1"]=$rows6["id"];
        }
    }


    // for destination 2
    foreach($row8 as $rows8)
    {
        if($line[13]==$rows8["destination_name"])
        {
            $userData["destination_2"]=$rows8["id"];
        }
    }


    foreach($row9 as $rows9)
    {
        if($line[6]==$rows9["consultant_name"])
        {
            $userData["counselor"]=$rows9["id"];
        }
    }
    // echo $userData["destination_1"]."<br>";
    $user_id = updateData('in_process', $userData,"id=".$line[0]);
  }
fclose($file);
?>
