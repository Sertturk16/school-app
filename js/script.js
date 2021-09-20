$(document).ready(function(){
    $('#send_message').click(function(){
        event.preventDefault();
        $.ajax({
            url: "../PHPMailer/sendmail2.php",
            type: "POST",
            data: $('#contact_form').serialize(),
            beforeSend: function(xhr){
                console.log("beforeSend");
                },
            success: function(response){
                console.log(response);
                },
            error: function(){
                console.log("error function");
                },
            complete: function(){
                console.log("complete function");
                }
            });
        });
    })
