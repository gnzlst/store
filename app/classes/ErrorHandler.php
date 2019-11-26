<?php


namespace App\classes;


class ErrorHandler
{
    public function handleErrors($error_number, $error_message, $error_file, $error_line)
    {
        $error = "[{$error_number}] An error occurred in file {$error_file} on line $error_line: $error_message";
        $environment = getenv('APP_ENV');

        if($environment === 'local')
        {
            $whoops = new \Whoops\Run;
            $whoops->prependHandler(new \Whoops\Handler\PrettyPageHandler);
            $whoops->register();
        } else {
            $data = [
                'to' => getenv('EMAIL_ADMIN_EMAIL'),
                'subject' => 'System Error',
                'view' => 'system_errors',
                'name' => 'Admin',
                'body' => $error
            ];
            self::emailAdmin($data)->outputFriendlyError();
        }
    }

    public function outputFriendlyError()
    {
        ob_end_clean();
        view('errors/generic');
        exit;
    }

    public static function emailAdmin($data){
        $email = new Mail;
        $email->send($data);
        return new static;
    }

}