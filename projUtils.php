<?php
    include_once("db_connect.php");
    function submitApp($db,$input)
    {
        //This will submit the information from the application as of 3/26. We are missing the plan and other things, but that will come at a later update. 
        $emp = $input['eid'];
        $dno = $input['dep'];
        $location = $input['loc'];
        $startDate = $input['sd'];
        $endDate = $input['ed'];
        $budget = $input['budget'];

        $qStr = "INSERT INTO app (emp_id, dno, loc, trip_start, trip_end, budget) VALUES ( '$emp', '$dno', '$location', '$startDate', '$endDate', '$budget');";

        $result = $db->query($qStr);
    }

?>