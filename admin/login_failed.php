<?php include $_SERVER['DOCUMENT_ROOT'].'/DogWalkerRegistration_COMP353/header.php' ?>
 <!DOCTYPE html>
 <html lang="en">
   <head>
     <meta charset="utf-8">
     <title>Login Failed</title>
   </head>
   <body>
     <p>Login Failed</p>
     <form action="login_failed.php" id="#form" method="post" name="#form">
       <input id='btn' name="retry" type='submit' value='retry'>
     <?php
     if(isset($_POST['retry'])){
       header("Location: admin_login.php");
     } ?>
     </form>
   </body>
 </html>
