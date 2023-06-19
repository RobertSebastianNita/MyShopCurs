<?php
include "functions.php";
require __DIR__.'/vendor/autoload.php';


use Classes\Product;
use Classes\Subscriber;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
ob_start();
?>
<div class="row">
    <?php
    //var_dump(Product::findAll());
    foreach (Product::findAll() as $product):
        ?>
    <div class="col-3">
 <?php
  include "parts/product_email.php"; ?>
    </div>
   <?php
        //die("ajunge inainte de INCHIS FOREACH");
    endforeach;?>
</div>
<?php

$html= ob_get_clean();
foreach (Subscriber::findAll() as $subscriber) {
    //Create an instance; passing `true` enables exceptions
    $mail = new PHPMailer();
    //die("ajune aici");
    var_dump($mail);
    try {
        //Server settings

        $mail->SMTPDebug = SMTP::DEBUG_CLIENT;                      //Enable verbose debug output
       // $mail->isSMTP();                                            //Send using SMTP
        $mail->Host = 'smtp.gmail.com';
        $mail ->Mailer = "smtp";//Set the SMTP server to send through
        $mail->SMTPAuth = true;                                   //Enable SMTP authentication
        $mail->Username = '';                     //SMTP username
        $mail->Password = '';                               //SMTP password
        $mail->Priority = 1;
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;            //Enable implicit TLS encryption
        $mail->Port = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

        //Recipients
        $mail->setFrom('adina.gaciu@scoalainformala.ro', 'Newsletter MyShop');
        $mail->addAddress($subscriber->email);     //Add a recipient
        //$mail->addAddress('ellen@example.com');               //Name is optional
        $mail->addReplyTo('adina.gaciu@scoalainformala.ro', 'Information');
       // $mail->addCC('cc@example.com');
      //  $mail->addBCC('bcc@example.com');

        //Attachments
//        $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
//        $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = 'Newsletter MyShop'.date('d-m-y');
        $mail->Body = $html;
        $mail->AltBody = '';
       // die("ajune aici");
        $mail->send();//send email
        echo 'Message has been sent';
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}
