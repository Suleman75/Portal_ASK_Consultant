<?php
$page_name="Update Admins";
require("menu.php");
require("header.php");
if(isset($_POST["update_done"]))
{
    $new_data["user_type"]=$_POST["user_type"];
    $new_data["username"]=$_POST["username"];
    $new_data["password"]=$_POST["password"];
    $new_data["full_name"]=$_POST["full_name"];
    updateData("admin_info",$new_data,"id=".$_POST["id"]);
    header("Location:show_users.php");
}
if(isset($_POST["update_btn"]))
{
    $user_data=selectData("admin_info","id=".$_POST["update"]);
}
else
{
    header("Location:show_users.php");
}
?>
<form method="POST">
<?php
foreach($user_data as $rows)
{

?>
    <label>S.No:</label><?php echo $_POST["update"];?><br>
    <input type="hidden" name="id" value="<?php echo $_POST["update"]    ?>">

    <label>User Type:</label><br>
    <select name="user_type">
        <?php
        
            if($rows["user_type"]=="admin")
            {
                ?>
                <option selected="selected" value="admin">Admin</option>
                <?php
            }
            else
            {
            ?>
            <option value="admin">Admin</option>
            <?php
            }
        
        ?>
        <?php
        
        if($rows["user_type"]=="accounts")
        {
            ?>
            <option selected="selected" value="accounts">Accounts</option>
            <?php
        }
        else
        {
        ?>
        <option value="accounts">Accounts</option>
        <?php
        }
    
    ?>
    <?php
        
        if($rows["user_type"]=="case_admin")
        {
            ?>
            <option selected="selected" value="case_admin">Case Admin</option>
            <?php
        }
        else
        {
        ?>
        <option value="case_admin">Case Admin</option>
        <?php
        }
    
    ?>
    <?php
        
        if($rows["user_type"]=="counsellor")
        {
            ?>
            <option selected="selected" value="counsellor">Counsellor</option>
            <?php
        }
        else
        {
        ?>
        <option value="counsellor">Counsellor</option>
        <?php
        }
    
    ?>
    </select><br><br>


    <label>Username:</label><br><input type="text" name="username" value="<?php echo $rows['username'] ?>"><br><br>
    <label>Password:</label><br><input type="text" name="password" value="<?php echo $rows['password'] ?>"><br><br>
    <label>Full Name:</label><br><input type="text" name="full_name" value="<?php echo $rows['full_name'] ?>"><br><br>
    <input type="submit" value="Update" name="update_done">
<?php
}

?>
</form>

<?php
require("footer.php");
?>