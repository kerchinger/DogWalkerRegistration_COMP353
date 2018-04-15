<?php include $_SERVER['DOCUMENT_ROOT'].'/DogWalkerRegistration_COMP353/header.php' ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Enter your user name and password:</title>
  </head>
  <body>
    <form action="checkPwd.php" method="GET">
      <div><label for="userlogin">User Name:
        <input type="text" name="userlogin" id="userlogin"></label>
      </div>
      <div><label for="userpwd">Password:
        <input type="text" name="userpwd" id="userpwd"></label>
      </div>
      <div><input type="submit" value="login"></div>
    </form>
  </body>
</html>
