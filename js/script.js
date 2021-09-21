$(document).ready(function(){
    $('#send_message').click(function(){
        event.preventDefault();
        $.ajax({
            url: "mail.php",
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