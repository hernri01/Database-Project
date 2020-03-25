<?php
// php script to process appForm.html form

$name  = $_POST['name'];
$ssn   = $_POST['ssn'];

?>

<HTML>
<HEAD><TITLE>Thank you</TITLE></HEAD>
<BODY>
<H2>Thank you for submitting your application.</H2>

Your name :  <?php echo $name; ?><BR />
Your Employee SSN:  <?php echo $ssn; ?><BR />
<BR />

Comment: <BR />


</BODY>
</HTML>
