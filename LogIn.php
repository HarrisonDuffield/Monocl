<?php include("..\MonoclBackend\LoginDB.php") ?>
<!DOCTYPE HTML>
<html>

<link href="Assets/HomePageAssets.css" rel="stylesheet" type="text/css">
<link href="Assets/FontAssets.css" rel="stylesheet" type="text/css">
<link href="Assets/CommonAssets.css" rel="stylesheet" type="text/css">
<div id="MonocleHeaderBar">
    <img src="Assets/Monocl.png" align="left" size="tiny">
</div>
<a> Log In!</a>
<div id="formContatiner" align ="center">
<form method="POST" action="LogIn.php">
    <?php include("..\MonoclBackend\Errors.php");?>
    <fieldset id="LogInBox">
        <b> Enter Username</b>
        <input type="text" align="middle" name="UserName" id="UserName" value="<?php echo $UserName; ?>">
        <br>
        <b> Enter Password</b>
        <input type="text" align="texttop" name="Password" id="Password"  value="<?php echo $Password; ?>">
        <br>
        <input type="submit" value="Log In !" id="NextButton" name="LoginButtonGreen" >
        <br>
        <a href="\Registration.php"> Don't Have an account? Sign Up!</link>
    </fieldset>
</form>
</div>
</html>