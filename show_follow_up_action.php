<?php
require("header.php");
require("menu.php");
?>

<?php
if(checkPrivilage($_SESSION["user_type"],"admin"))
{
$outcome=selectData("follow_up_action","enabled=1");

echo "<table>";
echo "<tr>";
echo "<th>S.No</th>";
echo "<th>Action Name</th>";
echo "<th>Update</th>";
echo "<th>Delete</th>";
echo "</tr>";

foreach($outcome as $rows)
{
    echo "<tr>";
    echo "<td>".$rows['id']."</td>";
    echo "<td>".$rows['action_name']."</td>";
    echo "<td><form method='POST' action='update_follow_up_action.php'><input type='hidden' name='update' value='".$rows['id']."'><input type='submit' name='update_btn' value='Update'></form></td>";
    echo "<td><form method='POST' action='delete_follow_up_action.php'><input type='hidden' name='delete' value='".$rows['id']."'><input type='submit' name='delete_btn' value='Delete'></form></td>";
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