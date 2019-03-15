<!DOCTYPE html>

<html>
<head>
        <link href="Assets/CommonAssets.css" rel="stylesheet" type="text/css">
        <link href="Assets/AnswerPageAssets.css" rel="stylesheet" type="text/css">
        <title>Monocl | Answer Page</title>
        <div id="MonocleHeaderBar">
                <img src="Assets/Monocl.png" align="left">
        </div>
        <div id="CorrectBar"></div>
</head>
<!--
//box for answering needed
//box for questions to answer needed
//something to conenct htese up to the back
//something ot dela with the pointage
//Hook ups for the buttons
-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<div id="QuestionBox">
    <f id="QuestionReturn"></f>

</div>
<script >
    window.onload(RetrieveQuestionText(<?php $_GET["TopicSelected"]?>,0));
    function RetrieveQuestionText(TopicSelected,NumberToGet){
        $.ajax({
            url:"Monocl\InterfaceLayer\QuestionReturn.php",
            type:"POST,
            data : {QuestionToReturn:NumberToGet},
            success:function(result){
                $(#QuestionReturn).html(result);
                NumberToGet = NumberToGet++;
            }
        })
    }
    function sendtophp(QuestionID,AnswerGiven){
        $.ajax({
        url:'Monocl\InterfaceLayer\AnswerInterface.php',
        type:"POST",
        data : {QuestionID:QuestionID,AnswerGiven:AnswerGiven},
        success:function(result){
            if(result==true){
                $("#CorrectBar").addClass("AnswerCorrect");
                //css for green bar
            }
            else{
                $("#CorrectBar").addClass("AnswerIncorrect");

                //css for red bar
            }
            
            
        }
        })
}

</script>

<div id="AnswerBox">
    <form id="AnswerForm" action = "MonoclBackend\AnswerSystem.php" method="post">
        <b>Enter Your Answer Here</b>
        <br>
        <input type = "text" name="AnswerGiven" id="AnswerGiven">
        <button onclick =sendtophp(document.getElementById("QuestionID").value,document.getElementById("AnswerGiven").value>Send Answer</button>
    </form>

</div>