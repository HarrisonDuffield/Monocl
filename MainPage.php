<html>
    <head>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="MainPage.js"> </script>
        <script>$(document).ready(function(){
    $("#test").click(function(e){
        alert("hello22");
    })
})</script>
    </head>
    <title>Main Page | Monocl</title>    
<a href="../MonoclBackend/QuestionTablePopulator.php"></a>
<link href="Assets/FontAssets.css" rel="stylesheet" type="text/css">
<link href="Assets/CommonAssets.css" rel="stylesheet" type="text/css">
<link href="Assets/MainPageAssets.css" rel="stylesheet" type="text/css">
<div id="MonocleHeaderBar">
    <img src="Assets/Monocl.png" align="left">
</div>
<div id="beige-box-main">
    <?php
    require("../MonoclBackend/QuestionTablePopulator.php");
    TopicTableOrganisation();    
    ?>   
</div>
<div id ="course-completion-tracking-circle">
    <a> Percentage Of Language Complete : </a>
    <?php
        BigCiclePercentageCalc();
    ?>
</div>

<div id="beige-box-main">
    <button type="button" onclick ="ClassLeaderBoard()" id ="InClass">In Class </button>
    <button type ="button" onclick ="PublicLeaderBoard()" id="AllUsers">All Users</button>
    <button type="button" id ="InClass">Change Sort </button>
    <table id="LeaderBoard"></table>
    <table id="f"> HAVE </table>
    </div>
</div>
<div id ="FrenchFlag">
    //on click set session id tag to french
</div>

</html>