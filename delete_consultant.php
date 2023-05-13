<?php

if(isset($_POST["delete"]))
{
    require("config.php");
    $data["enabled"]=0;
    disableData("consultant",$data,"id=".$_POST["delete"]);
    header("Location:show_consultant.php");
}
else
{
    header("Location:show_consultant.php");
}




?>