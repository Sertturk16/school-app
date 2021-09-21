<?php
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require ('PHPMailer/PHPMailer.php');
require ('PHPMailer/SMTP.php');
require ('PHPMailer/Exception.php');


//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'hafizintaciinfo@gmail.com';                     //SMTP username
    $mail->Password   = 'hafizintaci34';                               //SMTP password
    $mail->SMTPSecure = 'tls';            //Enable implicit TLS encryption
    $mail->Port       = 587;                                     //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('hafizintaciinfo@gmail.com', 'Hafizin Taci');
    $mail->addAddress('conxeticin2@gmail.com');

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'YENI KAYIT';
    $mail->Body    =
    '<b>Ogrenci Bilgileri</b><br>'.
    'Isim Soyisim: ' .$_POST['name'].'<br>'.
    'Dogum Tarihi: ' .$_POST['birthday'].'<br>'.
    'Dogum Yeri: ' .$_POST['birthplace'].'<br>'.
    'TC Kimlik No:' .$_POST['tc_id'].'<br>'.
    'Adres: ' .$_POST['adress'].'<br>'.
    'Mezun Olacagi Okul: ' .$_POST['graduate'].'<br>'.
    'Akademik Basari: ' .$_POST['academic'].'<br>'.
    'Sportif Basari: ' .$_POST['sport'].'<br>'.
    'Diger Basarilar: ' .$_POST['otherwork'].'<br>'.
    'Kuran Bilgisi Duzeyi: ' .$_POST['level'].'<br>'.
    'Ailede hafizlik konusunda en yuksek motivasyona sahip kisi: ' .$_POST['motivation'].'<br>'.
    'Ailede hafiz var mi: ' .$_POST['hafiz_in_family'].'<br>'.
    'Ogrencinin Bildigi sureler: ' .$_POST['surahs'].'<br>'.
    '<b>Baba Bilgileri</b><br>'.
    'Adi Soyadi: ' .$_POST['father_name'].'<br>'.
    'Telefon Numarasi: ' .$_POST['father_phone'].'<br>'.
    'Meslek: ' .$_POST['father_job'].'<br>'.
    'Gorev Yaptigi Kurum: ' .$_POST['father_institution'].'<br>'.
    '<b>Anne Bilgileri</b><br>'.
    'Adi Soyadi: ' .$_POST['mother_name'].'<br>'.
    'Telefon Numarasi: ' .$_POST['mother_phone'].'<br>'.
    'Meslek: ' .$_POST['mother_job'].'<br>'.
    'Gorev Yaptigi Kurum: ' .$_POST['mother_institution'].'<br>'.
    'Ogrencinin hafiz olmasi ile ilgili dusunce: ' .$_POST['hafiz_comment'].'<br>'.
    'Aile Notu: ' .$_POST['parent_note'].'<br>'.
    'Ulasilma Sekli: ' .$_POST['howabout'].'<br>'
    ;

    $mail->send();
} catch (Exception $e) {

}

?>
