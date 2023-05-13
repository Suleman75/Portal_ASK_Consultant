<?php
require("header.php");
require("menu.php");
?>

<?php
$outcome=selectData("source","enabled=1");

echo "<table>";
echo "<tr>";
echo "<th>S.No</th>";
echo "<th>source Name</th>";
echo "<th>Update</th>";
echo "<th>Delete</th>";
echo "</tr>";

foreach($outcome as $rows)
{
    echo "<tr>";
    echo "<td>".$rows['id']."</td>";
    echo "<td>".$rows['source_name']."</td>";
    echo "<td><form method='POST' action='update_source.php'><input type='hidden' name='update' value='".$rows['id']."'><input type='submit' name='update_btn' value='Update'></form></td>";
    echo "<td><form method='POST' action='delete_source.php'><input type='hidden' name='delete' value='".$rows['id']."'><input type='submit' name='delete_btn' value='Delete'></form></td>";
    echo "</tr>";
}



echo "</table>";
?>







<?php
require("footer.php")

?>