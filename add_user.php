<?php
require("config.php");
$country=selectData("country","enabled=1");
$source=selectData("source","enabled=1");
$leads=selectData("lead_priority","enabled=1");
$inquiry=selectData("inquiry_form_location","enabled=1");
$consultant=selectData("consultant","enabled=1");
if(isset($_POST["update_done"]))
{
    $new_data["apply_date"]=$_POST["date"];
    $new_data["priority_id"]=$_POST["priority_id"];
    $new_data["full_name"]=$_POST["name"];
    if(selectNumRows("user_info","phone_number='".$_POST["phone"]."'")>0)
    {
        goto same_phone;
    }
    else
    {
        $new_data["phone_number"]=$_POST["phone"];
    }
    $new_data["apply_source_id"]=$_POST["apply_source_id"];
    $new_data["country_id"]=$_POST["country_id"];
    $new_data["visited"]=$_POST["visited"];
    $new_data["inquiry_form_location_id"]=$_POST["inquiry_form_location_id"];
    $new_data["consultant_id"]=$_POST["consultant_id"];
    $new_data["qualification"]=$_POST["qualification"];
    $new_data["comments"]=$_POST["comment"];
    $new_data["budget"]=$_POST["budget"];
    insertData("user_info",$new_data);
    header("Location:show_data.php");

    same_phone:
    echo "<script>alert('Phone Number Already Exists')</script>";
    echo "<script>window.location.href = 'add_user.php';</script>";
}
?>
<form method="POST">
<?php
if(checkPrivilage($_SESSION["user_type"],"admin") || checkPrivilage($_SESSION["user_type"],"counsellor"))
{


?>
    <label>Lead Priority:</label><br>
    <select name="priority_id">
        <?php
            foreach($leads as $rows1)
            {
                
                ?>
                
                <option value="<?php echo $rows1["id"]  ?>"><?php echo $rows1["priority_name"]  ?></option>
                
                <?php
                
            }
        ?>
    </select><br>
    <label>Date:</label><br><input type="text" name="date" value=""><br>
    <label>Name:</label><br><input type="text" name="name"  value=""><br>
    <label>Phone Number:</label><br><input type="text" name="phone" value=""><br>
    <label>Source:</label><br>
    <select name="apply_source_id">
        <?php
            foreach($source as $rows2)
            {
                
                ?>

                <option value="<?php echo $rows2["id"]  ?>"><?php echo $rows2["source_name"]  ?></option>
                
                <?php
                
            }
        ?>
    </select><br>
    <label>Country:</label><br>
    <select name="country_id">
        <?php
            foreach($country as $rows3)
            {
                ?>
                <option value="<?php echo $rows3["id"]  ?>"><?php echo $rows3["country_name"]  ?></option>
                
                <?php
                
            }
        ?>
    </select><br>
    <label>Visited:</label><br><input type="text" name="visited" value=""><br>
    <label>Inquiry Form Location:</label><br>
    <select name="inquiry_form_location_id">
        <?php
            foreach($inquiry as $rows4)
            {
                ?>
                <option value="<?php echo $rows4["id"]  ?>"><?php echo $rows4["inquiry_location"]  ?></option>
                
                <?php
                
            }
        ?>
    </select><br>

    <label>Consultant:</label><br>
    <select name="consultant_id">
        <?php
            foreach($consultant as $rows5)
            {
                ?>
                <option value="<?php echo $rows5["id"]  ?>"><?php echo $rows5["consultant_name"]  ?></option>
                
                <?php
                
            }
        ?>
    </select><br>

    <label>Qualification:</label><br><input type="text" name="qualification" value=""><br>
    <label>Comments/Inquiry:</label><br><input type="text" name="comment" value=""><br>
    <label>Expected Budget:</label><br><input type="text" name="budget" value=""><br>
    <input type="submit" value="Insert" name="update_done">
<?php
}

else
{
    header("Location:show_data.php");
}

?>
</form>