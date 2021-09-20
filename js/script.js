$(document).ready(function(){
    $('#send_message').click(function(){
        event.preventDefault();
        $.ajax({
            url: "../PHPMailer/sendmail.php",
            type: "POST",
            data: $('#contact_form').serialize(),
            beforeSend: function(xhr){
                document.getElementById("send_message").value = "KAYIT OLUNUYOR...";
                $('#condition-alert').html('');
                },
            success: function(response){
                if(response != "\"bad\""){
                    $('#condition-alert').html('<div class="alert alert-success d-inline-block">Kaydınız alınmıştır.</div>'); 
                    $('input , textarea').val(function(){
                    return this.defaultValue;
                });
                }
                else{
                    $('#condition-alert').html('<div class="alert alert-danger d-inline-block">Lütfen tüm alanları eksiksiz doldurunuz.</div>');
                }
                console.log(response);
                },
            error: function(){
                $('#condition-alert').html('<div class="alert alert-danger d-inline-block">Bir hata oluştu.</div>');
                },
            complete: function(){
                document.getElementById("send_message").value = "KAYIT OL";
                }
            });
        });
    })
