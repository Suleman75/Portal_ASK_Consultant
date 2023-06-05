<?php
$page_name="Update Follow Up Actions";
require("menu.php");
require("header.php");
if(isset($_POST["update_done"]))
{
    $new_data["action_name"]=$_POST["action_name"];
    updateData("follow_up_action",$new_data,"id=".$_POST["id"]);
    header("Location:show_follow_up_action.php");
}
if(isset($_POST["update_btn"]))
{
    $user_data=selectData("follow_up_action","id=".$_POST["update"]);
}
else
{
    header("Location:show_follow_up_action.php");
}
?>
<form method="POST">
<?php
foreach($user_data as $rows)
{

?>
    <label>S.No:</label><?php echo $_POST["update"];?><br>
    <input type="hidden" name="id" value="<?php echo $_POST["update"]    ?>">
    <label>Action Name:</label><br><input type="text" name="action_name" value="<?php echo $rows['action_name'] ?>"><br><br>
    <input type="submit" value="Update" name="update_done">
<?php
}

?>
</form>


<?php
require("footer.php");
?>