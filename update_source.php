<?php
require("config.php");
if(isset($_POST["update_done"]))
{
    $new_data["source_name"]=$_POST["source_name"];
    updateData("source",$new_data,"id=".$_POST["id"]);
    header("Location:show_source.php");
}
if(isset($_POST["update_btn"]))
{
    $user_data=selectData("source","id=".$_POST["update"]);
}
else
{
    header("Location:show_source.php");
}
?>
<form method="POST">
<?php
foreach($user_data as $rows)
{

?>
    <label>S.No:</label><?php echo $_POST["update"];?><br>
    <input type="hidden" name="id" value="<?php echo $_POST["update"]    ?>">
    <label>source Name:</label><br><input type="text" name="source_name" value="<?php echo $rows['source_name'] ?>"><br><br>
    <input type="submit" value="Update" name="update_done">
<?php
}

?>
</form>