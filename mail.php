<?php 

require_once('phpmailer/PHPMailerAutoload.php');
$mail = new PHPMailer;
$mail->CharSet = 'utf-8';

$name = $_POST['user_name'];
$phone = $_POST['user_phone'];
$topic = $_POST['topic'];

$mail->isSMTP();                                     
$mail->Host = 'smtp.mail.ru';  																			
$mail->SMTPAuth = true;                               
$mail->Username = 'kuzhlevartem@mail.ru'; 
$mail->Password = 'gyaKRDUmFMCpcQAJPJkq'; 
$mail->SMTPSecure = 'ssl';                            
$mail->Port = 465; 

$mail->setFrom('kuzhlevartem@mail.ru'); 
$mail->addAddress('santehnikizspb@mail.ru');    

$mail->isHTML(true);                                 

$mail->Subject = 'Оформлена заявка';
$mail->Body    = '' .$name . ', телефон ' .$phone. ', проблема: ' .$topic;
$mail->AltBody = '';

if(!$mail->send()) {
    echo 'Error';
} else {
    $redicet = $_SERVER['HTTP_REFERER'];
    @header ("Location: $redicet");
}
?>