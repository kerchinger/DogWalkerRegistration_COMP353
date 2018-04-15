<?php
include $_SERVER['DOCUMENT_ROOT'].'/DogWalkerRegistration_COMP353/includes/db.inc.php';

$walkerID = $_SESSION['dogwalkerID'];
echo $walkerID;
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
    <form action="?" method="post">
     <div><label for="dogwalker_IDEDIT">Dog walker ID:
        <input type="text" name="dogwalker_ID"
        value = <?php ?> id="dogwalker_ID"></label>
      </div>
      <div><label for="bussiness_ID">Dog walker ID:
         <input type="text" name="bussiness_ID" id="bussiness_ID"></label>
       </div>
      <div><label for="name">Name:
        <input type="text" name="name" id="name"></label>
      </div>
      <div><label for="hourly_rate">hourly_rate:
        <input type="text" name="hourly_rate" id="Hourly_rate"></label>
      </div>
      <div><label for="years_worked">Dog walker ID:
         <input type="text" name="years_worked" id="years_worked"></label>
       </div>
       <div><label for="starRating">Dog walker ID:
          <input type="text" name="starRating" id="starRating"></label>
        </div>
        <div><label for="miles_traveled">Dog walker ID:
           <input type="text" name="miles_traveled" id="miles_traveled"></label>
         </div>
         <div><label for="zip_code">Dog walker ID:
            <input type="text" name="zip_code"
            value="606660" id="zip_code"></label>
          </div>
          <div><input type="submit" value="submit"></div>
    </form>
  </body>
</html>
