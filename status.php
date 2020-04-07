<?php 
// Change the address of this when switching to the master webpage.
    include_once("db_connect.php");
    require_once("projUtils.php");
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
    session_start();

    $status = $_GET['status'];
    $id = $_GET['id'];
    changeStatus($db,$id,$status);

    if($status == 2) // It was approved. 
    {
        echo "<center><h1> Application Approved. </h1></center>";
    }
    else if($status == 2)
    {
        echo "<center><h1> Application Denied. </h1></center>";
    }
    
?>