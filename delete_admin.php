<?php

if(isset($_POST["delete"]))
{
    require("config.php");
    $data["enabled"]=0;
    disableData("admin_info",$data,"id=".$_POST["delete"]);
    header("Location:show_users.php");
}
else
{
    header("Location:show_users.php");
}




?>