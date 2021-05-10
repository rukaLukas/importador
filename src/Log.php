<?php
namespace App;

class Log
{        
    public static function registrar($message)
    {
        $date = date('Y-m-d H:i:s');        
        $message = "$date - $message";
        file_put_contents("log.txt", "$message\n", FILE_APPEND);        
    }
}