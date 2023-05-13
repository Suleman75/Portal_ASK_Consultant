<?php

if(isset($_POST["delete"]))
{
    require("config.php");
    $data["enabled"]=0;
    disableData("follow_up_action",$data,"id=".$_POST["delete"]);
    header("Location:show_follow_up_action.php");
}
else
{
    header("Location:show_follow_up_action.php");
}




?>