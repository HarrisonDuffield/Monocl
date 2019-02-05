<html>
<title> Account Verification | Monocl </title>
<a>Account Verification</a>    
<a><?php  
require("C:\Users\hpd12\Desktop\MonoclGitHubRepo\MonoclBackend\EmailVerification.php");
$MessageToPrint = "";
if(!empty($_GET['VerifyString'])){
if(TableUpdate($_GET['VerifyString'])){
    $MessageToPrint = "Account Activation success";
}
else{
    $MessageToPrint = "Please Try Again";
}

}
else{
    $MessageToPrint = "Error : No account information given to verify - please check your emails for the log in information";
}
echo $MessageToPrint;
?> </a>


</html>