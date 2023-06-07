<?php
$page_name="Add Inprocess Case";
require("menu.php");
require("header.php");
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
    insertData("in_process",$new_data,"id=".$_POST["id"]);
    header("Location:show_inprocess.php");
}
?>
<form method="POST" style="margin-top:220px !important;">
<?php

if(checkPrivilage($_SESSION["user_type"],"admin") || checkPrivilage($_SESSION["user_type"],"accounts") || checkPrivilage($_SESSION["user_type"],"case_admin"))
    {
?>
    <label>Case Assign Date:</label><br><input class="form-control form-control-lg" type="text" name="case_assign_date" ><br>
    <label>Name:</label><br><input class="form-control form-control-lg" type="text" name="name" ><br>
    <label>Phone Number:</label><br><input required class="form-control form-control-lg" type="text" name="phone"><br>
    <label>Email:</label><br><input class="form-control form-control-lg" type="text" name="email" ><br>
    <label>Destination 1:</label><br><input class="form-control form-control-lg" type="text" name="destination_1"><br>
    <label>Counselor:</label><br><input class="form-control form-control-lg" type="text" name="counselor" ><br>
    <label>Comments:</label><br><input class="form-control form-control-lg" type="text" name="comments" ><br>
    <label>Fee Status:</label><br><input class="form-control form-control-lg" type="text" name="fee_status" ><br>
    <label>Case Handler 1:</label><br><input class="form-control form-control-lg" type="text" name="admin" ><br>
    <label>University 1:</label><br><input class="form-control form-control-lg" type="text" name="university_1" ><br>
    <label>Outcome Destination 1:</label><br><input class="form-control form-control-lg" type="text" name="outcome_destination_1" ><br>
    <label>Case Status 1:</label><br><input class="form-control form-control-lg" type="text" name="case_status_1" ><br>
    <label>Destination 2:</label><br><input class="form-control form-control-lg" type="text" name="destination_2" ><br>
    <label>Case Handler 2:</label><br><input class="form-control form-control-lg" type="text" name="case_handler_2" ><br>
    <label>University 2:</label><br><input class="form-control form-control-lg" type="text" name="university_2" ><br>
    <label>Outcome Destination 2:</label><br><input class="form-control form-control-lg" type="text" name="outcome_destination_2" ><br>
    <label>Case Status 2:</label><br><input class="form-control form-control-lg" type="text" name="case_status_2" ><br>
    <label>Course:</label><br><input class="form-control form-control-lg" type="text" name="course" ><br>
    <label>Intake:</label><br><input class="form-control form-control-lg" type="text" name="intake" ><br>
    <label>Missing Docs:</label><br><input class="form-control form-control-lg" type="text" name="missing_docs" ><br>
    <label>Final Comments:</label><br><input class="form-control form-control-lg" type="text" name="final_comments" ><br>
    
    
    <br>
    <input type="submit" value="Update" name="update_done" class="btn btn-lg btn-primary btn-lg w-100 mt-4 mb-0">
<?php

    }
?>
</form>
<?php
require("footer.php");

?>