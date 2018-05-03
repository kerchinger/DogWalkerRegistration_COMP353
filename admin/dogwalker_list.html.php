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

    <p><a href="?addDogWalker">Add a Dog Walker</a></p>
    <p>Here are all your dog walkers for your Zip Code:</p>
    <p><a href="?editSchedule">Edit Schedule</a></p>
    <p><a href="?editClient">Edit Client</a></p>
    <p><a href="?PromotionCandidates">Promotion Candidates</a></p>

    <table >
      <tr>
        <td> <?php echo "dogwalker_ID"; ?> </td>
       <td> <?php echo "bussiness_ID"; ?> </td>
       <td> <?php echo "name"; ?> </td>
        <td> <?php echo "hourly_rate"; ?> </td>
         <td> <?php echo "years_worked"; ?> </td>
         <td> <?php echo "starRating"; ?> </td>
         <td> <?php echo "miles_traveled"; ?> </td>
         <td> <?php echo "zip_code"; ?> </td>
         <td> <?php echo "next_client_reservations"; ?> </td>
       </tr>
    <?php foreach ($dogwalkersX as $walker): ?>
      <tr>
      <td> <?php echo $walker['dogwalker_ID']; ?> </td>
       <td> <?php echo $walker['bussiness_ID']; ?> </td>
       <td> <?php echo $walker['name']; ?> </td>
        <td> <?php echo $walker['hourly_rate']; ?> </td>
         <td> <?php echo $walker['years_worked']; ?> </td>
         <td> <?php echo $walker['starRating']; ?> </td>
         <td> <?php echo $walker['miles_traveled']; ?> </td>
         <td> <?php echo $walker['zip_code']; ?> </td>
         <td>
           <table >
             <tr>
              <td> <?php echo "reservation_ID"; ?> </td>
              <td> <?php echo "client username"; ?> </td>
              <td> <?php echo "walking_date"; ?> </td>
              <td> <?php echo "walking_timeslot"; ?> </td>
              </tr>
               <?php foreach($reservationsX as $reservation): ?>
                 <tr>
                 <td><?php  echo $reservation[0] ?> </td>
                 <td><?php  echo $reservation[1] ?> </td>
                 <td><?php  echo $reservation[2] ?> </td>
                 <td><?php  echo $reservation[3] ?> </td>
                  <?php endforeach; ?>
                </tr>
              </table>
            </td>
         <td>
         <form action="?deleteWalker" method="post">
          <input type="hidden" name="deleteWalker" value="<?php echo $walker['dogwalker_ID']; ?>">
         <input type="submit" value="Delete Walker">
        </form>
        <form action="?editWalker" method="post">
          <input type="hidden" name="editWalker" value="<?php echo $walker['dogwalker_ID']; ?>">
         <input type="submit" value="Edit Walker">
        </form>
        <form action="?editReservations" method="post">
          <input type="hidden" name="editReservations" value="<?php echo $walker['dogwalker_ID']; ?>">
         <input type="submit" value="Edit Reservations">
        </form>
      </td>
      </tr>
    <?php endforeach; ?>
    </table>

  </body>
</html>
