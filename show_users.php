<?php
$page_name="Show Students";
require("menu.php");
require("header.php");
?>

<?php

if(checkPrivilage($_SESSION["user_type"],"admin"))
{
    $outcome=selectData("admin_info","enabled=1");

echo "<table>";
echo "<tr>";
echo "<th>S.No</th>";
echo "<th>User Type</th>";
echo "<th>Username</th>";
echo "<th>Password</th>";
echo "<th>Full Name</th>";
echo "<th>Update</th>";
echo "<th>Delete</th>";
echo "</tr>";

foreach($outcome as $rows)
{
    echo "<tr>";
    echo "<td>".$rows['id']."</td>";
    echo "<td>".$rows['user_type']."</td>";
    echo "<td>".$rows['username']."</td>";
    echo "<td>".$rows['password']."</td>";
    echo "<td>".$rows['full_name']."</td>";
    echo "<td><form method='POST' action='update_admin.php'><input type='hidden' name='update' value='".$rows['id']."'><input type='submit' name='update_btn' value='Update'></form></td>";
    echo "<td><form method='POST' action='delete_admin.php'><input type='hidden' name='delete' value='".$rows['id']."'><input type='submit' name='delete_btn' value='Delete'></form></td>";
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
require("footer.php");

?>