<?php
require("header.php");
if(isset($_POST["add_done"]))
{
    $new_data["user_type"]=$_POST["user_type"];
    $new_data["username"]=$_POST["username"];
    $new_data["password"]=$_POST["password"];
    $new_data["full_name"]=$_POST["full_name"];
    insertData("admin_info",$new_data);
    header("Location:show_users.php");
}
?>

<?php
if(checkPrivilage($_SESSION["user_type"],"admin"))
{

?>
<form method="POST">
<label>User Type:</label><br>
    <select name="user_type">
        <option value="admin">Admin</option>
        <option value="accounts">Accounts</option>
        <option value="case_admin">Case Admin</option>
        <option value="counsellor">Counsellor</option>
    </select><br><br>
    <label>Username:</label><br><input type="text" name="username"><br><br>
    <label>Password:</label><br><input type="text" name="password"><br><br>
    <label>Full Name:</label><br><input type="text" name="full_name"><br><br>
    <input type="submit" value="Insert" name="add_done">
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











