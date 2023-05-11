<?php

if(isset($_POST["delete"]))
{
    require("config.php");
    $data["enabled"]=0;
    disableData("user_info",$data,"id=".$_POST["delete"]);
    header("Location:show_data.php");
}
else
{
    header("Location:show_data.php");
}




?>