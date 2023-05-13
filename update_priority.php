<?php
require("config.php");
if(isset($_POST["update_done"]))
{
    $new_data["priority_name"]=$_POST["priority_name"];
    updateData("lead_priority",$new_data,"id=".$_POST["id"]);
    header("Location:show_priority.php");
}
if(isset($_POST["update_btn"]))
{
    $user_data=selectData("lead_priority","id=".$_POST["update"]);
}
else
{
    header("Location:show_priority.php");
}
?>
<form method="POST">
<?php
foreach($user_data as $rows)
{

?>
    <label>S.No:</label><?php echo $_POST["update"];?><br>
    <input type="hidden" name="id" value="<?php echo $_POST["update"]    ?>">
    <label>Priority Name:</label><br><input type="text" name="priority_name" value="<?php echo $rows['priority_name'] ?>"><br><br>
    <input type="submit" value="Update" name="update_done">
<?php
}

?>
</form>