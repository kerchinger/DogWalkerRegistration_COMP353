<?php
include $_SERVER['DOCUMENT_ROOT'].'/DogWalkerRegistration_COMP353/includes/db.inc.php';
include_once $_SERVER['DOCUMENT_ROOT'].'/DogWalkerRegistration_COMP353/login/checkPwdUsr.php';

if (isUserLoggedIn() == FALSE)
{
  include 'admin_login.php';
  exit();
}

/*MAKE QUERY MORE COMPLICTED AND GET INFO FROM THE username so that the query is only for the specific zip code */
try{
  $sql5 = "SELECT * FROM client";
  $clientinfo = $pdo->query($sql5);
}
catch (PDOException $e)
{
  $error = 'Error fetching reservation for edit clients: ' . $e->getMessage();
  include $_SERVER['DOCUMENT_ROOT'].'/DogWalkerRegistration_COMP353/errors/error.php';
  exit();
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Edit Client</title>
    <style type="text/css">
    textarea {
      display: block;
      width: 100%;
    }
    </style>
  </head>
  <body>
    <?php foreach ($clientinfo as $clien):?>
    <form action="" method="get">
     <div><label for="client_ID">Client ID:
        <input type="text" name="client_ID"
        value = <?php echo $clien['client_ID']; ?> readonly id="client_ID"></label>
      </div>
      <div><label for="username">Username:
         <input type="text" name="username"
         value = <?php echo $clien['username']; ?> id="username"></label>
       </div>
      <div><label for="password">Password:
        <input type="text" name="password"
        value = <?php echo $clien['password']; ?> readonly id="client_ID"></label>
      </div>
      <div><label for="name">Name:
        <input type="text" name="name"
        value = <?php echo $clien['name']; ?> id="name"></label>
      </div>
      <div><label for="address">Address:
         <input type="text" name="address"
         value = <?php echo $clien['address']; ?> id="address"></label>
       </div>
       <div><label for="e_mail">e_mail:
          <input type="text" name="e_mail"
          value = <?php echo $clien['e_mail']; ?> id="e_mail"></label>
        </div>
       <div><label for="phone_number">Phone Number:
          <input type="text" name="phone_number"
          value = <?php echo $clien['phone_number']; ?> id="phone_number"></label>
        </div>
          <div><input type="submit" name="submitUpdateClie" value="submit"></div>
        <?php endforeach; ?>
    </form>
  </body>
</html>
