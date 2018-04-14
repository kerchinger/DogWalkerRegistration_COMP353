<?php
try
{
  $pdo = new PDO('mysql:host=localhost;dbname=dogwalkdatabase', 'dog_walk', 'walkme');
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $pdo->exec('SET NAMES "utf8"');
}
catch (PDOException $e)
{
  $error = 'Unable to connect to the database server.';
  include '/errors/error.html.php';
  exit();
}
?>
