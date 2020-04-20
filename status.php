<?php 
// Change the address of this when switching to the master webpage.
    include_once("db_connect.php");
    require_once("projUtils.php");
    session_start();

    $status = $_GET['status'];
    $id = $_GET['id'];
    changeStatus($db,$id,$status);

    if(($status == 2) || ($status == 4)) // It was approved. 
    {
        echo "<center><h1> Application Approved. </h1></center>";
    }
    else if(($status == 1 )|| ($status == 3)) // denied
    {
        echo "<center><h1> Application Denied. </h1></center>
            <form method='POST' action='feedback.php?id=$id'>
            <center><textarea placeholder = 'Please provide feedback' name='message' rows='15' cols='40'></textarea></center><br>
            <center><input type='submit' value = 'Send Feedback' /></center>
            </form>
      ";
    }
    
?>