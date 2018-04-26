<?php include_once $_SERVER['DOCUMENT_ROOT'].'/DogWalkerRegistration_COMP353/login/checkPwdUsr.php'; ?>
<!DOCTYPE html>

<html lang = "en">
<head>
<title>List of Dog Walkers</title>
<style>
table,th,td
{
border:0.2px solid black;
padding:2px;
}
</style>
</head>
<body>
    <p>Here are all the Reservations for this walker:</p>
    <p><a href="?returnHome">Return to Admin Home</a></p>

    <table >
      <tr>
        <td> <?php echo "reservation_ID"; ?> </td>
       <td> <?php echo "username"; ?> </td>
       <td> <?php echo "walking_date"; ?> </td>
        <td> <?php echo "walking_timeslot"; ?> </td>
       </tr>
    <?php foreach ($reservationsEDIT as $reserve1): ?>
      <tr>
      <td> <?php echo $reserve1['reservation_ID']; ?> </td>
      <td> <?php echo $reserve1['client_ID']; ?> </td>
      <td> <?php echo $reserve1['walking_date']; ?> </td>
      <td> <?php echo $reserve1['walking_timeslot']; ?> </td>
      <td>
         <form action="?deleteReservation" method="post">
          <input type="hidden" name="deleteReservation" value="<?php echo $reserve1['reservation_ID']; ?>">
         <input type="submit" value="Delete Reservation">
        </form>
        <form action="?editReservation" method="post">
          <input type="hidden" name="editReservation" value="<?php echo $reserve1['reservation_ID']; ?>">
         <input type="submit" value="Edit Reservation">
        </form>
      </td>
      </tr>
    <?php endforeach; ?>
    </table>

  </body>
</html>
