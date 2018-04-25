<?php include_once $_SERVER['DOCUMENT_ROOT'].'/DogWalkerRegistration_COMP353/login/checkPwdUsr.php';
 ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Enter your user name and password:</title>
  </head>
  <body>
    <form action="" method="GET">
      <div><label for="userlogin">User Name:
        <input type="text" name="userlogin" id="userlogin"></label>
      </div>
      <div><label for="userpwd">Password:
        <input type="text" name="userpwd" id="userpwd"></label>
      </div>
      <div><input type="submit" name="submit1" value="login"></div>
      <?php
      if(isset($_GET['submit1'])){
      $userlogin = $_GET['userlogin'];
      $userpwd = $_GET['userpwd'];

      if(!checkUserPassword($userlogin, $userpwd, 0)){
        header('Location: login_failed.php');
        exit;
      }else{
        header('Location: admin.php');
        exit;
      }
      }
       ?>
    </form>
  </body>
</html>
