<?php
include $_SERVER['DOCUMENT_ROOT'].'/DogWalkerRegistration_COMP353/header.php';
include_once $_SERVER['DOCUMENT_ROOT'].'/DogWalkerRegistration_COMP353/login/checkPwdUsr.php';

if (isUserLoggedIn() == FALSE)
{
  include 'admin_login.php';
  exit();
}
echo "Work in Progress: Waiting for Schedule to be worked finnished" 
 ?>
