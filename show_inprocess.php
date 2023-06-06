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

echo "<div class='card-body px-0 pt-0 pb-2'>
<div class='table-responsive p-0'><table class='table align-items-center mb-0'>";
    echo "<thead><tr>";
echo "<th class='text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7'>S.No</th>";
echo "<th class='text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7'>Case Assign Date</th>";
echo "<th class='text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7'>Name</th>";
echo "<th class='text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7'>Phone</th>";
echo "<th class='text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7'>Email</th>";
echo "<th class='text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7'>Destination 1</th>";
echo "<th class='text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7'>Counseller</th>";
echo "<th class='text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7'>Comments</th>";
echo "<th class='text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7'>Fee Status</th>";
echo "<th class='text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7'>Case Handler 1</th>";
echo "<th class='text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7'>University 1</th>";
echo "<th class='text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7'>Outcome Destination 1</th>";
echo "<th class='text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7'>Case Status 1</th>";
echo "<th class='text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7'>Destination 2</th>";
echo "<th class='text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7'>Case Handler 2</th>";
echo "<th class='text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7'>University 2</th>";
echo "<th class='text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7'>Outcome Destination 2</th>";
echo "<th class='text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7'>Case Status 2</th>";
echo "<th class='text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7'>Course</th>";
echo "<th class='text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7'>Intake</th>";
echo "<th class='text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7'>Missing Documents</th>";
echo "<th class='text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7'>Final Comments</th>";
if(checkPrivilage($_SESSION["user_type"],"admin") || checkPrivilage($_SESSION["user_type"],"accounts") || checkPrivilage($_SESSION["user_type"],"case_admin"))
{
echo "<th class='text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7'>Update</th>";
echo "<th class='text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7'>Delete</th>";
}
echo "<th class='text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7'>Follow Up Data</th>";
echo "</tr></thead>";

foreach($outcome as $rows)
{
    echo "<tr>";
    echo "<td class='text-center text-secondary text-xs font-weight-bold'>".$rows['id']."</td>";
    echo "<td class='text-center text-secondary text-xs font-weight-bold'>".$rows['case_assign_date']."</td>";
    echo "<td class='text-center text-secondary text-xs font-weight-bold'>".$rows['name']."</td>";
    echo "<td class='text-center text-secondary text-xs font-weight-bold'>".$rows['phone']."</td>";
    echo "<td class='text-center text-secondary text-xs font-weight-bold'>".$rows['email']."</td>";
    echo "<td class='text-center text-secondary text-xs font-weight-bold'>".$rows['dest_1']."</td>";
    echo "<td class='text-center text-secondary text-xs font-weight-bold'>".$rows['consultant_name']."</td>";
    echo "<td class='text-center text-secondary text-xs font-weight-bold'>".$rows['comments']."</td>";
    echo "<td class='text-center text-secondary text-xs font-weight-bold'>".$rows['status_name']."</td>";
    echo "<td class='text-center text-secondary text-xs font-weight-bold'>".$rows['admin']."</td>";
    echo "<td class='text-center text-secondary text-xs font-weight-bold'>".$rows['university_1']."</td>";
    echo "<td class='text-center text-secondary text-xs font-weight-bold'>".$rows['outcome_destination_1']."</td>";
    echo "<td class='text-center text-secondary text-xs font-weight-bold'>".$rows['case_status_1']."</td>";
    echo "<td class='text-center text-secondary text-xs font-weight-bold'>".$rows['dest_2']."</td>";
    echo "<td class='text-center text-secondary text-xs font-weight-bold'>".$rows['case_handler_2']."</td>";
    echo "<td class='text-center text-secondary text-xs font-weight-bold'>".$rows['university_2']."</td>";
    echo "<td class='text-center text-secondary text-xs font-weight-bold'>".$rows['outcome_destination_2']."</td>";
    echo "<td class='text-center text-secondary text-xs font-weight-bold'>".$rows['case_status_2']."</td>";
    echo "<td class='text-center text-secondary text-xs font-weight-bold'>".$rows['course']."</td>";
    echo "<td class='text-center text-secondary text-xs font-weight-bold'>".$rows['intake']."</td>";
    echo "<td class='text-center text-secondary text-xs font-weight-bold'>".$rows['missing_docs']."</td>";
    echo "<td class='text-center text-secondary text-xs font-weight-bold'>".$rows['final_comments']."</td>";
    if(checkPrivilage($_SESSION["user_type"],"admin") || checkPrivilage($_SESSION["user_type"],"accounts") || checkPrivilage($_SESSION["user_type"],"case_admin"))
    {
    echo "<td class='text-center text-secondary text-xs font-weight-bold'><form method='POST' action='update_inproces.php'><input type='hidden' name='update' value='".$rows['id']."'><input type='submit' name='update_btn' value='Update' style='background-color:transparent;border:none;' class='text-secondary font-weight-bold text-xs'></form></td>";
    echo "<td class='text-center text-secondary text-xs font-weight-bold'><form method='POST' action='delete_inproces.php'><input type='hidden' name='delete' value='".$rows['id']."'><input type='submit' name='delete_btn' value='Delete' style='background-color:transparent;border:none;' class='text-secondary font-weight-bold text-xs'></form></td>";
    }
    echo "<td class='text-center text-secondary text-xs font-weight-bold'><form method='POST' action='follow_up_inprocess.php'><input type='hidden' name='follow' value='".$rows['id']."'><input type='submit' name='follow_btn' value='Follow Up' style='background-color:transparent;border:none;' class='text-secondary font-weight-bold text-xs'></form></td>";
    echo "</tr>";
}



echo "</tbody></table></div></div></div></div></div></div>";
}
else
{
    header("Location:login.php");
}
?>







<?php
require("footer.php");

?>