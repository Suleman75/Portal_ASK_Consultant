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
}
else
{
    header("Location:show_data.php");
}
if(isset($_SESSION["type"]))
{
    
    $_SESSION["date"] = date("j/n/Y", strtotime($_SESSION["date"]));
    $user_data=get_all_data_follow(strtolower($_SESSION["type"]),$_SESSION["date"]);
    show_leads_table();

    show_leads_data($user_data);
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