<?php
$file = fopen("inprocess.csv","r");
$i=0;
while (($line = fgetcsv($file)) !== FALSE) {
    //$line is an array of the csv elements
    // print_r($line);
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


    $query5="SELECT COUNT(1) FROM lead_priority WHERE priority_name = '$line[1]'";
    $result5=$db->query($query5);
    $row5=$result5->result_array();
    foreach($row5 as $rows5)
    {
      if($rows5["COUNT(1)"]==0)
      {
        $data["priority_name"]=$line[1];
        $user_id = insertData('lead_priority', $data);
      }
    }

    $query6="SELECT COUNT(1) FROM source WHERE source_name = '$line[5]'";
    $result6=$db->query($query6);
    $row6=$result6->result_array();
    foreach($row6 as $rows6)
    {
      if($rows6["COUNT(1)"]==0)
      {
        $data1["source_name"]=$line[5];
        $user_id = insertData('source', $data1);
      }
    }

    $query9="SELECT COUNT(1) FROM consultant WHERE consultant_name = '$line[6]'";
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

    $query4="SELECT * FROM consultant";
    $result4=$db->query($query4);
    $row4=$result4->result_array();

    foreach($row as $rows)
    {
      // echo $line[1];
        if($line[1]==$rows["priority_name"])
        {
            $userData["priority_id"]=$rows["id"];
        }
    }
    
    foreach($row4 as $rows4)
    {
        if($line[9]==$rows4["consultant_name"])
        {
            $userData["consultant_id"]=$rows4["id"];
        }
    }

    foreach($row4 as $rows4)
    {
        if($line[5]==$rows4["consultant_name"])
        {
            $userData["consultant_id"]=$rows4["id"];
        }
    }

    $user_id = updateData('in_process', $userData);


    










  }
fclose($file);
?>
