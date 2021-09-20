<?php
  use PHPMailer\PHPMailer\PHPMailer;
  use PHPMailer\PHPMailer\SMTP;

  require ('PHPMailer/PHPMailer.php');
  require ('PHPMailer/SMTP.php');

  ini_set('display_errors', 0);  
  error_reporting(E_ALL ^ E_NOTICE);

  function replace_tr($text) {
    $text = trim($text);
    $search = array('Ç','ç','Ğ','ğ','ı','İ','Ö','ö','Ş','ş','Ü','ü');
    $replace = array('C','c','G','g','i','I','O','o','S','s','U','u');
    $new_text = str_replace($search,$replace,$text);
    return $new_text;
    }

  $name = replace_tr(trim($_POST['name']));
  $birthplace = replace_tr(trim($_POST['birthplace']));
  $birthday = replace_tr(trim($_POST['birthday']));
  $tc_id = replace_tr(trim($_POST['tc_id']));
  $address = replace_tr(trim($_POST['address']));
  $graduate = replace_tr(trim($_POST['graduate']));
  $academic = replace_tr(trim($_POST['academic']));
  $sport = replace_tr(trim($_POST['sport']));
  $otherwork = replace_tr(trim($_POST['otherwork']));
  $level = replace_tr(trim($_POST['level']));
  $motivation = replace_tr(trim($_POST['motivation']));
  $hafiz_in_family = replace_tr(trim($_POST['hafiz_in_family']));
  $surahs = replace_tr(trim($_POST['surahs']));
  $father_name = replace_tr(trim($_POST['father_name']));
  $father_phone = replace_tr(trim($_POST['father_phone']));
  $father_job = replace_tr(trim($_POST['father_job']));
  $father_institution = replace_tr(trim($_POST['father_institution']));
  $mother_name = replace_tr(trim($_POST['mother_name']));
  $mother_phone = replace_tr(trim($_POST['mother_phone']));
  $mother_job = replace_tr(trim($_POST['mother_job']));
  $mother_institution = replace_tr(trim($_POST['mother_institution']));
  $hafiz_comment = replace_tr(trim($_POST['hafiz_comment']));
  $parent_node = replace_tr(trim($_POST['parent_note']));
  $howabout = replace_tr(trim($_POST['howabout']));
  $kvkk_1 = $_POST['kvkk_1'];
  $kvkk_2 = $_POST['kvkk_2'];

  if($name == null || $birthplace == null || $birthday == null || $tc_id == null || $address == null || $graduate == null || $academic == null
  || $sport == null || $otherwork == null || $level == null || $motivation == null || $hafiz_in_family == null ||
  $surahs == null || $father_name == null || $father_phone == null || $father_job == null || $father_institution == null ||
  $mother_name == null || $mother_phone == null || $mother_job == null || $mother_institution == null || $hafiz_comment == null
  || $parent_node == null || $howabout == null || $kvkk_1 != "on" || $kvkk_2 != "on"){
    $signal = 'bad';
  }
  else{
    $signal = 'good';
    $mail = new PHPMailer(true);

try {
    //Server settings
    $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'conxeticin3@gmail.com';                     //SMTP username
    $mail->Password   = 'Kadinlar123';                               //SMTP password
    $mail->SMTPSecure = 'tls';            //Enable implicit TLS encryption
    $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('conxeticin3@gmail.com', 'Mailer');
    $mail->addAddress('conxeticin2@gmail.com');
    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Here is the subject';
    $mail->Body  =
    'ISIM SOYISIM: ' .$name .'<br>'.
    'DOGUM TARIHI: ' .$birthplace .'<br>'.
    'DOGUM YERI: ' .$birthday .'<br>'.
    'TC KIMLIK NO: ' .$tc_id .'<br>'.
    'ADRES: ' .$adres .'<br>'.
    'MEZUN OLACAGI OKUL: ' .$graduate .'<br>'.
    'AKADEMIK BASARI: ' .$academic
    ;
    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {

}
  }
  echo json_encode($signal);

?>
