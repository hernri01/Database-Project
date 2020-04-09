<?php
    error_reporting(E_ALL);
    error_reporting(-1);
    ini_set('error_reporting', E_ALL);
    print_r($_POST);

    $user = $_POST['empType'];

    if($user == "emp")
    {
        header("Location: http://cs.gettysburg.edu/~hernri01/ProposalApp/landingPageEmp.php"); 
    }
    elseif($user == "mgr")
    {
        header("Location: http://cs.gettysburg.edu/~hernri01/ProposalApp/landingPageMgr.php"); 
    }
    else 
    {
        header("Location: http://cs.gettysburg.edu/~hernri01/ProposalApp/landingPageExec.php"); 
    }
?>