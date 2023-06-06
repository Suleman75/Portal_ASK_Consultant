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
    echo "<div class='card-body px-0 pt-0 pb-2'>
    <div class='table-responsive p-0'><table class='table align-items-center mb-0'>";
    echo "<thead><tr>";
    echo "<th class='text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7'>S.No</th>";
    echo "<th class='text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7'>Lead priority</th>";
    echo "<th class='text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7'>Date</th>";
    echo "<th class='text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7'>Name</th>";
    echo "<th class='text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7'>Phone Number</th>";
    echo "<th class='text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7'>Sources</th>";
    echo "<th class='text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7'>Country</th>";
    echo "<th class='text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7'>Visited</th>";
    echo "<th class='text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7'>Inquiry Form Location</th>";
    echo "<th class='text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7'>Consultant</th>";
    echo "<th class='text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7'>Qualification</th>";
    echo "<th class='text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7'>Comments/Inquiry</th>";
    echo "<th class='text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7'>Expected Budget</th>";
    
    if(checkPrivilage($_SESSION["user_type"],"admin") || checkPrivilage($_SESSION["user_type"],"counsellor"))
    {
        echo "<th class='text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7'>Update</th>";
        echo "<th class='text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7'>Delete</th>";
    }
    echo "<th class='text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7'>Follow Up Data</th>";
    echo "</tr></thead><tbody>";
    

foreach($user_data as $rows)
{
    // echo $i."-".$rows["full_name"]."<br>";
    // $i++;

    

    echo "<tr>";
    echo "<td class='text-center text-secondary text-xs font-weight-bold'>".$rows['main_id']."</td>";
    echo "<td class='text-center text-secondary text-xs font-weight-bold'>".$rows['priority_name']."</td>";
    echo "<td class='text-center text-secondary text-xs font-weight-bold' style='width:10px !important;'>".$rows['apply_date']."</td>";
    echo "<td class='text-center text-secondary text-xs font-weight-bold'>".$rows['full_name']."</td>";
    echo "<td class='text-center text-secondary text-xs font-weight-bold'>".$rows['phone_number']."</td>";
    echo "<td class='text-center text-secondary text-xs font-weight-bold'>".$rows['source_name']."</td>";
    echo "<td class='text-center text-secondary text-xs font-weight-bold'>".$rows['country_name']."</td>";
    echo "<td class='text-center text-secondary text-xs font-weight-bold'>".$rows['visited']."</td>";
    echo "<td class='text-center text-secondary text-xs font-weight-bold'>".$rows['inquiry_location']."</td>";
    echo "<td class='text-center text-secondary text-xs font-weight-bold'>".$rows['consultant_name']."</td>";
    echo "<td class='text-center text-secondary text-xs font-weight-bold'>".$rows['qualification']."</td>";
    echo "<td class='text-center text-secondary text-xs font-weight-bold'>".$rows['comments']."</td>";
    echo "<td class='text-center text-secondary text-xs font-weight-bold'>".$rows['budget']."</td>";
    if(checkPrivilage($_SESSION["user_type"],"admin") || checkPrivilage($_SESSION["user_type"],"counsellor"))
    {
        echo "<td class='text-center text-secondary text-xs font-weight-bold'><form method='POST' action='update_user.php'><input type='hidden' name='update' value='".$rows['main_id']."'><input style='background-color:transparent;border:none;' class='text-secondary font-weight-bold text-xs' type='submit' name='update_btn' value='Update'></form></td>";
        echo "<td class='text-center text-secondary text-xs font-weight-bold'><form method='POST' action='delete_user.php'><input type='hidden' name='delete' value='".$rows['main_id']."'><input type='submit' name='delete_btn' value='Delete' style='background-color:transparent;border:none;' class='text-secondary font-weight-bold text-xs'></form></td>";
    }
    echo "<td class='text-center text-secondary text-xs font-weight-bold'><form method='POST' action='follow_up.php'><input type='hidden' name='follow' value='".$rows['main_id']."'><input type='submit' name='follow_btn' value='Follow Up' style='background-color:transparent;border:none;' class='text-secondary font-weight-bold text-xs'></form></td>";
    echo "</tr>";



    
}
echo "</tbody></table></div></div></div></div></div></div>";

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