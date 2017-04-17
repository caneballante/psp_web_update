// JavaScript Document


 /*   function wheelInit (){
        for (var i = 0; i < 26; i++){
            $('#vsClick'+i).click(function() {
                $('#vs'+i).css("display", "visible");
                 console.log("vs"+i+" clicked");
            }); 
        };
    }*/
var lastWho;

function wheelManager (who){
    console.log("lastWho = "+lastWho); 
    if (lastWho>0){
       $('#vs'+lastWho).css("display", "none"); 
        console.log("lastWho = "+who); 
    }
    console.log("wheelMan Ran = "+who); 
    $('#vs'+who).css("display", "block");
    lastWho = who;
    console.log("lastWho = "+lastWho); 
    //$('#vs'+who).css("top", "100px");
}
    


