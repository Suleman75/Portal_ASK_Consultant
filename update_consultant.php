<?php
$page_name="Update Consultants";
require("menu.php");
require("header.php");
if(isset($_POST["update_done"]))
{
    $new_data["consultant_name"]=$_POST["consultant_name"];
    updateData("consultant",$new_data,"id=".$_POST["id"]);
    header("Location:show_consultant.php");
}
if(isset($_POST["update_btn"]))
{
    $user_data=selectData("consultant","id=".$_POST["update"]);
}
else
{
    header("Location:show_consultant.php");
}
?>
<form method="POST" style="margin-top:220px !important;">
<?php
foreach($user_data as $rows)
{

?>
    <label>S.No:</label><?php echo $_POST["update"];?><br>
    <input type="hidden" name="id" value="<?php echo $_POST["update"]    ?>">
    <label>Consultant Name:</label><br><input class="form-control form-control-lg" type="text" name="consultant_name" value="<?php echo $rows['consultant_name'] ?>"><br><br>
    <input type="button" class="btn btn-lg btn-primary btn-lg w-100 mt-4 mb-0" type="submit" value="Update" name="update_done">
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