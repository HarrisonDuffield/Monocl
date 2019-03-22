<?php include("..\MonoclBackend\QuestionBackend.php") ?>
<!DOCTYPE html>
<html>
<link href="Assets/HomePageAssets.css" rel="stylesheet" type="text/css">
<link href="Assets/FontAssets.css" rel="stylesheet" type="text/css">
<link href="Assets/CommonAssets.css" rel="stylesheet" type="text/css">
<div id="MonocleHeaderBar">
    <img src="Assets/Monocl.png" align="left">
</div>

<form method="post" action="QuestionCreator.php"> 
    <?php include("..\MonoclBackend\Errors.php");?>
    <fieldset id="LogInBox">
        <legend>Sign Up</legend>
        <b>Enter Question Text:</b>
        <input align="middle" type="text" name="QuestionText" value="<?php echo $QuestionText; ?>">
        <br>
       <b> Enter 2 character Language :</b>
        <p> DE = German , FR = French , ES = Spanish<p>
        <input align="texttop" type="text" name="Language" id="Language" value="<?php echo $Language; ?>">
        <br>
        <b>Enter Topic:<b>
        <input align="texttop" type="text" name="Topic" id="Topic" value="<?php echo $Topic; ?>">
        <br>
        <b>Enter Default Answer:<b>
        <input align="texttop" type="text" name="AnswerGiven" id="AnswerGiven" value="<?php echo $AnswerText; ?>">
        <br>
        <input type="submit" value="Sign Up" id="NextButton" name="SignUpButtonGreen">
        </fieldset>
</form>
<button onclick = GoHome()>Go Home</button>
<script>

function GoHome(){
        window.location.replace("Index.html");
    }
    </script>

</html>