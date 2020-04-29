<?php
// php script to process appForm.html form

require_once("projUtils.php");
require_once("db_connect.php");
session_start();

$submit = submitApp($db, $_POST);

header("Location: http://cs.gettysburg.edu/~hernri01/ProposalApp/landingPageEmp.php"); 

?>