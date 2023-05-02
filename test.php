<?php
require("config.php");
$userData["user_type"]="admin";
$userData["username"]="admin";
$userData["password"]="ziakhan1198";
$userData["full_name"]="Zia-ur-Rehman Khan";
$userData["enabled"]="0";
$user_id = insertData('admin_info', $userData, "id=3");
?>
