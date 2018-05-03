<?php include $_SERVER['DOCUMENT_ROOT'].'/DogWalkerRegistration_COMP353/header.php' ?>
<?php
include $_SERVER['DOCUMENT_ROOT'].'/DogWalkerRegistration_COMP353/includes/db.inc.php';

session_start();
$username = $_SESSION['userlogin'];

if(isset($_GET['reservation'])){
  include 'reserve_middle.php';
  exit();
}



//TRIGGER
/*
try{
  $sql2 = "DELIMITER $$
CREATE OR REPLACE TRIGGER after_update_on_reservation
    AFTER UPDATE ON reservation
    FOR EACH ROW
BEGIN
    UPDATE dog_walker set new.miles_traveled = (old.miles_traveled +5)
END$$
DELIMITER ;";

  $reservATIONS= $pdo->query($sql2);
}

catch (PDOException $e3)
{
  $error = 'Error fetching reservations: ' . $e3->getMessage();
  include $_SERVER['DOCUMENT_ROOT'].'/DogWalkerRegistration_COMP353/errors/error.php';
  exit();
}

*/


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
