<?php
$page_name="Add Extra Data";
require("menu.php");
require("header.php");
?>
<?php
    if(isset($_POST["extras"]))
    {
        $_SESSION["extras"]=$_POST["extras"];
        $extraData=selectData($_SESSION["extras"],"enabled=1");
    }
?>

<?php
if(checkPrivilage($_SESSION["user_type"],"admin"))
{

?>
<form method="POST" style="margin-top:220px !important;">
<div class="container-fluid py-4">
      <div class="row">
        <div class="col-12">
<label>Select Type: </label><br>
<select name="extras" class="form-control form-control-lg">
        <!-- Leads  -->
    <option value="consultant">Consultant Name</option>
    <option value="country">Country</option>
    <option value="inquiry_form_location">Inquiry Form Location</option>
    <option value="lead_priority">Lead Priority Name</option>
    <option value="source">Source Name</option>
        <!-- In Process  -->
    <option value="case_status">Case Status</option>
    <option value="destination">Destination</option>
    <option value="fee_status">Fee Status</option>
        <!-- Follow Up -->
    <option value="call_outcome">Call Outcome</option>    
    <option value="follow_up_action">Follow Up Action</option>
</select><br><br>
<input type="submit" name="submit" value="Save" class="btn btn-lg btn-primary btn-lg w-100 mt-4 mb-0">
<?php
if(isset($_SESSION["extras"]))
{
    create_extra_data_table();
    create_extra_data_table_data($extraData);
}

?>
</div></div></div>
</form>
<?php

}
else
{
    header("Location:show_inprocess.php");
}
?>




<?php
require("footer.php");

?>