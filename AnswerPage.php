<!DOCTYPE html>
<html>
<head>
        <link href="Assets/CommonAssets.css" rel="stylesheet" type="text/css">
        <link href="Assets/AnswerPageAssets.css" rel="stylesheet" type="text/css">
        <link href="Assets/FontAssets.css" rel="stylesheet" type="text/css">
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
    <f id="QuestionReturn">The question</f>

</div>
<P id ="output">d</p>
<script >
    var phpget = String("<?php echo $_GET["Topic"]?>");
    var QuestionCounter =0;   
    var questionArray = Array();
    //window.onload = PopulateDataSet();
    window.onload=ArrayPopulator(phpget,0);
    
    
    function ArrayPopulator(TopicSelected,NumberToGet){
        console.log(NumberToGet);
        $.ajax({
            url:"InterfaceLayer\\QuestionReturn.php",
                        type:"POST",
            data : {Topic:TopicSelected,QuestionToReturn:NumberToGet},
            dataType:"json",
            success:function(result){
                questionArray = result;
                console.log("Array Populated");
                console.log(questionArray);
                QuestionLoader(0);
               },
            error: function(result){
                console.log(result);
                console.log("Error");
            }
        })
    }
    function QuestionLoader(NumberToLoad){
        console.log("call");
        console.log(NumberToLoad);
        $("#QuestionID").html(NumberToLoad);
        $("#QuestionReturn").html(questionArray[NumberToLoad]);
        QuestionCounter++;
    }
       
    
    function CheckIfEndGoToNextQuestion(){
        if(QuestionCounter == questionArray.sizeof){
            console.log("reached end");
        }
        else{
            QuestionLoader(QuestionCounter);
        }
    }
    function sendtophp(){
        var AnswerGiven = document.getElementById("AnswerGiven").value;
        console.log(AnswerGiven);
        $.ajax({
        url:'InterfaceLayer\\AnswerInterface.php',
        type:"POST",
        data : {QuestionID:(QuestionCounter-1),AnswerGiven:AnswerGiven},
        success:function(result){
            console.log("ran with success");
            if(result=="true"){
                $("#CorrectBar").addClass("AnswerCorrect");
                CheckIfEndGoToNextQuestion();
                //css for green bar
            }
            else{
                console.log(result);
                console.log("did not run with success");
                $("#CorrectBar").addClass("AnswerIncorrect");
                CheckIfEndGoToNextQuestion();

                //css for red bar
            }
            
            
        },
        error : function(result){
            console.log(result);
        }

        })
}

</script>

<div id="AnswerBox">
        <b>Enter Your Answer Here</b>
        <br>
        <input type = "text" id="AnswerGiven">
        <p id = "QuestionID">Question ID :</p>
        <button onclick =sendtophp()>Send Answer</button>
    

</div>