<?php

if(isset($_POST["delete"]))
{
    require("config.php");
    $data["enabled"]=0;
    disableData("inquiry_form_location",$data,"id=".$_POST["delete"]);
    header("Location:show_inquiry_location.php");
}
else
{
    header("Location:show_inquiry_location.php");
}




?>