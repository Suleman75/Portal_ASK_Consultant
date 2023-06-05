<?php
$page_name="Add Extra Data";
require("menu.php");
require("header.php");
?>
<?php
    if(isset($_POST["extras"]))
    {
        insertDataExtra($_POST["extras"],$_POST["extra_value"]);
    }
?>

<?php
if(checkPrivilage($_SESSION["user_type"],"admin"))
{

?>
<form method="POST">
<label>Enter Value: </label><br>
<input type="text" name="extra_value"><br>
<label>Select Type: </label><br>
<select name="extras">
        
    <option value="consultant">Consultant Name</option>
    <option value="country">Country</option>
    <option value="inquiry_form_location">Inquiry Form Location</option>
    <option value="lead_priority">Lead Priority Name</option>
    <option value="source">Source Name</option>

    <option value="call_outcome">Call Outcome</option>    
    <option value="follow_up_action">Follow Up Action</option>
</select><br><br>
<input type="submit" name="submit" value="Save">
</form>
<?php
}
else
{
    header("Location:show_inprocess.php");
}
?>




<?php
require("footer.php")

?>