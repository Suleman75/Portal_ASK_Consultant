<?php

if(isset($_POST["completed"]))
{
    require("config.php");
    $data12["enabled"]=0;
    $user_data=selectData("in_process","id=".$_POST["completed"]);
    if(selectCount("completed","id=".$_POST["completed"])>0)
    {
        $data["enabled"]=1;
        disableData("completed",$data,"id=".$_POST["completed"]);
    }
    else
    {
        foreach($user_data as $rows)
        {
            $data1["id"]=$rows["id"];
            $data1["date"]=date("j/n/Y");
            $data1["full_name"]=$rows["name"];
            $data1["phone"]=$rows["phone"];
            $data1["insert_admin"]=$_SESSION["full_name"];
            insertData("completed",$data1);
        }
    }
    
    disableData("in_process",$data12,"id=".$_POST["completed"]);
    header("Location:show_inprocess.php");
}
else
{
    header("Location:show_inprocess.php");
}




?>