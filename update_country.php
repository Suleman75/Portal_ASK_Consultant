<?php
$page_name="Update Country";
require("menu.php");
require("header.php");
if(isset($_POST["update_done"]))
{
    $new_data["country_name"]=$_POST["country_name"];
    updateData("country",$new_data,"id=".$_POST["id"]);
    header("Location:show_country.php");
}
if(isset($_POST["update_btn"]))
{
    $user_data=selectData("country","id=".$_POST["update"]);
}
else
{
    header("Location:show_country.php");
}
?>
<form method="POST" style="margin-top:220px !important;">
<?php
foreach($user_data as $rows)
{

?>
    <label>S.No:</label><?php echo $_POST["update"];?><br>
    <input type="hidden" name="id" value="<?php echo $_POST["update"]    ?>">
    <label>country Name:</label><br><input class="form-control form-control-lg" type="text" name="country_name" value="<?php echo $rows['country_name'] ?>"><br><br>
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