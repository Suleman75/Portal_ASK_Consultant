<?php
$page_name="Inprocess Case - Follow Up";
require("menu.php");
require("header.php");




if(isset($_GET["user_id"]))
{
    $_POST["follow"]=$_GET["user_id"];
}
if(isset($_POST["follow"]))
{
    
    $user_data=get_single_inprocess($_POST["follow"]);    
    $user_follow_up_data=get_single_follow_up_inprocess($_POST["follow"]);
    if(checkPrivilage($_SESSION["user_type"],"admin") || checkPrivilage($_SESSION["user_type"],"counsellor") || checkPrivilage($_SESSION["user_type"],"case_admin"))
    {
    ?>
    <label>S.No: </label><?php echo $_POST["follow"]; ?><br>
    <label>Full Name: </label><?php echo $user_data[0]["name"]; ?><br>
    <table>
        <tr>
            <th>Follow Up Number</th>
            <th>Follow Up Date</th>
            <th>Follow Up Outcome</th>
            <th>Additional Comments</th>
            <th>Follow Up Action</th>
            <th>Staff Member</th>
            <?php  
            if(checkPrivilage($_SESSION["user_type"],"admin") || checkPrivilage($_SESSION["user_type"],"counsellor"))
            { 
            ?>
                <th>Update</th>
                <th>Delete</th>
            <?php   
            } 
            ?>
        </tr>
        <?php
            foreach($user_follow_up_data as $rows)
            {
                ?>
                <tr>
                    <td><?php echo $rows["follow_up_number"]  ?></td>
                    <td><?php echo $rows["follow_up_date"]  ?></td>
                    <td><?php echo $rows["follow_up_outcome"]  ?></td>
                    <td><?php echo $rows["additional_comment"]  ?></td>
                    <td><?php echo $rows["follow_up_action"]  ?></td>
                    <td><?php echo $rows["staff_member"]  ?></td>
                    <?php
                    if(checkPrivilage($_SESSION["user_type"],"admin") || checkPrivilage($_SESSION["user_type"],"counsellor"))
                    {
                        echo "<td><form method='POST' action='update_followup_inprocess.php'><input type='hidden' name='user_id' value='".$rows['user_id']."'><input type='hidden' name='update' value='".$rows['id']."'><input type='submit' name='update_btn' value='Update'></form></td>";
                        echo "<td><form method='POST' action='delete_followup_inprocess.php'><input type='hidden' name='user_id' value='".$rows['user_id']."'><input type='hidden' name='delete' value='".$rows['id']."'><input type='submit' name='delete_btn' value='Delete'></form></td>";
                    }
                    ?>
                </tr>

                <?php
            }
        ?>
    </table>

    <?php
    }
    else
    {
        header("Location:show_inprocess.php");
    }
}














require("footer.php");
?>

