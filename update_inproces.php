<?php
require("config.php");
if(isset($_POST["update_done"]))
{
    $new_data["case_assign_date"]=$_POST["case_assign_date"];
    $new_data["name"]=$_POST["name"];
    $new_data["phone"]=$_POST["phone"];
    $new_data["email"]=$_POST["email"];
    $new_data["destination_1"]=$_POST["destination_1"];
    $new_data["counselor"]=$_POST["counselor"];
    $new_data["comments"]=$_POST["comments"];
    $new_data["fee_status"]=$_POST["fee_status"];
    $new_data["admin"]=$_POST["admin"];
    $new_data["university_1"]=$_POST["university_1"];
    $new_data["outcome_destination_1"]=$_POST["outcome_destination_1"];
    $new_data["case_status_1"]=$_POST["case_status_1"];
    $new_data["destination_2"]=$_POST["destination_2"];
    $new_data["case_handler_2"]=$_POST["case_handler_2"];
    $new_data["university_2"]=$_POST["university_2"];
    $new_data["outcome_destination_2"]=$_POST["outcome_destination_2"];
    $new_data["case_status_2"]=$_POST["case_status_2"];
    $new_data["course"]=$_POST["course"];
    $new_data["intake"]=$_POST["intake"];
    $new_data["missing_docs"]=$_POST["missing_docs"];
    $new_data["final_comments"]=$_POST["final_comments"];
    updateData("in_process",$new_data,"id=".$_POST["id"]);
    header("Location:show_inprocess.php");
}
if(isset($_POST["update_btn"]))
{
    $user_data=selectData("in_process","id=".$_POST["update"]);
}
else
{
    header("Location:show_inprocess.php");
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
    <label>Case Assign Date:</label><br><input type="text" name="case_assign_date" value="<?php echo $rows['case_assign_date'] ?>"><br>
    <label>Name:</label><br><input type="text" name="name" value="<?php echo $rows['name'] ?>"><br>
    <label>Phone Number:</label><br><input type="text" name="phone" value="<?php echo $rows['phone'] ?>"><br>
    <label>Email:</label><br><input type="text" name="email" value="<?php echo $rows['email'] ?>"><br>
    <label>Destination 1:</label><br><input type="text" name="destination_1" value="<?php echo $rows['destination_1'] ?>"><br>
    <label>Counselor:</label><br><input type="text" name="counselor" value="<?php echo $rows['counselor'] ?>"><br>
    <label>Comments:</label><br><input type="text" name="comments" value="<?php echo $rows['comments'] ?>"><br>
    <label>Fee Status:</label><br><input type="text" name="fee_status" value="<?php echo $rows['fee_status'] ?>"><br>
    <label>Case Handler 1:</label><br><input type="text" name="admin" value="<?php echo $rows['admin'] ?>"><br>
    <label>University 1:</label><br><input type="text" name="university_1" value="<?php echo $rows['university_1'] ?>"><br>
    <label>Outcome Destination 1:</label><br><input type="text" name="outcome_destination_1" value="<?php echo $rows['outcome_destination_1'] ?>"><br>
    <label>Case Status 1:</label><br><input type="text" name="case_status_1" value="<?php echo $rows['case_status_1'] ?>"><br>
    <label>Destination 2:</label><br><input type="text" name="destination_2" value="<?php echo $rows['destination_2'] ?>"><br>
    <label>Case Handler 2:</label><br><input type="text" name="case_handler_2" value="<?php echo $rows['case_handler_2'] ?>"><br>
    <label>University 2:</label><br><input type="text" name="university_2" value="<?php echo $rows['university_2'] ?>"><br>
    <label>Outcome Destination 2:</label><br><input type="text" name="outcome_destination_2" value="<?php echo $rows['outcome_destination_2'] ?>"><br>
    <label>Case Status 2:</label><br><input type="text" name="case_status_2" value="<?php echo $rows['case_status_2'] ?>"><br>
    <label>Course:</label><br><input type="text" name="course" value="<?php echo $rows['course'] ?>"><br>
    <label>Intake:</label><br><input type="text" name="intake" value="<?php echo $rows['intake'] ?>"><br>
    <label>Missing Docs:</label><br><input type="text" name="missing_docs" value="<?php echo $rows['missing_docs'] ?>"><br>
    <label>Final Comments:</label><br><input type="text" name="final_comments" value="<?php echo $rows['final_comments'] ?>"><br>
    
    
    <br>
    <input type="submit" value="Update" name="update_done">
<?php
}

?>
</form>