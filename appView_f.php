<?php
session_start();

require_once("db_connect.php");
require_once("projUtils.php");
// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);

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
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO"
        crossorigin="anonymous">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz"
        crossorigin="anonymous">
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
        font-family: Roboto, Arial, sans-serif;
        font-size: 18px; 
        color: #666;
        padding: 0;
        margin: 0;
        }
  
        input, textarea { 
        outline: none;
        }
  
        body {
        justify-content: center;
        align-items: center;
        background-color: rgb(144, 202, 249);
        justify-content: center;
        align-items: center;
        text-align: center;
        background-color: rgb(144, 202, 249);
        }
  
        form {
        position: relative;
        width: 90%;
        border-radius: 10px;
        background: #fff;
        display: inline-block;
        padding: 20px;
        text-align: center
        }
  
  
        input, textarea { 
        outline: none;
        }
  
        
              
        #header { 
        background-color: rgb(144, 202, 249);
        }
  
        #budget {
        text-align: right;
        }
  
        h1 {
        color: white;
        font-weight: 700;
        font-size: 5em;
        }
        table {
        font-family: arial, sans-serif;
        border-collapse: collapse;
        width: 60%;
        }
  
        td, th {
        border: 1px solid #dddddd;
        text-align: left;
        padding: 10px;
        }
  
        tr:nth-child(even) {
        background-color: #dddddd;
        }
        </style>
            <title>View Form</title>
            </head>
<body>
    
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
	<div class="container">
	<a class="navbar-brand" href="#">Veriform</a>
	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
	</button>

	<div class="collapse navbar-collapse" id="navbarSupportedContent">
		<ul class="navbar-nav mr-auto">
			<li class="nav-item active">
				<a class="nav-link" href="landingPageEmp.php">Dashboard <span class="sr-only">(current)
				</span></a></li>


    	</ul>
		<ul class="navbar-nav ml-auto">
      		<li class="nav-item"><a class="nav-link" href="(READY)logout.php">Log Out</a></li>
		</ul>
    </form>
	</div>
</div>
</nav>
    
    
<br><br>    
<form class="text-center border border-light p-5">
    <p class="h4 mb-4">Your Application</p><hr><br>

<table class="table table-striped">
  <tr>
            <th>Application ID</th>
            <th><?php echo $id; ?></th>
        </tr>
        <!-- <tr>
            <td>Name</td>
            <td></td>
        </tr> -->
        <tr>
            <td>Employee ID</td>
            <td><?php echo $result['id']; ?></td>
        </tr>
        <tr>
            <td>Department</td>
            <td><?php echo $result['dno']; ?></td>

        </tr>
        <tr>
            <td>Trip Location(Country)</td>
            <td><?php echo $result['country']; ?></td>
        </tr>
        <tr>
            <td>Trip Location(City(s))</td>
            <td><?php echo $result['city']; ?></td>

        </tr>
        <tr>
            <td>Start Date</td>
            <td><?php echo $result['sd']; ?></td>
        </tr>
        <tr>
        <td>End Date</td>
        <td><?php echo $result['ed']; ?></td>
        </tr>
        <tr>
        <td>Budget</td>
        <td><?php echo $result['budget']; ?></td>
        </tr>
        <tr>
        <td>Status</td>
        <td><?php 
            if($result['status'] == 0 )
            {
                echo "Application submitted, but not reviewed.";
            }
            else if($result['status'] == 1)
            {
                echo "Application was denied by the manager";
            }
            else if($result['status'] == 2)
            {
                echo "Application was accepted by the manager.";
            }
            elseif($result['status'] == 3)
            {
                echo "Application was denied by the Executive.";
            }
            elseif($result['status'] == 4)
            {
                echo "Application was approved by the Executive.";
            }
        ?></td>
        </tr>
        <tr>
        <td>Feedback</td>
        <td><?php echo $result['feedback']; ?></td>
        </tr>
</table>
        
        </form>
            </body>
        </html>  
    <?php
}
?>
