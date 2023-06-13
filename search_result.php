<?php
$page_name="Student Search Result";
require("menu.php");
require("header.php");
?>
<script>
    if ( window.history.replaceState ) {
  window.history.replaceState( null, null, window.location.href );
}
</script>
<?php
create_forms($page_name);

if(checkPrivilage($_SESSION["user_type"],"admin") || checkPrivilage($_SESSION["user_type"],"counsellor") || checkPrivilage($_SESSION["user_type"],"case_admin"))
{
if(isset($_POST["type"]))
{
    $_SESSION["type"]=$_POST["type"];
    $_SESSION["date"]=$_POST["date"];
    $_SESSION["date"] = date("j/n/Y", strtotime($_SESSION["date"]));
}
if(isset($_SESSION["type"]))
{
    
    
    // echo $_SESSION["date"];
    $combined=$_SESSION["type"]." ".$_SESSION["date"];
    $user_data=get_all_data_follow_new(strtolower($combined));
    show_leads_table();

    show_leads_data($user_data);
}
else
{
    header("Location:show_data.php");
}
// $i=0;
// $old_id=0;

}
else
{
    header("Location:show_inprocess.php");
}


?>


<?php
require("footer.php");
?>