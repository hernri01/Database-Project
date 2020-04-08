//This file is to just to change the status of the application. As of 4/07/20 only the manager can change the status of the application.
//There is a basic message either saying the application has been approved or denied. Needs styling to look more professional.
<?php 
// Change the address of this when switching to the master webpage.
    include_once("db_connect.php");
    require_once("projUtils.php");
    session_start();

    $status = $_GET['status'];
    $id = $_GET['id'];
    changeStatus($db,$id,$status);

    if($status == 2) // It was approved. 
    {
        echo "<center><h1> Application Approved. </h1></center>";
    }
    else if($status == 1) // denied
    {
        echo "<center><h1> Application Denied. </h1></center>";
    }
    
?>
