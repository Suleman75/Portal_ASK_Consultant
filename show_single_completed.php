<?php
$page_name="Show Completed Case";
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

if(checkLoggedin())
{
    if(isset($_SESSION["user_id"]))
    {
        create_forms_completed($page_name);
        // $outcome=get_follow_up_data();
        $user_data=get_single_completed_new($_SESSION["user_id"]);
        show_completed_table();
        

        show_completed_data($user_data);

    }
    else
    {
        header("Location:show_completed.php");
    }

}
else
{
    header("Location:login.php");
}
?>







<?php
require("footer.php");

?>