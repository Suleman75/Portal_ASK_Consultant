<?php
$page_name="Login";
require("menu.php");
require("header.php");

if(isset($_SESSION["username"]))
{
    if($_SESSION["user_type"]=="counsellor" || $_SESSION["user_type"]=="admin")
    {
        header("Location:show_data.php");
    }
    else
    {
        header("Location:show_inprocess.php");
    }
}
if($_SERVER["REQUEST_METHOD"] == "POST")
{
    
    $rows=selectNumRows("admin_info", " username='".$_POST["username"]."' AND password='".$_POST["password"]."'");
    if($rows>0)
    {
        $admin_data=selectData("admin_info", " username='".$_POST["username"]."'");
        foreach($admin_data as $rows)
        {
            $_SESSION["user_type"]=$rows["user_type"];
            $_SESSION["username"]=$rows["username"];
        }
        if($_SESSION["user_type"]=="counsellor" || $_SESSION["user_type"]=="admin")
        {
            header("Location:show_data.php");
        }
        else
        {
            header("Location:show_inprocess.php");
        }
    }
}






?>

<form method="POST">
    <label>Username:</label><br><input type="text" name="username"><br><br>
    <label>Password:</label><br><input type="text" name="password"><br><br>
    <input type="submit" value="Login" name="login">
</form>



<?php
    require("footer.php")
?>