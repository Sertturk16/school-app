$(document).ready(function(){
    $('#contact_form').submit(function(event){
        event.preventDefault();
        $.ajax({
            url: "./mail.php",
            type: "POST",
            data: $('#contact_form').serialize(),
            beforeSend: function(xhr){
                document.getElementById("send_message").value = "KAYIT OLUNUYOR...";
                },
            success: function(response){
                $('#condition-alert').html('<div id="alert-timeout" class="alert alert-success d-inline-block">Kaydınız alınmıştır.</div>');
                $('input , textarea').val(function(){
                    return this.defaultValue;
                });
                setTimeout(function(){
                    document.getElementById('alert-timeout').style.visibility = "hidden";
                },2000);
                },
            error: function(){
                $('#condition-alert').html('<div class="alert alert-danger d-inline-block">Bir hata olustu.</div>');
                },
            complete: function(){
                document.getElementById("send_message").value = "KAYIT OL";
                }
            });
        });
    })