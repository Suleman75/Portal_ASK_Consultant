<?php
$page_name="Show Students";
require("menu.php");
require("header.php");

if(!isset($_POST["min"]) || !isset($_POST["max"]))
{
    $_POST["min"]=1000;
    $_POST["max"]=2000;
}
if(isset($_POST["pagenumber"]))
{
    for($i=1;$i<$_POST["pagenumber"];$i++)
    {
        $_POST["min"]=$_POST["min"]+1000;
        $_POST["max"]=$_POST["max"]+1000;
    }
    
}
if(isset($_POST["min"]) || isset($_POST["max"]))
{
    $min=$_POST["min"];
    $max=$_POST["max"];
}

$user_data=get_all_data($min,$max);
create_forms($page_name);
?>

<?php
if(checkPrivilage($_SESSION["user_type"],"admin") || checkPrivilage($_SESSION["user_type"],"counsellor") || checkPrivilage($_SESSION["user_type"],"case_admin"))
{

// $i=0;
// $old_id=0;

show_leads_table();

show_leads_data($user_data);

}
else
{
    header("Location:show_inprocess.php");
}

?>

<?php

require("footer.php");
?>