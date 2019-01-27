<?php include("..\MonoclBackend\PHPDBTEST.php") ?>
<!DOCTYPE html>
<html>
<link href="Assets/HomePageAssets.css" rel="stylesheet" type="text/css">
<link href="Assets/FontAssets.css" rel="stylesheet" type="text/css">
<link href="Assets/CommonAssets.css" rel="stylesheet" type="text/css">
<div id="MonocleHeaderBar">
    <img src="Assets/Monocl.png" align="left">
</div>
<form method="post" action="Registration.php"> 
    <fieldset id="LogInBox">
        <legend>Sign Up</legend>
        <b>Enter Username:</b>
        <input align="middle" type="text" name="UserName" value="<?php echo $UserName; ?>">
        <br>
        <b>Enter First Name:<b>
        <input align="texttop" type="text" name="FirstName" id="FirstName" value="<?php echo $FirstName; ?>">
        <br>
        <b>Enter Last Name:<b>
        <input align="texttop" type="text" name="LastName" id="LastName" value="<?php echo $LastName; ?>">
        <br>
        <b>Enter Email Address:<b>
        <input align="texttop" type="text" name="Email" id="EmailAddress"value="<?php echo $EmailAddress; ?>">
        <br>
        <b>Enter Class Code(If Available):<b>
        <input align="texttop" type="text" name="ClassCode" id="ClassCode"value="<?php echo $ClassCode; ?>">
        <br>
        <b>Create a Password:<b>
        <input align="texttop" type="text" name="PwdInput" id="PwdInput" value="<?php echo $PasswordOriginal; ?>">
        <br>
        <b>Password Confirmation:<b>
        <input align="texttop" type="text" name="PwdConfirmation" id="PwdConfirmation" value="<?php echo $PasswordConfirmation; ?>">
        <input type="submit" value="Sign Up" id="NextButton" name="SignUpButtonGreen">
        </fieldset>
</form>

</html>