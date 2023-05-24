<?php

if(isset($_POST["delete"]))
{
    require("config.php");
    $data["enabled"]=0;
    disableData("follow_up_inprocess",$data,"id=".$_POST["delete"]);
    header("Location:follow_up_inprocess.php?user_id=".$_POST["user_id"]);
}
else
{
    header("Location:follow_up_inprocess.php?user_id=".$_POST["user_id"]);
}




?>