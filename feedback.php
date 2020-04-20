//This file is just the text box to provide feedback. 
<?php
require_once("db_connect.php");
require_once("projUtils.php");
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$message = $_POST['message'];
$id = $_GET['id'];

sendFeedback($db,$message,$id);

echo "<center><h1> Thank you! </h1></center>";
?>
