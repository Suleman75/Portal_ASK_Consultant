<?php

if(isset($_POST["inprocess"]))
{
    require("config.php");
    $data12["enabled"]=0;
    $user_data=selectData("user_info","id=".$_POST["inprocess"]);
    if(selectCount("in_process","id=".$_POST["inprocess"])>0)
    {
        $data["enabled"]=1;
        disableData("in_process",$data,"id=".$_POST["inprocess"]);
    }
    else
    {
        foreach($user_data as $rows)
        {
            $data1["id"]=$rows["id"];
            $data1["case_assign_date"]=date("j/n/Y");
            $data1["name"]=$rows["full_name"];
            $data1["phone"]=$rows["phone_number"];
            $data1["email"]=$rows["email"];
            $data1["destination_1"]=1;
            $data1["counselor"]=1;
            $data1["fee_status"]=1;
            $data1["destination_2"]=1;
            $data1["case_status_1"]=1;
            $data1["case_status_2"]=1;
            $data1["insert_admin"]=$_SESSION["full_name"];
            insertData("in_process",$data1);
        }
    }
    
    disableData("user_info",$data12,"id=".$_POST["inprocess"]);
    header("Location:show_data.php");
}
else
{
    header("Location:show_data.php");
}




?>