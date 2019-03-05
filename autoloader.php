<?php
/**
 * Created by PhpStorm.
 * User: NZubkov
 * Date: 12.12.2018
 * Time: 13:21
 */
require 'constants.php';
require VENDOR_DIR . '/autoload.php';

spl_autoload_register(function($class){
    $filename = str_replace('\\', DIRECTORY_SEPARATOR, $class).'.php';
    if(file_exists($filename)){
        require $filename;
    }
});