<?php
require("header.php");




if(isset($_GET["user_id"]))
{
    $_POST["follow"]=$_GET["user_id"];
}
if(isset($_POST["follow"]))
{
    
    $user_data=get_single_user_data($_POST["follow"]);    
    $user_follow_up_data=get_single_follow_up($_POST["follow"]);
    
    ?>
    <label>S.No: </label><?php echo $_POST["follow"]; ?><br>
    <label>Full Name: </label><?php echo $user_data[0]["full_name"]; ?><br>
    <table>
        <tr>
            <th>Follow Up Number</th>
            <th>Follow Up Date</th>
            <th>Follow Up Outcome</th>
            <th>Additional Comments</th>
            <th>Follow Up Action</th>
            <th>Staff Member</th>
            <th>Update</th>
            <th>Delete</th>
        </tr>
        <?php
            foreach($user_follow_up_data as $rows)
            {
                ?>
                <tr>
                    <td><?php echo $rows["follow_up_number"]  ?></td>
                    <td><?php echo $rows["follow_up_date"]  ?></td>
                    <td><?php echo $rows["outcome_name"]  ?></td>
                    <td><?php echo $rows["additional_comment"]  ?></td>
                    <td><?php echo $rows["action_name"]  ?></td>
                    <td><?php echo $rows["staff_member"]  ?></td>
                    <?php
                    echo "<td><form method='POST' action='update_followup.php'><input type='hidden' name='update' value='".$rows['id']."'><input type='submit' name='update_btn' value='Update'></form></td>";
                    echo "<td><form method='POST' action='delete_followup.php'><input type='hidden' name='user_id' value='".$rows['user_id']."'><input type='hidden' name='delete' value='".$rows['id']."'><input type='submit' name='delete_btn' value='Delete'></form></td>";

                    ?>
                </tr>

                <?php
            }
        ?>
    </table>

    <?php
}














require("footer.php");
?>

