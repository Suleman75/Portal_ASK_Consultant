<?php
$page_name="Show Students";
require("menu.php");
require("header.php");
?>
<script>
    if ( window.history.replaceState ) {
  window.history.replaceState( null, null, window.location.href );
}
</script>
<?php
if(!isset($_SESSION["min"]) || !isset($_SESSION["max"]))
{
    $_SESSION["min"]=0;
    $_SESSION["max"]=2000;
}
if(isset($_POST["pagenumber"]))
{
    $_SESSION["min"]=0;
    $_SESSION["max"]=1000;
    for($i=1;$i<$_POST["pagenumber"];$i++)
    {
        $_SESSION["min"]=$_SESSION["min"]+1000;
        $_SESSION["max"]=$_SESSION["max"]+1000;
    }
    
}
if(isset($_SESSION["min"]) || isset($_SESSION["max"]))
{
    $min=$_SESSION["min"];
    $max=$_SESSION["max"];
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