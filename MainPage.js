
window.onload = function(){
    alert("Main Page Js File Loaded");
}
$(document).ready(function(){
    $("#test").click(function(e){
        alert("hello");
    })
})

function ClassLeaderBoard(){
    console.log("Class Leader Board Button Registed Click");
    $.ajax({
        url:'InterfaceLayer/LeaderBoardClass.php',
        type:"POST",
        dataType: 'html',
        beforeSend:function(){
            $("f").text("test");
        },
         success: function(result,status,xhr){
            alert(result);
            $("theTable").text(result); 
            console.log(result);
            },
            error: function(xhr,status,error){
                alert("well this just didnt work did it");
            }
            
        }


    )
    console.log("The ends");}
    
function PublicLeaderBoard(){
    $('#Output').load('C:\Users\hpd12\Desktop\MonoclGitHubRepo\MonoclBackend\AJAXtest.php',function(response,success){
        if(status==success){
            alert("Did this work");
        }
        else{
            alert("this did not work");
        }
        
        console.log("no");
    });
    $("f").text("Button word");
    console.log("click");
}
function testbed(){
    console.log("called");
    $.ajax(
        {
            url: 'InterfaceLayer/response.php',
            type: 'get',
            dataType:'html',
            error:function(response){
            console.log(url);
            },
            success:function(response){
                window.alert(response);
                console.log("Woring");
            }
        })
}
