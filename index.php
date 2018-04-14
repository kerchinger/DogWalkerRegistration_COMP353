
<!DOCTYPE html>
<!-- Template by Quackit.com -->
<!-- Images by various sources under the Creative Commons CC0 license and/or the Creative Commons Zero license.
Although you can use them, for a more unique website, replace these images with your own. -->
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>DogWalkingForYou</title>

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/custom.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
</head>

<body>
    <!-- Navigation -->
    <nav id="siteNav" class="navbar navbar-default navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Logo and responsive toggle -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">
                	<span class="glyphicon glyphicon-fire"></span>
                	DogWalk
                </a>
            </div>
            <!-- Navbar links -->
            <div class="collapse navbar-collapse" id="navbar">
                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <a href="admin/admin_login.php">Admin</a>
                    </li>
                    <li>
                        <a href=#>Another_button?</a> <!-- WE CAN ATTACH ANOTHER PHP DOCUMENT at # -->
                    </li>
                </ul>
            </div>
        </div>
    </nav>

	<!-- Header -->
    <header>
        <div class="header-content">
            <div class="header-content-inner">
                <h1>Dog Walking</h1>
                <p> A dog walking service you can rely on</p>
                <a href="reserve.php" class="btn btn-primary btn-lg">Reserve now</a>
            </div>
        </div>
    </header>


<!-- NEED TO INCLUDE A CALL TO THE DATABASE TO COLLECT THE HOTEL INFORMATION -->
<?php

include $_SERVER['DOCUMENT_ROOT'].'/DogWalkerRegistration_COMP353/includes/db.inc.php';

Try
{
  $sql = 'SELECT * FROM `dogwalking_bussiness`';
  $dogbussiness_contactinfo = $pdo->query($sql);
}
catch (PDOException $e)
{
  $error = 'Error fetching departments: ' . $e->getMessage();
  include 'errors/error.php';
  exit();
}
?>

	<!-- Footer -->
    <footer class="page-footer">
    	<!-- Contact Us -->
        <div class="contact">
        	<div class="container">
				<h2 class="section-heading">Contact Us</h2>
        <?php foreach ($dogbussiness_contactinfo as $info): ?>
				<p><span class="glyphicon glyphicon-earphone"></span><br> <?php echo $info['phone_number']; ?></p>
				<p><span class="glyphicon glyphicon-envelope"></span><br> <?php echo $info['e-mail']; ?></p>
        <p><span class="glyphicon glyphicon-home"></span><br> <?php echo $info['address']; ?></p>
      <?php endforeach; ?>
          </div>
        </div>

        <!-- Copyright etc -->
        <div class="small-print">
        	<div class="container">
        		<p>Copyright &copy; DogWalker.com 2018</p>
        	</div>
        </div>

    </footer>
</body>

</html>
