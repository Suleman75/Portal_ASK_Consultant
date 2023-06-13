<?php
$page_name="Show Inprocess Cases";
require("menu.php");
require("header.php");
?>
<script>
    if ( window.history.replaceState ) {
  window.history.replaceState( null, null, window.location.href );
}
</script>
<?php

if(checkLoggedin())
{
    create_forms_inprocess($page_name);
    if(isset($_POST["type"]))
    {
        $_SESSION["type"]=$_POST["type"];
        $_SESSION["date"]=$_POST["date"];
        
        $_SESSION["date"] = date("j/n/Y", strtotime($_SESSION["date"]));
        // echo $_SESSION["date"]."here";
    }
    
    if(isset($_SESSION["type"]))
    {
    
        $combined=$_SESSION["type"]." ".$_SESSION["date"];
        $user_data=get_follow_inprocess_new(strtolower($combined));
        show_inprocess_table();

        show_inprocess_data($user_data);
    }
    else
    {
        header("Location:show_inprocess.php");
    }
    // if(isset($_POST["user_id"]))
    // {
    //     // $outcome=get_follow_up_data();
    //     $user_data=get_single_inprocess($_POST["user_id"]);
    //     show_inprocess_table();
        

    //     show_inprocess_data($user_data);

    // }
    

}
else
{
    header("Location:login.php");
}
?>







<?php
require("footer.php");

?>