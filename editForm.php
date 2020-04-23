<?php
require_once("db_connect.php");
require_once("projUtils.php");
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
session_start();

$id = $_GET['id'];
$result = view($db, $id);

if($result == -1)
{
    Echo "<html>";

    Echo "<title> Error </title>";

    Echo "<center><h1> Cannot find your information try again.</h1></center>";
}
else 
{
    ?>   
    <html>
        <head>
            <title>Edit the Form</title>
        
            <!-- Required meta tags -->
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        
             <!-- Bootstrap CSS -->
            <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO"
                crossorigin="anonymous">
            <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz"
                crossorigin="anonymous">
        
            <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">
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
              display: flex;
              justify-content: center;
              align-items: center;
              padding: 20px;
                    background-color: rgb(144, 202, 249);
              }
        
              form {
              position: relative;
              width: 90%;
              border-radius: 10px;
              background: #fff;
              }
        
            </style>
          </head>
        
        <body>
        
        <script> src="projScripts.js" </script>
        
        <!-- Default form register -->
        <form class="text-center border border-light p-5" name="app" action="appForm_f.php" method='POST'>
        
            <p class="h4 mb-4">Application</p><hr><br>
        <div class="form-row mb-4">
          <div class="col">
          <input type="text" id="defaultRegisterFormPassword" class="form-control mb-4" name="name" placeholder="Name" value="" aria-describedby="defaultRegisterFormPasswordHelpBlock" required>
        </div>
        <div class="col">
          <input type="number" id="defaultRegisterFormPassword" class="form-control mb-4" name="eid" placeholder="Employee ID" value="<?php echo $result['id']; ?>" aria-describedby="defaultRegisterFormPasswordHelpBlock" required>
        </div>
        </div>
          <input type="text" id="defaultRegisterFormPassword" class="form-control mb-4" name="dep" placeholder="Department" value="<?php echo $result['dno']; ?>" required>
          <input type="text" id="defaultRegisterFormPassword" class="form-control mb-4" name="country" placeholder="Country Destination" value="<?php echo $result['country']; ?>" required>
          <input type="text" id="defaultRegisterFormPassword" class="form-control mb-4" name="cty" placeholder="City Destination" value="<?php echo $result['city']; ?>" required>
          <input type="date" id="defaultRegisterFormPassword" class="form-control mb-4" name="sd" placeholder="Start Date" value="<?php echo $result['sd']; ?>" required>
          <input type="date" id="defaultRegisterFormPassword" class="form-control mb-4" name="ed" placeholder="End Date" value="<?php echo $result['ed']; ?>" required>
          <input type="number" id="defaultRegisterFormPassword" class="form-control mb-4" name="budget"  placeholder="Budget" value="<?php echo $result['budget']; ?>" required>
        
        
            <!-- Submit button -->
        <button class="btn my-4 btn-outline-info btn-block" type="submit" href="/">Save</button>
        </form>
        <!-- Default form register -->
        </body>
        </html>
    

<?php

}
?>


