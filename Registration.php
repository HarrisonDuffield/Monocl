<?php include('C:\Users\hpd12\Desktop\MonoclGitHubRepo\MonoclBackend\PHPDBTEST.php');?>
<!DOCTYPE html>
<html>
<link href="Assets/HomePageAssets.css" rel="stylesheet" type="text/css">
<link href="Assets/FontAssets.css" rel="stylesheet" type="text/css">
<link href="Assets/CommonAssets.css" rel="stylesheet" type="text/css">
<div id="MonocleHeaderBar">
</div>
<form method="post" action="../MonoclBackend/PHPDBTEST.php"> 
    <fieldset id="LogInBox">
        <legend>Sign Up</legend>
        <b>Enter Username:</b>
        <input align="middle" type="text" name="UserName" id="UserName">
        <br>
        <b>Enter First Name:<b>
        <input align="texttop" type="text" name="FirstName" id="FirstName">
        <br>
        <b>Enter Last Name:<b>
        <input align="texttop" type="text" name="LastName" id="LastName">
        <br>
        <b>Enter Email Address:<b>
        <input align="texttop" type="text" name="Email" id="Email">
        <br>
        <b>Enter Class Code(If Available):<b>
        <input align="texttop" type="text" name="ClassCode" id="ClassCode">
        <br>
        <b>Create a Password:<b>
        <input align="texttop" type="text" name="PwdInput" id="PwdInput">
        <br>
        <b>Password Confirmation:<b>
        <input align="texttop" type="text" name="PwdConfirmation" id="PwdConfirmation">
        <input type="submit" value="Sign Up" id="NextButton">
        </fieldset>
</form>

</html>