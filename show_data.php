<?php
$page_name="Show Students";
require("menu.php");
require("header.php");

if(!isset($_POST["min"]) || !isset($_POST["max"]))
{
    $_POST["min"]=1000;
    $_POST["max"]=2000;
}
if(isset($_POST["pagenumber"]))
{
    for($i=1;$i<$_POST["pagenumber"];$i++)
    {
        $_POST["min"]=$_POST["min"]+1000;
        $_POST["max"]=$_POST["max"]+1000;
    }
    
}
if(isset($_POST["min"]) || isset($_POST["max"]))
{
    $min=$_POST["min"];
    $max=$_POST["max"];
}

$user_data=get_all_data($min,$max);

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
<select name="type" class="form-control form-control-sm">
  <option selected="selected" value="follow">Follow</option>
  <option value="followed">Followed</option>
  <option value="visit">Visit</option>
  <option value="visited">Visited </option>
  <option value="No Follow">No Follow</option>
</select><br>
<br>
<input class="form-control form-control-sm" type="date" name="date"><br><br>
<div class="text-center d-flex justify-content-center">
<input class="btn btn-sm btn-primary btn-lg w-40 mt-4 mb-0" type="submit" value="Search With Follow Up"><br>
</div>
</form>

<div class="text-center d-flex justify-content-center">
<?php

$max_id=get_max_id("user_info");
for($i=1;$i<=ceil($max_id/1000);$i++)
{
    echo "<form method='POST' style='display:inline;'><input class='btn btn-sm btn-primary btn-lg w-1 mt-4 mb-0 text-center' type='submit' name='pagenumber' value=$i></form>&nbsp;&nbsp;&nbsp;";
}
?>
<br><br><br>
</div></div></div></div>
<div class="container-fluid py-4">
      <div class="row">
          <div class="card mb-4">
            <div class="card-header pb-0">
              <h6>Students Data</h6>
            </div>
<?php
if(checkPrivilage($_SESSION["user_type"],"admin") || checkPrivilage($_SESSION["user_type"],"counsellor") || checkPrivilage($_SESSION["user_type"],"case_admin"))
{

// $i=0;
// $old_id=0;

show_leads_table();

show_leads_data($user_data);

}
else
{
    header("Location:show_inprocess.php");
}

?>

<?php

require("footer.php");
?>