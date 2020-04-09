<?php
// php script to process appForm.html form

require_once("projUtils.php");
require_once("db_connect.php");
session_start();

$submit = submitApp($db, $_POST);

$name  = $_POST['name'];
$eid   = $_POST['eid'];
?>

<HTML>
<HEAD>
<!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

     <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO"
        crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz"
        crossorigin="anonymous">

    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">


    <TITLE>Thank you</TITLE>


</HEAD>
<style>

      html, body {
      min-height: 100vh;
      padding: 0;
      margin: 0;
      font-family: Roboto, Arial, sans-serif;
      font-size: 18px; 
      color: #666;
      }

      input, textarea { 
      outline: none;
      }

      body {
        margin: 20px;
      display: flex;
      justify-content: center;
      align-items: center;
      padding: 60px;
            background-color: rgb(144, 202, 249);
      }

      form {
      position: relative;
      width: 100%;
      border-radius: 10px;
      background: #fff;
      }


    </style>
<BODY>
    <form class="text-center border border-light p-5">
<center><H2>Thank you for submitting your application</H2><hr><br>
<!-- Your name :  <?php echo $name; ?><BR />
Your Employee ID:  <?php echo $eid; ?> <BR /> -->
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
?></strong> <br><br>

<p> Please keep this <strong> Application ID </strong>number to check the status of your application. </p>
<BR />


<BR />

Comment: <BR /> </center>


</form>




</BODY>
</HTML>