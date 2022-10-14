<?php

namespace App\Http\Controllers;

use App\Http\Requests;

use Illuminate\Http\Request;
use PHPMailer\PHPMailer\SMTP;

use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\PHPMailer;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;

//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function

class MailController extends Controller
{
    public function txt_mail()
    {
        $info = array(
            'name' => "Alex"
        );
        Mail::send(['text' => 'mail'], $info, function ($message) {
            $message->to('ntagawa0705@gmail.com', 'W3SCHOOLS')
                ->subject('Testing message.');
            $message->from('ntagawaodrs@gmail.com', 'Ntagawa');
        });
        echo "Successfully sent the email";
    }

    public function html_mail()
    {
        //Create an instance; passing `true` enables exceptions
        $mail = new PHPMailer(true);

        try {
            //Server settings
            $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
            $mail->isSMTP();                                            //Send using SMTP
            $mail->Host       = 'mail.showrwanda.com';                     //Set the SMTP server to send through
            $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
            $mail->Username   = 'remycyuzuzo@gmail.com';                     //SMTP username
            $mail->Password   = env('MAIL_PASSWORD');                               //SMTP password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
            $mail->Port       = 2079;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

            //Recipients
            $mail->setFrom('noreply@showrwanda.com', 'ODRS Automated mailer');
            $mail->addAddress('ntagawa0705@gmail.com', 'Mr. Ntagawa Innocent');     //Add a recipient
            $mail->addAddress('remycyuzuzo@gmail.com');               //Name is optional
            $mail->addReplyTo('odrs+remycyuzuzo@gmail.com', 'ODRS');


            //Content
            $mail->isHTML(true);                                  //Set email format to HTML
            $mail->Subject = 'Your first testing email';
            $mail->Body    = 'Hi this is the first testing message!';
            $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

            $mail->send();
            echo 'Message has been sent';
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    }

    public function attached_mail()
    {
        $info = array(
            'name' => "Alex"
        );
        Mail::send('mail', $info, function ($message) {
            $message->to('alex@example.com', 'w3schools')
                ->subject('Test eMail with an attachment from W3schools.');
            $message->attach('D:\laravel_main\laravel\public\uploads\pic.jpg');
            $message->attach('D:\laravel_main\laravel\public\uploads\message_mail.txt');
            $message->from('karlosray@gmail.com', 'Alex');
        });
        echo "Successfully sent the email";
    }
}
