
window.onload = function(){
    alert("Main Page Js File Loaded");
}
function ClassLeaderBoard(){
    console.log("Class Leader Board Button Registed Click");
    $.ajax({
        url:'InterfaceLayer/LeaderBoardClass.php',
        type:"POST",
        dataType: 'html',
        beforeSend:function(){
            //$("f").text("test");
        },
         success: function(result,status,xhr){
            alert(result);
            $("#f").html(result); 
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
