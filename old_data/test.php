<?php
$file = fopen("inquiry1.csv","r");
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

    $query7="SELECT COUNT(1) FROM inquiry_form_location WHERE inquiry_location = '$line[8]'";
    $result7=$db->query($query7);
    $row7=$result7->result_array();
    foreach($row7 as $rows7)
    {
      if($rows7["COUNT(1)"]==0)
      {
        $data2["inquiry_location"]=$line[8];
        $user_id = insertData('inquiry_form_location', $data2);
      }
    }

    $query8="SELECT COUNT(1) FROM country WHERE country_name = '$line[6]'";
    $result8=$db->query($query8);
    $row8=$result8->result_array();
    foreach($row8 as $rows8)
    {
      if($rows8["COUNT(1)"]==0)
      {
        $data3["country_name"]=$line[6];
        $user_id = insertData('country', $data3);
      }
    }

    $query9="SELECT COUNT(1) FROM consultant WHERE consultant_name = '$line[9]'";
    $result9=$db->query($query9);
    $row9=$result9->result_array();
    foreach($row9 as $rows9)
    {
      if($rows9["COUNT(1)"]==0)
      {
        $data4["consultant_name"]=$line[9];
        $user_id = insertData('consultant', $data4);
      }
    }
    $query="SELECT * FROM lead_priority";
    $result=$db->query($query);
    $row=$result->result_array();

    $query1="SELECT * FROM source";
    $result1=$db->query($query1);
    $row1=$result1->result_array();

    $query2="SELECT * FROM inquiry_form_location";
    $result2=$db->query($query2);
    $row2=$result2->result_array();

    $query3="SELECT * FROM country";
    $result3=$db->query($query3);
    $row3=$result3->result_array();

    $query4="SELECT * FROM consultant";
    $result4=$db->query($query4);
    $row4=$result4->result_array();



    $userData["id"]=$line[0];
    foreach($row as $rows)
    {
      // echo $line[1];
        if($line[1]==$rows["priority_name"])
        {
            $userData["priority_id"]=$rows["id"];
        }
    }
    $userData["apply_date"]=$line[2];
    $userData["full_name"]=$line[3];
    $userData["phone_number"]=$line[4];
    $userData["visited"]=$line[7];
    foreach($row1 as $rows1)
    {
        if($line[5]==$rows1["source_name"])
        {
            $userData["apply_source_id"]=$rows1["id"];
        }
    }
    foreach($row3 as $rows3)
    {
      // echo $line[6];
        if($line[6]==$rows3["country_name"])
        {
            $userData["country_id"]=$rows3["id"];
        }
    }
    foreach($row2 as $rows2)
    {
        if($line[8]==$rows2["inquiry_location"])
        {
            $userData["inquiry_form_location_id"]=$rows2["id"];
        }
    }
    foreach($row4 as $rows4)
    {
        if($line[9]==$rows4["consultant_name"])
        {
            $userData["consultant_id"]=$rows4["id"];
        }
    }
    $userData["qualification"]=$line[10];
    $userData["comments"]=$line[11];
    $userData["budget"]=$line[12];
    $user_id = insertData('user_info', $userData);



    //Insert 1st Follow Up Info,  Last index was 12
    //
    //
    // 
    // 
    // 
    // 
    
    $line[21]=str_replace($remove,"",$line[21]);
    $line[19]=str_replace($remove,"",$line[19]);
    $query11="SELECT COUNT(1) FROM call_outcome WHERE outcome_name = '$line[19]'";
    $result11=$db->query($query11);
    $row11=$result11->result_array();
    foreach($row11 as $rows11)
    {
      if($rows11["COUNT(1)"]==0)
      {
        $data5["outcome_name"]=$line[19];
        $user_id = insertData('call_outcome', $data5);
      }
    }
    
    $query13="SELECT COUNT(1) FROM follow_up_action WHERE action_name = '$line[21]'";
    $result13=$db->query($query13);
    $row13=$result13->result_array();
    foreach($row13 as $rows13)
    {
      if($rows13["COUNT(1)"]==0)
      {
        $data6["action_name"]=$line[21];
        $user_id = insertData('follow_up_action', $data6);
      }
    }
    $query10="SELECT * FROM call_outcome";
    $result10=$db->query($query10);
    $row10=$result10->result_array();

    $query12="SELECT * FROM follow_up_action";
    $result12=$db->query($query12);
    $row12=$result12->result_array();
    
    foreach($row10 as $rows10)
    {
        if($line[19]==$rows10["outcome_name"])
        {
            $followupdata["follow_up_outcome_id"]=$rows10["id"];
        }
    }
    foreach($row12 as $rows12)
    {
        if($line[21]==$rows12["action_name"])
        {
            $followupdata["follow_up_action_id"]=$rows12["id"];
        }
    }
    $followupdata["user_id"]=$line[0];
    $followupdata["staff_member"]=$line[17];
    
    $followupdata["follow_up_number"]=1;
    $followupdata["follow_up_date"]=$line[16];
    $followupdata["additional_comment"]=$line[20];
    $follow_up_id = insertData('follow_up_info', $followupdata);




    //Insert 1st Follow Up Info,  Last index was 21
    //
    //
    // 
    // 
    // 
    // 
    
    $line[26]=str_replace($remove,"",$line[26]);
    $line[25]=str_replace($remove,"",$line[25]);
    $query11="SELECT COUNT(1) FROM call_outcome WHERE outcome_name = '$line[25]'";
    $result11=$db->query($query11);
    $row11=$result11->result_array();
    foreach($row11 as $rows11)
    {
      if($rows11["COUNT(1)"]==0)
      {
        $data5["outcome_name"]=$line[25];
        $user_id = insertData('call_outcome', $data5);
      }
    }
    
    $query13="SELECT COUNT(1) FROM follow_up_action WHERE action_name = '$line[26]'";
    $result13=$db->query($query13);
    $row13=$result13->result_array();
    foreach($row13 as $rows13)
    {
      if($rows13["COUNT(1)"]==0)
      {
        $data6["action_name"]=$line[26];
        $user_id = insertData('follow_up_action', $data6);
      }
    }
    $query10="SELECT * FROM call_outcome";
    $result10=$db->query($query10);
    $row10=$result10->result_array();

    $query12="SELECT * FROM follow_up_action";
    $result12=$db->query($query12);
    $row12=$result12->result_array();
    
    
    $followupdata["user_id"]=$line[0];
    $followupdata["additional_comment"]=$line[22];
    $followupdata["staff_member"]=$line[23];
    
    $followupdata["follow_up_number"]=2;
    $followupdata["follow_up_date"]=$line[24];
    foreach($row10 as $rows10)
    {
        if($line[25]==$rows10["outcome_name"])
        {
            $followupdata["follow_up_outcome_id"]=$rows10["id"];
        }
    }
    foreach($row12 as $rows12)
    {
        if($line[26]==$rows12["action_name"])
        {
            $followupdata["follow_up_action_id"]=$rows12["id"];
        }
    }
    $follow_up_id = insertData('follow_up_info', $followupdata);



    




    //Insert 1st Follow Up Info,  Last index was 26
    //
    //
    // 
    // 
    // 
    // 
    
    $line[31]=str_replace($remove,"",$line[31]);
    $line[30]=str_replace($remove,"",$line[30]);
    $query11="SELECT COUNT(1) FROM call_outcome WHERE outcome_name = '$line[30]'";
    $result11=$db->query($query11);
    $row11=$result11->result_array();
    foreach($row11 as $rows11)
    {
      if($rows11["COUNT(1)"]==0)
      {
        $data5["outcome_name"]=$line[30];
        $user_id = insertData('call_outcome', $data5);
      }
    }
    
    $query13="SELECT COUNT(1) FROM follow_up_action WHERE action_name = '$line[31]'";
    $result13=$db->query($query13);
    $row13=$result13->result_array();
    foreach($row13 as $rows13)
    {
      if($rows13["COUNT(1)"]==0)
      {
        $data6["action_name"]=$line[31];
        $user_id = insertData('follow_up_action', $data6);
      }
    }
    $query10="SELECT * FROM call_outcome";
    $result10=$db->query($query10);
    $row10=$result10->result_array();

    $query12="SELECT * FROM follow_up_action";
    $result12=$db->query($query12);
    $row12=$result12->result_array();
    
    foreach($row10 as $rows10)
    {
        if($line[30]==$rows10["outcome_name"])
        {
            $followupdata["follow_up_outcome_id"]=$rows10["id"];
        }
    }
    foreach($row12 as $rows12)
    {
        if($line[31]==$rows12["action_name"])
        {
            $followupdata["follow_up_action_id"]=$rows12["id"];
        }
    }
    $followupdata["user_id"]=$line[0];
    $followupdata["staff_member"]=$line[28];
    
    $followupdata["follow_up_number"]=3;
    $followupdata["follow_up_date"]=$line[29];
    $followupdata["additional_comment"]=$line[27];
    $follow_up_id = insertData('follow_up_info', $followupdata);


    //Insert 1st Follow Up Info,  Last index was 31
    //
    //
    // 
    // 
    // 
    // 
    
    $line[36]=str_replace($remove,"",$line[36]);
    $line[35]=str_replace($remove,"",$line[35]);
    $query11="SELECT COUNT(1) FROM call_outcome WHERE outcome_name = '$line[35]'";
    $result11=$db->query($query11);
    $row11=$result11->result_array();
    foreach($row11 as $rows11)
    {
      if($rows11["COUNT(1)"]==0)
      {
        $data5["outcome_name"]=$line[35];
        $user_id = insertData('call_outcome', $data5);
      }
    }
    
    $query13="SELECT COUNT(1) FROM follow_up_action WHERE action_name = '$line[36]'";
    $result13=$db->query($query13);
    $row13=$result13->result_array();
    foreach($row13 as $rows13)
    {
      if($rows13["COUNT(1)"]==0)
      {
        $data6["action_name"]=$line[36];
        $user_id = insertData('follow_up_action', $data6);
      }
    }
    $query10="SELECT * FROM call_outcome";
    $result10=$db->query($query10);
    $row10=$result10->result_array();

    $query12="SELECT * FROM follow_up_action";
    $result12=$db->query($query12);
    $row12=$result12->result_array();
    
    
    $followupdata["user_id"]=$line[0];
    $followupdata["additional_comment"]=$line[32];
    $followupdata["staff_member"]=$line[33];
    
    $followupdata["follow_up_number"]=4;
    $followupdata["follow_up_date"]=$line[34];
    foreach($row10 as $rows10)
    {
        if($line[35]==$rows10["outcome_name"])
        {
            $followupdata["follow_up_outcome_id"]=$rows10["id"];
        }
    }
    foreach($row12 as $rows12)
    {
        if($line[36]==$rows12["action_name"])
        {
            $followupdata["follow_up_action_id"]=$rows12["id"];
        }
    }
    $follow_up_id = insertData('follow_up_info', $followupdata);


    //Insert 1st Follow Up Info,  Last index was 36
    //
    //
    // 
    // 
    // 
    // 
    
    $line[41]=str_replace($remove,"",$line[41]);
    $line[40]=str_replace($remove,"",$line[40]);
    $query11="SELECT COUNT(1) FROM call_outcome WHERE outcome_name = '$line[40]'";
    $result11=$db->query($query11);
    $row11=$result11->result_array();
    foreach($row11 as $rows11)
    {
      if($rows11["COUNT(1)"]==0)
      {
        $data5["outcome_name"]=$line[40];
        $user_id = insertData('call_outcome', $data5);
      }
    }
    
    $query13="SELECT COUNT(1) FROM follow_up_action WHERE action_name = '$line[41]'";
    $result13=$db->query($query13);
    $row13=$result13->result_array();
    foreach($row13 as $rows13)
    {
      if($rows13["COUNT(1)"]==0)
      {
        $data6["action_name"]=$line[41];
        $user_id = insertData('follow_up_action', $data6);
      }
    }
    $query10="SELECT * FROM call_outcome";
    $result10=$db->query($query10);
    $row10=$result10->result_array();

    $query12="SELECT * FROM follow_up_action";
    $result12=$db->query($query12);
    $row12=$result12->result_array();
    
    
    $followupdata["user_id"]=$line[0];
    $followupdata["additional_comment"]=$line[37];
    $followupdata["staff_member"]=$line[38];
    
    $followupdata["follow_up_number"]=5;
    $followupdata["follow_up_date"]=$line[39];
    foreach($row10 as $rows10)
    {
        if($line[40]==$rows10["outcome_name"])
        {
            $followupdata["follow_up_outcome_id"]=$rows10["id"];
        }
    }
    foreach($row12 as $rows12)
    {
        if($line[41]==$rows12["action_name"])
        {
            $followupdata["follow_up_action_id"]=$rows12["id"];
        }
    }
    $follow_up_id = insertData('follow_up_info', $followupdata);


    //Insert 1st Follow Up Info,  Last index was 41
    //
    //
    // 
    // 
    // 
    // 
    
    $line[46]=str_replace($remove,"",$line[46]);
    $line[45]=str_replace($remove,"",$line[45]);
    $query11="SELECT COUNT(1) FROM call_outcome WHERE outcome_name = '$line[45]'";
    $result11=$db->query($query11);
    $row11=$result11->result_array();
    foreach($row11 as $rows11)
    {
      if($rows11["COUNT(1)"]==0)
      {
        $data5["outcome_name"]=$line[45];
        $user_id = insertData('call_outcome', $data5);
      }
    }
    
    $query13="SELECT COUNT(1) FROM follow_up_action WHERE action_name = '$line[46]'";
    $result13=$db->query($query13);
    $row13=$result13->result_array();
    foreach($row13 as $rows13)
    {
      if($rows13["COUNT(1)"]==0)
      {
        $data6["action_name"]=$line[46];
        $user_id = insertData('follow_up_action', $data6);
      }
    }
    $query10="SELECT * FROM call_outcome";
    $result10=$db->query($query10);
    $row10=$result10->result_array();

    $query12="SELECT * FROM follow_up_action";
    $result12=$db->query($query12);
    $row12=$result12->result_array();
    
    
    $followupdata["user_id"]=$line[0];
    $followupdata["additional_comment"]=$line[42];
    $followupdata["staff_member"]=$line[43];
    
    $followupdata["follow_up_number"]=6;
    $followupdata["follow_up_date"]=$line[44];
    foreach($row10 as $rows10)
    {
        if($line[45]==$rows10["outcome_name"])
        {
            $followupdata["follow_up_outcome_id"]=$rows10["id"];
        }
    }
    foreach($row12 as $rows12)
    {
        if($line[46]==$rows12["action_name"])
        {
            $followupdata["follow_up_action_id"]=$rows12["id"];
        }
    }
    $follow_up_id = insertData('follow_up_info', $followupdata);


    










  }
fclose($file);
?>
