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
client_ID, username, password, name, address, e_mail, phone_number
</style>
</head>
<body>
    <p>Here are all the Reservations for this walker:</p>
    <p><a href="?returnHome">Return to Admin Home</a></p>

    <table >
      <tr>
        <td> <?php echo "client_ID"; ?> </td>
       <td> <?php echo "username"; ?> </td>
       <td> <?php echo "password"; ?> </td>
        <td> <?php echo "name"; ?> </td>
        <td> <?php echo "address"; ?> </td>
        <td> <?php echo "e_mail"; ?> </td>
        <td> <?php echo "phone_number"; ?> </td>
       </tr>
    <?php foreach ($clientList as $client): ?>
      <tr>
      <td> <?php echo $client['client_ID']; ?> </td>
      <td> <?php echo $client['username']; ?> </td>
      <td> <?php echo 'hidden'; ?> </td>
      <td> <?php echo $client['name']; ?> </td>
      <td> <?php echo $client['address']; ?> </td>
      <td> <?php echo $client['e_mail']; ?> </td>
      <td> <?php echo $client['phone_number']; ?> </td>
      <td>
         <form action="?deleteClient" method="post">
          <input type="hidden" name="deleteClient" value="<?php echo $client['client_ID']; ?>">
         <input type="submit" value="Delete Client">
        </form>
        <form action="?editClient" method="post">
          <input type="hidden" name="editClient" value="<?php echo $client['client_ID']; ?>">
         <input type="submit" value="Edit Client">
        </form>
      </td>
      </tr>
    <?php endforeach; ?>
    </table>

  </body>
</html>
