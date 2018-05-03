<?php
include $_SERVER['DOCUMENT_ROOT'].'/DogWalkerRegistration_COMP353/admin/header_admin.php' 
echo "create account";
?>
<form id='register' action='register.php' method='post' 
    accept-charset='UTF-8'>
<fieldset >
<legend>Create Account</legend>
<input type='hidden' name='submitted' id='submitted' value='1'/>
<label for='name' >Full Name*: </label>    
<input type='text' name='name' id='name' maxlength="50" required /><br>

<label for='email' >Email Address*:</label>
<input type='text' name='email' id='email' maxlength="50" required /><br>

<label for='password' >Full Address*:</label>
<input type='password' name='adress' id='adress' maxlength="50" required /><br>

<label for='password' >Phone Number*:</label>
<input type='password' name='phone' id='phone' maxlength="50" required /><br>

<label for='username' >Username*:</label>
<input type='text' name='username' id='username' maxlength="50" required /><br>

<label for='password' >Password*:</label>
<input type='password' name='password' id='password' maxlength="50" required /><br>


<input type='submit' name='Submit' value='Submit' />

<?php
try {
	$sql2 = 'INSERT into client SET
	client = RAND() * 1000000
	username = :username,
	password = :password,
	name = :name,
	address = :address
	e_mail = :e_mail
	phone_number = :phone';
}
catch (PDOException $e)
{
  $error = 'Error creating account: ' . $e->getMessage();
  include $_SERVER['DOCUMENT_ROOT'].'/DogWalkerRegistration_COMP353/errors/error.php';
  exit();
}    
?>

</fieldset>
</form>
