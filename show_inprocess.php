<?php
$page_name="Show Inprocess Cases";
require("menu.php");
require("header.php");
?>

<?php
if(checkLoggedin())
{
  create_forms_inprocess($page_name);
$outcome=get_follow_up_data();

show_inprocess_table();

show_inprocess_data($outcome);
}
else
{
    header("Location:login.php");
}
?>







<?php
require("footer.php");

?>