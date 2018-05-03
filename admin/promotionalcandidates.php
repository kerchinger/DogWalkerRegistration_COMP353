<?php include_once $_SERVER['DOCUMENT_ROOT'].'/DogWalkerRegistration_COMP353/login/checkPwdUsr.php';
include $_SERVER['DOCUMENT_ROOT'].'/DogWalkerRegistration_COMP353/includes/db.inc.php';

try{
  $sql2 = "SELECT name, hourly_rate, years_worked, starRating FROM dog_walker WHERE
  years_worked IN (SELECT years_worked FROM dog_walker WHERE starRating >=4)";
  $promote = $pdo->query($sql2);
}
catch (PDOException $e)
{
  $error = 'Error fetching departments: ' . $e->getMessage();
  include $_SERVER['DOCUMENT_ROOT'].'/DogWalkerRegistration_COMP353/errors/error.php';
  exit();
}

?>
<!DOCTYPE html>

<html lang = "en">
<head>
<title>List of Promotional Candidates</title>
<style>
table,th,td
{
border:0.2px solid black;
padding:2px;
}
</style>
</head>
<body>
    <p>Here are the Promotional Candidates:</p>
    <table >
      <tr>
        <td> <?php echo "name"; ?> </td>
       <td> <?php echo "hourly_rate"; ?> </td>
       <td> <?php echo "years_worked"; ?> </td>
        <td> <?php echo "starRating"; ?> </td>
       </tr>
    <?php foreach ($promote as $pro): ?>
      <tr>
      <td> <?php echo $pro['name']; ?> </td>
      <td> <?php echo $pro['hourly_rate']; ?> </td>
      <td> <?php echo $pro['years_worked']; ?> </td>
      <td> <?php echo $pro['starRating']; ?> </td>
      </tr>
    <?php endforeach; ?>
    </table>

  </body>
</html>
