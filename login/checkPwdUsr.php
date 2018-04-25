<?php


function checkUserPassword($userlogin, $userpwd, $admin_reserve){
  include $_SERVER['DOCUMENT_ROOT'].'/DogWalkerRegistration_COMP353/includes/db.inc.php';

  try {
    $sql2 = 'SELECT * FROM dogwalker_admin WHERE username = ?';
    $userx = $pdo->prepare($sql2);
    } catch (PDOException $e2) {
    $error = 'Error fetching departments: ' . $e2->getMessage();
    include $_SERVER['DOCUMENT_ROOT'].'/DogWalkerRegistration_COMP353/errors/error.php';
    exit();
  }
    $userx->execute([$userlogin]);
    $user11 = $userx->fetch();
    if (password_verify($userpwd,$user11['password'])){
      session_start();
      $_SESSION['userlogin'] = $userlogin;
      $_SESSION['loggedIn'] = true;
      $_SESSION['userpwd'] = $userlogin;
      $_SESSION['bussiness_ID'] = $user11['bussiness_ID'];
      $_SESSION['zip_code'] = $user11['zip_code'];

       return true;
        }
    else {
      session_start();
            unset($_SESSION['userlogin']);
            unset($_SESSION['loggedIn']);
            unset($_SESSION['userpwd']);
            unset($_SESSION['bussiness_ID']);
            unset($_SESSION['zip_code']);
      return false;
   }
 }


function isUserLoggedIn(){
  if(!isset($_SESSION))
    {
        session_start();
    }
    
  if(isset($_SESSION['loggedIn'])){
    return true;
  }else {
    return false;
  }
}

function logoutUser(){
  session_start();
  unset($_SESSION['userlogin']);
  unset($_SESSION['loggedIn']);
  unset($_SESSION['userpwd']);
  unset($_SESSION['bussiness_ID']);
  unset($_SESSION['zip_code']);

}

?>
