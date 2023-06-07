<?php
$page_name="Update Inprocess - Follow Up";
require("menu.php");
require("header.php");
if(isset($_POST["insert_done"]))
{
    $new_data["user_id"]=$_POST["user_id"];
    $new_data["follow_up_number"]=$_POST["follow_up_number"];
    $new_data["follow_up_date"]=$_POST["follow_up_date"];
    $new_data["follow_up_outcome"]=$_POST["follow_up_outcome_id"];
    $new_data["additional_comment"]=$_POST["additional_comment"];
    $new_data["follow_up_action"]=$_POST["follow_up_action_id"];
    $new_data["staff_member"]=$_POST["staff_member"];
    insertData("follow_up_inprocess",$new_data,"id=".$_POST["id"]);
    header("Location:follow_up_inprocess.php?user_id=".$_POST["user_id"]);
}
?>
<form method="POST" style="margin-top:220px !important;">
<?php


?>
<div class="container-fluid py-4">
      <div class="row">
        <div class="col-12">
    <label>S.No:</label><?php echo $_POST["update_btn"];?><br>
    <input type="hidden" name="user_id" value="<?php echo $_POST["update_btn"]    ?>">
    <label>Follow Up Number:</label><br><input class="form-control form-control-lg" type="text" name="follow_up_number"><br>
    <label>Follow Up Date:</label><br><input class="form-control form-control-lg" type="text" name="follow_up_date"><br>
    <label>Follow Up Outcome:</label><br><input class="form-control form-control-lg" type="text" name="follow_up_outcome_id"><br>
    <label>Additional Comments:</label><br><input class="form-control form-control-lg" type="text" name="additional_comment"><br>
    <label>Follow Up Action:</label><br><input class="form-control form-control-lg" type="text" name="follow_up_action_id"><br>
    <label>Staff Member:</label><br><input class="form-control form-control-lg" type="text" name="staff_member"><br>
    <br>
    <input class="btn btn-lg btn-primary btn-lg w-100 mt-4 mb-0" type="submit" value="Insert" name="insert_done">
<?php


?>
</div></div></div>
</form>

<?php

require("footer.php");
?>