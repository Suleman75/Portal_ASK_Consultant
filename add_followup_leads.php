<?php
$page_name="Update Follow Up";
require("menu.php");
require("header.php");
$outcome=selectData("call_outcome","enabled=1");
$action=selectData("follow_up_action","enabled=1");
if(isset($_POST["insert_done"]))
{
    $new_data["user_id"]=$_POST["user_id"];
    $new_data["follow_up_number"]=$_POST["follow_up_number"];
    $new_data["follow_up_date"]=$_POST["follow_up_date"];
    $new_data["follow_up_outcome_id"]=$_POST["follow_up_outcome_id"];
    $new_data["additional_comment"]=$_POST["additional_comment"];
    $new_data["follow_up_action_id"]=$_POST["follow_up_action_id"];
    $new_data["staff_member"]=$_POST["staff_member"];
    insertData("follow_up_info",$new_data,"user_id=".$_POST["user_id"]);
    header("Location:follow_up.php?user_id=".$_POST["user_id"]);
}
?>
<form method="POST" style="margin-top:220px !important;">
<?php


?>
<div class="container-fluid py-4">
      <div class="row">
        <div class="col-12">
    <label>S.No:</label><?php echo $_POST["update_btn"];?><br>
    <input type="hidden" name="user_id" value="<?php echo $_POST["update_btn"];    ?>">
    <label>Follow Up Number:</label><br><input class="form-control form-control-lg" type="text" name="follow_up_number"><br>
    <label>Follow Up Date:</label><br><input class="form-control form-control-lg" type="text" name="follow_up_date"><br>
    <label>Follow Up Outcome:</label><br>
    <select name="follow_up_outcome_id" class="form-control form-control-lg">
        <?php
            foreach($outcome as $rows1)
            {
                ?>
                <option value="<?php echo $rows1["id"]  ?>"><?php echo $rows1["outcome_name"]  ?></option>
                <?php
            }
        ?>
    </select><br>
    
    
    <label>Additional Comments:</label><br><input class="form-control form-control-lg" type="text" name="additional_comment"><br>
    <label>Follow Up Action:</label><br>
    <select name="follow_up_action_id" class="form-control form-control-lg">
        <?php
            foreach($action as $rows2)
            {
                
                ?>

                <option value="<?php echo $rows2["id"]  ?>"><?php echo $rows2["action_name"]  ?></option>
                
                <?php
                
            }
        ?>
    </select><br>
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