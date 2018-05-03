<?php


echo "create account";
?>
<form id='register' action='' method='post'
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

<form id='adddog' action='' method='post'
    accept-charset='UTF-8'>

<fieldset >
<legend>Add_Dog</legend>
<input type='hidden' name='submitted' id='submitted' value='1'/>
<label for='dog_name' >Dog Name: </label>
<input type='text' name='dog_name' id='dog_name' maxlength="50" required /><br>

<label for='friendly/notfriednly' >Is your Dog Friend?:</label>
<input type='text' name='friendly/notfriednly' id='friendly/notfriednly' maxlength="50" required /><br>

<label for='breed' >Breed:</label>
<input type='breed' name='breed' id='breed' maxlength="50"  /><br>

<label for='hair_color' >Hair Color:</label>
<input type='hair_color' name='hair_color' id='hair_color' maxlength="50"  /><br>

<label for='notes' >Notes:</label>
<input type='text' name='notes' id='notes' maxlength="50"  /><br>


</fieldset>
</form>

<input type='submit' name='Submit' value='Submit' />

</fieldset>
</form>
