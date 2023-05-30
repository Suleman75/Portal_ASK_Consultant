<?php
require("header.php");
require("menu.php");
?>

<?php
if(checkLoggedin())
{
$outcome=get_follow_up_data();

echo "<table>";
echo "<tr>";
echo "<th>S.No</th>";
echo "<th>Case Assign Date</th>";
echo "<th>Name</th>";
echo "<th>Phone</th>";
echo "<th>Email</th>";
echo "<th>Destination 1</th>";
echo "<th>Counseller</th>";
echo "<th>Comments</th>";
echo "<th>Fee Status</th>";
echo "<th>Case Handler 1</th>";
echo "<th>University 1</th>";
echo "<th>Outcome Destination 1</th>";
echo "<th>Case Status 1</th>";
echo "<th>Destination 2</th>";
echo "<th>Case Handler 2</th>";
echo "<th>University 2</th>";
echo "<th>Outcome Destination 2</th>";
echo "<th>Case Status 2</th>";
echo "<th>Course</th>";
echo "<th>Intake</th>";
echo "<th>Missing Documents</th>";
echo "<th>Final Comments</th>";
if(checkPrivilage($_SESSION["user_type"],"admin") || checkPrivilage($_SESSION["user_type"],"accounts") || checkPrivilage($_SESSION["user_type"],"case_admin"))
{
echo "<th>Update</th>";
echo "<th>Delete</th>";
}
echo "<th>Follow Up Data</th>";
echo "</tr>";

foreach($outcome as $rows)
{
    echo "<tr>";
    echo "<td>".$rows['id']."</td>";
    echo "<td>".$rows['case_assign_date']."</td>";
    echo "<td>".$rows['name']."</td>";
    echo "<td>".$rows['phone']."</td>";
    echo "<td>".$rows['email']."</td>";
    echo "<td>".$rows['dest_1']."</td>";
    echo "<td>".$rows['consultant_name']."</td>";
    echo "<td>".$rows['comments']."</td>";
    echo "<td>".$rows['status_name']."</td>";
    echo "<td>".$rows['admin']."</td>";
    echo "<td>".$rows['university_1']."</td>";
    echo "<td>".$rows['outcome_destination_1']."</td>";
    echo "<td>".$rows['case_status_1']."</td>";
    echo "<td>".$rows['dest_2']."</td>";
    echo "<td>".$rows['case_handler_2']."</td>";
    echo "<td>".$rows['university_2']."</td>";
    echo "<td>".$rows['outcome_destination_2']."</td>";
    echo "<td>".$rows['case_status_2']."</td>";
    echo "<td>".$rows['course']."</td>";
    echo "<td>".$rows['intake']."</td>";
    echo "<td>".$rows['missing_docs']."</td>";
    echo "<td>".$rows['final_comments']."</td>";
    if(checkPrivilage($_SESSION["user_type"],"admin") || checkPrivilage($_SESSION["user_type"],"accounts") || checkPrivilage($_SESSION["user_type"],"case_admin"))
    {
    echo "<td><form method='POST' action='update_inproces.php'><input type='hidden' name='update' value='".$rows['id']."'><input type='submit' name='update_btn' value='Update'></form></td>";
    echo "<td><form method='POST' action='delete_inproces.php'><input type='hidden' name='delete' value='".$rows['id']."'><input type='submit' name='delete_btn' value='Delete'></form></td>";
    }
    echo "<td><form method='POST' action='follow_up_inprocess.php'><input type='hidden' name='follow' value='".$rows['id']."'><input type='submit' name='follow_btn' value='Follow Up'></form></td>";
    echo "</tr>";
}



echo "</table>";
}
else
{
    header("Location:login.php");
}
?>







<?php
require("footer.php")

?>