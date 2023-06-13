
<?php
$page_name="Inprocess Case - Follow Up";
require("menu.php");
require("header.php");


if(isset($_POST["follow"]))
{
    $_SESSION["follow"]=$_POST["follow"];
}
?>
<script>
    if ( window.history.replaceState ) {
  window.history.replaceState( null, null, window.location.href );
}
</script>
<?php
// if(isset($_GET["user_id"]))
// {
//     $_POST["follow"]=$_GET["user_id"];
// }
if(isset($_SESSION["follow"]))
{
    
    $user_data=get_single_inprocess($_SESSION["follow"]);    
    $user_follow_up_data=get_single_follow_up_inprocess($_SESSION["follow"]);
    if(checkPrivilage($_SESSION["user_type"],"admin") || checkPrivilage($_SESSION["user_type"],"counsellor") || checkPrivilage($_SESSION["user_type"],"case_admin"))
    {
    ?>
    <div class="container-fluid py-4">
      <div class="row">
          <div class="card mb-4">
            <div class="card-header pb-0">
              <h6>Students Inprocess Follow Up</h6>
            </div>
    <label>S.No: </label><?php echo $_SESSION["follow"]; ?><br>
    <label>Full Name: </label><?php echo $user_data[0]["name"]; ?><br>
    <form method='POST' action='add_followup_inprocess.php'>
        <input type='hidden' name='update_btn' value='<?php echo $_SESSION["follow"];  ?>'>
        <label>Add Follow Up:</label><input type='submit' name='follow_btn' value='Follow Up' style='background-color:transparent;border:none;' class='text-secondary font-weight-bold text-xs'>
    </form>
    
            <div class='card-body px-0 pt-0 pb-2'>
<div class='table-responsive p-0'><table class='table align-items-center mb-0'>
<thead><tr>
            <th class='text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7'>Follow Up Number</th>
            <th class='text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7'>Follow Up Date</th>
            <th class='text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7'>Follow Up Outcome</th>
            <th class='text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7'>Additional Comments</th>
            <th class='text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7'>Follow Up Action</th>
            <th class='text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7'>Staff Member</th>
            <?php  
            if(checkPrivilage($_SESSION["user_type"],"admin") || checkPrivilage($_SESSION["user_type"],"counsellor"))
            { 
            ?>
                <th class='text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7'>Update</th>
                <th class='text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7'>Delete</th>
            <?php   
            } 
            ?>
        </tr>
        <tbody>
        <?php
            foreach($user_follow_up_data as $rows)
            {
                ?>
                <tr>
                    <td class='text-center text-secondary text-xs font-weight-bold'><?php echo $rows["follow_up_number"]  ?></td>
                    <td class='text-center text-secondary text-xs font-weight-bold'><?php echo $rows["follow_up_date"]  ?></td>
                    <td class='text-center text-secondary text-xs font-weight-bold'><?php echo $rows["follow_up_outcome"]  ?></td>
                    <td class='text-center text-secondary text-xs font-weight-bold'><?php echo $rows["additional_comment"]  ?></td>
                    <td class='text-center text-secondary text-xs font-weight-bold'><?php echo $rows["follow_up_action"]  ?></td>
                    <td class='text-center text-secondary text-xs font-weight-bold'><?php echo $rows["staff_member"]  ?></td>
                    <?php
                    if(checkPrivilage($_SESSION["user_type"],"admin") || checkPrivilage($_SESSION["user_type"],"counsellor"))
                    {
                        echo "<td class='text-center text-secondary text-xs font-weight-bold'><form method='POST' action='update_followup_inprocess.php'><input type='hidden' name='user_id' value='".$rows['user_id']."'><input type='hidden' name='update' value='".$rows['id']."'><input type='submit' name='update_btn' value='Update' style='background-color:transparent;border:none;' class='text-secondary font-weight-bold text-xs'></form></td>";
                        echo "<td class='text-center text-secondary text-xs font-weight-bold'><form method='POST' action='update_followup_inprocess.php'><input type='hidden' name='user_id' value='".$rows['user_id']."'><input type='hidden' name='delete' value='".$rows['id']."'><input type='submit' name='delete_btn' value='Delete' style='background-color:transparent;border:none;' class='text-secondary font-weight-bold text-xs'></form></td>";
                    }
                    ?>
                </tr>

                <?php
            }
        ?>
    </tbody></table></div></div></div></div></div></div>

    <?php
    }
    else
    {
        header("Location:show_inprocess.php");
    }
}














require("footer.php");
?>

