<!-- <!doctype html> -->
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO"
        crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz"
        crossorigin="anonymous">

    <style>
        #header { 
        	background-color: rgb(144, 202, 249);
            /* background: url("header.jpeg");
            /* background: url("imgs/header.jpeg") center center / cover no-repeat; */
        }

        #budget {
        	text-align: right;
        }

        h1 {
        	color: white;
			font-weight: 700;
			font-size: 5em;
		}

    </style>

    <title>Manager Page</title>
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
				<a class="nav-link" href="http://cs.gettysburg.edu/~hernri01/ProposalApp/">Home <span class="sr-only">(current)
				</span></a></li>
      		<li class="nav-item"><a class="nav-link" href="#">About</a></li>
      		<li class="nav-item"><a class="nav-link" href="#">Contact</a></li>

    	</ul>
		<ul class="navbar-nav ml-auto">
			<li class="nav-item"><a class="nav-link" href="#">Manager Name</a></li>
      		<li class="nav-item"><a class="nav-link" href="#">Log Out</a></li>
		</ul>
    </form>
	</div>
</div>
</nav>

    <section id="header" class="jumbotron text-center">
        <h1 class="display-3">Manager Page</h1><br>
   
        <a href="" class="btn btn-primary">Message Executive</a>
        <a href="" class="btn btn-success">Create New</a>
    </section>

    <section id="gallery">
       <div class="container">
       	<h2>Applications for Review</h2>
            <div class="row">
                <?php 
                    require_once("projUtils.php");
                    require_once("db_connect.php");
                    getApp($db);
                    //This will call the getApp function from projUtils.php which will create the 
                    //boxes needed for the amount of applications the manager can view.
                ?>
            </div>
       </div>
       <div class="container">
       	<h2>Previously Approved Applications</h2>
            <div class="row">
            <?php 
                    require_once("projUtils.php");
                    require_once("db_connect.php");
                    getApprovedApps($db);
                    //This will call the getApp function from projUtils.php which will create the 
                    //boxes needed for the amount of applications the manager can view.
                ?>
            </div>
        </div>
        <div class="container">
       	<h2>Previously Denied Applications</h2>
            <div class="row">
            <?php 
                    require_once("projUtils.php");
                    require_once("db_connect.php");
                    getDeniedApps($db);
                    //This will call the getApp function from projUtils.php which will create the 
                    //boxes needed for the amount of applications the manager can view.
                ?>
            </div>
        </div>
    </section>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy"
        crossorigin="anonymous"></script>
</body>

</html>
