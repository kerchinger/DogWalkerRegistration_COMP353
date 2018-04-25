<?php
include_once $_SERVER['DOCUMENT_ROOT'].'/DogWalkerRegistration_COMP353/login/checkPwdUsr.php';

if (isUserLoggedIn() == FALSE)
{
  include 'admin_login.php';
  exit();
}
//echo "edit Schedule";
$dogwalkerID_X =  $_POST['editSchedule'];
echo $dogwalkerID_X;
 ?>
