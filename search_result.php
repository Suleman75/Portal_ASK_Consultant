<?php
require("header.php");
require("menu.php");

$user_data=get_all_data_follow();

?>
<form method="POST" action="show_single_user.php">
<label>Search: </label><br><input type="text" name="user_id"><br><br>
<input type="submit" value="Search"><br>
</form>

<form method="POST" action="search_result.php">
<label>Search With Follow Up: </label><br>
<select name="type">
  <option value="Follow">Follow</option>
  <option value="Followed">Followed</option>
  <option value="Visit">Visit</option>
  <option value="Visited">Visited</option>
  <option value="No Follow">No Follow</option>
</select><br>
<br><input type="date" name="date"><br><br>

<input type="submit" value="Search With Follow Up"><br>
</form>


<?php

?>
<br><br><br>
<?php



if(checkPrivilage($_SESSION["user_type"],"admin") || checkPrivilage($_SESSION["user_type"],"counsellor") || checkPrivilage($_SESSION["user_type"],"case_admin"))
{
if(isset($_POST["type"]))
{
    // echo $_POST["date"]."<br>";
    $_POST["date"] = date("j/n/Y", strtotime($_POST["date"]));
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
    if(checkPrivilage($_SESSION["user_type"],"admin") || checkPrivilage($_SESSION["user_type"],"counsellor"))
    {
        echo "<th>Update</th>";
        echo "<th>Delete</th>";
    }
    echo "<th>Follow Up Data</th>";
    echo "</tr>";
    foreach($user_data as $rows)
    {
        $dates=explode(" ",$rows["follow_up_date"]);
        if($dates[0]==$_POST["type"] && $dates[1]==$_POST["date"])
        {
            
            
            
            
            
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
                if(checkPrivilage($_SESSION["user_type"],"admin") || checkPrivilage($_SESSION["user_type"],"counsellor"))
                {
                    echo "<td><form method='POST' action='update_user.php'><input type='hidden' name='update' value='".$rows['main_id']."'><input type='submit' name='update_btn' value='Update'></form></td>";
                    echo "<td><form method='POST' action='delete_user.php'><input type='hidden' name='delete' value='".$rows['main_id']."'><input type='submit' name='delete_btn' value='Delete'></form></td>";
                }
                echo "<td><form method='POST' action='follow_up.php'><input type='hidden' name='follow' value='".$rows['main_id']."'><input type='submit' name='follow_btn' value='Follow Up'></form></td>";
                echo "</tr>";
            
            
            
                
            }
            echo "</table>";
            
        }
    }
}
// $i=0;
// $old_id=0;

}
else
{
    header("Location:show_inprocess.php");
}



require("footer.php");
?>