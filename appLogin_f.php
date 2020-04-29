<?php
    session_start();
    require_once("projUtils.php");
    require_once("db_connect.php");   
    error_reporting(E_ALL);
    error_reporting(-1);
    ini_set('error_reporting', E_ALL);

    $user = $_POST['empType'];
    $email = $_POST['email'];
    $pass = $_POST['password'];

    $hashPass = hash('md5', $pass);

    $result = checkUser($db,$email,$hashPass);


    if($result == -1)
    {
        Echo "<html>";

        Echo "<title> Error </title>";

        Echo "<center><h1> Cannot find your information try again.</h1></center>";
    }
    else if($result == -3 )
    {
        Echo "<html>";

        Echo "<title> Incorrect Password </title>";

        Echo "<center><h1> Your password does not match.</h1></center>";

        Echo "<center> <img src='https://gifimage.net/wp-content/uploads/2018/06/try-again-animated-gif-11.gif' alt='Try again'></center>";
    }
    else
    {
        $_SESSION['user'] = $result['id'];

        $id = $result['id'];

        directEmp($db, $id);

        // if($user == "emp")
        // {
        //     header("Location: http://cs.gettysburg.edu/~hernri01/ProposalApp/landingPageEmp.php"); 
        // }
        // elseif($user == "mgr")
        // {
        //     header("Location: http://cs.gettysburg.edu/~hernri01/ProposalApp/landingPageMgr.php"); 
        // }
        // else 
        // {
        //     header("Location: http://cs.gettysburg.edu/~hernri01/ProposalApp/landingPageExec.php"); 
        // }
    }
?>