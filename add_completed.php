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
    insertData("completed",$new_data,"id=".$_POST["id"]);
    header("Location:show_completed.php");
}
?>
<form method="POST">
<?php

if(checkPrivilage($_SESSION["user_type"],"admin") || checkPrivilage($_SESSION["user_type"],"accounts"))
{
?>
    <label>Date:</label><br><input type="text" name="date"><br>
    <label>Name:</label><br><input type="text" name="full_name" ><br>
    <label>Phone Number:</label><br><input type="text" name="phone" ><br>
    <label>Country:</label><br><input type="text" name="country" ><br>
    <label>Course:</label><br><input type="text" name="course" ><br>
    <label>University:</label><br><input type="text" name="university" ><br>
    <label>Consultant:</label><br><input type="text" name="consultant" ><br>
    <label>Brand:</label><br><input type="text" name="brand" ><br>
    <label>Intake:</label><br><input type="text" name="intake" ><br>
    <label>Notes:</label><br><input type="text" name="notes" ><br>
    <label>Visa Status:</label><br><input type="text" name="visa_status" ><br>
    <label>Comments:</label><br><input type="text" name="comments" ><br>
    <br>
    <input type="submit" value="Update" name="update_done">
<?php
}

?>
</form>