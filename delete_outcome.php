<?php

if(isset($_POST["delete"]))
{
    require("config.php");
    $data["enabled"]=0;
    disableData("call_outcome",$data,"id=".$_POST["delete"]);
    header("Location:show_outcome.php");
}
else
{
    header("Location:show_outcome.php");
}




?>