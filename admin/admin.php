<!--
So each admin will be the administrator for for a group of walkers(which is based on Zip Code), and the admin will be able to also edit client data for each invidual walker
 -->
<?php
include $_SERVER['DOCUMENT_ROOT'].'/DogWalkerRegistration_COMP353/header.php';
include $_SERVER['DOCUMENT_ROOT'].'/DogWalkerRegistration_COMP353/includes/db.inc.php';

session_start();
$username = $_SESSION['userlogin'];

try{
  $sql2 = "SELECT * FROM dogwalker_admin WHERE username = '{$username}'";
  $userx = $pdo->query($sql2);
}
catch (PDOException $e)
{
  $error = 'Error fetching departments: ' . $e->getMessage();
  include $_SERVER['DOCUMENT_ROOT'].'/DogWalkerRegistration_COMP353/errors/error.php';
  exit();
}
foreach ($userx as $singleadmin):
  $bussinessID = 111111111;
  $zipcode = $singleadmin['zip code'];
endforeach;


if (isset($_GET['addDogWalker']))
{
  include 'add_dogwalker.html.php';
  exit();
}

try {
    $query = "(SELECT zip_code FROM dogwalker_admin WHERE username = '{$username}')";
    $sql2 = "SELECT * FROM dog_walker WHERE zip_code= {$query}";
    $dogwalkersX= $pdo->query($sql2);
  } catch (PDOException $e2) {
    $error = 'Error for fetching dogwalkers: ' . $e2->getMessage();
    include $_SERVER['DOCUMENT_ROOT'].'/DogWalkerRegistration_COMP353/errors/error.php';
    exit();
}

if (isset($_POST['dogwalker_ID']))
{
  try
  {
    $sql = 'INSERT INTO dog_walker SET
        dogwalker_ID = :dogwalker_ID,
        bussiness_ID = :bussiness_ID,
        name = :name,
        hourly_rate = :hourly_rate,
        years_worked= 0,
        starRating = 5,
        miles_traveled = 0,
        zip_code = :zip_code';
    $s = $pdo->prepare($sql);
    $s->bindValue(':dogwalker_ID', $_POST['dogwalker_ID']);
    $s->bindValue(':bussiness_ID', $bussinessID);
    $s->bindValue(':name', $_POST['name']);
    $s->bindValue(':hourly_rate', $_POST['hourly_rate']);
    $s->bindValue(':zip_code', $zipcode);
    $s->execute();
  }
  catch (PDOException $e)
  {
    $error = 'Error adding new walker ' . $e->getMessage();
    include $_SERVER['DOCUMENT_ROOT'].'/DogWalkerRegistration_COMP353/errors/error.php';
    exit();
  }
  header('Location: admin.php');
  exit();
}


if (isset($_GET['deleteWalker']))
{
  try
  {
    $sql = 'DELETE FROM dog_walker WHERE dogwalker_ID = :deleteWalker';
    $s = $pdo->prepare($sql);
    $s->bindValue(':deleteWalker', $_POST['deleteWalker']);
    $s->execute();
  }
  catch (PDOException $e)
  {
    $error = 'Error deleting walker: ' . $e->getMessage();
    include $_SERVER['DOCUMENT_ROOT'].'/DogWalkerRegistration_COMP353/errors/error.php';
    exit();
  }

  header('Location: admin.php');
  exit();
}

if (isset($_GET['editWalker']))
{
  include 'editWalkerInfo.php';
  exit();
}

if (isset($_GET['editClients']))
{
  include "editClientsInfo.php";
  exit();
}

if (isset($_GET['editSchedule']))
{
  include "editSchedule.php";
  exit();
}

if(isset($_GET['submitUpdate']))
{
  try
  {
    $sql = 'UPDATE dog_walker SET
        dogwalker_ID = :dogwalker_ID1,
        bussiness_ID = :bussiness_ID1,
        name = :name1,
        hourly_rate = :hourly_rate1,
        years_worked= :years_worked1,
        starRating = :starRating1,
        miles_traveled = :miles_traveled1,
        zip_code = :zip_code1
        WHERE dogwalker_ID = :dogwalker_ID1';
    $s = $pdo->prepare($sql);
    $s->bindValue(':dogwalker_ID1', $_GET['dogwalker_ID']);
    $s->bindValue(':bussiness_ID1', $bussinessID);
    $s->bindValue(':name1', $_GET['name']);
    $s->bindValue(':hourly_rate1', $_GET['hourly_rate']);
    $s->bindValue(':years_worked1', $_GET['years_worked']);
    $s->bindValue(':starRating1', $_GET['starRating']);
    $s->bindValue(':miles_traveled1', $_GET['miles_traveled']);
    $s->bindValue(':zip_code1', $zipcode);
    $s->execute();
  }
  catch (PDOException $e)
  {
    $error = 'Error updating walker ' . $e->getMessage();
    include $_SERVER['DOCUMENT_ROOT'].'/DogWalkerRegistration_COMP353/errors/error.php';
    exit();
  }
  header('Location: admin.php');
  exit();
}

include 'dogwalker_list.html.php';
