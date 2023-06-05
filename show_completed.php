<?php
$page_name="Completed Case";
require("menu.php");
require("header.php");
?>

<?php
if(checkPrivilage($_SESSION["user_type"],"admin") || checkPrivilage($_SESSION["user_type"],"accounts"))
{
$outcome=selectData("completed","enabled=1");

echo "<table>";
echo "<tr>";
echo "<th>S.No</th>";
echo "<th>Date</th>";
echo "<th>Name</th>";
echo "<th>Phone</th>";
echo "<th>Country</th>";
echo "<th>Course</th>";
echo "<th>University</th>";
echo "<th>Consultant</th>";
echo "<th>Brand</th>";
echo "<th>Intake</th>";
echo "<th>Notes</th>";
echo "<th>Visa Status</th>";
echo "<th>Comments</th>";

echo "<th>Update</th>";
echo "<th>Delete</th>";

echo "</tr>";

foreach($outcome as $rows)
{
    echo "<tr>";
    echo "<td>".$rows['id']."</td>";
    echo "<td>".$rows['date']."</td>";
    echo "<td>".$rows['full_name']."</td>";
    echo "<td>".$rows['phone']."</td>";
    echo "<td>".$rows['country']."</td>";
    echo "<td>".$rows['course']."</td>";
    echo "<td>".$rows['university']."</td>";
    echo "<td>".$rows['consultant']."</td>";
    echo "<td>".$rows['brand']."</td>";
    echo "<td>".$rows['intake']."</td>";
    echo "<td>".$rows['notes']."</td>";
    echo "<td>".$rows['visa_status']."</td>";
    echo "<td>".$rows['comments']."</td>";
    echo "<td><form method='POST' action='update_completed.php'><input type='hidden' name='update' value='".$rows['id']."'><input type='submit' name='update_btn' value='Update'></form></td>";
    echo "<td><form method='POST' action='delete_completed.php'><input type='hidden' name='delete' value='".$rows['id']."'><input type='submit' name='delete_btn' value='Delete'></form></td>";   
    echo "</tr>";
}
echo "</table>";
}
else
{
    header("Location:show_inprocess.php");
}
?>







<?php
require("footer.php")

?>