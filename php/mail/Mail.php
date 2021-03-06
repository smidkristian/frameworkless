<?php
    require_once __DIR__.'/../../vendor/autoload.php';
    use PHPMailer\PHPMailer\PHPMailer;

    class Mail {

        public $name;
        public $emailTo;

        function __construct( String $name, String $emailTo) {
            $this->name = $name;
            $this->emailTo = $emailTo;
        }

        public function sendMail() {

            $mail = new PHPMailer();
            $mail->isSMTP();
            $mail->Host = 'smtp.mailtrap.io';
            $mail->SMTPAuth = true;
            $mail->Username = '25d73a29c1992c'; //paste one generated by Mailtrap
            $mail->Password = '901d3da49cd4a9'; //paste one generated by Mailtrap
            $mail->SMTPSecure = 'tls';
            $mail->Port = 2525;
            
            // email headers
            $mail->setFrom( 'eventu@lity.cz' , 'Eventuality');
            // $mail->addReplyTo( $this->emailTo , $this->name );

            $mail->addAddress($this->emailTo, $this->name);
            $mail->addCC('cc1@example.com', 'Elena');
            $mail->addBCC('bcc1@example.com', 'Alex');

            $mail->Encoding = 'base64';
            $mail->CharSet = 'UTF-8';
            
            // // custom
            // $mail->AddBCC('bcc2@example.com', 'Anna');
            // $mail->AddBCC('bcc3@example.com', 'Mark');  

            // setting a subject
            $mail->Subject = 'Test Email via Mailtrap SMTP using PHPMailer';

            // format to HTML
            $mail->isHTML(true);

            // content
            $template = file_get_contents('./content.html');
            $msg = str_replace('{ NAME }', $this->name, $template);
            $mail->Body = $msg;

            // external content
            // $mail->msgHTML(file_get_contents('./content.html'));

            // // attach files
            // $mail->addAttachment('path/to/invoice1.pdf', 'invoice1.pdf');
            // $mail->addAttachment('path/to/invoice2.pdf', 'invoice2.pdf');

            if ($mail->send()) {
                return json_encode([ "success" => 'Message has been sent.' ]);
            } else {
                return json_encode([ "error" => "Mailer Error: " . $mail->ErrorInfo ]);
            }
        }
    }

?>