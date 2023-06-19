<?php

if(isset($_POST["send_back"]))
{
    require("config.php");
    $data2["enabled"]=0;
    if(selectCount("user_info","id=".$_POST["send_back"])>0)
    {
        
        $data["enabled"]=1;
        disableData("user_info",$data,"id=".$_POST["send_back"]);
        
    }
    else
    {
        $user_data=selectData("in_process","id=".$_POST["send_back"]);
        foreach($user_data as $rows)
        {
            $data1["id"]=$rows["id"];
            $data1["apply_date"]=date("j/n/Y");
            $data1["full_name"]=$rows["name"];
            $data1["phone_number"]=$rows["phone"];
            $data1["email"]=$rows["email"];
            $data1["priority_id"]=1;
            $data1["apply_source_id"]=1;
            $data1["country_id"]=1;
            $data1["inquiry_form_location_id"]=1;
            $data1["consultant_id"]=1;
            $data1["insert_admin"]=$_SESSION["full_name"];
            insertData("user_info",$data1);
        }
    }
    disableData("in_process",$data2,"id=".$_POST["send_back"]);
    header("Location:show_data.php");
    
    
    
    
}
else
{
    header("Location:show_data.php");
}




?>