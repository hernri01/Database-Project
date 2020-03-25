<?php
// php script to process appForm.html form

$name  = $_POST['name'];
$eid   = $_POST['eid'];

echo $name;

?>

<HTML>
<HEAD><TITLE>Thank you</TITLE></HEAD>
<BODY>
<H2>Thank you for submitting your application.</H2>

Your name :  <?php echo $name; ?><BR />
Your Employee ID:  <?php echo $eid; ?><BR />
<BR />

Comment: <BR />


</BODY>
</HTML>
