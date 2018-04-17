<?php include $_SERVER['DOCUMENT_ROOT'].'/DogWalkerRegistration_COMP353/header.php' ?>
<?php
include $_SERVER['DOCUMENT_ROOT'].'/DogWalkerRegistration_COMP353/includes/db.inc.php';

session_start();
$username = $_SESSION['userlogin'];

if(isset($_GET['reservation'])){
  include 'reservation_form.php';
  exit();
}


try{
  $query = "(SELECT client_ID FROM client WHERE username = '{$username}')";
  $sql2 = "SELECT * FROM reservation WHERE client_ID= {$query}";
  $reservATIONS= $pdo->query($sql2);
}
catch (PDOException $e3)
{
  $error = 'Error fetching reservations: ' . $e3->getMessage();
  include $_SERVER['DOCUMENT_ROOT'].'/DogWalkerRegistration_COMP353/errors/error.php';
  exit();
}

include 'reserve_home.html.php';
