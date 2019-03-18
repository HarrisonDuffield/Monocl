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

<P id ="output"></p>
<div id="AnswerBox">
        <b>Enter Your Answer Here</b>
        <br>
        <input type = "text" id="AnswerGiven">
        <p id = "QuestionID">Question ID :</p>
        <button onclick =sendtophp()>Send Answer</button>
        <button onclick =CheckIfEndGoToNextQuestion()>Skip Question</button>
    

</div>
<script >
    var phpget = String("<?php echo $_GET["Topic"]?>");
    var QuestionCounter =1;   
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
                //console.log("Array Populated");
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
        //console.log("call");
        //console.log(NumberToLoad);
        var itemtoprint =questionArray[NumberToLoad].split("¦");
        $("#QuestionID").html(itemtoprint[0]);
        $("#QuestionReturn").html(itemtoprint[1]);
        QuestionCounter++;
    }
       
    
    function CheckIfEndGoToNextQuestion(){
        if(QuestionCounter >= questionArray.length){
            //console.log(QuestionCounter);
            //console.log(questionArray.length);
            console.log("reached end");
            alert("End of Questions \n Redirecting to Main Page");
            window.location.replace("MainPage.html");
        }
        else{
            //console.log("triggered");
            //console.log(QuestionCounter);
            //console.log(questionArray.length);
             QuestionLoader(QuestionCounter);
        }
    }
    function BarFormatting(){
        VarIsCorrect = document.getElementById("CorrectBar").style.backgroundColor;

        if(VarIsCorrect == "green"){
            $("#CorrectBar").html("<a> Answer Correct<a> <button onclick =CheckIfEndGoToNextQuestion()>Next Question</button>");
        }
        else{
            $("#CorrectBar").html("<a> Answer InCorrect<a> <button onclick =CheckIfEndGoToNextQuestion()>Next Question</button>");
        }
        
    }
    function sendtophp(){
        var AnswerGiven = document.getElementById("AnswerGiven").value;
        var QuestionID = document.getElementById("QuestionID").innerHTML;
        console.log(AnswerGiven);
        console.log(QuestionID);
        $.ajax({
        url:'InterfaceLayer\\AnswerInterface.php',
        type:"POST",
        data : {QuestionID:QuestionID,AnswerGiven:AnswerGiven},
        success:function(result){
            
            if(result=="true"){
                alert("Answer Correct");
                document.getElementById("CorrectBar").style.backgroundColor="green";
                BarFormatting();
                
                //css for green bar
            }
            else{
                console.log(result);
                alert("Answer Incorrect");
                
                document.getElementById("CorrectBar").style.backgroundColor="red";
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
</html>

