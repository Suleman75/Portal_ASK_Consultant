<?php

if(isset($_POST["completed"]))
{
    require("config.php");
    $data["enabled"]=0;
    $user_data=selectData("in_process","id=".$_POST["completed"]);
    
    foreach($user_data as $rows)
    {
        $data1["id"]=$rows["id"];
        $data1["date"]=date("j/n/Y");
        $data1["full_name"]=$rows["name"];
        $data1["phone"]=$rows["phone"];
        insertData("completed",$data1);
    }
    disableData("in_process",$data,"id=".$_POST["completed"]);
    header("Location:show_inprocess.php");
}
else
{
    header("Location:show_inprocess.php");
}




?>