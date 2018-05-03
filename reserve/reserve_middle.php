<?php
include $_SERVER['DOCUMENT_ROOT'].'/DogWalkerRegistration_COMP353/includes/db.inc.php';

//NOTE: if we understood js or css, we would of been able to attempt to use dynamic field generators
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
$username = $_SESSION['userlogin'];

try{
  $sqlsched = "SELECT  DISTINCT date FROM dogwalker_schedule WHERE `taken/free` = 1; ";
  $sched = $pdo->query($sqlsched);
}
catch (PDOException $e)
{
  $error = 'Error fetching schedule: ' . $e->getMessage();
  include $_SERVER['DOCUMENT_ROOT'].'/DogWalkerRegistration_COMP353/errors/error.php';
  exit();
}

try{
  $sqlsched2 = "SELECT  DISTINCT time FROM dogwalker_schedule WHERE `taken/free` = 1; ";
  $sched2 = $pdo->query($sqlsched2);
}
catch (PDOException $e)
{
  $error = 'Error fetching schedule: ' . $e->getMessage();
  include $_SERVER['DOCUMENT_ROOT'].'/DogWalkerRegistration_COMP353/errors/error.php';
  exit();
}

try{
  $sqldog = "SELECT d.dog_Name FROM dog d JOIN client c ON c.client_ID = d.client_ID WHERE c.username = '{$username}'";
  $doggy = $pdo->query($sqldog);
}
catch (PDOException $e)
{
  $error = 'Error fetching dog: ' . $e->getMessage();
  include $_SERVER['DOCUMENT_ROOT'].'/DogWalkerRegistration_COMP353/errors/error.php';
  exit();
}

if(isset($_POST['submitReservation'])){

  if(empty($_POST['walking_date']) OR empty($_POST['walking_timeslot']) OR empty($_POST['dog']))
  {
    echo "You forgot to selecct a value in the field";
    //header('Location: reservation_form.php') ;
  }else {

    try {
        $pdo->beginTransaction();
          $reservationid = rand(100000000,999999999);
          try
          {
            $sql = "INSERT INTO reservation SET
              reservation_ID = '{$reservationid}',
              dogwalker_ID = 1,
              client_ID = 1000000000,
              walking_date = '{$_POST['walking_date']}',
              walking_timeslot= '{$_POST['walking_timeslot']}'";
              $pdo->query($sql);
            }
              catch (PDOException $e)
            {
              $error = 'Error adding new walker ' . $e->getMessage();
              include $_SERVER['DOCUMENT_ROOT'].'/DogWalkerRegistration_COMP353/errors/error.php';
              exit();
            }
            try
            {
              $sql2 = "INSERT INTO invoice SET
                client_ID = 1000000000,
                reservation_ID ='{$reservationid}',
                status = 1,
                amount= 15,
                date = '5-3-18'";

                $pdo->query($sql2);
              }
                catch (PDOException $e)
              {
                $error = 'Error adding new walker ' . $e->getMessage();
                include $_SERVER['DOCUMENT_ROOT'].'/DogWalkerRegistration_COMP353/errors/error.php';
                exit();
              }

$pdo->commit();
} catch (Exception $e) {
    $pdo->rollback();
}

  try{
    $sql = 'UPDATE dogwalker_schedule SET
        `taken/free` = 0 WHERE time = :walking_timeslot AND date = :walking_date';
    $s = $pdo->prepare($sql);
    //$s->bindValue(':reservation_ID', autdo);
    $s->bindValue(':walking_date', $_POST['walking_date']);
    $s->bindValue(':walking_timeslot', $_POST['walking_timeslot']);
    $s->execute();
  }
  catch (PDOException $e)
  {
    $error = 'Error updating schedule ' . $e->getMessage();
    include $_SERVER['DOCUMENT_ROOT'].'/DogWalkerRegistration_COMP353/errors/error.php';
    exit();
  }



  header('Location: reserve.php');
  exit();


}
}

include 'reservation_form.php';
?>
