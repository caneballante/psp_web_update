// JavaScript Document

$('#clickme').click(function(){
   
$.getJSON("http://www.psp.wa.gov/test-space/json_test/vs_test.json", function(json) {
    console.log(json); // this will show the info it in firebug console
    });
});


