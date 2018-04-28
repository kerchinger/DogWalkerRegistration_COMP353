<?php
echo "create account";
?>
<form id='register' action='register.php' method='post' 
    accept-charset='UTF-8'>
<fieldset >
<legend>Create Account</legend>
<input type='hidden' name='submitted' id='submitted' value='1'/>
<label for='name' >Full Name*: </label>    
<input type='text' name='name' id='name' maxlength="50" /><br>
<label for='email' >Email Address*:</label>
<input type='text' name='email' id='email' maxlength="50" /><br>

<label for='username' >Username*:</label>
<input type='text' name='username' id='username' maxlength="50" /><br>

<label for='password' >Password*:</label>
<input type='password' name='password' id='password' maxlength="50" /><br>
<input type='submit' name='Submit' value='Submit' />

</fieldset>
</form>

