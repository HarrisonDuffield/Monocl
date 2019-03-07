window.onload = function(){
    alert("Main Page Js File Loaded");
}
function ClassLeaderBoard(){
    console.log("Class Leader Board Button Registed Click");
    $.ajax({
        url:'C:\Users\hpd12\Desktop\MonoclGitHubRepo\MonoclBackend\AJAXtest.php',
        type:"POST",
        beforeSend:function(){
            $("f").text("test");
        },
         success:function(data){
            alert(data);
            $("f").text(data); 
            }
            
        }


    )
    console.log("The ends");};
function PublicLeaderBoard(){
    alert("Button word");
    console.log("click");
}