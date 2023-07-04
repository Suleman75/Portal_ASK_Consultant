<?php
$page_name="Update Inprocess - Follow Up";
require("menu.php");
require("header.php");
if(isset($_POST["update_done"]))
{
    $new_data["follow_up_number"]=$_POST["follow_up_number"];
    $new_data["follow_up_date"]=$_POST["follow_up_date"];
    $new_data["follow_up_outcome"]=$_POST["follow_up_outcome_id"];
    $new_data["additional_comment"]=$_POST["additional_comment"];
    $new_data["follow_up_action"]=$_POST["follow_up_action_id"];
    $new_data["staff_member"]=$_POST["staff_member"];
    updateData("follow_up_inprocess",$new_data,"id=".$_POST["id"]);
    header("Location:follow_up_inprocess.php?user_id=".$_POST["user_id"]);
}
if(isset($_POST["update_btn"]))
{
    $user_data=get_single_follow_up_for_one_inprocess($_POST["update"]);
}
else
{
    header("Location:follow_up_inprocess.php?user_id=".$_POST["user_id"]);
}
?>
<form method="POST" style="margin-top:220px !important;">
<?php
foreach($user_data as $rows)
{

?>
    <label>S.No:</label><?php echo $_POST["user_id"];?><br>
    <input type="hidden" name="id" value="<?php echo $_POST["update"]    ?>">
    <input type="hidden" name="user_id" value="<?php echo $_POST["user_id"]    ?>">
    <label>Follow Up Number:</label><br><input class="form-control form-control-lg" type="text" name="follow_up_number" value="<?php echo $rows['follow_up_number'] ?>"><br>
    <label>Follow Up Date:</label><br><input class="form-control form-control-lg" type="text" name="follow_up_date"  value="<?php echo $rows['follow_up_date'] ?>"><br>
    <label>Follow Up Outcome:</label><br><input class="form-control form-control-lg" type="text" name="follow_up_outcome_id"  value="<?php echo $rows['follow_up_outcome'] ?>"><br>
    <label>Additional Comments:</label><br><input class="form-control form-control-lg" type="text" name="additional_comment" value="<?php echo $rows['additional_comment'] ?>"><br>
    <label>Follow Up Action:</label><br><input class="form-control form-control-lg" type="text" name="follow_up_action_id" value="<?php echo $rows['follow_up_action'] ?>"><br>
    <label>Staff Member:</label><br><input class="form-control form-control-lg" type="text" name="staff_member" value="<?php echo $rows['staff_member'] ?>"><br>
    <br>
    <input class="btn btn-lg btn-primary btn-lg w-100 mt-4 mb-0" type="submit" value="Update" name="update_done">
<?php
}

?>
</form>
<?php
  header("Cache-Control: no cache");

?>
<?php

require("footer.php");
?>