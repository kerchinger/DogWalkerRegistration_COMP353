<?php
include $_SERVER['DOCUMENT_ROOT'].'/DogWalkerRegistration_COMP353/header.php' ;
include $_SERVER['DOCUMENT_ROOT'].'/DogWalkerRegistration_COMP353/includes/db.inc.php';

if(isset($_POST['Submit'])){
  $clientid = rand(100000000,999999999);
  $dogid = rand(100000000,999999999);
try {
  $password1 = password_hash($_POST['password'], PASSWORD_DEFAULT);
  $usernmae1 = $_POST['username'];
	$sql3 = "INSERT into client SET
  client_ID = '{$clientid}',
	username = '{$_POST['username']}',
	password = '{$password1}',
	name = '{$_POST['name']}',
	address = '{$_POST['adress']}',
	e_mail = '{$_POST['email']}',
	phone_number = '{$_POST['phone']}'";
  $pdo->query($sql3);
}
catch (PDOException $e)
{
  $error = 'Error creating account ' . $e->getMessage();
  include $_SERVER['DOCUMENT_ROOT'].'/DogWalkerRegistration_COMP353/errors/error.php';
  exit();
}

try {
	$sql2 = "INSERT INTO dog SET
  client_ID = '{$clientid}',
	dog_Name = '{$dogid}',
	`friendly/not_friendly` = '{$_POST['friendly/notfriednly']}',
	breed = '{$_POST['breed']}',
	hair_color = '{$_POST['hair_color']}',
	notes = '{$_POST['notes']}' ";
  $pdo->query($sql2);
}
catch (PDOException $e)
{
  $error = 'Error creating account ' . $e->getMessage();
  include $_SERVER['DOCUMENT_ROOT'].'/DogWalkerRegistration_COMP353/errors/error.php';
  exit();
}
}



include 'create_clientAccount.php';
?>
