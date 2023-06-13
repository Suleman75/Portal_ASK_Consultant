<?php
$page_name="Show Inprocess Case";
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
        create_forms_inprocess($page_name);
        // $outcome=get_follow_up_data();
        $user_data=get_single_inprocess($_SESSION["user_id"]);
        show_inprocess_table();
        

        show_inprocess_data($user_data);

    }
    else
    {
        header("Location:show_inprocess.php");
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