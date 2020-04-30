<?php
require_once("db_connect.php");
require_once("projUtils.php");
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
session_start();


$message = $_POST['message'];
$id = $_GET['id'];
$user = $_SESSION['type'];

sendFeedback($db,$message,$id);

//Depending on the user, it will redirect to their respective home page.
if($user == 'mgr')
{
    header("Location: http://cs.gettysburg.edu/~hernri01/ProposalApp/landingPageMgr.php"); 
}
else 
{
    header("Location: http://cs.gettysburg.edu/~hernri01/ProposalApp/landingPageExec.php");
}


?>