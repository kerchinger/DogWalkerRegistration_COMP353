<?php
include $_SERVER['DOCUMENT_ROOT'].'/DogWalkerRegistration_COMP353/header.php';
include $_SERVER['DOCUMENT_ROOT'].'/DogWalkerRegistration_COMP353/includes/db.inc.php';
include_once $_SERVER['DOCUMENT_ROOT'].'/DogWalkerRegistration_COMP353/login/checkPwdUsr.php';

if (isUserLoggedIn() == FALSE)
{
  include 'admin_login.php';
  exit();
}

$username = $_SESSION['userlogin'];
$zipcode = $_SESSION['zip_code'];

try{
  $sql2 =  "SELECT * FROM dog_walker d, client c JOIN reservation r ON
c.client_ID = r.client_ID WHERE d.dogwalker_ID = r.dogwalker_ID AND d.zip_code = {$zipcode};";;
  $clientList = $pdo->query($sql2);
}
catch (PDOException $e)
{
  $error = 'Error fetching departments: ' . $e->getMessage();
  include $_SERVER['DOCUMENT_ROOT'].'/DogWalkerRegistration_COMP353/errors/error.php';
  exit();
}

if (isset($_GET['returnHome'])){
  header('Location: admin.php');
  exit;
}

if (isset($_GET['deleteClient'])){

  try
  {

    $sql = 'DELETE FROM client WHERE client_ID = :client_ID';
    $s = $pdo->prepare($sql);
    $s->bindValue(':client_ID', $_POST['deleteClient']);
    $s->execute();

  }
  catch (PDOException $e)
  {
    $error = 'Error deleting client: ' . $e->getMessage();
    include $_SERVER['DOCUMENT_ROOT'].'/DogWalkerRegistration_COMP353/errors/error.php';
    exit();
  }

  header('Location: editClientsInfo.php');
  exit();
}

if (isset($_GET['editClient'])){
include 'editClientInfo.php';
exit();
}

if(isset($_GET['submitUpdateClie']))
{
  try
  {
    $sql = 'UPDATE client SET
        client_ID = :client_ID1,
        username = :username1,
        password = :password1,
        name = :name1,
        address= :address1,
        e_mail = :email1,
        phone_number = :phone_number1
        WHERE client_ID = :client_ID1';
    $s = $pdo->prepare($sql);
    $s->bindValue(':client_ID1', $_GET['client_ID']);
    $s->bindValue(':username1', $_GET['username']);
    $s->bindValue(':password1', $_GET['password']);
    $s->bindValue(':name1', $_GET['name']);
    $s->bindValue(':address1', $_GET['address']);
    $s->bindValue(':email1', $_GET['e_mail']);
    $s->bindValue(':phone_number1', $_GET['phone_number']);
    $s->execute();
  }
  catch (PDOException $e)
  {
    $error = 'Error updating walker ' . $e->getMessage();
    include $_SERVER['DOCUMENT_ROOT'].'/DogWalkerRegistration_COMP353/errors/error.php';
    exit();
  }
  header('Location: editClientsInfo.php');
  exit();
}

include 'client_list.html.php';
 ?>
