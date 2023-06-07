<?php
$page_name="Show Inprocess Cases";
require("menu.php");
require("header.php");
?>
<div class="container-fluid py-4">
      <div class="row">
          <div class="card mb-4">
            <div class="card-header pb-0">
              <h6>Students In Process Cases</h6>
            </div>
<?php
if(checkLoggedin())
{
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