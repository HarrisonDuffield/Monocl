/* eslint-disable no-unused-vars */
/* eslint-disable no-console */
/*eslint-env jquery*/
/*eslint no-unused-vars: "error"*/
window.onload=TopicTableFunc();
window.onload= CirclePercentageFill();
window.onload = PublicLeaderBoard();


function QuestionTable(TopicToUse){
        alert("This worked"+TopicToUse);
        $.ajax({
            url:'InterfaceLayer/TopicTableLoader.php',
            type:"POST",
            dataType: 'html',
            data : {functiontocall : 3, TopicClicked : TopicToUse},
            beforeSend:function(){
                },
             success: function(result){
                $("#TopicTable").html(result);
                //$("#TopicTable").html(result);  
                
                  
                },
                error: function(){
                    alert("Didn not retireve Questions table with success");
                }
                
            
        });
}
function TopicTableFunc(){
    $.ajax({
        url:'InterfaceLayer/TopicTableLoader.php',
        type:"POST",
        dataType: 'html',
        data : {functiontocall : 1, TopicClicked : "notneeded"},
        beforeSend:function(){
            },
         success: function(result){
            $("#TopicTable").html(result);
            //$("#TopicTable").html(result);  
            console.log(result);
              
            },
            error: function(){
                alert("Didn not retireve Topic table with success");
            }
            
        }
        


    );
}


function CirclePercentageFill(){
    $.ajax({
        url:'InterfaceLayer/TopicTableLoader.php',
        type:"POST",
        data : {functiontocall : 2, TopicClicked : "notneeded"},
        beforeSend:function(){
            },
         success: function(result){
            
            $("#circlePercentage").html(result);  
            
            },
            error: function(){
                alert("Didn not retireve Topic table with success");
            }
            
        }


    )

}
function ClassLeaderBoard(){
    console.log("Class Leader Board Button Registed Click");
    $.ajax({
        url:'InterfaceLayer/LeaderBoardClass.php',
        type:"POST",
        dataType: 'html',
        beforeSend:function(){
            },
         success: function(result){
            
            $("TableSelected").text("Class LeaderBoard Displaying");
            $("#LeaderBoard").html(result);  
            
            },
            error: function(){
                alert("Didn not retireve class table with success");
            }
            
        }


    )
    console.log("End Of Class LeaderBoard Function");}
    
    function PublicLeaderBoard(){
        console.log("Public Leader Board Button Registed Click");
        $.ajax({
            url:'InterfaceLayer/LeaderBoardPublic.php',
            type:"POST",
            dataType: 'html',
            beforeSend:function(){
                },
             success: function(result){
                $("TableSelected").text("Public LeaderBoard Displaying");
              $("#LeaderBoard").html(result); 
                },
                error: function(){
                    alert("Didn not retireve class table with success");
                }
                
            }``
    
    
        )
        console.log("End Of Public LeaderBoard Function");}
        function TableReversal(){
            alert("TableButtonClick");
            var maxCounter =2;//spread out like an eagle
            var minCounter =1;
            maxCounter = $("#LeaderBoard tr").length;
            maxCounter=maxCounter-1;
            console.log(maxCounter);
            while(maxCounter > minCounter){
                console.log("ITeration");
                var TopNameBefore =  document.getElementById("LeaderBoard").rows[maxCounter].cells[0].innerHTML;
                console.log(TopNameBefore);
                var TopPointsBefore =  document.getElementById("LeaderBoard").rows[maxCounter].cells[1].innerHTML;
                var BottomNameBefore = document.getElementById("LeaderBoard").rows[minCounter].cells[0].innerHTML;
                var BottomPointsBefore = document.getElementById("LeaderBoard").rows[minCounter].cells[1].innerHTML;
                document.getElementById("LeaderBoard").rows[maxCounter].cells[0].innerHTML = BottomNameBefore;
                document.getElementById("LeaderBoard").rows[maxCounter].cells[1].innerHTML = BottomPointsBefore;
                document.getElementById("LeaderBoard").rows[minCounter].cells[0].innerHTML = TopNameBefore;
                document.getElementById("LeaderBoard").rows[minCounter].cells[1].innerHTML = TopPointsBefore;          
               
               
               
                
                maxCounter--;
                minCounter++;
            }
            console.log("Reversal Done");
        }
        
        function LanguageSet(LanguageToSet){
            TopicTableFunc();//refresh the topics;
            console.log("LanguageSetting Called with"+LanguageToSet);
            $.ajax({
                url:'InterfaceLayer/LanguageSetter.php',
                type:"POST",
                data : {LanguageTwoChar : LanguageToSet},
                beforeSend:function(){
                    },
                 success: function(result){
                    console.log("Work With Success" +result);
                    },
                    error: function(){
                        alert("Lanaguage did not set with success");
                    }
                    
                }
        
        
            )
        }
        function FrenchFlagSet(){
            LanguageSet("FR");
        }
        function SpanishFlagSet(){
            LanguageSet("ES");
        }
        function GermanFlagSet(){
            LanguageSet("DE");
        }
        
        