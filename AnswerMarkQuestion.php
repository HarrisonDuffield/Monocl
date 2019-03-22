<!DOCTYPE html>
<html>
<head>
        <link href="Assets/CommonAssets.css" rel="stylesheet" type="text/css">
        <link href="Assets/AnswerPageAssets.css" rel="stylesheet" type="text/css">
        <link href="Assets/FontAssets.css" rel="stylesheet" type="text/css">
        <title>Review System | Monocl</title>
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
        <b>Is This answer Correct</b>
        <br>
        <p id ="AnswerReturn">Answer </p>
        <p id = "QuestionID">Question ID :</p>
        <p id = "AnswerID">AnswerID :</p>
        <button onclick =sendtophp()>Send Answer</button>
        <button onclick =CheckIfEndGoToNextQuestion()>Next Question</button>
        <button onclick = AnswerCorrect()>Answer Correct</Button>
        <button onclick = AnswerInCorrect()>Answer InCorrect</Button>
        <button onclick = GoHome()>Go Back To Teacher Page</Button>

</div>
<script>
    function GoHome(){
        window.location.replace("TeacherPage.html");
    }
    var QuestionCounter =0;
    var AnswerCounter =0;      
    var questionArray = Array();
    var AnswerArray = Array();
    //window.onload = PopulateDataSet();
    window.onload=ArrayPopulator(0);
    function AnswerIncorrect(){
        CheckIfEndGoToNextAnswer();
    }
    function AnswerCorrect(){
        var QuestionID = document.getElementById("QuestionID").innerHTML;
        var AnswerID = document.getElementById("AnswerID").innerHTML;
        console.log(AnswerID);
        $.ajax({
            url:"InterfaceLayer\\MarkAnswersCorrect.php",
            type:"POST",
            data : {FunctionCalled :1 , AnswerID:2,QuestionID:QuestionID},
            success:function(result){
                console.log(result);
                CheckIfEndGoToNextAnswer();
               },
            error: function(result){
                console.log(result);
                console.log("Error");
            }
        })
        

    }
    function AnswerArrayPopulator(){
        var QuestionID = document.getElementById("QuestionID").innerHTML;
        
        $.ajax({
            url:"InterfaceLayer\\MarkAnswersCorrect.php",
            type:"POST",
            data : {FunctionCalled :2,AnswerID:0, QuestionID:QuestionID},
            dataType:"json",
            success:function(result){
                console.log(result);
                AnswerArray = result;
                //console.log("Array Populated");
                console.log(AnswerArray);
                AnswerLoader(0);
               },
            error: function(result){
                console.log(result);
                console.log("Error");
            }
        })
    }
    
    function ArrayPopulator(NumberToGet){
        console.log(NumberToGet);
        $.ajax({
            url:"InterfaceLayer\\ReviewSystem.php",
                        type:"POST",
            data : {QuestionToReturn:NumberToGet},
            dataType:"json",
            success:function(result){
                questionArray = result;
                //console.log("Array Populated");
                console.log(questionArray);
                QuestionLoader(QuestionCounter);
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
        AnswerArrayPopulator();
    }
    function AnswerLoader(NumberToLoadAns){
        //console.log("call");
        //console.log(NumberToLoad);

        var itemtoprints =AnswerArray[NumberToLoadAns].split("¦");
        $("#AnswerID").html(itemtoprints[0]);
        $("#AnswerReturn").html(itemtoprints[1]);
        AnswerCounter++;
    }
       
    
    function CheckIfEndGoToNextQuestion(){
        if(AnswerCounter >= questionArray.length){
            //console.log(QuestionCounter);
            //console.log(questionArray.length);
            console.log("reached end");
            alert("End of Questions \n Redirecting to Main Page");
            window.location.replace("TeacherPage.html");
        }
        else{
            //console.log("triggered");
            //console.log(QuestionCounter);
            //console.log(questionArray.length);
             QuestionLoader(QuestionCounter);
        }
    }
    function CheckIfEndGoToNextAnswer(){
        if(QuestionCounter >= AnswerArray.length){
            //console.log(QuestionCounter);
            //console.log(questionArray.length);
            console.log("reached end");
            alert("End of Answers \n Next Question Loading");
            CheckIfEndGoToNextQuestion();
        }
        else{
            //console.log("triggered");
            //console.log(QuestionCounter);
            //console.log(questionArray.length);
             AnswerLoader(AnswerCounter);
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

