<?php
require("header.php");
require("menu.php");
if(!isset($_POST["min"]) || !isset($_POST["max"]))
{
    $_POST["min"]=1;
    $_POST["max"]=1000;
}
if(isset($_POST["pagenumber"]))
{
    for($i=1;$i<$_POST["pagenumber"];$i++)
    {
        $_POST["min"]=$_POST["min"]+1000;
        $_POST["max"]=$_POST["max"]+1000;
    }
    
}
$min=$_POST["min"];
$max=$_POST["max"];
$user_data=get_all_data($min,$max);



$max_id=get_max_id("user_info");
for($i=1;$i<=ceil($max_id/1000);$i++)
{
    echo "<form method='POST' style='display:inline;'><input type='submit' name='pagenumber' value=$i></form>&nbsp;&nbsp;&nbsp;";
}
?>
<br><br><br>
<?php


// $i=0;
// $old_id=0;
echo "<table>";
echo "<tr>";
echo "<th>S.No</th>";
echo "<th>Lead priority</th>";
echo "<th>Date</th>";
echo "<th>Name</th>";
echo "<th>Phone Number</th>";
echo "<th>Sources</th>";
echo "<th>Country</th>";
echo "<th>Visited</th>";
echo "<th>Inquiry Form Location</th>";
echo "<th>Consultant</th>";
echo "<th>Qualification</th>";
echo "<th>Comments/Inquiry</th>";
echo "<th>Expected Budget</th>";
echo "<th>Update</th>";
echo "<th>Delete</th>";
echo "<th>Follow Up Data</th>";
echo "</tr>";


foreach($user_data as $rows)
{
    // echo $i."-".$rows["full_name"]."<br>";
    // $i++;

    

    echo "<tr>";
    echo "<td>".$rows['main_id']."</td>";
    echo "<td>".$rows['priority_name']."</td>";
    echo "<td style='width:10px !important;'>".$rows['apply_date']."</td>";
    echo "<td>".$rows['full_name']."</td>";
    echo "<td>".$rows['phone_number']."</td>";
    echo "<td>".$rows['source_name']."</td>";
    echo "<td>".$rows['country_name']."</td>";
    echo "<td>".$rows['visited']."</td>";
    echo "<td>".$rows['inquiry_location']."</td>";
    echo "<td>".$rows['consultant_name']."</td>";
    echo "<td>".$rows['qualification']."</td>";
    echo "<td>".$rows['comments']."</td>";
    echo "<td>".$rows['budget']."</td>";
    echo "<td><form method='POST' action='update_user.php'><input type='hidden' name='update' value='".$rows['main_id']."'><input type='submit' name='update_btn' value='Update'></form></td>";
    echo "<td><form method='POST' action='delete_user.php'><input type='hidden' name='delete' value='".$rows['main_id']."'><input type='submit' name='delete_btn' value='Delete'></form></td>";
    echo "<td><form method='POST' action='follow_up.php'><input type='hidden' name='follow' value='".$rows['main_id']."'><input type='submit' name='follow_btn' value='Follow Up'></form></td>";
    echo "</tr>";



    
}
echo "</table>";





require("footer.php");
?>