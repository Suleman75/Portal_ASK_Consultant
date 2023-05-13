<?php

if(isset($_POST["delete"]))
{
    require("config.php");
    $data["enabled"]=0;
    disableData("lead_priority",$data,"id=".$_POST["delete"]);
    header("Location:show_priority.php");
}
else
{
    header("Location:show_priority.php");
}




?>