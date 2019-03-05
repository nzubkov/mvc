<?php
/**
 * Created by PhpStorm.
 * User: огпе
 * Date: 05.03.2019
 * Time: 22:27
 */

require 'autoloader.php';

$uri = str_replace('mvc/', '', $_SERVER['REQUEST_URI']);


//строим маршруты
switch ($uri) {
    case 'admin':
        break;
    case 'users':
        break;
    case 'user/profile':
        break;
    case 'user/create':
        break;
    case 'user/update':
        break;
    case 'users/sort/asc':
        break;
    case 'users/sort/desc':
        break;
    case 'user/remove':
        break;
    case 'user/setavatar/':
        break;
    case 'file/upload':
        break;
    case 'file/delete':
        break;
    case '/':
        //индекс
        break;
    default:
        //404
}