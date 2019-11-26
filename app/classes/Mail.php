<?php


namespace App\classes;

use PHPMailer\PHPMailer\PHPMailer;

class Mail
{
    protected $email;

    public function __construct()
    {
        $this->email = new PHPMailer;
        $this->setUp();
    }

    public function setUp()
    {
        $this->email->isSMTP();
        $this->email->Mailer = 'smtp';
        $this->email->SMTPAuth = true;
        $this->email->SMTPSecure = 'tls';

        $this->email->Host = getenv('EMAIL_SMTP_HOST');
        $this->email->Port = getenv('EMAIL_SMTP_PORT');

        $environment = getenv('APP_ENV');

        if ($environment === 'local') {
            /*$this->email->SMTPOptions = [
                'ssl' => array(
                    'verify_peer' => false,
                    'verify_peer_name' => false,
                    'allow_self_signed' => true,
                )
            ];*/
            $this->email->SMTPDebug = ''; // Set it to 2 to debug
        }

        $this->email->Username = getenv('EMAIL_USERNAME');
        $this->email->Password = getenv('EMAIL_PASSWORD');

        $this->email->isHTML(true);
        $this->email->SingleTo = true;

        $this->email->From = getenv('EMAIL_ADMIN_EMAIL');
        $this->email->FromName = getenv('EMAIL_ADMIN_EMAIL_NAME');
    }

    public function send($data)
    {
        $this->email->addAddress($data['to'], $data['name']);
        $this->email->Subject = $data['subject'];
        $this->email->Body = make($data['view'], array('data' => $data['body']));
        return $this->email->send();

    }

}