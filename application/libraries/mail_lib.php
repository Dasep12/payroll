<?php


class Mail_lib
{
    public function __construct()
    {


        require APPPATH . 'THIRD_PARTY/phpmailer/Exception.php';
        require APPPATH . 'THIRD_PARTY/phpmailer/PHPMailer.php';
        require APPPATH . 'THIRD_PARTY/phpmailer/SMTP.php';
    }
}
