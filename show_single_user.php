<?php
$page_name="Show Single Student";
require("menu.php");
require("header.php");
?>
<?php
if(isset($_POST["user_id"]))
{
    $_SESSION["user_id"]=$_POST["user_id"];
}
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
if(isset($_SESSION["user_id"]))
{
    $user_data=get_single_user_data($_SESSION["user_id"]);
    show_leads_table();
    

    show_leads_data($user_data);

}
else
{
    header("Location:show_data.php");
}
}
else
{
    header("Location:show_inprocess.php");
}


?>

<?php


// $i=0;
// $old_id=0;





require("footer.php");
?>