<?php
include $_SERVER['DOCUMENT_ROOT'].'/DogWalkerRegistration_COMP353/includes/db.inc.php';
include_once $_SERVER['DOCUMENT_ROOT'].'/DogWalkerRegistration_COMP353/login/checkPwdUsr.php';

if (isUserLoggedIn() == FALSE)
{
  include 'admin_login.php';
  exit();
}


$reserationID = $_POST['editReservation'];

try{
  $sql5 = "SELECT * FROM reservation WHERE reservation_ID = '{$reserationID}'";
  $reservationinfo = $pdo->query($sql5);
}
catch (PDOException $e)
{
  $error = 'Error fetching reservation for edit reservations: ' . $e->getMessage();
  include $_SERVER['DOCUMENT_ROOT'].'/DogWalkerRegistration_COMP353/errors/error.php';
  exit();
}


?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Add Walker</title>
    <style type="text/css">
    textarea {
      display: block;
      width: 100%;
    }
    </style>
  </head>
  <body>
    <?php foreach ($reservationinfo as $res):?>
    <form action="" method="get">
     <div><label for="reservation_ID">Reservation ID:
        <input type="text" name="reservation_ID"
        value = <?php echo $res['reservation_ID']; ?> readonly id="reservation_ID"></label>
      </div>
      <div><label for="dogwalker ID">Dogwalker ID:
         <input type="text" name="dogwalker_ID"
         value = <?php echo $res['dogwalker_ID']; ?> readonly id="dogwalker_ID"></label>
       </div>
      <div><label for="client_ID">Client ID:
        <input type="text" name="client_ID"
        value = <?php echo $res['client_ID']; ?> readonly id="client_ID"></label>
      </div>
      <div><label for="walking_date">Walking (Date Need to work on to have a drop down list from possible walking dates):
        <input type="text" name="walking_date"
        value = <?php echo $res['walking_date']; ?> id="walking_date"></label>
      </div>
      <div><label for="walking_timeslot">Years Worked (Need to work on: same as walking date):
         <input type="text" name="walking_timeslot"
         value = <?php echo $res['walking_timeslot']; ?> id="walking_timeslot"></label>
       </div>
          <div><input type="submit" name="submitUpdateRes" value="submit"></div>
        <?php endforeach; ?>
    </form>
  </body>
</html>
