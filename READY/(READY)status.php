<?php 
// Change the address of this when switching to the master webpage.
    include_once("db_connect.php");
    require_once("projUtils.php");
    session_start();

    $status = $_GET['status'];
    $id = $_GET['id'];
    changeStatus($db,$id,$status);

    if(($status == 2) || ($status == 4)) // It was approved. 
    {
        if($status == 2)
        {
            header("Location: landingPageMgr.php"); 

        }
        else 
        {
            header("Location: landingPageExec.php"); 

        }
    }
    else if(($status == 1 )|| ($status == 3)) // denied
    {
        //Hello Orrin, This the code that needs styling. The code above will redirect to the home pages. 
        //It needs to look like every other page and navigation bar. 
        echo "
          
<html>
<head>
    <title>Denied</title>
    <!-- Required meta tags -->
    <meta charset='utf-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1, shrink-to-fit=no'>
     <!-- Bootstrap CSS -->
    <link rel='stylesheet' href='https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css' integrity='sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO'
        crossorigin='anonymous'>
    <link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.4.1/css/all.css' integrity='sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz'
        crossorigin='anonymous'>

    <link href='https://fonts.googleapis.com/css?family=Roboto:300,400,500,700' rel='stylesheet'>
    <style>

      html, body {
     
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
 
      justify-content: center;
      align-items: center;
      text-align: center;
            background-color: rgb(144, 202, 249);
      }

      form {
      display: inline-block;
      padding: 20px;
      text-align: center
      position: relative;
      width: 90%;
      border-radius: 10px;
      background: #fff;
      }

    </style>
  </head>

<body>

    <nav class='navbar navbar-expand-lg navbar-light bg-light'>
	<div class='container'>
	<a class='navbar-brand' href='#'>Veriform</a>
	<button class='navbar-toggler' type='button' data-toggle='collapse' data-target='#navbarSupportedContent' aria-controls='navbarSupportedContent' aria-expanded='false' aria-label='Toggle navigation'>
    <span class='navbar-toggler-icon'></span>
	</button>

	<div class='collapse navbar-collapse' id='navbarSupportedContent'>
		<ul class='navbar-nav mr-auto'>
			<li class='nav-item active'>
				<a class='nav-link' onclick='history.go(-1)'>Dashboard <span class='sr-only'>(current)
				</span></a></li>


    	</ul>
		<ul class='navbar-nav ml-auto'>
      		<li class='nav-item'><a class='nav-link' href='logout.php'>Log Out</a></li>
		</ul>
    </form>
	</div>
</div>
</nav>

<br><br>
        <form method='POST' action='feedback.php?id=$id'>
        <center><h1> Application Denied </h1></center><hr><br>
            <center><textarea placeholder = 'Please provide feedback' class='form-control' name='message' rows='15' cols='40'></textarea></center><br>
            <center><input type='submit' class='btn btn-primary' value = 'Send Feedback' /></center>
        </form>
    </body>
</html>

      ";
    }
    
?>
