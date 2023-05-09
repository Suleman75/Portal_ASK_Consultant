<?php
require("header.php");
require("menu.php");

$i=0;
foreach($user_data as $rows)
{
    echo $i."-".$rows["full_name"]."<br>";
    $i++;
}


require("footer.php");
?>