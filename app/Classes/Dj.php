<?php

namespace App\Classes;
use Illuminate\Http\Request;

class Dj
{
    public static function son($data = null){
        $backtrace = debug_backtrace();
        $type = gettype($data);
        $line = $backtrace[0]['line'];
        $file = str_replace("*","/",str_replace("\\","*",explode('contractsLumen',$backtrace[0]['file'])[1]));
        exit(json_encode(['file' => $file, 'line' => $line, 'type' => $type, 'data' => $data]));
    }

}