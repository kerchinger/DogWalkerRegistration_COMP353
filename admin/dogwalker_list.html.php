<!DOCTYPE html>

<html lang = "en">
<head>
<title>List of Dog Walkers</title>
<style>
table,th,td
{
border:1px solid black;
padding:5px;
}
</style>
</head>
<body>

    <p><a href="?addDogWalker">Add a Dog Walker</a></p>
    <p>Here are all your dog walkers for your Zip Code:</p>

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
         <form action="?deleteWalker" method="post">
          <input type="hidden" name="deleteWalker" value="<?php echo $walker['dogwalker_ID']; ?>">
         <input type="submit" value="Delete Walker">
        </form>
        <form action="?editWalker" method="post">
          <input type="hidden" name="editWalker" value="<?php echo $walker['dogwalker_ID']; ?>">
         <input type="submit" value="Edit Walker">
        </form>
        <form action="?editClients" method="post">
          <input type="hidden" name="editClients" value="<?php echo $walker['dogwalker_ID']; ?>">
         <input type="submit" value="Edit Clients">
        </form>
        <form action="?editSchedule" method="post">
          <input type="hidden" name="editSchedule" value="<?php echo $walker['dogwalker_ID']; ?>">
         <input type="submit" value="Edit Schedule">
        </form>
      </td>
      </tr>
    <?php endforeach; ?>
    </table>

  </body>
</html>
