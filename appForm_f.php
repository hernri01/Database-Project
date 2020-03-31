<?php
// php script to process appForm.html form

require_once("projUtils.php");
require_once("db_connect.php");

$submit = submitApp($db, $_POST);

$name  = $_POST['name'];
$eid   = $_POST['eid'];
$dep  = $_POST['dep'];
$country = $_POST['country'];
$cty = $_POST['cty'];
$sd = $_POST['sd'];
$ed = $_POST['ed'];
$budget = $_POST['budget'];


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
