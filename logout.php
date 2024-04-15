<?php 
// database connection
include('../config/constants.php');
// 1. distroy all the session
session_destroy(); //$_SESSION['user'] = $username; 
//2. directing to login page
header("location:".SITEURL.'admin/login.php');
?>