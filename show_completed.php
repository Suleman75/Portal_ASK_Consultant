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

echo "<div class='card-body px-0 pt-0 pb-2'>
<div class='table-responsive p-0'><table class='table align-items-center mb-0'>";
    echo "<thead><tr>";
echo "<th class='text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7'>S.No</th>";
echo "<th class='text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7'>Date</th>";
echo "<th class='text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7'>Name</th>";
echo "<th class='text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7'>Phone</th>";
echo "<th class='text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7'>Country</th>";
echo "<th class='text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7'>Course</th>";
echo "<th class='text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7'>University</th>";
echo "<th class='text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7'>Consultant</th>";
echo "<th class='text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7'>Brand</th>";
echo "<th class='text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7'>Intake</th>";
echo "<th class='text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7'>Notes</th>";
echo "<th class='text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7'>Visa Status</th>";
echo "<th class='text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7'>Comments</th>";

echo "<th class='text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7'>Update</th>";
echo "<th class='text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7'>Delete</th>";

echo "</tr></thead>";

foreach($outcome as $rows)
{
    echo "<tr>";
    echo "<td class='text-center text-secondary text-xs font-weight-bold'>".$rows['id']."</td>";
    echo "<td class='text-center text-secondary text-xs font-weight-bold'>".$rows['date']."</td>";
    echo "<td class='text-center text-secondary text-xs font-weight-bold'>".$rows['full_name']."</td>";
    echo "<td class='text-center text-secondary text-xs font-weight-bold'>".$rows['phone']."</td>";
    echo "<td class='text-center text-secondary text-xs font-weight-bold'>".$rows['country']."</td>";
    echo "<td class='text-center text-secondary text-xs font-weight-bold'>".$rows['course']."</td>";
    echo "<td class='text-center text-secondary text-xs font-weight-bold'>".$rows['university']."</td>";
    echo "<td class='text-center text-secondary text-xs font-weight-bold'>".$rows['consultant']."</td>";
    echo "<td class='text-center text-secondary text-xs font-weight-bold'>".$rows['brand']."</td>";
    echo "<td class='text-center text-secondary text-xs font-weight-bold'>".$rows['intake']."</td>";
    echo "<td class='text-center text-secondary text-xs font-weight-bold'>".$rows['notes']."</td>";
    echo "<td class='text-center text-secondary text-xs font-weight-bold'>".$rows['visa_status']."</td>";
    echo "<td class='text-center text-secondary text-xs font-weight-bold'>".$rows['comments']."</td>";
    echo "<td class='text-center text-secondary text-xs font-weight-bold'><form method='POST' action='update_completed.php'><input type='hidden' name='update' value='".$rows['id']."'><input type='submit' name='update_btn' value='Update' style='background-color:transparent;border:none;' class='text-secondary font-weight-bold text-xs'></form></td>";
    echo "<td class='text-center text-secondary text-xs font-weight-bold'><form method='POST' action='delete_completed.php'><input type='hidden' name='delete' value='".$rows['id']."'><input type='submit' name='delete_btn' value='Delete' style='background-color:transparent;border:none;' class='text-secondary font-weight-bold text-xs'></form></td>";   
    echo "</tr>";
}
echo "</tbody></table></div></div></div></div></div></div>";
}
else
{
    header("Location:show_inprocess.php");
}
?>







<?php
require("footer.php")

?>