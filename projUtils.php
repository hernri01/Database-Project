<?php
    session_start();
    include_once("db_connect.php"); 

    /**
     * This function will submit the application into the database. 
     */
    function submitApp($db,$input)
    {
        //This will submit the information from the application as of 3/26. We are missing the plan and other things, but that will come at a later update. 
        $emp = $_SESSION['user'];
        $dno = $input['dep'];
        $location = $input['loc'];
        $startDate = $input['sd'];
        $endDate = $input['ed'];
        $budget = $input['budget'];
        $country = $_POST['country'];
        $cty = $_POST['cty'];

        $qStr = "INSERT INTO app (emp_id, dno, country, city, trip_start, trip_end, budget) VALUES ( '$emp', '$dno', '$country', '$cty', '$startDate', '$endDate', '$budget');";

        $result = $db->query($qStr);
    }
    
    function saveChanges($db,$input)
    {
        // is supposed to save changes to the edited form. not complete yet
        $emp = $input['eid'];
        $dno = $input['dep'];
        $location = $input['loc'];
        $startDate = $input['sd'];
        $endDate = $input['ed'];
        $budget = $input['budget'];
        $country = $_POST['country'];
        $cty = $_POST['cty'];

        $qStr = "INSERT INTO app (emp_id, dno, country, city, trip_start, trip_end, budget) VALUES ( '$emp', '$dno', '$country', '$cty', '$startDate', '$endDate', '$budget');";

        $result = $db->query($qStr);
    }


    /**
     * This function allows you to view the application by ID.
     */
    function view($db, $id)
    {
        $qStr = "SELECT * FROM app WHERE app_id = '$id';";

        $result = $db->query($qStr);

        if($result)
        {
            $rows = $result->rowCount();
            if($rows == 0)
            {
                return -1;
            }

            while($row = $result->fetch()) 
            {
                $out['id'] = $row['emp_id'];
                $out['dno'] = $row['dno'];
                $out['country'] = $row['country'];
                $out['city'] = $row['city'];
                $out['sd'] = $row['trip_start'];
                $out['ed'] = $row['trip_end'];
                $out['budget'] = $row['budget'];
                $out['status'] = $row['status'];
                $out['feedback'] = $row['feedback'];

                return $out;
            }
        
        }
    }

    //This is for the employees to view their applications.
    function getEmpApp($db)
    {
        $id = $_SESSION['user'];
        //Only searching where status is 0 which means 
        $qStr = "SELECT * FROM app WHERE status =0 AND emp_id = '$id';"; // Initially they can view all their submitted applications.
        $result = $db->query($qStr);

        if($result)
        {

            while($row = $result->fetch()) 
            {
                $budget = $row['budget'];
                $id = $row['app_id'];
                $cty = $row['city'];

                echo "<div class='col-lg-12 mb-4'>";
                    echo "<div class='card'>";
                        echo"<div class='card-body'>";
                            echo"<h5 class='card-title'>Project Title ID : $id, $cty <strong style='float: right'>Proposed Bugdet: $$budget</strong></h5>";
                            echo"<p class='card-text'>A brief description of the project. Possibly a couple sentences.</p>";
                            echo"<a href='http://cs.gettysburg.edu/~hernri01/ProposalApp/appView_f.php?id=$id' class='btn btn-outline-info btn-sm'>View</a>"; // Change the address of this when switching to the master webpage.
                        echo"</div>";
                    echo"</div>";
                echo "</div>";
            }
        }
    }

    //This function will show all the approved applications.
    function getApprovedApps($db)
    {
        $id = $_SESSION['user'];

        $qStr = "SELECT * FROM app WHERE status = '2' OR status = '4' AND emp_id = '$id';"; 
        $result = $db->query($qStr);

        if($result)
        {

            while($row = $result->fetch()) 
            {
                $budget = $row['budget'];
                $id = $row['app_id'];

                echo "<div class='col-lg-12 mb-4'>";
                    echo "<div class='card'>";
                        echo"<div class='card-body'>";
                            echo"<h5 class='card-title'>Project Title ID : $id <strong style='float: right'>Proposed Bugdet: $$budget</strong></h5>";
                            echo"<p class='card-text'>A brief description of the project. Possibly a couple sentences.</p>";
                            echo"<a href='http://cs.gettysburg.edu/~hernri01/ProposalApp/appView_f.php?id=$id' class='btn btn-outline-info btn-sm'>View</a>"; // Change the address of this when switching to the master webpage.
                            echo"<a href='http://cs.gettysburg.edu/~hernri01/ProposalApp/editForm.php?id=$id' class='btn btn-outline-info btn-sm'>Edit</a>"; // Change the address of this when switching to the master webpage.
                        echo"</div>";
                    echo"</div>";
                echo "</div>";
            }
        }
    }

    /**
     * This function will get all the apps denied.
     */
    function getDeniedApps($db)
    {
        $id = $_SESSION['user'];

        //Only searching where status is 0 which means 
        $qStr = "SELECT * FROM app WHERE status = '1' OR status = '3' AND emp_id = '$id';"; // Initially they can view all their submitted applications.
        $result = $db->query($qStr);

        if($result)
        {

            while($row = $result->fetch()) 
            {
                $budget = $row['budget'];
                $id = $row['app_id'];

                echo "<div class='col-lg-12 mb-4'>";
                    echo "<div class='card'>";
                        echo"<div class='card-body'>";
                            echo"<h5 class='card-title'>Project Title ID : $id <strong style='float: right'>Proposed Bugdet: $$budget</strong></h5>";
                            echo"<p class='card-text'>A brief description of the project. Possibly a couple sentences.</p>";
                            echo"<a href='http://cs.gettysburg.edu/~hernri01/ProposalApp/appView_f.php?id=$id' class='btn btn-outline-info btn-sm'>View</a>"; // Change the address of this when switching to the master webpage.
                        echo"</div>";
                    echo"</div>";
                echo "</div>";
            }
        }
    }

    /**
     * This function will get all the applications that have not been reviewed for the manager.
     */
    function getApp($db)
    {
        //Only searching where status is 0 which means applications have not had any action.
        $qStr = "SELECT * FROM app WHERE status=0;";
        $result = $db->query($qStr);

        if($result)
        {

            while($row = $result->fetch()) 
            {
                $budget = $row['budget'];
                $id = $row['app_id'];

                echo "<div class='col-lg-12 mb-4'>";
                    echo "<div class='card'>";
                        echo"<div class='card-body'>";
                            echo"<h5 class='card-title'>Project Title ID : $id <strong style='float: right'>Proposed Bugdet: $$budget</strong></h5>";
                            echo"<p class='card-text'>A brief description of the project. Possibly a couple sentences.</p>";
                            echo"<a href='http://cs.gettysburg.edu/~hernri01/ProposalApp/appViewMgr_f.php?id=$id' class='btn btn-outline-info btn-sm'>View</a>"; // Change the address of this when switching to the master webpage.
                        echo"</div>";
                    echo"</div>";
                echo "</div>";
            }
        }
    }

    function getExecApp($db)
    {
         //Only searching where status is 2 which means applications have been approved by the manager.
         $qStr = "SELECT * FROM app WHERE status=2;";
         $result = $db->query($qStr);
 
         if($result)
         {
 
             while($row = $result->fetch()) 
             {
                 $budget = $row['budget'];
                 $id = $row['app_id'];
 
                 echo "<div class='col-lg-12 mb-4'>";
                     echo "<div class='card'>";
                         echo"<div class='card-body'>";
                             echo"<h5 class='card-title'>Project Title ID : $id <strong style='float: right'>Proposed Bugdet: $$budget</strong></h5>";
                             echo"<p class='card-text'>A brief description of the project. Possibly a couple sentences.</p>";
                             echo"<a href='http://cs.gettysburg.edu/~hernri01/ProposalApp/appViewMgr_f.php?id=$id' class='btn btn-outline-info btn-sm'>View</a>"; // Change the address of this when switching to the master webpage.
                         echo"</div>";
                     echo"</div>";
                 echo "</div>";
             }
         }
    }

    /**
     * This function will approve/deny the application. It will change the status of the application.
     * 0 = The application has been submitted.
     * 1 = The application has been denied by the manager.
     * 2 = The application has been approved by the manager.
     * 3 = The application has been denied by the executive. 
     * 4 = The application has been approved by the executive.
     * $id = app_id 
     * $status = the number needed to update the 
     */
    function changeStatus($db,$id,$status)
    {
        $qStr = "UPDATE app
        SET status = '$status'
        WHERE app_id = '$id';";
        
        $result = $db->query($qStr);
    }

    function sendFeedback($db, $message,$id)
    {
        $qStr = "UPDATE app
        SET feedback = '$message'
        WHERE app_id = '$id';";

        $result = $db->query($qStr);
    }

    function addUser($db, $pass, $fname, $lname, $email, $type)
    {

        $query = "INSERT INTO emp (fname, lname, email, password,empType) VALUES ('$fname', '$lname', '$email', '$pass', '$type');";
        // execute the query 
        $result = $db->query($query);
           
    }

    function registerUser($db, $input){
        $fname=$input['fname'];
        $lname=$input['lname'];
        $pass=$input['password'];
        $email=$input['email'];
        $type = $input['empType'];
        $passHash= hash('md5',$pass);

        //checks if this user exists in user table already, if yes, return false
        $qStr = "SELECT * FROM emp WHERE email='$email';";
        $qResult= $db->query($qStr);
        if($qResult)
        {
            $nRows = $qResult->rowCount();
            if($nRows != 0)
            {
                return false;
            }
            else 
            {
                addUser($db, $passHash, $fname, $lname, $email,$type);
                return true;
            }
        }
    }

    function checkUser($db, $email, $pass)
    {
        //Getting the user name
        $qStr = "SELECT * FROM emp WHERE email= '$email' AND password = '$pass';";
        $qRes = $db->query($qStr);

        $passStr="SELECT * FROM emp WHERE password= '$pass';";
        $passRes = $db->query($passStr);

        if($passRes != FALSE && $qRes != FALSE)
        {
            $passRows = $passRes->rowCount();
            $userRows = $qRes->rowCount();

            if($userRows == 0)
            {
                return -1;
            }
            elseif($userRows == 1 && $passRows == 0)
            {
                return -3;
            }
            
            
            while($row = $qRes->fetch()) 
            {
                $out['id'] = $row['id'];
                return $out;
            }
        }
    }

    function directEmp($db, $id)
    {
        $qStr = "SELECT * FROM emp WHERE id = '$id';";

        $result = $db->query($qStr);

        if($result)
        {
            while($row = $result->fetch())
            {
                $out['empType'] = $row['empType'];
            }

            if($out['empType'] == 'emp')
            {
                header("Location: http://cs.gettysburg.edu/~hernri01/ProposalApp/landingPageEmp.php"); 
            }
            else if($out['empType'] == 'mgr')
            {
                header("Location: http://cs.gettysburg.edu/~hernri01/ProposalApp/landingPageMgr.php"); 
            }
            else{
                header("Location: http://cs.gettysburg.edu/~hernri01/ProposalApp/landingPageExec.php"); 
            }
        }
    }
?>
