<?php
$page_name="Show Single Student";
require("menu.php");
require("header.php");
?>
<div class="container-fluid py-4">
      <div class="row">
        <div class="col-12">
<form method="POST" action="show_single_user.php" style="margin-top:50px !important;">
<label>Search: </label><br><input class="form-control form-control-sm" type="text" name="user_id"><br><br>
<div class="text-center d-flex justify-content-center">
<input class="btn btn-sm btn-primary btn-lg w-40 mt-4 mb-0" type="submit" value="Search"><br>
</div>
</form>
</div></div></div>
<div class="container-fluid py-4">
      <div class="row">
          <div class="card mb-4">
            <div class="card-header pb-0">
              <h6>Students Data</h6>
            </div>
<?php
if(checkPrivilage($_SESSION["user_type"],"admin") || checkPrivilage($_SESSION["user_type"],"counsellor") || checkPrivilage($_SESSION["user_type"],"case_admin"))
{
if(isset($_POST["user_id"]))
{
    $user_data=get_single_user_data($_POST["user_id"]);
    show_leads_table();
    

    show_leads_data($user_data);

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