<?php 
session_start();

if(!isset($_SESSION['username']))
{
    // not logged in
    header('location://localhost:8080/Projects_Dashboard/login_module/login.php');
    
}


?>