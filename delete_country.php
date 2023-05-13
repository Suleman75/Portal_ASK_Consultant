<?php

if(isset($_POST["delete"]))
{
    require("config.php");
    $data["enabled"]=0;
    disableData("country",$data,"id=".$_POST["delete"]);
    header("Location:show_country.php");
}
else
{
    header("Location:show_country.php");
}




?>