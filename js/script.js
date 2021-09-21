$(document).ready(function(){
    $('#contact_form').submit(function(event){
        event.preventDefault();
        $.ajax({
            url: "./mail.php",
            type: "POST",
            data: $('#contact_form').serialize(),
            beforeSend: function(xhr){
                console.log("before function");
                },
            success: function(response){
                console.log("success function");
                console.log(response);
                },
            error: function(){
                console.log("error function")
                },
            complete: function(){
                console.log("complete function")
                }
            });
        });
    })