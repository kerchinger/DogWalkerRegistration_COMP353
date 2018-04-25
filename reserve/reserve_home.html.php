<?php include $_SERVER['DOCUMENT_ROOT'].'/DogWalkerRegistration_COMP353/includes/db.inc.php';
// use a more complex query/like create a table and use a join. 
 ?>
<html>
  <head>
    <meta charset="UTF-8">
    <title>DogWalking Reservation</title>
    <style>
    table,th,td
    {
    border:1px solid black;
    padding:5px;
    }
    </style>
  </head>

  <body>
    <p>Manage Reservations: </p>
    <form action="?reservation" method="get"> Would you like to make a new reservation?
     <input type="hidden" name="reservation">
    <input type="submit" value="Yes">
   </form>
   <table >
     <tr>
       <td> <?php echo "Reservation ID"; ?> </td>
      <td> <?php echo "DogWalker ID"; ?> </td>
       <td> <?php echo "Walking Date"; ?> </td>
        <td> <?php echo "Walking Time Slot"; ?> </td>
        <td> <?php echo "Dog Name"; ?> </td>
        <td> <?php echo "Friendly?"; ?> </td>
        <td> <?php echo "Breed"; ?> </td>
        <td> <?php echo "Hair Color"; ?> </td>
        <td> <?php echo "Notes"; ?> </td>
      </tr>
   <?php foreach ($reservATIONS as $resX):
     try{
       $sql2 = 'SELECT * FROM dog WHERE client_ID= ?';
       $dog= $pdo->prepare($sql2);
       $dog->execute([$resX['client_ID']]);
       $dogX = $dog->fetch();
     }
     catch (PDOException $e3)
     {
       $error = 'Error fetching clients: ' . $e3->getMessage();
       include $_SERVER['DOCUMENT_ROOT'].'/DogWalkerRegistration_COMP353/errors/error.php';
       exit();
     }
      ?>
     <tr>
     <td> <?php echo $resX['reservation_ID']; ?> </td>
      <td> <?php echo $resX['dogwalker_ID']; ?> </td>
      <td> <?php echo $resX['walking_date']; ?> </td>
       <td> <?php echo $resX['walking_timeslot']; ?> </td>
      <td> <?php echo $dogX['dog_Name']; ?> </td>
      <td> <?php echo $dogX['friendly/not_friendly']; ?> </td>
      <td> <?php echo $dogX['breed']; ?> </td>
      <td> <?php echo $dogX['hair_color']; ?> </td>
      <td> <?php echo $dogX['notes']; ?> </td>
        </tr>
      <?php endforeach; ?>
      </table>

  </body>
</html>
