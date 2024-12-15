<?php
include "connection.php";
// Unset all session variables
setcookie('username', '', time() - 3600, "/");
// Redirect to sign in page
header("Location: signin.php");
exit;
?>
