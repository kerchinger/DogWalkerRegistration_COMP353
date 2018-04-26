<?php
include $_SERVER['DOCUMENT_ROOT'].'/DogWalkerRegistration_COMP353/header.php';
include $_SERVER['DOCUMENT_ROOT'].'/DogWalkerRegistration_COMP353/includes/db.inc.php';
include_once $_SERVER['DOCUMENT_ROOT'].'/DogWalkerRegistration_COMP353/login/checkPwdUsr.php';


if (isUserLoggedIn() == FALSE)
{
  include 'admin_login.php';
  exit();
}

/*TODO MAKE QUERY MORE COMPLICTED AND GET INFO FROM THE username so that the query is only for the specific zip code */
try{
  $sql4 = "SELECT * FROM reservation";
  $reservationsEDIT = $pdo->query($sql4);
}
catch (PDOException $e)
{
  $error = 'Error fetching reservations from editReservations: ' . $e->getMessage();
  include $_SERVER['DOCUMENT_ROOT'].'/DogWalkerRegistration_COMP353/errors/error.php';
  exit();
}

if (isset($_GET['returnHome'])){
  header('Location: admin.php');
  exit;
}

if (isset($_GET['deleteReservation'])){
  try
  {
    $sql = 'DELETE FROM reservation WHERE reservation_ID = :reservation_ID';
    $s = $pdo->prepare($sql);
    $s->bindValue(':reservation_ID', $_POST['deleteReservation']);
    $s->execute();
  }
  catch (PDOException $e)
  {
    $error = 'Error deleting reservation: ' . $e->getMessage();
    include $_SERVER['DOCUMENT_ROOT'].'/DogWalkerRegistration_COMP353/errors/error.php';
    exit();
  }

  header('Location: editReservations.php');
  exit();


}

if (isset($_GET['editReservation'])){
include 'editReservationInfo.php';
exit();
}

if(isset($_GET['submitUpdateRes']))
{
  try
  {
    $sql = 'UPDATE reservation SET
        reservation_ID = :reservation_ID1,
        dogwalker_ID = :dogwalker_ID1,
        client_ID = :client_ID1,
        walking_date = :walking_date1,
        walking_timeslot= :walking_timeslot1
        WHERE reservation_ID = :reservation_ID1';
    $s = $pdo->prepare($sql);
    $s->bindValue(':reservation_ID1', $_GET['reservation_ID']);
    $s->bindValue(':dogwalker_ID1', $_GET['dogwalker_ID']);
    $s->bindValue(':client_ID1', $_GET['client_ID']);
    $s->bindValue(':walking_date1', $_GET['walking_date']);
    $s->bindValue(':walking_timeslot1', $_GET['walking_timeslot']);
    $s->execute();
  }
  catch (PDOException $e)
  {
    $error = 'Error updating walker ' . $e->getMessage();
    include $_SERVER['DOCUMENT_ROOT'].'/DogWalkerRegistration_COMP353/errors/error.php';
    exit();
  }
  header('Location: editReservations.php');
  exit();
}




include 'reservationList.html.php';
 ?>
