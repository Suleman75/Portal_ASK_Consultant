<?php
    session_unset(); // removes session variables
    session_destroy(); // destroys the session
    $_SESSION = array();
    header("Location: login.php");


?>