<?php

use PHPMailer\PHPMailer\PHPMailer; 

require 'vendor/autoload.php';

class Mail {

    private $address;
    private $subject;
    private $body;

    public function __construct($address,$subject,$body)
    {
        $this->address = $address;
        $this->subject = $subject;
        $this->body = $body;
    }

    public function __set($name,$value) 
    {
        $this->$name = $value;
    }
    
    public function __get($name) 
    {
        return $this->$name;
    }

    public function send()
    {
        try 
        {
            $mail = new PHPMailer(true);
            $mail->isSMTP();
            $mail->Host = HOST_SMTP;
            $mail->SMTPAuth = true;
            $mail->Username = USER_SMTP;
            $mail->Password = PASSWORD_SMTP;
            $mail->Port = PORT_SMTP;
            $mail->CharSet = 'UTF-8';
            $mail->setFrom(MAIL_FROM,URL_DOMAIN);
            $mail->addAddress($this->address);
            $mail->Subject = $this->subject;
            $mail->isHTML(true);
            $mail->Body = $this->body;
            
            return $mail->send();
        }
        catch (PDOException $e)
        {
            die($e->getMessage());
        }
    }
}

?>