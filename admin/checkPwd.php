<?php include $_SERVER['DOCUMENT_ROOT'].'/DogWalkerRegistration_COMP353/header.php' ?>
<?php
include $_SERVER['DOCUMENT_ROOT'].'/DogWalkerRegistration_COMP353/includes/db.inc.php';
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Admin Account</title>
  </head>
  <body>
    <p>
      <?php
	    $userlogin = $_GET['userlogin'];
      $userpwd = $_GET['userpwd'];

      try {
        $sql2 = 'SELECT * FROM dogwalker_admin WHERE username = ?';
        $userx = $pdo->prepare($sql2);
        } catch (PDOException $e2) {
        $error = 'Error fetching departments: ' . $e2->getMessage();
        include $_SERVER['DOCUMENT_ROOT'].'/DogWalkerRegistration_COMP353/errors/error.php';
        exit();
      }
        $userx->execute([$userlogin]);
        $user11 = $userx->fetch();
	      if (password_verify($userpwd,$user11['password'])){
          session_start();
          $_SESSION['userlogin'] = $userlogin;
          $_SESSION['bussiness_ID'] = $user11['bussiness_ID'];
          $_SESSION['zip_code'] = $user11['zip_code'];

		       header("Location: admin.php");
	          }
	      else {
          header("Location: login_failed.php");
	     }
      ?>
    </p>
  </body>
</html>
