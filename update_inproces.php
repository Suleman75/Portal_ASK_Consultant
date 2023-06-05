<?php
$page_name="Update Inprocess";
require("menu.php");
require("header.php");

$desti=selectData("destination","enabled=1");
$consu=selectData("consultant","enabled=1");
$destinat=selectData("destination","enabled=1");
$fees=selectData("fee_status","enabled=1");





if(isset($_POST["update_done"]))
{
    $new_data["case_assign_date"]=$_POST["case_assign_date"];
    $new_data["name"]=$_POST["name"];
    $new_data["phone"]=$_POST["phone"];
    $new_data["email"]=$_POST["email"];
    $new_data["destination_1"]=$_POST["destination_1"];
    $new_data["counselor"]=$_POST["counselor"];
    $new_data["comments"]=$_POST["comments"];
    $new_data["fee_status"]=$_POST["fee_status"];
    $new_data["admin"]=$_POST["admin"];
    $new_data["university_1"]=$_POST["university_1"];
    $new_data["outcome_destination_1"]=$_POST["outcome_destination_1"];
    $new_data["case_status_1"]=$_POST["case_status_1"];
    $new_data["destination_2"]=$_POST["destination_2"];
    $new_data["case_handler_2"]=$_POST["case_handler_2"];
    $new_data["university_2"]=$_POST["university_2"];
    $new_data["outcome_destination_2"]=$_POST["outcome_destination_2"];
    $new_data["case_status_2"]=$_POST["case_status_2"];
    $new_data["course"]=$_POST["course"];
    $new_data["intake"]=$_POST["intake"];
    $new_data["missing_docs"]=$_POST["missing_docs"];
    $new_data["final_comments"]=$_POST["final_comments"];
    updateData("in_process",$new_data,"id=".$_POST["id"]);
    header("Location:show_inprocess.php");
}
if(isset($_POST["update_btn"]))
{
    $user_data=get_single_follow_up_data($_POST["update"]);
}
else
{
    header("Location:show_inprocess.php");
}
?>
<form method="POST">
<?php
foreach($user_data as $rows)
{
?>
    <label>S.No:</label><?php echo $_POST["update"];?><br>
    <input type="hidden" name="id" value="<?php echo $_POST["update"]    ?>">
    <input type="hidden" name="user_id" value="<?php echo $_POST["update"]    ?>">
    <label>Case Assign Date:</label><br><input type="text" name="case_assign_date" value="<?php echo $rows['case_assign_date'] ?>"><br>
    <label>Name:</label><br><input type="text" name="name" value="<?php echo $rows['name'] ?>"><br>
    <label>Phone Number:</label><br><input type="text" name="phone" value="<?php echo $rows['phone'] ?>"><br>
    <label>Email:</label><br><input type="text" name="email" value="<?php echo $rows['email'] ?>"><br>
    <label for="destination_1">Destination 1:</label><br>
    <select name="destination_1">
        <?php
            foreach($desti as $rows1)
            {
                if($rows["dest_1"]==$rows1["destination_name"])
                {
                    ?>
                    <option selected="selected" value="<?php echo $rows1["id"]  ?>"><?php echo $rows1["destination_name"]  ?></option>
                    <?php
                }
                else
                {
                ?>
                
                <option value="<?php echo $rows1["id"]  ?>"><?php echo $rows1["destination_name"]  ?></option>
                
                <?php
                }
            }
        ?>
    </select><br>


    <label for="counselor">Counselor:</label><br>
    <select name="counselor">
        <?php
            foreach($consu as $rows1)
            {
                if($rows["consultant_name"]==$rows1["consultant_name"])
                {
                    ?>
                    <option selected="selected" value="<?php echo $rows1["id"]  ?>"><?php echo $rows1["consultant_name"]  ?></option>
                    <?php
                }
                else
                {
                ?>
                
                <option value="<?php echo $rows1["id"]  ?>"><?php echo $rows1["consultant_name"]  ?></option>
                
                <?php
                }
            }
        ?>
    </select><br>
    <label>Comments:</label><br><input type="text" name="comments" value="<?php echo $rows['comments'] ?>"><br>
    <label for="fee_status">fee_status:</label><br>
    <select name="fee_status">
        <?php
            foreach($fees as $rows1)
            {
                if($rows["status_name"]==$rows1["status_name"])
                {
                    ?>
                    <option selected="selected" value="<?php echo $rows1["id"]  ?>"><?php echo $rows1["status_name"]  ?></option>
                    <?php
                }
                else
                {
                ?>
                
                <option value="<?php echo $rows1["id"]  ?>"><?php echo $rows1["status_name"]  ?></option>
                
                <?php
                }
            }
        ?>
    </select><br>
    <label>Case Handler 1:</label><br><input type="text" name="admin" value="<?php echo $rows['admin'] ?>"><br>
    <label>University 1:</label><br><input type="text" name="university_1" value="<?php echo $rows['university_1'] ?>"><br>
    <label>Outcome Destination 1:</label><br><input type="text" name="outcome_destination_1" value="<?php echo $rows['outcome_destination_1'] ?>"><br>
    <label>Case Status 1:</label><br><input type="text" name="case_status_1" value="<?php echo $rows['case_status_1'] ?>"><br>
    <label for="destination_2">Destination 2:</label><br>
    <select name="destination_2">
        <?php
            foreach($destinat as $rows1)
            {
                if($rows["dest_2"]==$rows1["destination_name"])
                {
                    ?>
                    <option selected="selected" value="<?php echo $rows1["id"]  ?>"><?php echo $rows1["destination_name"]  ?></option>
                    <?php
                }
                else
                {
                ?>
                
                <option value="<?php echo $rows1["id"]  ?>"><?php echo $rows1["destination_name"]  ?></option>
                
                <?php
                }
            }
        ?>
    </select><br>
    <label>Case Handler 2:</label><br><input type="text" name="case_handler_2" value="<?php echo $rows['case_handler_2'] ?>"><br>
    <label>University 2:</label><br><input type="text" name="university_2" value="<?php echo $rows['university_2'] ?>"><br>
    <label>Outcome Destination 2:</label><br><input type="text" name="outcome_destination_2" value="<?php echo $rows['outcome_destination_2'] ?>"><br>
    <label>Case Status 2:</label><br><input type="text" name="case_status_2" value="<?php echo $rows['case_status_2'] ?>"><br>
    <label>Course:</label><br><input type="text" name="course" value="<?php echo $rows['course'] ?>"><br>
    <label>Intake:</label><br><input type="text" name="intake" value="<?php echo $rows['intake'] ?>"><br>
    <label>Missing Docs:</label><br><input type="text" name="missing_docs" value="<?php echo $rows['missing_docs'] ?>"><br>
    <label>Final Comments:</label><br><input type="text" name="final_comments" value="<?php echo $rows['final_comments'] ?>"><br>
    
    
    <br>
    <input type="submit" value="Update" name="update_done">
<?php
}

?>
</form>


<?php
require("footer.php");
?>