<html>
<title> Account Verification | Monocl </title>
<link href="Assets/FontAssets.css" rel="stylesheet" type="text/css">
<link href="Assets/CommonAssets.css" rel="stylesheet" type="text/css">
<link href="Assets/MainPageAssets.css" rel="stylesheet" type="text/css">
<div id="MonocleHeaderBar">
    <img src="Assets/Monocl.png" align="left">
</div>
<a>Account Verification</a>

<b><?php  

require("C:\Users\hpd12\Desktop\MonoclGitHubRepo\MonoclBackend\EmailVerification.php");
$MessageToPrint = "";
if(!empty($_GET['VerifyString'])){
if(TableUpdate($_GET['VerifyString'])){
    $MessageToPrint = "Account Activation success - now log in on the log in page";
    
}
else{
    $MessageToPrint = "Please Try Again - now redirecting to the log in page";
}

}
else{
    $MessageToPrint = "Error : No account information given to verify - please check your emails for the log in information";
}
echo $MessageToPrint;
?> </b>


</html>