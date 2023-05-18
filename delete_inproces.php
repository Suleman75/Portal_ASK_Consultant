<?php

if(isset($_POST["delete"]))
{
    require("config.php");
    $data["enabled"]=0;
    disableData("in_process",$data,"id=".$_POST["delete"]);
    header("Location:show_inprocess.php");
}
else
{
    header("Location:show_inprocess.php");
}




?>