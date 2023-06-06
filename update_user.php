<?php
$page_name="Update Student";
require("menu.php");
require("header.php");
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
    if(selectNumRows("user_info","phone_number='".$_POST["phone"]."'")>1)
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
    updateData("user_info",$new_data,"id=".$_POST["id"]);
    header("Location:show_data.php");

    same_phone:
    echo "<script>alert('Phone Number Already Exists')</script>";
    echo "<script>window.location.href = 'show_data.php';</script>";
}
if(isset($_POST["update_btn"]))
{
    $user_data=get_single_user_data($_POST["update"]);
}
else
{
    echo "<script>alert('Phone Number Already Exists')</script>";
    echo "<script>window.location.href = 'show_data.php';</script>";
}
?>
<form method="POST" style="margin-top:220px !important;">
<?php
foreach($user_data as $rows)
{

?>
    <label>S.No:</label><?php echo $_POST["update"];
    echo "<input type='hidden' name='id' value='".$_POST["update"]."'>"?><br>
    <label>Lead Priority:</label><br>
    <select name="priority_id" class="form-control form-control-lg">
        <?php
            foreach($leads as $rows1)
            {
                if($rows["priority_name"]==$rows1["priority_name"])
                {
                    ?>
                    <option selected="selected" value="<?php echo $rows1["id"]  ?>"><?php echo $rows1["priority_name"]  ?></option>
                    <?php
                }
                else
                {
                ?>
                
                <option value="<?php echo $rows1["id"]  ?>"><?php echo $rows1["priority_name"]  ?></option>
                
                <?php
                }
            }
        ?>
    </select><br>
    <label>Date:</label><br><input class="form-control form-control-lg" type="text" name="date" value="<?php echo $rows['apply_date'] ?>"><br>
    <label>Name:</label><br><input class="form-control form-control-lg" type="text" name="name"  value="<?php echo $rows['full_name'] ?>"><br>
    <label>Phone Number:</label><br><input class="form-control form-control-lg" type="text" name="phone" value="<?php echo $rows['phone_number'] ?>"><br>
    <label>Source:</label><br>
    <select name="apply_source_id" class="form-control form-control-lg">
        <?php
            foreach($source as $rows2)
            {
                if($rows["source_name"]==$rows2["source_name"])
                {
                    ?>
                    <option selected="selected" value="<?php echo $rows2["id"]  ?>"><?php echo $rows2["source_name"]  ?></option>
                    <?php
                }
                else
                {
                ?>

                <option value="<?php echo $rows2["id"]  ?>"><?php echo $rows2["source_name"]  ?></option>
                
                <?php
                }
            }
        ?>
    </select><br>
    <label>Country:</label><br>
    <select name="country_id" class="form-control form-control-lg">
        <?php
            foreach($country as $rows3)
            {
                if($rows["country_name"]==$rows3["country_name"])
                {
                    ?>
                    
                    <option selected="selected" value="<?php echo $rows3["id"]  ?>"><?php echo $rows3["country_name"]  ?></option>
                    <?php
                }
                else
                {
                ?>
                <option value="<?php echo $rows3["id"]  ?>"><?php echo $rows3["country_name"]  ?></option>
                
                <?php
                }
            }
        ?>
    </select><br>
    <label>Visited:</label><br><input class="form-control form-control-lg" type="text" name="visited" value="<?php echo $rows['visited'] ?>"><br>
    <label>Inquiry Form Location:</label><br>
    <select name="inquiry_form_location_id" class="form-control form-control-lg">
        <?php
            foreach($inquiry as $rows4)
            {
                if($rows["inquiry_location"]==$rows4["inquiry_location"])
                {
                    ?>
                    <option selected="selected" value="<?php echo $rows4["id"]  ?>"><?php echo $rows4["inquiry_location"]  ?></option>
                    <?php
                }
                else
                {
                ?>
                <option value="<?php echo $rows4["id"]  ?>"><?php echo $rows4["inquiry_location"]  ?></option>
                
                <?php
                }
            }
        ?>
    </select><br>

    <label>Consultant:</label><br>
    <select name="consultant_id" class="form-control form-control-lg">
        <?php
            foreach($consultant as $rows5)
            {
                if($rows["consultant_name"]==$rows5["consultant_name"])
                {
                    ?>
                    <option selected="selected" value="<?php echo $rows5["id"]  ?>"><?php echo $rows5["consultant_name"]  ?></option>
                    <?php
                }
                else
                {
                ?>
                <option value="<?php echo $rows5["id"]  ?>"><?php echo $rows5["consultant_name"]  ?></option>
                
                <?php
                }
            }
        ?>
    </select><br>

    <label>Qualification:</label><br><input class="form-control form-control-lg" type="text" name="qualification" value="<?php echo $rows['qualification'] ?>"><br>
    <label>Comments/Inquiry:</label><br><input class="form-control form-control-lg" type="text" name="comment" value="<?php echo $rows['comments'] ?>"><br>
    <label>Expected Budget:</label><br><input class="form-control form-control-lg" type="text" name="budget" value="<?php echo $rows['budget'] ?>"><br>
    <input class="btn btn-lg btn-primary btn-lg w-100 mt-4 mb-0" type="submit" value="Update" name="update_done">
<?php
}

?>
</form>

<?php

require("footer.php");
?>