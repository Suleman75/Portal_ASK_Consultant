<?php
$page_name="Completed Case";
require("menu.php");
require("header.php");
?>
<div class="container-fluid py-4">
      <div class="row">
          <div class="card mb-4">
            <div class="card-header pb-0">
              <h6>Students Completed Cases</h6>
            </div>
<?php
if(checkPrivilage($_SESSION["user_type"],"admin") || checkPrivilage($_SESSION["user_type"],"accounts"))
{
$outcome=selectData("completed","enabled=1");
create_forms_completed($page_name);
show_completed_table();

show_completed_data($outcome);
}
else
{
    header("Location:show_inprocess.php");
}
?>







<?php
require("footer.php")

?>