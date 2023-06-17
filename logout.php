<?php
session_start();
session_destroy();
unset($_SESSION['user_name']);
unset($_SESSION['user_email']);
header("location:login.php");
?>