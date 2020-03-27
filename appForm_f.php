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
<BODY>
<center><H2>Thank you for submitting your application.</H2>
Your name :  <?php echo $name; ?><BR />
Your Employee ID:  <?php echo $eid; ?><BR />
<BR />

Comment: <BR /> </center>



</BODY>
</HTML>