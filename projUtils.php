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
        $country = $_POST['country'];
        $cty = $_POST['cty'];

        $qStr = "INSERT INTO app (emp_id, dno, country, city, trip_start, trip_end, budget) VALUES ( '$emp', '$dno', '$country', '$cty', '$startDate', '$endDate', '$budget');";

        $result = $db->query($qStr);
    }

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

                return $out;
            }
        
        }
    }

?>
