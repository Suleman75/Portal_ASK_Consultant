<?php
$page_name="Student Search Result";
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

<form method="POST" action="search_result.php">
<label>Search With Follow Up: </label><br>
<select name="type"  class="form-control form-control-sm">
  <option selected="selected" value="follow">Follow</option>
  <option value="followed">Followed</option>
  <option value="visit">Visit</option>
  <option value="visited">Visited</option>
  <option value="No Follow">No Follow</option>
</select><br>
<br><input  class="form-control form-control-sm" type="date" name="date"><br><br>
<div class="text-center d-flex justify-content-center">
<input class="btn btn-sm btn-primary btn-lg w-40 mt-4 mb-0" type="submit" value="Search With Follow Up"><br>
</div>
</form>


<?php

?>
<br><br><br></div></div></div>
<div class="container-fluid py-4">
      <div class="row">
          <div class="card mb-4">
            <div class="card-header pb-0">
              <h6>Students Search Data</h6>
            </div>
<?php



if(checkPrivilage($_SESSION["user_type"],"admin") || checkPrivilage($_SESSION["user_type"],"counsellor") || checkPrivilage($_SESSION["user_type"],"case_admin"))
{
if(isset($_POST["type"]))
{
    $_SESSION["type"]=$_POST["type"];
    $_SESSION["date"]=$_POST["date"];
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