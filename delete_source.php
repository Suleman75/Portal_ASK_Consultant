<?php

if(isset($_POST["delete"]))
{
    require("config.php");
    $data["enabled"]=0;
    disableData("source",$data,"id=".$_POST["delete"]);
    header("Location:show_source.php");
}
else
{
    header("Location:show_source.php");
}




?>