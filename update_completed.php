<?php
require("config.php");
if(isset($_POST["update_done"]))
{
    $new_data["date"]=$_POST["date"];
    $new_data["full_name"]=$_POST["full_name"];
    $new_data["phone"]=$_POST["phone"];
    $new_data["country"]=$_POST["country"];
    $new_data["course"]=$_POST["course"];
    $new_data["university"]=$_POST["university"];
    $new_data["consultant"]=$_POST["consultant"];
    $new_data["brand"]=$_POST["brand"];
    $new_data["intake"]=$_POST["intake"];
    $new_data["notes"]=$_POST["notes"];
    $new_data["visa_status"]=$_POST["visa_status"];
    $new_data["comments"]=$_POST["comments"];
    updateData("completed",$new_data,"id=".$_POST["id"]);
    header("Location:show_completed.php");
}
if(isset($_POST["update_btn"]))
{
    $user_data=selectData("completed","id=".$_POST["update"]);
}
else
{
    header("Location:show_completed.php");
}
?>
<form method="POST">
<?php
foreach($user_data as $rows)
{

?>
    <label>S.No:</label><?php echo $_POST["update"];?><br>
    <input type="hidden" name="id" value="<?php echo $_POST["update"]    ?>">
    <input type="hidden" name="user_id" value="<?php echo $_POST["update"]    ?>">
    <label>Date:</label><br><input type="text" name="date" value="<?php echo $rows['date'] ?>"><br>
    <label>Name:</label><br><input type="text" name="full_name" value="<?php echo $rows['full_name'] ?>"><br>
    <label>Phone Number:</label><br><input type="text" name="phone" value="<?php echo $rows['phone'] ?>"><br>
    <label>Country:</label><br><input type="text" name="country" value="<?php echo $rows['country'] ?>"><br>
    <label>Course:</label><br><input type="text" name="course" value="<?php echo $rows['course'] ?>"><br>
    <label>University:</label><br><input type="text" name="university" value="<?php echo $rows['university'] ?>"><br>
    <label>Consultant:</label><br><input type="text" name="consultant" value="<?php echo $rows['consultant'] ?>"><br>
    <label>Brand:</label><br><input type="text" name="brand" value="<?php echo $rows['brand'] ?>"><br>
    <label>Intake:</label><br><input type="text" name="intake" value="<?php echo $rows['intake'] ?>"><br>
    <label>Notes:</label><br><input type="text" name="notes" value="<?php echo $rows['notes'] ?>"><br>
    <label>Visa Status:</label><br><input type="text" name="visa_status" value="<?php echo $rows['visa_status'] ?>"><br>
    <label>Comments:</label><br><input type="text" name="comments" value="<?php echo $rows['comments'] ?>"><br>
    <br>
    <input type="submit" value="Update" name="update_done">
<?php
}

?>
</form>