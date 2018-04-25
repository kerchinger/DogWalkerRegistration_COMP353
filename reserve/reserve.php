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
  //Ask for clarification on writing it
  $query = "(SELECT client_ID FROM client WHERE username = '{$username}')";
  $sql2 = "SELECT * FROM reservation WHERE client_ID= {$query}";
  $reservATIONS= $pdo->query($sql2);


  /*
  SELECT * FROM client WHERE client_ID IN (SELECT client_ID FROM reservation WHERE reservation_date="");
  */
}
catch (PDOException $e3)
{
  $error = 'Error fetching reservations: ' . $e3->getMessage();
  include $_SERVER['DOCUMENT_ROOT'].'/DogWalkerRegistration_COMP353/errors/error.php';
  exit();
}

include 'reserve_home.html.php';
