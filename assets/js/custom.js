$(document).ready(function(){


    $('.title').bind('keyup keypress blur', function() {  

        var myStr = $(this).val()
        myStr=myStr.toLowerCase();
        myStr=myStr.replace(/(^\s+|[^a-zA-Z0-9 ]+|\s+$)/g,"");   //this one
        myStr=myStr.replace(/\s+/g, "-");
        $('.slug').val(myStr); 
    });
});


