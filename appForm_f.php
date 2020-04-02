<?php
// php script to process appForm.html form

require_once("projUtils.php");
require_once("db_connect.php");

$submit = submitApp($db, $_POST);

$name  = $_POST['name'];
$eid   = $_POST['eid'];
?>

<HTML>
<HEAD><TITLE>Thank you</TITLE></HEAD>
<style>
        html,body{
            width: 100%;
            height: 100%;
            margin: 0; /* Space from this element (entire page) and others*/
            padding: 0; /*space from content and border*/
            border: solid blue;
            border-width: 20px;
            overflow:hidden;
            display:block;
            box-sizing: border-box;
        }

    </style>
<BODY>
<center><H2>Thank you for submitting your application.</H2>
Your name :  <?php echo $name; ?><BR />
Your Employee ID:  <?php echo $eid; ?> <BR />
<strong>Your Application ID:  
<?php
    $qStr = "SELECT MAX(app_id) AS id FROM app";
    $result = $db->query($qStr);

	if($result != FALSE)
	{	
		while($row = $result->fetch()) {
			$id = $row['id'];
			print $id;	
		}	
	}
?></strong> <br />

<p> Please keep this <strong> Application ID </strong>number to check the status of your application. </p>
<BR />


<BR />

Comment: <BR /> </center>



</BODY>
</HTML>
