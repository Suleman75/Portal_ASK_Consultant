<?php
$page_name="Update Inquiry Locations";
require("menu.php");
require("header.php");
if(isset($_POST["update_done"]))
{
    $new_data["inquiry_location"]=$_POST["inquiry_location"];
    updateData("inquiry_form_location",$new_data,"id=".$_POST["id"]);
    header("Location:show_inquiry_location.php");
}
if(isset($_POST["update_btn"]))
{
    $user_data=selectData("inquiry_form_location","id=".$_POST["update"]);
}
else
{
    header("Location:show_inquiry_location.php");
}
?>
<form method="POST" style="margin-top:220px !important;">
<?php
foreach($user_data as $rows)
{

?>
    <label>S.No:</label><?php echo $_POST["update"];?><br>
    <input type="hidden" name="id" value="<?php echo $_POST["update"]    ?>">
    <label>Inquiry Location:</label><br><input class="form-control form-control-lg" type="text" name="inquiry_location" value="<?php echo $rows['inquiry_location'] ?>"><br><br>
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