<?php


namespace App\classes;

use Illuminate\Database\Capsule\Manager as Capsule;

class Database
{
    public function __construct()
    {
        $db = new Capsule;
        $db->addConnection([
            'driver'    => getenv('DB_DRIVER'),
            'host'      => getenv('DB_HOST'),
            'database'  => getenv('DB_NAME'),
            'username'  => getenv('DB_USERNAME'),
            'password'  => getenv('DB_PASSWORD'),
            'charset'   => getenv('DB_CHARSET'),
            'collation' => getenv('DB_COLLATION'),
            'prefix'    => getenv('DB_PREFIX')
        ]);
        $db->setAsGlobal();
        $db->bootEloquent();
    }
}