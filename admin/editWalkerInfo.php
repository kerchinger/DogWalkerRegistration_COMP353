<?php
include $_SERVER['DOCUMENT_ROOT'].'/DogWalkerRegistration_COMP353/includes/db.inc.php';
include_once $_SERVER['DOCUMENT_ROOT'].'/DogWalkerRegistration_COMP353/login/checkPwdUsr.php';

if (isUserLoggedIn() == FALSE)
{
  include 'admin_login.php';
  exit();
}


$walkerID = $_POST['editWalker'];

try{
  $sql2 = "SELECT * FROM dog_walker WHERE dogwalker_ID = '{$walkerID}'";
  $walkerinfo = $pdo->query($sql2);
}
catch (PDOException $e)
{
  $error = 'Error fetching departments: ' . $e->getMessage();
  include $_SERVER['DOCUMENT_ROOT'].'/DogWalkerRegistration_COMP353/errors/error.php';
  exit();
}


?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Add Walker</title>
    <style type="text/css">
    textarea {
      display: block;
      width: 100%;
    }
    </style>
  </head>
  <body>
    <?php foreach ($walkerinfo as $walkerX):?>
    <form action="" method="get">
     <div><label for="dogwalker_ID">Dog walker ID:
        <input type="text" name="dogwalker_ID"
        value = <?php echo $walkerX['dogwalker_ID']; ?> readonly id="dogwalker_ID"></label>
      </div>
      <div><label for="bussiness_ID">Bussiness ID:
         <input type="text" name="bussiness_ID"
         value = <?php echo $walkerX['bussiness_ID']; ?> id="bussiness_ID"></label>
       </div>
      <div><label for="name">Name:
        <input type="text" name="name"
        value = <?php echo $walkerX['name']; ?> id="name"></label>
      </div>
      <div><label for="hourly_rate">Hourly Rate:
        <input type="text" name="hourly_rate"
        value = <?php echo $walkerX['hourly_rate']; ?> id="Hourly_rate"></label>
      </div>
      <div><label for="years_worked">Years Worked:
         <input type="text" name="years_worked"
         value = <?php echo $walkerX['years_worked']; ?> id="years_worked"></label>
       </div>
       <div><label for="starRating">Star Rating:
          <input type="text" name="starRating"
          value = <?php echo $walkerX['starRating']; ?> id="starRating"></label>
        </div>
        <div><label for="miles_traveled">Miles Traveled:
           <input type="text" name="miles_traveled"
           value = <?php echo $walkerX['miles_traveled']; ?> id="miles_traveled"></label>
         </div>
         <div><label for="zip_code">Zip Code:
            <input type="text" name="zip_code"
            value = <?php echo $walkerX['zip_code']; ?> id="zip_code"></label>
          </div>
          <div><input type="submit" name="submitUpdate" value="submit"></div>
        <?php endforeach; ?>
    </form>
  </body>
</html>
